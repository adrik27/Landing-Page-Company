@extends('landingpage.main')

@section('templatelanding')
<!-- start hero section -->
<section class="section pb-0 hero-section" id="hero">
    <div class="bg-overlay bg-overlay-pattern"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-10">
                <div class="text-center mt-lg-5 pt-5">
                    <h1 class="display-6 fw-semibold mb-3 lh-base">The better way to manage your website with <span
                            class="text-success">Velzon </span></h1>
                    <p class="lead text-muted lh-base">Velzon is a fully responsive, multipurpose and premium Bootstrap
                        5 Admin & Dashboard Template built in multiple frameworks.</p>

                    <div class="d-flex gap-2 justify-content-center mt-4">
                        <a href="auth-signup-basic.html" class="btn btn-primary">Get Started <i
                                class="ri-arrow-right-line align-middle ms-1"></i></a>
                        <a href="pages-pricing.html" class="btn btn-danger">View Plans <i
                                class="ri-eye-line align-middle ms-1"></i></a>
                    </div>
                </div>

                <div class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                    <div class="demo-img-patten-top d-none d-sm-block">
                        <img src="assets/images/landing/img-pattern.png" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="demo-img-patten-bottom d-none d-sm-block">
                        <img src="assets/images/landing/img-pattern.png" class="d-block img-fluid" alt="...">
                    </div>
                    <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src="assets/images/demos/default.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/saas.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/material.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/minimal.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/creative.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/modern.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/demos/interactive.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <div class="position-absolute start-0 end-0 bottom-0 hero-shape-svg">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 1440 120">
            <g mask="url(&quot;#SvgjsMask1003&quot;)" fill="none">
                <path d="M 0,118 C 288,98.6 1152,40.4 1440,21L1440 140L0 140z">
                </path>
            </g>
        </svg>
    </div>
    <!-- end shape -->
</section>
<!-- end hero section -->
@endsection