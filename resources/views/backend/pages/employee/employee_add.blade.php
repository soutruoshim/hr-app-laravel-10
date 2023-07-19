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

                                <li class="breadcrumb-item active">Add Employee</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Employee</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="name" class="form-label">Name <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="" required autocomplete="off" placeholder="Enter name">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="email" class="form-label">Email <span
                                                style="color: red">*</span></label>

                                        <input type="email" class="form-control" id="email" name="email"
                                            value="" required autocomplete="off" placeholder="Enter email">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="username" class="form-label">Username <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="" required autocomplete="off" placeholder="Enter username">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="password" class="form-label">Password <span
                                                style="color: red">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            value="" autocomplete="off" placeholder="Enter password" required>
                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="address" class="form-label">Address <span
                                                style="color: red">*</span></label>

                                        <input type="text" class="form-control" id="address" required name="address"
                                            value=" " autocomplete="off" placeholder="Enter Employee Address">

                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="dob" class="form-label"> Date Of Birth <span
                                                style="color: red">*</span></label>

                                        <input type="date" class="form-control" id="dob" name="dob"
                                            value="" required autocomplete="off" placeholder="">

                                    </div>

                                    <div class="col-lg-6 mb-3">

                                        <label for="number" class="form-label">Phone No <span
                                                style="color: red">*</span></label>

                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="" required autocomplete="off" placeholder="">

                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="gender" class="form-label">Gender <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="male">
                                                Male</option>
                                            <option value="female">
                                                Female</option>
                                            <option value="others">
                                                Others</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="role" class="form-label">Role <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="role" name="role" required>

                                            <option value="" selected disabled>Select Role</option>
                                            <option value="admin">
                                                Admin</option>
                                            <option value="employee">
                                                Employee</option>
                                            <option value="supervisor">
                                                Supervisor</option>
                                            <option value="trainer">
                                                Trainer</option>
                                            <option value="hr">
                                                Hr</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="branch_id" class="form-label">Branch <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="branch_id" name="branch_id" required>
                                            <option value="" selected disabled>Select Branch</option>
                                            @foreach ($branchs as $branch)
                                               <option value="{{ $branch->id }}" >{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="department_id" class="form-label">Departments <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="department_id" name="department_id" >

                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="position_id" class="form-label">Post <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="position_id" name="position_id" >
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="supervisor" class="form-label">Supervisor <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="supervisor" name="supervisor">
                                            <option value="" selected disabled>Select Supervisor</option>
                                            @foreach ($employees as $employee)
                                               <option value="{{ $employee->id }}" >{{ $employee->user->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="office_time" class="form-label">Office Time <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="office_time" name="office_time" >

                                            <option value="" selected disabled>Select Shift Time</option>
                                            @foreach ($shifttimes as $shifttime)
                                               <option value="{{ $shifttime->id }}" >{{ $shifttime->opening_time }} - {{ $shifttime->closing_time}} - {{$shifttime->shift}}</option>
                                            @endforeach

                                        </select>

                                    </div>



                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="employment_type" class="form-label">Employment Type <span
                                                style="color: red">*</span> </label>

                                        <select class="form-select" id="employment_type" name="employment_type" required>

                                            <option value="" selected disabled>select employment type</option>
                                            <option value="contract">
                                                Contract</option>
                                            <option value="permanent">
                                                Permanent</option>
                                            <option value="temporary">
                                                Temporary</option>

                                        </select>

                                    </div> --}}



                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="user_type" class="form-label">User Type <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="user_type" name="user_type" required>

                                            <option value="" selected disabled>select user type</option>
                                            <option value="field">
                                                Field</option>
                                            <option value="nonField">
                                                NonField</option>

                                        </select>

                                    </div> --}}



                                    <div class="col-lg-6 mb-3">
                                        <label for="joining_date" class="form-label"> Joining Date</label>
                                        <input type="date" class="form-control" id="joining_date" name="joining_date"
                                            value="" autocomplete="off" placeholder="Enter Joining Date">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="workspace_type" class="form-label">WorkSpace</label>
                                        <select class="form-select" id="work_space" name="work_space">
                                            <option value="" selected disabled>select work place </option>
                                            <option value="office">Office</option>
                                            <option value="home">Home</option>
                                        </select>
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                                            value="" autocomplete="off" placeholder="Enter Bank Name">
                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="bank_account_no" class="form-label">Bank Account Number <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" id="bank_account"
                                            name="bank_account" value="" autocomplete="off"
                                            placeholder=" Enter Bank Account Number">

                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="bank_account_type" class="form-label">Bank Account Type<span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="bank_account_type" name="bank_account_type"
                                            required>
                                            <option value="" selected>select account type</option>
                                            <option value="saving">
                                                Saving</option>
                                            <option value="current">
                                                Current</option>
                                            <option value="salary">
                                                Salary</option>
                                        </select>

                                    </div>



                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="number" class="form-label">Leave Allocated</label>

                                        <input type="text" class="form-control"
                                            id="leave_allocated" name="leave_allocated" value=""
                                            autocomplete="off" placeholder="">

                                    </div> --}}



                                    <div class="col-lg-6 mb-3">
                                        <label for="number" class="form-label">Salary</label>
                                        <input type="number" class="form-control" min="0" id="salary"
                                            name="salary" value="" autocomplete="off" placeholder="Enter Salary">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="status" class="form-label">Verification Status <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="verification_status" name="verification_status" required>
                                            <option value="" selected disabled>select verification status</option>
                                            <option value="pending">Pending</option>
                                            <option value="verified">Verified</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">

                                        <label for="is_active" class="form-label">User Status <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="user_status" name="user_status" required>

                                            <option value="" selected disabled>select status </option>

                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>

                                        </select>

                                    </div>


                                    <div class="col-lg-12 mb-3">

                                        <label for="avatar" class="form-label">Upload Avatar <span
                                                style="color: red">*</span> </label>

                                        <input class="form-control" type="file" id="avatar" name="avatar"
                                            value="" required>

                                    </div>



                                    <div class="col-lg-12 mb-3">

                                        <label for="tinymceExample" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="tinymceExample" rows="2"></textarea>

                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    department_name: {
                        required: true,
                    },
                    department_head: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    }
                },
                messages: {
                    department_name: {
                        required: 'Please Enter Branch Name',
                    },
                    department_head: {
                        required: 'Please Enter Branch Name',
                    },
                    address: {
                        required: 'Please Enter Branch Name',
                    },
                    phone: {
                        required: 'Please Enter Branch Name',
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });

            //============= department by branch============

            $('select[name="branch_id"]').on('change', function(){
                var branch_id = $(this).val();
                if(branch_id) {
                    $.ajax({
                        url: "{{  url('/department/ajax/') }}/"+branch_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="department_id"]').html('');
                            var d =$('select[name="department_id"]').empty();
                            $('select[name="department_id"]').append('<option value="" selected disabled>select department </option>');
                            $.each(data, function(key, value){
                                $('select[name="department_id"]').append('<option value="'+ value.id +'">' + value.department_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            //============= position by department============

            $('select[name="department_id"]').on('change', function(){
                var department_id = $(this).val();
                if(department_id) {
                    $.ajax({
                        url: "{{  url('/position/ajax/') }}/"+department_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="position_id"]').html('');
                            var d =$('select[name="position_id"]').empty();
                            $('select[name="position_id"]').append('<option value="" selected disabled>select position </option>');
                            $.each(data, function(key, value){
                                $('select[name="position_id"]').append('<option value="'+ value.id +'">' + value.position_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>
@endsection
