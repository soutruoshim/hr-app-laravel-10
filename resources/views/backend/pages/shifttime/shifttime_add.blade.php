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

                            <form id="myForm" method="post" action="{{ route('position.store') }}">
                                @csrf

                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label for="opening_time" class="form-label"> Opening Time <span
                                                style="color: red">*</span></label>
                                        <input type="time" class="form-control" id="opening_time" name="opening_time"
                                            required value="" autocomplete="off" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="closing_time" class="form-label"> Closing Time <span
                                                style="color: red">*</span></label>
                                        <input type="time" class="form-control" id="closing_time" name="closing_time"
                                            required value="" autocomplete="off" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="shift" class="form-label">Shift <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="shift" required>
                                            <option value="" selected disabled>Select Shift</option>
                                            <option value="morning">Morning</option>
                                            <option value="evening">Evening</option>
                                            <option value="night">Night</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="shift" class="form-label">Category</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="category">
                                            <option value="" disabled>Select Category</option>
                                            <option value="full_timer">Full timer</option>
                                            <option value="part_timer">Part timer</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="is_active">
                                            <option value="" selected disabled>Select status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="tinymceExample" rows="10"></textarea>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="holiday" class="form-label">Weekly Holiday Count</label>
                                        <input type="number" min="0" class="form-control" id="holiday_count"
                                            name="holiday_count" value="" autocomplete="off" placeholder="">
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
