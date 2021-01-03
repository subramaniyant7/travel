@extends('Common.layout')

@section('content')
    <!-- Start Blog -->
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/payment-initiate-request') }}" method="POST" id="booking_form">
                        @csrf
                        <div class="tabs">
                            <div class="tab-content bg-custom-white bx-wrapper padding-20">
                                <div class="tab-pane fade active show" id="hotel-booking">
                                    <div class="tab-inner">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class="text-custom-black">Your Personal Information</h5>
                                                <div class="row mb-md-80">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <address>
                                                                {{ $flight['user_fname'].' '.$flight['user_lname'] }}  <br>
                                                                {{ $flight['user_street'] }}  <br>
                                                                {{ $flight['city_name'].','.$flight['state_name'] }}  <br>
                                                                {{ $flight['country_name'] }}  <br>
                                                                {{ $flight['user_zipcode'] }}  <br>
                                                                {{ 'Ph:'.$flight['user_phone'] }}
                                                            </address>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        <h5 class="text-custom-black">Your Booking Information</h5>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">From</label>
                                                            <input type="text" name="flight_from" class="form-control form-control-custom"
                                                                value="{{ $flight['startpoint'] }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">To</label>
                                                            <input type="text" name="flight_to" class="form-control form-control-custom"
                                                                value="{{ $flight['endpoint'] }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Adult</label>
                                                            <input type="text" name="flight_adult" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_adult']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Kids</label>
                                                            <input type="text" name="flight_kids" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_kids']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Infant</label>
                                                            <input type="text" name="flight_infants" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_infants']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        <button type="submit" id="flight_booking" class="btn-first btn-submit">Confirm Booking</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="hotel-grid mb-xl-30">
                                                            <div class="hotel-grid-wrapper bx-wrapper">
                                                                <div class="image-sec p-relative">
                                                                    <a href="#">
                                                                        <img src="{{ URL:: asset('uploads/flights/'.$flight['flight_image']) }}" class="full-width" alt="img">
                                                                    </a>
                                                                </div>
                                                                <div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
                                                                    <h4 class="title fs-16">
                                                                        <a href="#" class="text-custom-black">
                                                                            {{ $flight['flight_name'] }}
                                                                        </a>
                                                                    </h4>

                                                                </div>
                                                                <div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
                                                                    <p class="adult_price">
                                                                        <span>Adults</span>
                                                                        <span style="float:right;">{{ $flight['flight_adult'].'x'.$flight['flight_adult_price'] }}</span>
                                                                    </p>

                                                                    <p class="kids_price" {{ ($flight['flight_kids'] > 0) ? '' : 'style=display:none' }} >
                                                                        <span>Kids</span>
                                                                        <span style="float:right;">{{ $flight['flight_kids'].'x'.$flight['flight_kids_price'] }}</span>
                                                                    </p>


                                                                    <p class="infant_price" {{ ($flight['flight_infants'] > 0) ? '': 'style=display:none' }} >
                                                                        <span>Infants</span>
                                                                        <span style="float:right;">{{ $flight['flight_infants'].'x'.$flight['flight_infant_price'] }}</span>
                                                                    </p>

                                                                    <p class="total_price">
                                                                        <span>Total</span>
                                                                        <span style="float:right;">${{ $flight['price'] }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="load_flight_id" value="{{ $flight['flight_id']}}" />
                        <input type="hidden" name="load_flight_from" value="{{ $flight['flight_from']}}" />
                        <input type="hidden" name="load_flight_to" value="{{ $flight['flight_to']}}" />
                        <input type="hidden" name="load_flight_depart" value="{{ $flight['flight_depart']}}" />
                        <input type="hidden" name="load_flight_adult_qty" value="{{ $flight['flight_adult']}}" />
                        <input type="hidden" name="load_flight_kids_qty" value="{{ $flight['flight_kids']}}" />
                        <input type="hidden" name="load_flight_infants_qty" value="{{ $flight['flight_infants']}}" />
                        <input type="hidden" name="load_flight_adult_price" value="{{ $flight['flight_adult_price']}}" />
                        <input type="hidden" name="load_flight_kids_price" value="{{ $flight['flight_kids_price']}}" />
                        <input type="hidden" name="load_flight_infant_price" value="{{ $flight['flight_infant_price']}}" />
                        <input type="hidden" name="load_price" value="{{ $flight['price']}}" />
                        <input type="hidden" name="load_user_id" value="{{ $flight['user_id']}}" />
                        <input type="hidden" name="load_user_email" value="{{ $flight['user_email']}}" />
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->
@stop
