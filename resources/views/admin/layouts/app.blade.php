<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Convocation Portal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
</head>
<body class="bg-light">

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('admin/images/cgcj-logo.webp') }}" alt="CGC Mohali, Jhanjeri" width="200" height="auto">
            <small class="text-muted">Role: {{ auth()->user()->getRoleNames()->first() }}</small>
        </div>
        <ul class="list-unstyled components">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-users"></i> Students List</a>
            </li>
            <li class="{{ request()->routeIs('admin.students.import.form') ? 'active' : '' }}">
                <a href="{{ route('admin.students.import.form') }}"><i class="fas fa-file-excel"></i> Import Students</a>
            </li>
            @if(auth()->user()->hasRole('Admin'))
            <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}"><i class="fas fa-user-shield"></i> Manage Staff Users</a>
            </li>
            <li class="{{ request()->routeIs('admin.transactions') ? 'active' : '' }}">
                <a href="{{ route('admin.transactions') }}"><i class="fas fa-wallet"></i> Transactions</a>
            </li>
            @endif
        </ul>
        <div class="p-3">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 p-3 rounded">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Welcome, {{ auth()->user()->name }}</span>
            </div>
        </nav>

        <div class="container-fluid">
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
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @stack('scripts')
</body>
</html>