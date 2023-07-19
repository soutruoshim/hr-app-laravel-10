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

                                <li class="breadcrumb-item active">Edit Employee</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Employee</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $employee->id }}">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="name" class="form-label">Name <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"  value="{{$employee->user->name}}"
                                            required autocomplete="off" placeholder="Enter name">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="email" class="form-label">Email <span
                                                style="color: red">*</span></label>

                                        <input type="email" class="form-control" id="email" name="email" value="{{$employee->user->email}}"
                                            required autocomplete="off" placeholder="Enter email">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="username" class="form-label">Username <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{$employee->user->username}}"
                                            required autocomplete="off" placeholder="Enter username">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="password" class="form-label">Password <span
                                                style="color: red">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" value=""
                                           autocomplete="off" placeholder="Enter password">
                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="address" class="form-label">Address <span
                                                style="color: red">*</span></label>

                                        <input type="text" class="form-control" id="address" required name="address" value="{{$employee->address}}"
                                             autocomplete="off" placeholder="Enter Employee Address">

                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="dob" class="form-label"> Date Of Birth <span
                                                style="color: red">*</span></label>

                                        <input type="date" class="form-control" id="dob" name="dob" value="{{$employee->dob}}"
                                            required autocomplete="off" placeholder="">

                                    </div>

                                    <div class="col-lg-6 mb-3">

                                        <label for="number" class="form-label">Phone No <span
                                                style="color: red">*</span></label>

                                        <input type="number" class="form-control" id="phone" name="phone" value="{{$employee->phone}}"
                                            required autocomplete="off" placeholder="">

                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="gender" class="form-label">Gender <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="male" @if($employee->gender == 'male') selected @endif>Male</option>
                                            <option value="female" @if($employee->gender == 'female') selected @endif>Female</option>
                                            <option value="others" @if($employee->gender == 'others') selected @endif>Others</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="role" class="form-label">Role <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="role" name="role" required>
                                            <option value="" selected disabled>Select Role</option>
                                            <option value="admin" @if($employee->user->role == 'admin') selected @endif>Admin</option>
                                            <option value="employee" @if($employee->user->role == 'employee') selected @endif>Employee</option>
                                            <option value="supervisor" @if($employee->user->role == 'supervisor') selected @endif>Supervisor</option>
                                            <option value="trainer" @if($employee->user->role == 'trainer') selected @endif>Trainer</option>
                                            <option value="hr" @if($employee->user->role == 'hr') selected @endif>Hr</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="branch_id" class="form-label">Branch <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="branch_id" name="branch_id" required>
                                            <option value="" selected disabled>Select Branch</option>
                                            @foreach ($branchs as $branch)
                                               <option value="{{ $branch->id }}" @if($employee->branch_id == $branch->id) selected @endif>{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="department_id" class="form-label">Departments <span
                                                style="color: red">*</span></label>
                                                <select class="form-select" id="department_id" name="department_id" >
                                                    <option value="" selected disabled>Select Department</option>
                                                    @foreach ($departments as $department)
                                                       <option value="{{ $department->id }}" @if($employee->department_id == $department->id) selected @endif>{{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="position_id" class="form-label">Post <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="position_id" name="position_id" >
                                            <option value="" selected disabled>Select Position</option>
                                            @foreach ($positions as $position)
                                               <option value="{{ $position->id }}" @if($employee->position_id == $position->id) selected @endif>{{ $position->position_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-lg-6 mb-3">

                                        <label for="supervisor" class="form-label">Supervisor <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="supervisor" name="supervisor">
                                            <option value="" selected disabled>Select Supervisor</option>
                                            @foreach ($employees as $emp)
                                               <option value="{{ $emp->id }}" @if($employee->supervisor == $emp->id) selected @endif>{{ $emp->user->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="office_time" class="form-label">Office Time <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="office_time" name="office_time" >

                                            <option value="" selected disabled>Select Shift Time</option>
                                            @foreach ($shifttimes as $shifttime)
                                               <option value="{{ $shifttime->id }}" @if($employee->office_time == $shifttime->id) selected @endif>{{ $shifttime->opening_time }} - {{ $shifttime->closing_time}} - {{$shifttime->shift}}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="employment_type" class="form-label">Employment Type <span
                                                style="color: red">*</span> </label>

                                        <select class="form-select" id="employment_type" name="employment_type" required>

                                            <option value="" selected disabled>select employment type</option>
                                            <option value="contract" @if($employee->employment_type=='contract') selected @endif>Contract</option>
                                            <option value="permanent" @if($employee->employment_type=='permanent') selected @endif>Permanent</option>
                                            <option value="temporary" @if($employee->employment_type=='temporary') selected @endif>Temporary</option>

                                        </select>

                                    </div> --}}



                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="user_type" class="form-label">User Type <span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="user_type" name="user_type" required>

                                            <option value="" selected disabled>select user type</option>
                                            <option value="field" @if($employee->user_type=='field') selected @endif>Field</option>
                                            <option value="nonField" @if($employee->user_type=='nonField') selected @endif>NonField</option>

                                        </select>

                                    </div> --}}



                                    <div class="col-lg-6 mb-3">
                                        <label for="joining_date" class="form-label"> Joining Date</label>
                                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$employee->joining_date}}"
                                            autocomplete="off" placeholder="Enter Joining Date">
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="workspace_type" class="form-label">WorkSpace</label>
                                        <select class="form-select" id="work_space" name="work_space">
                                            <option value="" selected disabled>select work place </option>
                                            <option value="office" @if($employee->work_space=='office') selected @endif>Office</option>
                                            <option value="home" @if($employee->work_space=='home') selected @endif>Home</option>
                                        </select>
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                                            autocomplete="off" placeholder="Enter Bank Name" value="{{$employee->bank_name}}">
                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="bank_account_no" class="form-label">Bank Account Number <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" id="bank_account"
                                            name="bank_account" autocomplete="off"
                                            placeholder=" Enter Bank Account Number" value="{{$employee->bank_account}}">

                                    </div>



                                    <div class="col-lg-6 mb-3">

                                        <label for="bank_account_type" class="form-label">Bank Account Type<span
                                                style="color: red">*</span></label>

                                        <select class="form-select" id="bank_account_type" name="bank_account_type"
                                            required>
                                            <option value="" selected>select account type</option>
                                            <option value="saving" @if($employee->bank_account_type=='saving') selected @endif>Saving</option>
                                            <option value="current" @if($employee->bank_account_type=='current') selected @endif>Current</option>
                                            <option value="salary" @if($employee->bank_account_type=='salary') selected @endif>Salary</option>
                                        </select>

                                    </div>



                                    {{-- <div class="col-lg-6 mb-3">

                                        <label for="number" class="form-label">Leave Allocated</label>

                                        <input type="text" class="form-control"
                                            id="leave_allocated" name="leave_allocated" value="{{$employee->leave_allocated}}"
                                            autocomplete="off" placeholder="" >

                                    </div> --}}



                                    <div class="col-lg-6 mb-3">
                                        <label for="number" class="form-label">Salary</label>
                                        <input type="number" class="form-control" min="0" id="salary"
                                            name="salary" autocomplete="off" placeholder="Enter Salary" value="{{$employee->salary}}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="status" class="form-label">Verification Status <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="verification_status" name="verification_status" required>
                                            <option value="" selected disabled>select verification status</option>
                                            <option value="pending" @if($employee->verification_status=='pending') selected @endif>Pending</option>
                                            <option value="verified" @if($employee->verification_status=='verified') selected @endif>Verified</option>
                                            <option value="rejected" @if($employee->verification_status=='rejected') selected @endif>Rejected</option>
                                            <option value="suspended" @if($employee->verification_status=='suspended') selected @endif>Suspended</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">

                                        <label for="is_active" class="form-label">User Status <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="user_status" name="user_status" required>
                                                <option value="" disabled>Select status</option>
                                                <option value="active" @if($employee->status=='active') selected @endif>Active</option>
                                                <option value="inactive" @if($employee->status=='inactive') selected @endif>Inactive</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="avatar" class="form-label">Upload Avatar <span
                                                style="color: red">*</span> </label>

                                        <input class="form-control" type="file" id="avatar" name="avatar"
                                            value="">
                                        <img src="@if(!empty($employee->upload_avatar)) {{ asset($employee->upload_avatar) }} @else  https://digitalhr.cyclonenepal.com/uploads/company/logo/Thumb-643e5a9c1197a_m2.png @endif"
                                            alt="" style="object-fit: contain" class="mt-3" width="150">
                                    </div>



                                    <div class="col-lg-12 mb-3">
                                        <label for="tinymceExample" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="tinymceExample" rows="2">{{$employee->description}}</textarea>
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
                    category_name: {
                        required: true,
                    },
                },
                messages: {
                    category_name: {
                        required: 'Please Enter Category Name',
                    },
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
