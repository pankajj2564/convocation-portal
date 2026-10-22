<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Convocation Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- Logo Header Section -->
                <div class="text-center mt-4 mb-4">
                    <div class="logo-container bg-white p-3 rounded shadow-sm d-inline-block">
                        <img src="{{ asset('admin/images/cgcj-logo.webp') }}" alt="CGC Mohali, Jhanjeri" width="200" height="auto">
                    </div>
                </div>

                <!-- Verify OTP Card -->
                <div class="card login-card shadow-lg">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-shield-alt me-2"></i> Enter OTP</h4>
                    </div>
                    <div class="card-body p-4">
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
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <form action="{{ route('student.verify.otp') }}" method="POST">
                            @csrf
                            <input type="hidden" name="identifier" value="{{ $identifier }}">
                            <div class="mb-3 text-center">
                                <label class="form-label fw-bold text-secondary mb-2">6-Digit OTP sent to your Phone & Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-key text-muted"></i></span>
                                    <input type="text" name="otp" class="form-control text-center fs-4 tracking-widest" maxlength="6" placeholder="------" required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2 shadow-sm">
                                <i class="fas fa-check-circle me-1"></i> Verify & Login
                            </button>
                            <div class="text-center mt-3">
                                <a href="{{ route('student.update.contact.form') }}" class="text-muted small text-decoration-none">
                                    <i class="fas fa-mobile-alt me-1"></i> Update old phone/email? Click here to update
                                </a>
                            </div>
                        </form>
                        @if(isset($student))
                            <div class="alert alert-info py-2 mt-4 small mb-3 text-center">
                                <i class="fas fa-info-circle me-1"></i> OTP sent to:<br>
                                @if($student->email)
                                    <span><i class="fas fa-envelope me-1"></i> <strong>{{ $student->email }}</strong></span><br>
                                @endif
                                @if($student->phone)
                                    <span><i class="fas fa-phone-alt me-1"></i> <strong>{{ $student->phone }}</strong></span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>