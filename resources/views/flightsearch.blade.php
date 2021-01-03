@extends('Common.layout')

@section('content')
    <!-- Start Blog -->
    <section class="section-padding bg-light-white">
        <div class="container">
            <div class="row">
                @if(count($flights))
                    <div class="col-12">
                        <div class="listing-top-heading mb-xl-20">
                            <h6 class="no-margin text-custom-black">Showing {{ count($flights) }} Results</h6>
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

                    @foreach($flights as $flights_details)
                        <div class="col-lg-4 col-md-6">
                            <div class="flights-grid mb-xl-30">
                                <div class="flights-grid-wrapper bx-wrapper">
                                    <div class="image-sec animate-img">
                                        <a href="#">
                                            <img src="{{ URL:: asset('uploads/flights/'.$flights_details->flight_image) }}" class="full-width" alt="img">
                                        </a>
                                    </div>
                                    <div class="flights-grid-caption padding-20 bg-custom-white p-relative">
                                        <div class="heading-sec">
                                            <div class="left-side">
                                                <i class="fas fa-plane text-gray"></i>
                                                <div class="title">
                                                    <h4 class="fs-16">
                                                        <a href="#" class="text-custom-black">
                                                            {{ $flights_details->startpoint }} to {{ $flights_details->endpoint }}
                                                        </a>
                                                        <span class="text-light-dark">{{ $flights_details->flight_name}}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="right-side">
                                                <span class="price"><small>From</small>${{ $flights_details->flight_adult_price}}</span>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <a class="btn-second btn-small" href="#" tabindex="-1">View</a>
                                            <form action="{{ url('/booking') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="flight_id" value="{{ $flights_details->flight_id }}">
                                                <input type="hidden" name="flight_from" value="{{ request()->get('from') }}">
                                                <input type="hidden" name="flight_to" value="{{ request()->get('to') }}">
                                                <input type="hidden" name="flight_depart" value="{{ request()->get('depart') }}">
                                                <input type="hidden" name="flight_adult" value="{{ request()->get('adults') }}">
                                                <input type="hidden" name="flight_kids" value="{{ request()->get('kids') }}">
                                                <input type="hidden" name="flight_infants" value="{{ request()->get('infants') }}">
                                                @if(seatAvailablity($flights_details->flight_id,$flights_details->flight_no_of_ticket))
                                                    <button type="button">Only {{ $flights_details->flight_no_of_ticket }} seats available</button>
                                                @else
                                                    <button class="btn-first btn-submit" type="submit"
                                                        href="{{ url('/flight_details/'.$flights_details->flight_id) }}" >
                                                        Book
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div class="col-12">
                        <div class="listing-top-heading mb-xl-20">
                            <h6 class="no-margin text-custom-black">No Flights found</h6>

                        </div>
                    </div>
                @endif
            </div>
            <!-- <div class="row">
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
            </div> -->
        </div>
    </section>
    <!-- End Blog -->
@stop
