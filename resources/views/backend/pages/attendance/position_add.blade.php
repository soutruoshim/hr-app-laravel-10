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

                                <li class="breadcrumb-item active">Add Position</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Position</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('position.store') }}">
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="department_id" class="form-label">Department Name </label>
                                        <select name="department_id" class="form-select" id="department_id">
                                            <option>Select Department </option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" >{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="position_name" class="form-label">Position Name </label>
                                        <input type="text" name="position_name" class="form-control"
                                            id="position_name" placeholder="Position Name">
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
        });
    </script>
@endsection
