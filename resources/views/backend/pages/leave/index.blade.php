@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content">
<?php
    $year = isset($_GET['year'])?$_GET['year']:date('Y');
    $month = isset($_GET['month'])?$_GET['month']:date('m');
    $status = isset($_GET['status'])?$_GET['status']:"";
    $leave_type_selected = isset($_GET['leave_type'])?$_GET['leave_type']:"";
    $requested_by = isset($_GET['requested_by'])?$_GET['requested_by']:"";


    //echo $month. " ".$year;
?>

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            {{-- <ol class="breadcrumb m-0">
                                <a href="{{ route('add.content') }}" class="btn btn-blue waves-effect waves-light">Add Leave</a>
                            </ol> --}}
                        </div>
                        <h4 class="page-title">All Leave </h4>
                    </div>
                    <div class="search-box p-4 rounded mb-3 box-shadow">


                            {{-- <div class="col-lg-2 mb-4">
                                <h5>Leave Request Filter</h5>
                            </div> --}}

                            <div class="row align-items-center">

                                <div class="col-lg-3 col-md-3">
                                    <input type="text" placeholder="Requested by" id="requested_by" name="requested_by" value="{{$requested_by}}" class="form-control">
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <select class="form-select form-select-lg" name="leave_type" id="leaveType">
                                        <option value="" selected   >All Leave Type</option>
                                          @foreach($leaveTypes as $leaveType)
                                             <option value="{{$leaveType->id}}" {{$leaveType->id==$leave_type_selected?'selected':''}}> {{$leaveType->leave_type_name}} </option>
                                          @endforeach
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <input type="number" min="2020" max="2099" step="1"  placeholder="Leave Requested year e.g : 2020" id="year" name="year" value="{{$year}}" class="form-control">
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <select class="form-select form-select-lg" name="month" id="month">
                                        <option value="" selected >All Month</option>
                                                <option value="01" {{$month=='01'?'selected':''}} > Jan </option>
                                                <option value="02"  {{$month=='02'?'selected':''}}> Feb </option>
                                                <option value="03"  {{$month=='03'?'selected':''}}> Mar </option>
                                                <option value="04"  {{$month=='04'?'selected':''}}> Apr </option>
                                                <option value="05"  {{$month=='05'?'selected':''}}> May </option>
                                                <option value="06"  {{$month=='06'?'selected':''}}> Jun </option>
                                                <option value="07"  {{$month=='07'?'selected':''}}> Jul </option>
                                                <option value="08"  {{$month=='08'?'selected':''}}> Aug </option>
                                                <option value="09"  {{$month=='09'?'selected':''}}> Sept </option>
                                                <option value="10"  {{$month=='10'?'selected':''}}> Oct </option>
                                                <option value="11"  {{$month=='11'?'selected':''}}> Nov </option>
                                                <option value="12"  {{$month=='12'?'selected':''}}> Dec </option>
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <select class="form-select form-select-lg mt-2" name="leave_status" id="leave_status">
                                        <option value="" selected   >All Status</option>
                                                <option value="pending" {{$status=='pending'?'selected':''}}> Pending </option>
                                                <option value="approved" {{$status=='approved'?'selected':''}}> Approved </option>
                                                <option value="rejected" {{$status=='rejected'?'selected':''}}> Rejected </option>
                                        </select>
                                </div>

                                <div class="row mt-2 ">
                                    <div class="col-lg-2 col-md-4 ">
                                        <button type="button" class="btn btn-block btn-primary form-control" id="btn-filter">Filter</button>
                                    </div>

                                    <div class="col-lg-2 col-md-3 ">
                                        <button type="button" class="btn btn-block btn-primary form-control reset">Reset</button>
                                    </div>
                                </div>


                            </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Leave Type</th>
                                        <th>Leave From</th>
                                        <th>Leave To</th>
                                        <th>Requested Days</th>
                                        <th>Requested Date</th>
                                        <th>Requested By</th>
                                        <th>Approve By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($leaves as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->leaveType->leave_type_name}}</td>
                                            <td>{{ $item->leave_from }}</td>
                                            <td>{{ $item->leave_to }}</td>
                                            <td>{{ $item->days }}</td>
                                            <td>{{ $item->request_date }}</td>
                                            <td>{{ $item->employee->user->name }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="#"
                                                    class="leaveRequestUpdate"
                                                    data-id="{{$item->id}}"
                                                    data-status="{{$item->status}}"
                                                    data-remark="{{$item->reason}}">
                                                    <button class="btn btn-primary rounded-pill waves-effect waves-light">Edit</button>
                                               </a>
                                                <a href="{{ route('delete.leave', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->
        <div class="modal fade" id="statusUpdate" tabindex="-1" aria-labelledby="addslider" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class="forms-sample" id="updateLeaveStatus" action="{{ route('leave.update', '1') }}"  method="post">
                                @csrf
                                <div class="row">
                                    <label for="exampleFormControlSelect1" class="form-label">Status </label>
                                    <input type="hidden" name="leave_id" id="leave_id"/>
                                    <div class="col-lg-12 mb-3">
                                        <select class="form-select" id="leave_form_status" name="leave_form_status">
                                            <option value="pending" >Pending</option>
                                            <option value="approved" >Approve</option>
                                            <option value="rejected" >Reject</option>
                                        </select>
                                    </div>

                                    <label for="exampleFormControlSelect1" class="form-label">Admin Remark</label>
                                    <div class="col-lg-12 mb-3">
                                        {{-- <textarea class="form-control" id="remark" minlength="10" name="admin_remark" rows="3">
                                        </textarea> --}}
                                        <input type="text" class="form-control" id="remark" name="amdin_remark"/>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="submit-btn" class="btn btn-primary btn-xs"> submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- content -->
    <script>
        $(document).ready(function() {
            $("#btn-filter").on('click', function() {
                var month =  $('#month').val();
                var year = $('#year').val();
                var leave_status = $('#leave_status').val();
                var request_by = $('#requested_by').val();
                var leave_type = $('#leaveType').val();

                window.location.replace("http://127.0.0.1:8000/all/leave?requested_by="+request_by+"&leave_type="+leave_type+"&year="+year+"&month="+month+"&status="+leave_status);
            });
            $(".reset").on('click', function() {
                var month =  $('#month').val();
                var year = $('#year').val();
                var leave_status = $('#leave_status').val();
                var request_by = $('#requested_by').val();
                var leave_type = $('#leaveType').val();

                window.location.replace("http://127.0.0.1:8000/all/leave");
            });

            $('body').on('click', '.leaveRequestUpdate', function (event) {
                event.preventDefault();
                let id = $(this).data('id');
                let status = $(this).data('status');
                let remark = $(this).data('remark');
                console.log(remark);

                $('.modal-title').html('Leave Status Update');
                $('#leave_id').val(id)
                $('#leave_form_status').val(status)
                $('#remark').val(remark)
                $('#statusUpdate').modal('show');
            });
        });
    </script>
@endsection
