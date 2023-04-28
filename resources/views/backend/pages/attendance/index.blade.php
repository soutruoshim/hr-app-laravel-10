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
                                <a href="{{ route('add.position') }}" class="btn btn-blue waves-effect waves-light">Add Attendance</a>
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
                                            <td>{{ $item->check_in }} </td>
                                            <td>{{ $item->check_out }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                {{-- <a href="{{ route('edit.position', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                <a href="{{ route('delete.position', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a> --}}
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

    </div> <!-- content -->
    <script>
          $(document).ready(function() {
            $("#filter_date").on('change', function() {
                var date_value = $(this).val();
                window.location.replace("http://127.0.0.1:8000/all/attendance?attendance_date="+date_value);
            });
          })
    </script>
@endsection
