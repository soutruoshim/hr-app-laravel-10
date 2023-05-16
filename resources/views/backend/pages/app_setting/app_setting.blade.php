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

                                <li class="breadcrumb-item active">App Setting</li>
                            </ol>
                        </div>
                        <h4 class="page-title">App Setting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{route('update.app_setting', $appSetting->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $appSetting->id }}">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="company_name" class="form-label">App Name </label>
                                        <input type="text" name="app_name" class="form-control" id="app_name"
                                            value="{{ $appSetting->app_name }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="version" class="form-label">Version </label>
                                        <input type="text" name="version" class="form-control" id="version"
                                            value="{{ $appSetting->version }}">
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label for="android_url" class="form-label">Android URL </label>
                                        <input type="text" name="android_url" class="form-control" id="android_url"
                                            value="{{ $appSetting->android_url }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="ios_url" class="form-label">iOS URL </label>
                                        <input type="text" name="ios_url" class="form-control" id="ios_url"
                                            value="{{ $appSetting->ios_url }}">
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
@endsection
