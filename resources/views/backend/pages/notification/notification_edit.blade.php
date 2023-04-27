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

                                <li class="breadcrumb-item active">Edit Notification</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Notification</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('notify.update', $notification->id) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $notification->id }}">

                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label for="title" class="form-label"> Content Title <span style="color: red">*</span> </label>
                                        <input type="text" class="form-control" id="title" name="title" required value="{{$notification->title}}" autocomplete="off" placeholder="Enter Content Title">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="description" class="form-label">Description <span style="color: red">*</span></label>
                                        <textarea class="form-control" name="description"  id="tinymceExample" rows="6">{{$notification->description}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active" @if($notification->status=='active') selected @endif>Active</option>
                                            <option value="inactive" @if($notification->status=='inactive') selected @endif>Inactive</option>
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
