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

                                <li class="breadcrumb-item active">Add Department</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Department</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('department.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="department_name" class="form-label">Department Name </label>
                                        <input type="text" name="department_name" class="form-control"
                                            id="department_name" placeholder="Department Name">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="branch_id" class="form-label">Branch Name </label>
                                        <select name="branch_id" class="form-select" id="branch_id">
                                            <option>Select Branch </option>
                                            @foreach ($branchs as $branch)
                                                <option value="{{ $branch->id }}" >{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="department_head" class="form-label">Department Head </label>
                                        <input type="text" name="department_head" class="form-control"
                                            id="department_head" placeholder="Department Head">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="address" class="form-label">Address </label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="address">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone </label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Phone">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
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
                    branch_name: {
                        required: true,
                    },
                },
                messages: {
                    branch_name: {
                        required: 'Please Enter Branch Name',
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
        });
    </script>
@endsection
