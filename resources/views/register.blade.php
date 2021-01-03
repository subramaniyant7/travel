@extends('Common.layout')


@section('content')

<!-- Start Blog -->
<section class="section-padding bg-light-white booking-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ url('/create_user') }}" method="post" id="register_form">
                    @csrf
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane active show" id="hotel-booking">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h5 class="text-custom-black">Your Personal Information</h5>
                                            <div class="row mb-md-80">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">First Name</label>
                                                        <input type="text" name="user_fname" class="form-control form-control-custom"
                                                             placeholder="First Name" autocomplete="off"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Last Name</label>
                                                        <input type="text" name="user_lname" class="form-control form-control-custom"
                                                            placeholder="Last Name" autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Email I'd</label>
                                                        <input type="email" name="user_email" class="form-control form-control-custom" placeholder="Email Id"
                                                            onblur="emailValidate(this.value)" autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Password</label>
                                                        <input type="password" name="user_password" class="form-control form-control-custom"
                                                            placeholder="Password" autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Street</label>
                                                        <input type="test" name="user_street" class="form-control form-control-custom"
                                                            placeholder="Street" autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Country Code</label>
                                                        <div class="group-form">
                                                            <select class=" form-control form-control-custom" name="user_country" onchange="getState(this.value)" autocomplete="off" >
                                                                <option value="">Select</option>
                                                                @foreach ($country as $countrylist)
                                                                <option value="{{ $countrylist->country_id }}">{{ $countrylist->country_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">State Code</label>
                                                        <div class="group-form">
                                                        <select class=" form-control form-control-custom" name="user_state" autocomplete="off" onchange="getCity(this.value)"  >
                                                            <option value="">Select</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">City Code</label>
                                                        <div class="group-form">
                                                        <select class=" form-control form-control-custom" autocomplete="off" name="user_city" >
                                                            <option value="">Select</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Phone No.</label>
                                                        <input type="number" minlength="10" maxlength="10" name="user_phone" class="form-control form-control-custom"
                                                            placeholder="Phone No." autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Zip Code</label>
                                                        <input type="text" name="user_zipcode" class="form-control form-control-custom"
                                                            placeholder="Billing Zip Code" autocomplete="off" />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <hr class="mt-0">
                                                    <button type="submit" id="reg_form" class="btn-first btn-submit">Submit</button>
                                                </div>
                                                <input type="hidden" name="email_validate" id="email_validate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Blog -->
@stop
