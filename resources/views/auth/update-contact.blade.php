<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact & Login - Convocation Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Logo Header Section -->
                <div class="text-center mb-4">
                    <div class="logo-container bg-white p-3 rounded shadow-sm d-inline-block">
                        <img src="{{ asset('admin/images/cgcj-logo.webp') }}" alt="CGC Mohali, Jhanjeri" width="200" height="auto">
                    </div>
                </div>

                <!-- Form Card -->
                <div class="card login-card shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i> Update Phone / Email & Login</h4>
                    </div>
                    <div class="card-body p-4">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('student.update.contact.process') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Roll Number</label>
                                    <input type="text" name="roll_no" class="form-control" placeholder="e.g. 1925123" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Passing Year</label>
                                    <input type="text" name="passing_year" class="form-control" placeholder="e.g. 2024" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">New Mobile Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="10-digit mobile number" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">New Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="student@example.com" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2 shadow-sm">
                                <i class="fas fa-paper-plane me-1"></i> Update & Send OTP
                            </button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('student.login') }}" class="text-decoration-none small"><i class="fas fa-arrow-left me-1"></i> Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>