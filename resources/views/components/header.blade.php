<header id="header">
    <div class="container-fluid">
        <div class="header-container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="header-left-section">
                        <div class="header-logo-primary primary-logo">
                            <img src="{{ asset('images/full-logo.gif') }}" alt="CGCJ Logo" class="website-header-logo logo-dark img-fluid">
                            <img src="{{ asset('images/full-logo-white.webp') }}" alt="CGCJ Logo" class="website-header-logo logo-light img-fluid">
                        </div>
                        <div class="header-logo-secondary sec-logo">
                            <img src="{{ asset('images/naac_black.png') }}" alt="NAAC Logo" class="website-header-logo logo-dark img-fluid">
                            <img src="{{ asset('images/naac-white.webp') }}" alt="NAAC Logo" class="website-header-logo logo-light img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="header-right-section">
                        <div class="login-btn">
                            <a href="{{ route('student.login') }}" class="nav-button login-button text-decoration-none">Join Convocation 2026
                                <img src="{{ asset('images/Arrow-13.png') }}" alt="" class="nav-arrow ms-2">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>