@extends('Common.layout')

<style>
table th, table td {
    padding: 2px !important;
    text-align: center;
}
thead tr { border: 1px solid #eee; }
tr { height:45px; }
table { border: none !important;}
.remove { cursor: pointer; color :#ff0000;}
.addpassenger { display:block;cursor:pointer;color:blue;float:right; }
.input{ border: navajowhite; border-bottom: 2px solid #eee;}

</style>
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

                                                    <div class="col-12">
                                                        <h5 class="text-custom-black">Add Passenger Details</h5>
                                                    </div>

                                                    <div class="col-12">

                                                            <table id="passenger_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th> Name </th>
                                                                        <th> Age </th>
                                                                        <th> Sex </th>
                                                                        <th> Type </th>
                                                                        <th> Remove </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @for($i=1;$i<=$flight['flight_adult'];$i++)
                                                                        <tr>
                                                                            <th>
                                                                                <input id="name" class="input" name="p_name[]" id="p_name" type="text" value=""/>
                                                                            </th>
                                                                            <td>
                                                                                <input id="age" class="input" name="p_age[]" id="p_age" type="text" value=""/>
                                                                            </td>
                                                                            <td>
                                                                                <select name="p_sex">
                                                                                    <option value="">select</option>
                                                                                    <option value="1" >Male</option>
                                                                                    <option value="2" >Female</option>
                                                                                    <option value="3" >Other</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select name="p_type">
                                                                                    <option value="A" selected >Adult</option>
                                                                                    <option value="K" >Kids</option>
                                                                                    <option value="I">Infant</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="remove"> x </td>
                                                                        </tr>
                                                                    @endfor
                                                                    @if($flight['flight_kids']>0)
                                                                        @for($i=1;$i<=$flight['flight_kids'];$i++)
                                                                            <tr>
                                                                                <th>
                                                                                    <input id="name" class="input" name="p_name[]" id="p_name" type="text" />
                                                                                </th>
                                                                                <td>
                                                                                    <input id="age" class="input" name="p_age[]" id="p_age" type="text" />
                                                                                </td>
                                                                                <td>
                                                                                    <select name="p_sex">
                                                                                        <option value="">select</option>
                                                                                        <option value="1" >Male</option>
                                                                                        <option value="2" >Female</option>
                                                                                        <option value="3" >Other</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select name="p_type">
                                                                                        <option value="A" >Adult</option>
                                                                                        <option value="K" selected>Kids</option>
                                                                                        <option value="I">Infant</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="remove"> x </td>
                                                                            </tr>
                                                                        @endfor
                                                                    @endif
                                                                    @if($flight['flight_infants']>0)
                                                                        @for($i=1;$i<=$flight['flight_infants'];$i++)
                                                                            <tr>
                                                                                <th>
                                                                                    <input id="name" class="input" name="p_name[]" id="p_name" type="text" />
                                                                                </th>
                                                                                <td>
                                                                                    <input id="age" class="input" name="p_age[]" id="p_age" type="text" />
                                                                                </td>
                                                                                <td>
                                                                                    <select name="p_sex">
                                                                                        <option value="">select</option>
                                                                                        <option value="1" >Male</option>
                                                                                        <option value="2" >Female</option>
                                                                                        <option value="3" >Other</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select name="p_type">
                                                                                        <option value="A" >Adult</option>
                                                                                        <option value="K" >Kids</option>
                                                                                        <option value="I" selected>Infant</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="remove"> x </td>
                                                                            </tr>
                                                                        @endfor
                                                                    @endif
                                                                </tbody>
                                                            </table>

                                                    </div>

                                                    <div class="col-md-6" style="display:none">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Adult</label>
                                                            <input type="text" name="flight_adult[]" id="flight_adult" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_adult']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="display:none">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Kids</label>
                                                            <input type="text" name="flight_kids[]" id="flight_kids" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_kids']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" style="display:none">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Infant</label>
                                                            <input type="text" name="flight_infants" class="form-control form-control-custom"
                                                                value="{{ $flight['flight_infants']}}" onblur="quotePriceUpdate()" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        <span class="addpassenger"> + Add Passenger</span>
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
