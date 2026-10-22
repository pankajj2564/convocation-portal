<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $studentId = session('student_id');
        if (!$studentId) {
            return redirect()->route('student.login');
        }

        $student = Student::findOrFail($studentId);

        if ($student->is_registered) {
            return redirect()->route('student.dashboard')->with('error', 'You are already registered!');
        }

        $merchantKey = env('PAYU_MERCHANT_KEY', ''); 
        $merchantSalt = env('PAYU_MERCHANT_SALT', ''); 
        $isTestMode = env('PAYU_MODE', 'test') === 'test';
        
        $payuUrl = $isTestMode 
            ? 'https://test.payu.in/_payment' 
            : 'https://secure.payu.in/_payment';

        $txnid = 'TXN_' . uniqid();
        $amount = 1000.00; 
        $productInfo = 'Convocation Registration Fee';
        $firstname = $student->name;
        $email = $student->email;
        $phone = $student->phone;

        $surl = route('student.payment.success');
        $furl = route('student.payment.failure');

        $hashString = "{$merchantKey}|{$txnid}|{$amount}|{$productInfo}|{$firstname}|{$email}|||||||||||{$merchantSalt}";
        $hash = strtolower(hash('sha512', $hashString));

        return view('student.payu-checkout', compact(
            'merchantKey', 'txnid', 'amount', 'productInfo', 
            'firstname', 'email', 'phone', 'surl', 'furl', 'hash', 'payuUrl'
        ));
    }

    // 2. Handle Payment Success Response (Session independent)
    public function paymentSuccess(Request $request)
    {
        $status = $request->input('status');
        $txnid = $request->input('txnid');
        $amount = $request->input('amount');
        $email = $request->input('email'); // PayU response se email mil jayega

        // Email ke zariye student ko find karein
        $student = Student::where('email', $email)->first();

        if (!$student) {
            return redirect()->route('student.login')->with('error', 'Student not found from payment response.');
        }

        if ($status === 'success') {
            Payment::updateOrCreate(
                ['transaction_id' => $txnid],
                [
                    'student_id' => $student->id,
                    'amount' => $amount,
                    'status' => 'success',
                    'gateway_response' => json_encode($request->all())
                ]
            );

            $student->update(['is_registered' => true]);

            // Agar session expire ho gaya ho toh dobara login session set kar dein
            session(['student_id' => $student->id]);

            return redirect()->route('student.dashboard')->with('success', 'Payment successful! You are now successfully registered for the Convocation.');
        }

        return redirect()->route('student.dashboard')->with('error', 'Payment failed or cancelled.');
    }

    // 3. Handle Payment Failure Response (Session independent)
    public function paymentFailure(Request $request)
    {
        $email = $request->input('email');
        $student = Student::where('email', $email)->first();

        if ($student) {
            session(['student_id' => $student->id]);
            $txnid = $request->input('txnid');

            Payment::create([
                'student_id' => $student->id,
                'transaction_id' => $txnid ?? 'TXN_FAIL_' . time(),
                'amount' => 1000.00,
                'status' => 'failed',
                'gateway_response' => json_encode($request->all())
            ]);
        }

        return redirect()->route('student.dashboard')->with('error', 'Payment failed! Please try again.');
    }
}