@extends('admin.admin_dashboard')
@section('admin')

@php
    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;

@endphp

<div class="content">

    @if($status == 'active')
    <h4>Admin Account Is <span class="text-success">Active </span> </h4>
    @else
<h4>Admin Account Is <span class="text-danger">InActive </span> </h4>
<p class="text-danger"><b>Plz wait admin will check and approve your account</b></p>
    @endif

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex align-items-center mb-3">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control border-0" id="dash-daterange">
                                                <span class="input-group-text bg-blue border-blue text-white">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-users font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$employees}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Employees</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-calendar font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$paidLeave}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PAID LEAVES</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$holidays}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL HOLIDAYS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                                    <p class="text-muted mb-1 text-truncate">ON LEAVE TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            {{-- =================================row 2================ --}}
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-file font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1">$<span data-plugin="counterup">58,94</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PENDING LEAVE REQUESTS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-book-open font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">PENDING EARLY EXIT REQUESTS</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL CHECK IN TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-power font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                                    <p class="text-muted mb-1 text-truncate">TOTAL CHECK OUT TODAY</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                        </div>
                        <!-- end row-->

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="btn-group mb-2">
                                                <button type="button" class="btn btn-xs btn-light">Today</button>
                                                <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                                <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                                            </div>
                                        </div>

                                        <h4 class="header-title mb-3">Sales Analytics</h4>

                                        <div dir="ltr">
                                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">


                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">


                                        </div>

                                        <h4 class="header-title mb-3">Revenue History</h4>

                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Marketplaces</th>
                                                        <th>Date</th>
                                                        <th>Payouts</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Themes Market</h5>
                                                        </td>

                                                        <td>
                                                            Oct 15, 2018
                                                        </td>

                                                        <td>
                                                            $5848.68
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Freelance</h5>
                                                        </td>

                                                        <td>
                                                            Oct 12, 2018
                                                        </td>

                                                        <td>
                                                            $1247.25
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Share Holding</h5>
                                                        </td>

                                                        <td>
                                                            Oct 10, 2018
                                                        </td>

                                                        <td>
                                                            $815.89
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Envato's Affiliates</h5>
                                                        </td>

                                                        <td>
                                                            Oct 03, 2018
                                                        </td>

                                                        <td>
                                                            $248.75
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-danger text-danger">Overdue</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Marketing Revenue</h5>
                                                        </td>

                                                        <td>
                                                            Sep 21, 2018
                                                        </td>

                                                        <td>
                                                            $978.21
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Advertise Revenue</h5>
                                                        </td>

                                                        <td>
                                                            Sep 15, 2018
                                                        </td>

                                                        <td>
                                                            $358.10
                                                        </td>

                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive-->
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

 @endsection
