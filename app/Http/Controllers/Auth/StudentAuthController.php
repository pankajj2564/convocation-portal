<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Otp;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class StudentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required'
        ]);

        $identifier = $request->identifier;

        // Check student by Roll No, Email or Phone
        $student = Student::where('roll_no', $identifier)
            ->orWhere('email', $identifier)
            ->orWhere('phone', $identifier)
            ->first();

        if (!$student) {
            return back()->with('error', 'Student record not found with this Roll No, Email or Phone.');
        }

        // Generate 6-digit OTP
        $otpCode = rand(100000, 999999);

        // Store OTP in database (Valid for 10 minutes)
        Otp::updateOrCreate(
            ['identifier' => $student->roll_no], // Unique identifier store karne ke liye
            [
                'otp' => $otpCode,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]
        );

        // 1. SEND EMAIL
        try {
            if ($student->email) {
                $firstName = explode(' ', trim($student->name))[0] ?? 'Student';
                Mail::to($student->email)->send(new OtpMail($otpCode, $firstName));
            }
        } catch (\Exception $e) {
            \Log::error("Email sending failed: " . $e->getMessage());
        }

        // 2. SEND SMS (Example template for SMS Gateway like Fast2SMS / MSG91)
        try {
            if ($student->phone) {
                // Get student's first name safely
                $firstName = explode(' ', trim($student->name))[0] ?? 'Student';
                
                // Formulate SMS message text as requested
                //$smsMsg = 'Hello ' . ucfirst($firstName) . ', ' . $otpCode . ' is your One Time Password(OTP). This OTP is valid till 10 Minutes - CGC University, Mohali';

                $smsMsg = "Hello " . ucfirst($firstName) . "\n" . 
                          $otpCode . " is your One Time Password(OTP). This OTP is valid till 10 Minutes - CGC University, Mohali";
                
                $this->sendSmsApi($student->phone, $smsMsg);
            }
        } catch (\Exception $e) {
            \Log::error("SMS sending failed: " . $e->getMessage());
        }

        return redirect()->route('student.verify.form', ['identifier' => $student->roll_no])
            ->with('success', 'OTP has been sent to your registered Email & Phone!');
    }

    // Helper function for sending SMS via API
    /* private function sendSmsApi($phone, $otp)
    {
        // Example: Fast2SMS or Custom SMS Gateway API integration
        // Aap yahan apne SMS provider ki API URL aur API key daal sakte hain
        
        Http::post('https://www.fast2sms.com/dev/bulkV2', [
            'authorization' => 'YOUR_SMS_API_KEY',
            'route' => 'q',
            'message' => "Your Convocation Portal OTP is {$otp}",
            'language' => 'english',
            'flash' => 0,
            'numbers' => $phone,
        ]);
        

        // Filhal testing ke liye log mein record kar rahe hain
        \Log::info("SMS sent to {$phone} with OTP: {$otp}");
    } */
    private function sendSmsApi($phone, $message)
    {
        // 👉 .env file se values fetch kar rahe hain
        $apiUrl = env('SMS_API_URL', '');
        $apiKey = env('SMS_API_KEY', '');
        $senderId = env('SMS_SENDER_ID', '');
        $peId = env('SMS_PE_ID', '');
        $dltTemplateId = env('SMS_DLT_TEMPLATE_ID', '');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "Account": {
                    "APIKey": "' . $apiKey . '",
                    "SenderId": "' . $senderId . '",
                    "Channel": "trans",
                    "DCS": "0",
                    "FlashSms": 0,
                    "Route": 1014,
                    "PeId": "' . $peId . '"
                },
                "Messages": [
                    {
                        "Number": "' . $phone . '",
                        "Text": "' . $message . '", 
                        "DLTTemplateId": "' . $dltTemplateId . '"
                    }
                ]
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Optional: Log response for debugging
        \Log::info("SMS API Response for {$phone}: " . $response);

        return $response;
    }

    public function showVerifyForm(Request $request)
    {
        $identifier = $request->query('identifier');
        $student = Student::where('roll_no', $identifier)
        ->orWhere('email', $identifier)
        ->orWhere('phone', $identifier)
        ->first();
        return view('auth.student-verify', compact('identifier', 'student'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'otp' => 'required|digits:6'
        ]);

        $otpRecord = Otp::where('identifier', $request->identifier)
            ->where('otp', $request->otp)
            ->first();

        if (!$otpRecord || Carbon::now()->gt($otpRecord->expires_at)) {
            return back()->with('error', 'Invalid or expired OTP.');
        }

        $student = Student::where('roll_no', $request->identifier)
            ->orWhere('email', $request->identifier)
            ->orWhere('phone', $request->identifier)
            ->first();

        if (!$student) {
            return back()->with('error', 'Student not found.');
        }

        // Login student by session
        session(['student_id' => $student->id]);
        $otpRecord->delete();

        return redirect()->route('student.dashboard')->with('success', 'Logged in successfully!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('student_id');
        return redirect()->route('student.login')->with('success', 'Logged out successfully.');
    }
    public function showUpdateContactForm()
    {
        return view('auth.update-contact');
    }
    public function processUpdateContact(Request $request)
    {
        $request->validate([
            'roll_no' => 'required',
            'passing_year' => 'required',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
        ]);

        // Student ko Roll No aur Passing Year se verify karein
        $student = Student::where('roll_no', $request->roll_no)
            ->where('passing_year', $request->passing_year)
            ->first();

        if (!$student) {
            return back()->with('error', 'Roll Number and Passing Year do not match our records.');
        }

        // Direct update phone and email
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();

        // Generate 6-digit OTP
        $otpCode = rand(100000, 999999);

        // Store OTP
        Otp::updateOrCreate(
            ['identifier' => $student->roll_no],
            [
                'otp' => $otpCode,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]
        );

        $firstName = explode(' ', trim($student->name))[0] ?? 'Student';

        // 1. SEND EMAIL to new email
        try {
            Mail::to($student->email)->send(new OtpMail($otpCode, $firstName));
        } catch (\Exception $e) {
            \Log::error("Email sending failed: " . $e->getMessage());
        }

        // 2. SEND SMS to new phone
        try {
            $smsMsg = 'Hello ' . ucfirst($firstName) . ', ' . $otpCode . ' is your One Time Password(OTP). This OTP is valid till 24 hours - Chandigarh Group of Colleges - Jhanjeri, Mohali';
            $this->sendSmsApi($student->phone, $smsMsg);
        } catch (\Exception $e) {
            \Log::error("SMS sending failed: " . $e->getMessage());
        }

        return redirect()->route('student.verify.form', ['identifier' => $student->roll_no])
            ->with('success', 'Contact details updated successfully! OTP sent to your new Phone & Email.');
    }
}