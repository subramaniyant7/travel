@extends('Common.layout')

@section('content')
    <!-- Start Blog -->
    <section class="section-padding bg-light-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="listing-top-heading mb-xl-20">
                        <h6 class="no-margin text-custom-black">Showing 8 Results</h6>
                        <div class="sort-by">
                            <span class="text-custom-black fs-14 fw-600">Sort by</span>
                            <div class="group-form">
                                <select class="form-control form-control-custom custom-select">
                                    <option>A to Z</option>
                                    <option>Z to A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/1.jpg') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">Delhi to Banglore</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$620</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/2.jpg') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">Bengaluru to Paris</a>
                                                <span class="text-light-dark">Retun Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$500</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/3.jpg') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">London to Bengaluru</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$420</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/4.jpg') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">London to Paris</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$600</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/5.png') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">Bengaluru to Paris</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$600</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/6.png') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">London to Paris</a>
                                                <span class="text-light-dark">Retun Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$620</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/7.png') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">Delhi to Paris</a>
                                                <span class="text-light-dark">Twoway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$620</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/8.png') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">Mumbai to Paris</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$200</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flights-grid mb-xl-30">
                        <div class="flights-grid-wrapper bx-wrapper">
                            <div class="image-sec animate-img">
                                <a href="#">
                                    <img src="{{ URL:: asset('images/flights/1.jpg') }}" class="full-width" alt="img">
                                </a>
                            </div>
                            <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                <div class="heading-sec">
                                    <div class="left-side">
                                        <i class="fas fa-plane text-gray"></i>
                                        <div class="title">
                                            <h4 class="fs-16">
                                                <a href="#" class="text-custom-black">London to Mumbai</a>
                                                <span class="text-light-dark">Oneway Flight</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="right-side">
                                        <span class="price"><small>From</small>$120</span>
                                    </div>
                                </div>
                                <div class="action">
                                    <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                    <a class="btn-first btn-submit" href="#" tabindex="-1">Book</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->
@stop
