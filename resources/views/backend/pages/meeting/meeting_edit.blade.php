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

                            <form id="myForm" method="post" action="{{ route('meeting.update', $meeting->id) }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $meeting->id }}">

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="title" class="form-label"> Meeting title <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" required
                                            autocomplete="off" placeholder="Enter Content Title" value="{{$meeting->title}}">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="date" class="form-label"> Meeting Date <span
                                                style="color: red">*</span></label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            required value="{{$meeting->date}}" autocomplete="off">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="start_time" class="form-label"> Meeting Start Time <span
                                                style="color: red">*</span> </label>
                                        <input type="time" class="form-control" id="start_time"
                                            name="start_time" required value="{{$meeting->start_time}}" autocomplete="off">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="venue" class="form-label"> Meeting Venue <span
                                                style="color: red">*</span> </label>
                                        <input type="text" class="form-control" id="venue" name="venue" required
                                         value="{{$meeting->venue}}" autocomplete="off" placeholder="Enter venue">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="description" class="form-label">Meeting Description <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" minlength="10" name="description" id="description" rows="6">{{$meeting->description}} </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="employee" class="form-label">Meeting participator <span
                                                style="color: red">*</span></label>
                                        <br>

                                        <select class="col-md-12 from-select select2" id="team_meeting" name="employees[]" multiple="multiple" required>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" @if(in_array($employee->id, $emp_selected)) selected @endif>{{ $employee->user->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file"
                                            accept="image/png, image/jpeg,image/jpg, image/svg," id="image"
                                            name="image" />
                                        <small>*Image is recommended to be in landscape form</small><br>
                                        <img src="@if(!empty($meeting->image)) {{ asset($meeting->image) }} @else  https://digitalhr.cyclonenepal.com/uploads/company/logo/Thumb-643e5a9c1197a_m2.png @endif"
                                        alt="" style="object-fit: contain" class="mt-3" width="150">
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
