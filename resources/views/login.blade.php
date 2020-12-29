@extends('Common.layout')
@section('content')

<section class="section-padding bg-light-white booking-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ url('/validate') }}" method="post">
                    @csrf
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane active show" id="hotel-booking">
                                <div class="tab-inner">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <h5 class="text-custom-black" style="text-align:center;">Login</h5>
                                            @if(session()->has('message.level'))
                                                <div class="alert alert-{{ session('message.level') }}">
                                                {!! session('message.content') !!}
                                                </div>
                                            @endif
                                            <div class="row mb-md-80">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Name</label>
                                                        <input type="text" name="user_name" class="form-control form-control-custom" placeholder="Name" value="{{ old('user_name') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Password</label>
                                                        <input type="password" name="user_password" class="form-control form-control-custom" placeholder="Password"  value="{{ old('user_password') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <hr class="mt-0">
                                                    <button type="submit" class="btn-first btn-submit" style="margin-left:41%;">Submit</button>
                                                </div>
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

@stop
