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

                                <li class="breadcrumb-item active">Edit Leave Type</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Leave Type</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('leave_type.update', $leave_type->id) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $leave_type->id }}">

                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label for="name" class="form-label"> Leave Type Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="leave_type_name" name="leave_type_name" required autocomplete="off" placeholder="Enter Leave Type" value="{{ $leave_type->leave_type_name }}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Is Paid Leave <span style="color: red">*</span></label>
                                        <select class="form-select" id="paid_leave" required name="paid_leave">
                                            <option value="" selected disabled></option>
                                            <option value="1" @if($leave_type->paid_leave=='1') selected @endif>Yes</option>
                                            <option value="0" @if($leave_type->paid_leave=='0') selected @endif>No</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3 leaveAllocated " >
                                        <label for="leave_allocated" class="form-label">Leave Allocated Days <span style="color: red">*</span></label>
                                        <input type="number" min="1" class="form-control" id="leave_allocated"  name="leave_allocated" value="{{ $leave_type->leave_allocated }}" autocomplete="off" placeholder="">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active" @if($leave_type->status=='active') selected @endif>Active</option>
                                            <option value="inactive" @if($leave_type->status=='inactive') selected @endif>Inactive</option>
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
        });
    </script>
@endsection
