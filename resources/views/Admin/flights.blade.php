@extends('admin.adminlayout')

@section('content')


            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Flights</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;
                                    <a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Flights</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <a href="{{ url('/bookingadmin/add_flight') }}" id="addRow1" class="btn btn-info">
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
                                                <th> Flight Number </th>
                                                <th> Flight Name </th>
                                                <th> From </th>
                                                <th> To </th>
                                                <th> Type </th>
                                                <th> Image </th>
                                                <th> Date </th>
                                                <th> PNR </th>
                                                <th> No.of Tic </th>
                                                <th> Status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($flights as $flights_detail)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> {{ $flights_detail->flight_number}} </td>
                                                <td> {{ $flights_detail->flight_name}} </td>
                                                <td> {{ $flights_detail->startpoint}} </td>
                                                <td> {{ $flights_detail->endpoint}} </td>
                                                <td> {{ $flights_detail->type_name}} </td>
                                                <td> {{ $flights_detail->flight_image}} </td>
                                                <td> {{ $flights_detail->flight_date}} </td>
                                                <td> {{ $flights_detail->flight_pnr}} </td>
                                                <td> {{ $flights_detail->flight_no_of_ticket}} </td>

                                                <td>
                                                    @if($flights_detail->status)
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
                                                                <a href="javascript:;">
                                                                    <i class="icon-docs"></i> New Post </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-tag"></i> New Comment </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-user"></i> New User </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-flag"></i> Comments
                                                                    <span class="badge badge-success">4</span>
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
