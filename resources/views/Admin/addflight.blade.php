@extends('admin.adminlayout')

@section('content')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="{{ url('/bookingadmin') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ url('/bookingadmin/flights') }}">Flights</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <form action="{{ url('/bookingadmin/saveflight') }}" method="POST" id="flight_form">
                        @csrf
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_number" required>
                                    <label class="mdl-textfield__label">Flight Number</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_name" required>
                                    <label class="mdl-textfield__label">Flight Name</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_pnr" required>
                                    <label class="mdl-textfield__label">Flight PNR Number</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input readonly" type="text" id="list3" autocomplete="off"  required>
                                    <input class="mdl-textfield__input" type="hidden" id="type_hidden_value" name="flight_type"
                                                     value="" >
                                    <label for="list3" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="list3" class="mdl-textfield__label">Flight Type</label>
                                    <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach ($types as $f_types)
                                            <li class="mdl-menu__item ftype_id" data-val="{{ $f_types->type_id }}">{{ $f_types->type_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input readonly" type="text" id="list4" autocomplete="off" required>
                                    <input class="mdl-textfield__input" type="hidden" id="from_type_hidden" name="flight_from" >
                                    <label for="list4" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="list4" class="mdl-textfield__label">From</label>
                                    <ul data-mdl-for="list4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu from_domestic common" style="display:none">
                                        @foreach ($domestic as $f_domestic)
                                            <li class="mdl-menu__item from_id" data-val="{{ $f_domestic->place_id }}">{{ $f_domestic->place_name }}</li>
                                        @endforeach
                                    </ul>

                                    <ul data-mdl-for="list4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu from_non_domestic common"  style="display:none">
                                        @foreach ($international as $f_international)
                                            <li class="mdl-menu__item from_id" data-val="{{ $f_international->place_id }}">{{ $f_international->place_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <input class="mdl-textfield__input readonly" type="text" id="list5" autocomplete="off" required>
                                    <input class="mdl-textfield__input" type="hidden" id="to_type_hidden" name="flight_to" >
                                    <label for="list5" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="list5" class="mdl-textfield__label">To</label>
                                    <ul data-mdl-for="list5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu to_domestic common" style="display:none">
                                        @foreach ($domestic as $f_domestic)
                                            <li class="mdl-menu__item to_id" data-val="{{ $f_domestic->place_id }}">{{ $f_domestic->place_name }}</li>
                                        @endforeach
                                    </ul>
                                    <ul data-mdl-for="list5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu to_non_domestic common"  style="display:none">
                                        @foreach ($international as $f_international)
                                            <li class="mdl-menu__item to_id" data-val="{{ $f_international->place_id }}">{{ $f_international->place_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input type="text" id="date" class="floating-label mdl-textfield__input" name="flight_date" required >
                                    <label class="mdl-textfield__label">Flight Travel Date</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="time" name="flight_arrivaltime" required>
                                    <label class="mdl-textfield__label">Flight Arrival Time</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_no_of_ticket" required>
                                    <label class="mdl-textfield__label">No.of Ticket</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_adult_price" required>
                                    <label class="mdl-textfield__label">Adult Price</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_kids_price" required>
                                    <label class="mdl-textfield__label">Kids Price</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" name="flight_infant_price" required>
                                    <label class="mdl-textfield__label">Infant Price</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="file" name="flight_image" required>
                                    <label class="mdl-textfield__label">Flight Image</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea class="mdl-textfield__input" rows="4" id="education" required name="flight_desc"></textarea>
                                    <label class="mdl-textfield__label" for="text7">Flight Details</label>
                                </div>
                            </div>

                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                <button type="button" onclick="window.history.back()"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@stop


