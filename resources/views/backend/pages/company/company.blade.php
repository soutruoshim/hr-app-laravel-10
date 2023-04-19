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

                                <li class="breadcrumb-item active">Company Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Company Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{route('update.company', $company->id)}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $company->id }}">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="company_name" class="form-label">Company Name </label>
                                        <input type="text" name="company_name" class="form-control" id="company_name"
                                            value="{{ $company->company_name }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="company_owner" class="form-label"> Company Owner </label>
                                        <input type="text" name="company_owner" class="form-control" id="company_owner"
                                            value="{{ $company->company_owner }}">
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label for="address" class="form-label">Address </label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ $company->address }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            value="{{ $company->email }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone </label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            value="{{ $company->phone }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="website_url" class="form-label">Website </label>
                                        <input type="text" name="website_url" class="form-control" id="website_url"
                                            value="{{ $company->website_url }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Check Office Off Days </label>
                                        <div class="col-lg-6 mb-3">
                                            <input type="checkbox" id="Sunday" name="weekend[]" value="1" {{ !empty($company->sunday) || $company->sunday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Sunday</label><br>
                                            <input type="checkbox" id="Monday" name="weekend[]" value="2" {{ !empty($company->monday) || $company->monday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Monday</label><br>
                                            <input type="checkbox" id="Tuesday" name="weekend[]" value="3" {{ !empty($company->tuesday) || $company->tuesday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Tuesday</label><br>
                                            <input type="checkbox" id="Wednesday" name="weekend[]" value="4" {{ !empty($company->wednesday) || $company->wednesday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Wednesday</label><br>
                                            <input type="checkbox" id="Thursday" name="weekend[]" value="5" {{ !empty($company->thursday) || $company->thursday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Thursday</label><br>
                                            <input type="checkbox" id="Friday" name="weekend[]" value="6" {{ !empty($company->friday) || $company->friday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Friday</label><br>
                                            <input type="checkbox" id="Saturday" name="weekend[]" value="7" {{ !empty($company->saturday) || $company->saturday != 0 ? 'checked' : '' }}>
                                            <label for="weekends"> Saturday</label><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="status">
                                            <option value="" disabled>Select status</option>
                                            <option value="active" @if($company->status=='active') selected @endif>Active</option>
                                            <option value="inactive" @if($company->status=='inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="upload" class="form-label">Upload Logo</label>
                                        <input class="form-control" type="file" id="logo" name="logo">
                                        <img src="@if(!empty($company->logo)) {{ asset($company->logo) }} @else  https://digitalhr.cyclonenepal.com/uploads/company/logo/Thumb-643e5a9c1197a_m2.png @endif"
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
@endsection
