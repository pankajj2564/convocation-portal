@extends('student.layouts.app')

@section('title', 'Student Dashboard - Convocation Portal')

@section('content')
    <?php /*
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif */ ?>

    <div class="row">
        <!-- Profile Update Form -->
        <div class="col-md-7">
            <div class="card shadow mb-4 border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Update Your Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Roll Number (Locked)</label>
                            <input type="text" class="form-control bg-light" value="{{ $student->roll_no }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Email (Locked)</label>
                            <input type="email" class="form-control bg-light" value="{{ $student->email }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Phone (Locked)</label>
                            <input type="text" class="form-control bg-light" value="{{ $student->phone }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Degree</label>
                            <input type="text" name="degree" class="form-control" value="{{ $student->degree }}" placeholder="e.g. B.Tech" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Branch</label>
                            <input type="text" name="branch" class="form-control" value="{{ $student->branch }}" placeholder="e.g. Computer Science" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Passing Year</label>
                            <input type="text" name="passing_year" class="form-control" value="{{ $student->passing_year }}" placeholder="e.g. 2026" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2"><i class="fas fa-save me-1"></i> Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Registration & Payment Section -->
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-receipt me-2"></i> Convocation Registration</h5>
                </div>
                <div class="card-body text-center p-4">
                    @if($student->is_registered)
                        <div class="alert alert-success mb-0 py-4">
                            <h4 class="text-success"><i class="fas fa-check-circle fa-2x mb-2"></i><br>Registered Successfully!</h4>
                            <p class="mb-0 text-secondary">You have completed your ₹1000 payment for the Convocation.</p>
                        </div>
                    @elseif($student->profile_completed)
                        <p class="text-muted mb-4">Your profile is complete. Click below to pay the registration fee of <strong>₹1000</strong> via PayU.</p>
                        <a href="{{ route('student.pay') }}" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                            <i class="fas fa-rupee-sign me-1"></i> Pay ₹1000 & Register
                        </a>
                    @else
                        <div class="alert alert-warning mb-0 py-4">
                            <i class="fas fa-exclamation-triangle fa-2x mb-2 text-warning"></i><br>
                            Please update and save your profile details on the left to unlock the Registration Payment button.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection