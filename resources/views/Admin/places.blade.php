@extends('admin.adminlayout')

@section('content')


            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Places</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;
                                    <a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Places</li>
                            </ol>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <a href="{{ url('/bookingadmin/add_place') }}" id="addRow1" class="btn btn-info">
                                                    Add New <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                                        id="example4">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                        <input type="checkbox" class="group-checkable"
                                                             />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th> Place Name </th>
                                                <th> Status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($places as $places_detail)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> {{ $places_detail->place_name}} </td>
                                                <td>
                                                    @if($places_detail->status == 1)
                                                        <span class="label label-sm label-success">Active</span>
                                                    @else
                                                        <span class="label label-sm label-danger">De-Active</span>
                                                    @endif
                                                </td>

                                                <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                                            type="button" data-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="{{ url('/bookingadmin/edit_place/'.$places_detail->place_id) }}">
                                                                    <i class="icon-pencil"></i> Edit Place
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/bookingadmin/delete_place/'.$places_detail->place_id) }}">
                                                                    <i class="icon-trash"></i> Delete Place
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page content -->
  @stop
