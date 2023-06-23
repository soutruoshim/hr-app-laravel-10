@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <a href="{{ route('add.position') }}" class="btn btn-blue waves-effect waves-light">Add Attendance</a> --}}
                            </ol>
                        </div>
                        <h4 class="page-title">All Attendance </h4>
                        <div class="col-lg-4 mb-3">
                            <label for="date" class="form-label"> Filter By Date <span
                                    style="color: red">*</span></label>
                            <input type="date" class="form-control" id="filter_date" name="filter_date"
                                required value="{{isset($_GET['attendance_date'])?$_GET['attendance_date']:date("Y-m-d")}}" autocomplete="off">
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
                                        <th>Employee Name</th>
                                        <th>Check In At</th>
                                        <th>Check Out At</th>
                                        <th>Attendance Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($employees as $key => $item)
                                        <tr>

                                            {{-- <a href="{{ route('show.attendance', $item->id) }}"> --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td><a href="{{ route('show.attendance', [$item->id, isset($_GET['attendance_date'])?$_GET['attendance_date']:date("Y-m-d")] )}}">{{ $item->user->name}}<a/></td>
                                            <td>
                                                @if(!empty($item->check_in))
                                                 <span class="btn btn-outline-secondary btn-xs checkLocation"
                                                    title="Show check In location"
                                                    data-bs-toggle="modal"
                                                    data-href="https://maps.google.com/maps?q=<?= $item->check_in_late ?>,<?= $item->check_in_long ?>&t=&z=20&ie=UTF8&iwloc=&output=embed"
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
                                                   data-href="https://maps.google.com/maps?q=<?= $item->check_out_late ?>,<?= $item->check_out_long ?>&t=&z=20&ie=UTF8&iwloc=&output=embed"
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
                                                        data-href="https://digitalhr.cyclonenepal.com/admin/attendances/325"
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

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

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
            $("#filter_date").on('change', function() {
                var date_value = $(this).val();
                window.location.replace("http://127.0.0.1:8000/all/attendance?attendance_date="+date_value);
            });

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
