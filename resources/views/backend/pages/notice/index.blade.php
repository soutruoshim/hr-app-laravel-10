@extends('admin.admin_dashboard')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.notice') }}" class="btn btn-blue waves-effect waves-light">Add Notice</a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Notice </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>TITLE</th>
                                        <th>NOTICE PUBLISH DATE</th>
                                        <th>DESCRIPTION</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($notices as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title}}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('edit.notice', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                                <a href="{{ route('delete.notice', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection
