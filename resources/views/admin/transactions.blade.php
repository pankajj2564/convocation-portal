@extends('admin.layouts.app')

@section('title', 'Payment Transactions')

@section('content')
<h3 class="mb-4">Payment Transactions (Admin Only)</h3>

<div class="card shadow">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Transaction ID</th>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td>{{ $payment->transaction_id }}</td>
                        <td>{{ $payment->student->name ?? 'N/A' }}</td>
                        <td>{{ $payment->student->roll_no ?? 'N/A' }}</td>
                        <td>₹{{ $payment->amount }}</td>
                        <td>
                            @if($payment->status == 'success')
                                <span class="badge bg-success">Success</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($payment->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No transactions recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection