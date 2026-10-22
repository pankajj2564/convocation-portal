@extends('layouts.app')

@section('title', 'Convocation Ceremony 2026 - CGC Jhaneri')

@section('content')
    <section class="induction-hero-banner" id="ind-hero-banner" data-aos="fade-down" data-aos-duration="1000">
        <img src="{{ asset('images/banner-image.webp') }}" class="hero-banner w-100 desktop-b" alt="Convocation ceremony banner" fetchpriority="high">
        <div class="container-fluid">
            <div class="banner_data text-center">
                <div class="title_image_logo">
                    <img src="{{ asset('images/cgc-cap.png') }}" alt="cgc-cap-logo">
                    <h1><strong>7th</strong> Convocation <span>Ceremony 2026</span></h1>
                </div>
                <h2>A Journey <span>Concluded.</span> A New One Now <span>Awaits.</span></h2>
            </div>
        </div>
    </section>
    <section class="induction_about wi_full" id="induction_about">
        <div class="subBanner-section" id="subBanner-section">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="ind-about-content" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
                            <div class="induction-abt-title mb-0">
                                <h2>The Beginning of a Momentous Journey</h2>
                            </div>
                            <div class="induction-abt-desc">
                                <p>At Chandigarh Group of Colleges (Now Known as CGC University, Mohali) you don't leave with just any run-of-the-mill degree. Instead, you leave with a bag full of experiences, with each one designed to spell professional and personal development on your part. </p>
                                <p>As for how this development is facilitated, the answer resides in CGC’s commitment to provide you with a corporate-curated curriculum, project-based curriculum, expert-grade mentorship, and so much more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="ind-img-right">
                            <img src="{{ asset('images/student.webp') }}" alt="Smiling graduate in convocation gown"
                                data-aos="fade-up" data-aos-duration="1000" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="authority-message-section msg-red adms-office" data-aos="fade-up" data-aos-duration="900">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="authority-messsge-section authority-messsge-white">
                        <h2 class="authority-name">S. Rashpal Singh Dhaliwal</h2>
                        <h3 class="title">Chairman, Chandigarh Group of Colleges (Now Known as CGC University, Mohali)</h3>
                        <img src="{{ asset('images/bottom-line-white.png') }}" alt="" class="img-fluid bottom-line">
                        <div class="auth-message-para">
                            <h4><small>Dear Alumni,</small>Congratulations on Your Graduation!</h4>
                            <p>This is more than just a milestone — it is a celebration of your courage, determination, and the countless hours you devoted to your dreams. We are honored that you chose CGC Mohali (Jhanjeri) to be part of your transformative journey.</p>
                            <p>As you step into the world beyond these gates, remember that you carry with you the spirit of CGC — a spirit that dares to dream, strives to lead, and is never afraid to break boundaries. You are not just a graduate; you are a changemaker in the making, prepared to leave your mark on the world.</p>
                            <p>Go out and write stories worth remembering. And always know — CGC Mohali (Jhanjeri) will be cheering you on, every step of the way.</p>
                            <p>With immense pride and warm wishes for your brightest future ahead,</p>
                            <p>S. Rashpal Singh Dhaliwal <br>President – CGC Mohali (Now Known as CGC University, Mohali) </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 authority-picture-sec">
                    <img src="{{ asset('images/pro-image-1.webp') }}" alt="S. Rashpal Singh Dhaliwal" class="authority-picture-one img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <section class="authority-message-section-two msg-white adms-office" data-aos="fade-up" data-aos-duration="900">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="authority-messsge-section">
                        <h2 class="authority-name">Mr. Arsh Dhaliwal</h2>
                        <h3 class="title">Managing Director, Chandigarh Group of Colleges (Now Known as CGC University, Mohali)</h3>
                        <img src="{{ asset('images/bottom-line.png') }}" alt="" class="img-fluid bottom-line">
                        <div class="auth-message-para">
                            <h4><small>Dear Alumni,</small>Congratulations to each one of you on this remarkable achievement!</h4>
                            <p>Your journey of perseverance, learning, and growth has brought you to this proud milestone, and I wish you nothing but continued success in all that lies ahead. May your path be filled with insight, purpose, and the strength to turn every opportunity into a milestone.</p>
                            <p>It has been our greatest honor at CGC Mohali (Jhanjeri) to be a part of your academic and personal development. I truly hope your time here has added value, vision, and direction to your goals.</p>
                            <p>Grow not only as professionals but also as kind, impactful human beings. This graduation is not just a moment — it is the launch of your future.</p>
                            <p>Wishing you continued excellence in every chapter that follows.<br>Sincerely,</p>
                            <p>Mr. Arsh Dhaliwal<br>Managing Director – CGC Mohali (Now Known as CGC University, Mohali)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 authority-picture-sec-two">
                    <img src="{{ asset('images/pro-image-2.webp') }}" alt="Mr. Arsh Dhaliwal" class="authority-picture-two img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <section class="authority-message-section msg-blue adms-office" data-aos="fade-up" data-aos-duration="900">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="authority-messsge-section authority-messsge-white">
                        <h2 class="authority-name">Dr. Sushil Prashar</h2>
                        <h3 class="title">Executive Director - DCPD, CGC Mohali (Now Known as CGC University, Mohali)</h3>
                        <img src="{{ asset('images/bottom-line-white.png') }}" alt="" class="img-fluid bottom-line">
                        <div class="auth-message-para">
                            <h4><small>Dear Graduates,</small>Congratulations on achieving one of life’s most meaningful milestones!</h4>
                            <p>Your journey of hard work, learning, and self-discovery has shaped you into individuals ready to make a difference in the world. At CGC Mohali (Jhanjeri), we are proud to have been a part of your growth — both personally and professionally.</p>
                            <p>As you move forward, embrace every challenge as an opportunity, every experience as a lesson, and every success as a step toward something greater.</p>
                            <p>Wishing you a future filled with achievements, impact, and continued growth.</p>
                            <p>All the best for the future,</p>
                            <p>Dr. Sushil Prashar<br>Executive Director DCPD - CGC Mohali (Now Known as CGC University, Mohali)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 authority-picture-sec">
                    <img src="{{ asset('images/pro-image-3.webp') }}" alt="Dr. Sushil Prashar" class="authority-picture-one img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <section class="authority-message-section-two msg-white adms-office" data-aos="fade-up" data-aos-duration="900">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="authority-messsge-section">
                        <h2 class="authority-name">Dr. Vinay Kumar Goyal</h2>
                        <h3 class="title">Executive Director, CGC Mohali (Now Known as CGC University, Mohali)</h3>
                        <img src="{{ asset('images/bottom-line.png') }}" alt="" class="img-fluid bottom-line">
                        <div class="auth-message-para">
                            <p>To Our Remarkable Graduates,</p>
                            <p>You arrived with dreams in your eyes and determination in your hearts. Today, you leave with knowledge, courage, and a future waiting to be written by your own hands.</p>
                            <p>At CGC Mohali (Jhanjeri), we’ve seen you evolve — not just into professionals, but into individuals with purpose, passion, and power to lead. This achievement is a tribute to your effort, and a symbol of the limitless path that lies ahead.</p>
                            <p>You’ve earned more than a degree — you’ve earned the strength to stand tall, the wisdom to make an impact, and the responsibility to lead with integrity.</p>
                            <p>With pride in our hearts and best wishes for your future,</p>
                            <p>Dr. Vinay Kumar Goyal<br>Executive Director - CGC Mohali (Now Known as CGC University, Mohali)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 authority-picture-sec-two">
                    <img src="{{ asset('images/pro-image-4.webp') }}" alt="Dr. Vinay Kumar Goyal" class="authority-picture-two img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <section class="authority-message-section msg-red adms-office" data-aos="fade-up" data-aos-duration="900">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="authority-messsge-section authority-messsge-white">
                        <h2 class="authority-name">Prof. (Dr.) Anupam Sharma</h2>
                        <h3 class="title">Registrar Cum Dean Academics, CGC Mohali (Now Known as CGC University, Mohali)</h3>
                        <img src="{{ asset('images/bottom-line-white.png') }}" alt="" class="img-fluid bottom-line">
                        <div class="auth-message-para">
                            <p>Dear Graduates,</p>
                            <p>Each ending holds the promise of a new beginning — and today, you stand at that powerful crossroad.</p>
                            <p>Your journey at CGC Mohali (Jhanjeri) has been more than just classrooms and courses. It has been a space where your aspirations took shape, your ideas found voice, and your confidence was built one challenge at a time.</p>
                            <p>As you step beyond these walls, take with you not only your knowledge but the resilience, ethics, and vision you’ve nurtured here. The world needs thinkers who care, leaders who listen, and doers who dream — and we believe you’re ready to be all that and more.</p>
                            <p>With heartfelt congratulations and unwavering belief in your potential,</p>
                            <p>Prof. (Dr.) Anupam Sharma<br>Registrar Cum Dean Academics - CGC Mohali (Now Known as CGC University, Mohali)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 authority-picture-sec">
                    <img src="{{ asset('images/pro-image-5.webp') }}" alt="Prof. (Dr.) Anupam Sharma" class="authority-picture-one img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <section class="induction-page-video-section py_3 pl-pr-70 pad-80">
        <div class="container-fluid pl-pr-78">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="sec_title text-center pb-4">
                        <h2>More Than Graduates—You’re Our Legacy</h2>
                        <p>Your journey begins here. With passion and perseverance, you’re set to shine brighter than ever.</p>
                    </div>
                    <div class="video-container ratio ratio-16x9" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                        <iframe src="https://www.youtube.com/embed/IHLvmFSDbPo" title="CGC University Mohali Convocation video" loading="lazy"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="gallery_sec wi_full py_3 pl-pr-70 pad-80" style="background: url(home-assets/assets/images/gallery-bg.jpg) no-repeat center; background-size: cover;">
        <div class="container-fluid pl-pr-78" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
            <div class="sec_title text-center pb-4">
                <h2>Gallery</h2>
                <p>Moments of pride, joy and celebration from our convocation.</p>
            </div>
            <div class="gallery-grid">
                <figure class="g g1"><img src="{{ asset('images/gallery-1.webp') }}" alt="Convocation gallery photo 1" loading="lazy"></figure>
                <figure class="g g2"><img src="{{ asset('images/gallery-2.webp') }}" alt="Convocation gallery photo 2" loading="lazy"></figure>
                <figure class="g g3"><img src="{{ asset('images/gallery-3.webp') }}" alt="Convocation gallery photo 3" loading="lazy"></figure>
                <figure class="g g4"><img src="{{ asset('images/gallery-4.webp') }}" alt="Convocation gallery photo 4" loading="lazy"></figure>
                <figure class="g g5"><img src="{{ asset('images/gallery-5.webp') }}" alt="Convocation gallery photo 5" loading="lazy"></figure>
            </div>
        </div>
    </section>
@endsection