@extends('layouts.frontend.app')
@section('content')

<section id="hero" class="d-flex flex-column justify-content-center" style=" width: 100%;
height: 100vh;
background: url({{ asset('aboutme') }}/{{ $about->bannerimage }}) top right no-repeat;
    background-size: cover;
    position: relative;">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <h1>{{ ucfirst($about->my_name) }}</h1>
        <p>I am <span class="typed"
                data-typed-items="Designer, Developer, Freelancer, Photographer, Graphics Designer"></span></p>
        <div class="social-links">
            <a href="{{ $about->twitter }}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="{{ $about->facebook }}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="{{ $about->insta }}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            <a href="{{ $about->skype }}" class="google-plus" target="_blank"><i class="bx bxl-skype"></i></a>
            <a href="{{ $about->likedin }}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</section>

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('aboutme') }}/{{ $about->image }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>{{ $about->title }}</h3>
                    <p class="fst-italic">
                        {{$about->shortdescription}}
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{date('d M,
                                        Y',strtotime($about->dob))}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                    <span>{{ $about->website }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+91 {{
                                        $about->phone }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong>
                                    <span>{{$about->address}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                {{-- <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                                --}}
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>
                                        {{ $about->degree }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Contact Email:</strong>
                                    <span>{{ $about->contact_email }}</span>
                                </li>
                                {{-- <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                    <span>Available</span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <p>
                        {{$about->longdescription}}
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Facts</h2>

            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-award"></i>
                        <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Awards</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Skills</h2>

            </div>

            <div class="row skills-content">

                @foreach ($skill as $key=>$val)

                <div class="col-lg-6">
                    <div class="progress">
                        <span class="skill">{{ $val->skill_name }} <i class="val">{{ $val->percentage }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $val->percentage }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Resume</h2>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h3 class="resume-title">Sumary</h3>
                    <div class="resume-item pb-0">
                        <h4>{{ $about->my_name }}</h4>
                        <p><em>{{$about->shortdescription}}</em></p>
                        <ul>
                            <li>{{ $about->address }}</li>
                            <li>+91 {{ $about->phone }}</li>
                            <li>{{ $about->contact_email }}</li>
                        </ul>
                    </div>

                    <h3 class="resume-title">Education</h3>
                    @foreach ($educationResume as $key=>$val)
                    <div class="resume-item">
                        <h4>{{ $val->main_title }}</h4>
                        <h5>{{ $val->from_year }} - {{ $val->to_year }}</h5>
                        <p><em>{{ $val->sub_title }}</em></p>
                        <p>{!! $val->description !!}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <h3 class="resume-title">Professional Experience</h3>
                    @foreach ($workResume as $key=>$val)
                    <div class="resume-item">
                        <h4>{{ $val->main_title }}</h4>
                        <h5>{{ $val->from_year }} - {{ $val->to_year }}</h5>
                        <p><em>{{ $val->sub_title }}</em></p>
                        <p>{!! $val->description !!}</p>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>

            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                        <li data-filter=".filter-other">Other</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                @foreach ($works as $key=>$val)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $val->category }}">
                    <div class="portfolio-wraps">
                        <a href="{{ asset('worksImage') }}/{{ $val->image }}" target="_blank">
                            <img src="{{ asset('worksImage') }}/{{ $val->image }}" class="img-fluid"
                                alt="{{ $val->image }}">
                        </a>
                        {{-- <div class="portfolio-info">
                            <h4>{{ $val->title }}</h4>
                            <p>{{ ucfirst($val->category) }}</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('worksImage') }}/{{ $val->image }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox" title="{{ $val->title }}"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="portfolio-details-lightbox"
                                    data-glightbox="type: external" title="{{ $val->title }}"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
            </div>

            <div class="row">
                @foreach ($services as $key=>$val)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <div class="icon">
                            <img src="{{ asset('service') }}/{{ $val->icon }}" alt="error">
                        </div>
                        <h4><a href="">{{ $val->title }}</a></h4>
                        <p>{{ $val->shortdescription }}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $key=>$val)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('testimonialImage') }}/{{ $val->image }}" class="testimonial-img" alt="">
                            <h3>{{ $val->name }}</h3>
                            <h4>{{ $val->designation }}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$val->text}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row mt-1">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $about->address }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $about->contact_email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+91 {{ $about->phone }}</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="{{ route('submitContact') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main>
@endsection