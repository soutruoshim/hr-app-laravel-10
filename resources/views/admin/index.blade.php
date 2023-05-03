@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@php
    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;

@endphp

<div class="content">

    @if($status == 'active')
    <h4>Admin Account Is <span class="text-success">Active </span> </h4>
    @else
<h4>Admin Account Is <span class="text-danger">InActive </span> </h4>
<p class="text-danger"><b>Plz wait admin will check and approve your account</b></p>
    @endif

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex align-items-center mb-3">
                                            {{-- <div class="input-group input-group-sm">
                                                <input type="text" class="form-control border-0" id="dash-daterange">
                                                <span class="input-group-text bg-blue border-blue text-white">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                            </div> --}}
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            {{-- <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a> --}}
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-users font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$employees}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Employees</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-calendar font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$paidLeave}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PAID LEAVES</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$holidays}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL HOLIDAYS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$leaveTodays}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">ON LEAVE TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            {{-- =================================row 2================ --}}
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-file font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$leavePendingRequests}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PENDING LEAVE REQUESTS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-book-open font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$leaveEarlyRequests}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PENDING EARLY EXIT REQUESTS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$checkins}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL CHECK IN TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-power font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$checkouts}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL CHECK OUT TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                        </div>
                        <!-- end row-->



                        <div class="row">


                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">


                                        </div>

                                        <h4 class="header-title mb-3">Attendance History</h4>

                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                                                <thead class="table-light">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl</th>
                                                            <th>Employee Name</th>
                                                            <th>Check In At</th>
                                                            <th>Check Out At</th>
                                                            <th>Attendance Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                </thead>
                                                <tbody>
                                                    @foreach ($attendances as $key => $item)
                                                        <tr>

                                                            {{-- <a href="{{ route('show.attendance', $item->id) }}"> --}}
                                                            <td>{{ $key + 1 }}</td>
                                                            <td><a href="{{ route('show.attendance', [$item->id, isset($_GET['attendance_date'])?$_GET['attendance_date']:date("Y-m-d")] )}}">{{ $item->user->name}}<a/></td>
                                                            <td>
                                                                @if(!empty($item->check_in))
                                                                 <span class="btn btn-outline-secondary btn-xs checkLocation"
                                                                    title="Show check In location"
                                                                    data-bs-toggle="modal"
                                                                    data-href="https://maps.google.com/maps?q=-0.176818,-78.495861&t=&z=20&ie=UTF8&iwloc=&output=embed"
                                                                    data-bs-target="#addslider">
                                                                    {{ $item->check_in }}
                                                                 </span>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if(!empty($item->check_out))
                                                                <span class="btn btn-outline-secondary btn-xs checkLocation"
                                                                   title="Show check In location"
                                                                   data-bs-toggle="modal"
                                                                   data-href="https://maps.google.com/maps?q=-0.176818,-78.495861&t=&z=20&ie=UTF8&iwloc=&output=embed"
                                                                   data-bs-target="#addslider">
                                                                   {{ $item->check_out }}
                                                                </span>
                                                               @endif

                                                            <td>{{ $item->status }}</td>
                                                            <td>
                                                                {{-- <a href="{{ route('edit.position', $item->id) }}"
                                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                                <a href="{{ route('delete.position', $item->id) }}"
                                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                                    id="delete">Delete</a> --}}
                                                                <a href=""
                                                                        class="editAttendance btn btn-primary rounded-pill waves-effect waves-light"
                                                                        data-href=""
                                                                        data-in="{{ $item->check_in }}"
                                                                        data-out="{{ $item->check_out }}"
                                                                        data-remark="{{$item->remark}}"
                                                                        data-emp_id = "{{$item->id}}"
                                                                        data-date="{{isset($_GET['attendance_date'])?$_GET['attendance_date']:date('Y-m-d')}}"
                                                                        data-name={{$item->user->name}}
                                                                        title="Edit attendance time">
                                                                         {{-- <i class="link-icon" data-feather="edit"></i> --}}
                                                                        Edit
                                                                 </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive-->
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                                    {{-- check location modal --}}
            <div class="modal fade" id="addslider" tabindex="-1" aria-labelledby="addslider" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <iframe id="iframeModalWindow" class="attendancelocation" height="500px" width="100%" src="" name="iframe_modal"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end check location modal --}}


            <div class="modal fade" id="attendanceForm" tabindex="-1" aria-labelledby="addslider" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                               <form class="forms-sample" id="editAttendance" method="post" action="{{ route('attendance.store') }}">
                                        @csrf
                                    <div class="row">

                                        <input type="hidden" id="emp_id" name="emp_id" value="" />
                                        <input type="hidden" id="date" name="date" value="" />

                                        <label for="exampleFormControlSelect1" class="form-label">Check In At</label>

                                        <div class="col-lg-12 mb-3">
                                            <div class="col-lg-12 mb-3">
                                                <input type="time" class="form-select" id="check_in" name="check_in_at"  value="" />
                                            </div>
                                        </div>

                                        <label for="exampleFormControlSelect1" class="form-label">Check out At</label>
                                        <div class="col-lg-12 mb-3">
                                            <div class="col-lg-12 mb-3">
                                                <input type="time" class="form-select" id="check_out" name="check_out_at"  value="" />
                                            </div>
                                        </div>

                                        <label for="exampleFormControlSelect1" class="form-label">Admin Edit Remark</label>
                                        <div class="col-lg-12 mb-3">
                                            {{-- <textarea class="form-select" id="remark" minlength="10" name="edit_remark" required rows="3" value=""></textarea> --}}
                                            <input type="text" class="form-control" row="3" id="edit_remark" name="edit_remark"  value="" />
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

                    </div> <!-- container -->

                </div> <!-- content -->
                <script>
                    $(document).ready(function() {
                      $('.checkLocation').click(function (event) {
                          event.preventDefault();
                          let href = $(this).data('href');
                          $('.attendancelocation').attr("src", href);
                      })

                      $('body').on('click', '.editAttendance', function (event) {
                          event.preventDefault();
                          let url = $(this).data('href');
                          let attendanceIn = $(this).data('in');
                          let attendanceOut = $(this).data('out');
                          let editRemark = $(this).data('remark');
                          let date = $(this).data('date');
                          let name = $(this).data('name');
                          let emp_id = $(this).data('emp_id');


                          $('.modal-title').html('Edit Attendance('+name+') Time of '+date);
                          //$('#editAttendance').attr('action',url)
                          $('#emp_id').val(emp_id)
                          $('#date').val(date)
                          $('#check_in').val(attendanceIn)
                          $('#check_out').val(attendanceOut)
                          $('#edit_remark').val(editRemark)
                          $('#attendanceForm').modal('show');
                      });

                    })
              </script>
 @endsection
