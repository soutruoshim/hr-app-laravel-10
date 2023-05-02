@extends('admin.admin_dashboard')
@section('admin')
    <div class="content">

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
                        <form class="forms-sample" action="https://digitalhr.cyclonenepal.com/admin/employees/leave-request" method="get">

                            {{-- <div class="col-lg-2 mb-4">
                                <h5>Leave Request Filter</h5>
                            </div> --}}

                            <div class="row align-items-center">

                                <div class="col-lg-3 col-md-3">
                                    <input type="text" placeholder="Requested by" id="requestedBy" name="requested_by" value="" class="form-control">
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <select class="form-select form-select-lg" name="leave_type" id="leaveType">
                                        <option value="" selected   >All Leave Type</option>
                                                                        <option value="1"  > Casual </option>
                                                                        <option value="2"  > Paid Leave </option>
                                                                        <option value="3"  > Unpaid Leave </option>
                                                                        <option value="4"  > Sick Leave </option>
                                                                        <option value="6"  > Maul </option>
                                                                        <option value="9"  > Phép chuyển sang </option>
                                                                        <option value="10"  > Phép năm </option>
                                                                        <option value="11"  > Phép được nghỉ </option>
                                                                        <option value="12"  > Phép đã nghỉ </option>
                                                                        <option value="13"  > Phép còn lại </option>
                                                                </select>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <input type="number" min="2020" max="2099" step="1"  placeholder="Leave Requested year e.g : 2020" id="year" name="year" value="2023" class="form-control">
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <select class="form-select form-select-lg" name="month" id="month">
                                        <option value="" selected >All Month</option>
                                                                        <option value="1"  > Jan </option>
                                                                        <option value="2"  > Feb </option>
                                                                        <option value="3"  > Mar </option>
                                                                        <option value="4"  > Apr </option>
                                                                        <option value="5"  > May </option>
                                                                        <option value="6"  > Jun </option>
                                                                        <option value="7"  > Jul </option>
                                                                        <option value="8"  > Aug </option>
                                                                        <option value="9"  > Sept </option>
                                                                        <option value="10"  > Oct </option>
                                                                        <option value="11"  > Nov </option>
                                                                        <option value="12"  > Dec </option>
                                                                </select>
                                </div>

                                <div class="col-lg-3 col-md-3 mt-3">
                                    <select class="form-select form-select-lg" name="status" id="status">
                                        <option value="" selected   >All Status</option>
                                                                        <option value="pending"  > Pending </option>
                                                                        <option value="approved"  > Approved </option>
                                                                        <option value="rejected"  > Rejected </option>
                                                                </select>
                                </div>

                                <div class="row mt-2 ">
                                    <div class="col-lg-2 col-md-4 ">
                                        <button type="submit" class="btn btn-block btn-primary form-control">Filter</button>
                                    </div>

                                    <div class="col-lg-2 col-md-3 ">
                                        <button type="button" class="btn btn-block btn-primary form-control reset">Reset</button>
                                    </div>
                                </div>


                            </div>
                        </form>
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
                                            <td>
                                                <a href="{{ route('edit.content', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                <a href="{{ route('delete.content', $item->id) }}"
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

    </div> <!-- content -->
@endsection
