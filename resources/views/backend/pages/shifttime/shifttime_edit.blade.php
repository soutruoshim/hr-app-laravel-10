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

                                <li class="breadcrumb-item active">Edit Shift Time</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Branch</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('shifttime.update', $shifttime->id) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $shifttime->id }}">
                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label for="opening_time" class="form-label"> Opening Time <span
                                                style="color: red">*</span></label>
                                        <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{$shifttime->opening_time}}"
                                            required autocomplete="off" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="closing_time" class="form-label"> Closing Time <span
                                                style="color: red">*</span></label>
                                        <input type="time" class="form-control" id="closing_time" name="closing_time" value="{{$shifttime->closing_time}}"
                                            required autocomplete="off" placeholder="">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="shift" class="form-label">Shift <span
                                                style="color: red">*</span></label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="shift" required>
                                            <option value="" selected disabled>Select Shift</option>
                                            <option value="morning" @if($shifttime->shift=='morning') selected @endif>Morning</option>
                                            <option value="evening" @if($shifttime->shift=='evening') selected @endif>Evening</option>
                                            <option value="night" @if($shifttime->shift=='night') selected @endif>Night</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="shift" class="form-label">Category</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="category">
                                            <option value="" disabled>Select Category</option>
                                            <option value="full_timer" @if($shifttime->category=='full_timer') selected @endif>Full timer</option>
                                            <option value="part_timer" @if($shifttime->category=='part_timer') selected @endif>Part timer</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="holiday" class="form-label">Weekly Holiday Count</label>
                                        <input type="number" min="0" class="form-control" id="week_holiday_count" name="week_holiday_count" autocomplete="off" value="{{$shifttime->week_holiday_count}}" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active" @if($shifttime->status=='active') selected @endif>Active</option>
                                            <option value="inactive" @if($shifttime->status=='inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{$shifttime->description}}</textarea>
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
