<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin & Staff Login - Convocation Portal</title>
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

                <!-- Admin & Staff Login Card -->
                <div class="card login-card shadow-lg">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-user-shield me-2"></i> Admin & Staff Portal Login</h4>
                    </div>
                    <div class="card-body p-4">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="********" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2 shadow-sm">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>