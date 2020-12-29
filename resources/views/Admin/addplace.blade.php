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
                    <li><a class="parent-item" href="{{ url('/bookingadmin/places') }}">Place</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <form action="{{ url('/bookingadmin/saveplace') }}" method="POST" id="place_form">
                        <div class="card-body row">
                                @csrf
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="txtRoomNo"
                                            name="place_name" required value="{{ $action == 'edit' ? $places[0]->place_name : '' }}">
                                        <label class="mdl-textfield__label">Place Name </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                        <input class="mdl-textfield__input readonly" type="text" id="list3" name="place_type_input"
                                             autocomplete="off" required  value="{{ $action == 'edit' ? $places[0]->type_name : '' }}">
                                        <input class="mdl-textfield__input" type="hidden" id="type_hidden_value" name="place_type"
                                                     value="{{ $action == 'edit' ? $places[0]->place_type : '' }}" >
                                        <input class="mdl-textfield__input" type="hidden" id="place_id" name="place_id"
                                                     value="{{ $action == 'edit' ? $places[0]->place_id : 0 }}" >
                                        <label for="list3" class="pull-right margin-0">
                                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                        </label>
                                        <label for="list3" class="mdl-textfield__label">Place Type</label>
                                        <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" >
                                            @foreach ($types as $f_types)
                                                <li class="mdl-menu__item type_id" data-val="{{ $f_types->type_id }}" >{{ $f_types->type_name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>


                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" id="place_submit"
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




