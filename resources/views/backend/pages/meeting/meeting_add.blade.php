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

                                <li class="breadcrumb-item active">Add Meeting</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Meeting</h4>
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
                                        <label for="title" class="form-label"> Meeting title <span
                                                style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" required
                                            value="" autocomplete="off" placeholder="Enter Content Title">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="meeting_date" class="form-label"> Meeting Date <span
                                                style="color: red">*</span></label>
                                        <input type="date" class="form-control" id="meeting_date" name="meeting_date"
                                            required value="" autocomplete="off">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="meeting_start_time" class="form-label"> Meeting Start Time <span
                                                style="color: red">*</span> </label>
                                        <input type="time" class="form-control" id="meeting_start_time"
                                            name="meeting_start_time" required value="" autocomplete="off">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="venue" class="form-label"> Meeting Venue <span
                                                style="color: red">*</span> </label>
                                        <input type="text" class="form-control" id="venue" name="venue" required
                                            value="" autocomplete="off" placeholder="Enter venue">
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label for="description" class="form-label">Meeting Description <span
                                                style="color: red">*</span></label>
                                        <textarea class="form-control" minlength="10" name="description" id="" rows="6"> </textarea>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="employee" class="form-label">Meeting participator <span
                                                style="color: red">*</span></label>
                                        <br>
                                        <select class=" col-md-12 from-select" id="team_meeting"
                                            name="participator[][meeting_participator_id]" multiple="multiple" required>
                                            <option value="1">Admin</option>
                                            <option value="2">Employee</option>
                                            <option value="5">Balvinder</option>
                                            <option value="15">Testmy</option>
                                            <option value="34">Kunu Emp</option>
                                            <option value="39">Ishwar Rathod</option>
                                            <option value="40">Ali</option>
                                            <option value="41">Test</option>
                                            <option value="42">Mosab</option>
                                            <option value="43">Klasik</option>
                                            <option value="44">Betho</option>
                                            <option value="45">Duc Nam</option>
                                            <option value="46">Ahmed</option>
                                            <option value="47">Emin Kokalari</option>
                                            <option value="48">Tester</option>
                                            <option value="49">Ridgeway</option>
                                            <option value="50">Thắng</option>
                                            <option value="51">Eng moha</option>
                                            <option value="52">Ashraf Al-hakimi</option>
                                            <option value="53">Ashraf Al-hakimi</option>
                                            <option value="54">Francisco</option>
                                            <option value="55">Ashraf Al-hakimi</option>
                                            <option value="56">Ashraf Al-hakimi</option>
                                            <option value="57">Bta</option>
                                            <option value="58">MIKI</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="image" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file"
                                            accept="image/png, image/jpeg,image/jpg, image/svg," id="image"
                                            name="image" />
                                        <small>*Image is recommended to be in landscape form</small>
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
