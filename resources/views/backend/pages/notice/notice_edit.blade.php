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

                                <li class="breadcrumb-item active">Edit Meeting</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Meeting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('notice.update', $notice->id) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $notice->id }}">

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="title" class="form-label"> Notice title<span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" required
                                        value="{{$notice->title}}" autocomplete="off" placeholder="Enter Content Title">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="description" class="form-label">Notice Description <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" minlength="10" name="description" id="description" rows="6">{{$notice->description}} </textarea>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="employee" class="form-label">Meeting participator <span
                                                style="color: red">*</span></label>
                                        <br>

                                        <select class="col-md-12 from-select select2" id="team_meeting" name="employees[]" multiple="multiple" required>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" @if(in_array($employee->id, $emp_selected)) selected @endif>{{ $employee->user->name }}</option>
                                            @endforeach
                                            <option value="1">Admin</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active" @if($notice->status=='active') selected @endif>Active</option>
                                            <option value="inactive" @if($notice->status=='active') selected @endif>Inactive</option>
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
            $(".select2").select2({

            });
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
