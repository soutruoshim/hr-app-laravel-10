@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content">
<?php
    $year = date('Y', strtotime($date));
    $month = date('m', strtotime($date));
    //echo $month. " ".$year;
?>
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <a href="{{ route('add.position') }}" class="btn btn-blue waves-effect waves-light">Add
                                    Attendance</a> --}}
                            </ol>
                        </div>
                        <div class="search-box p-4 rounded mb-3 box-shadow">

                                <div class="col-lg-3">
                                    <h5>Attendance Of {{$employee->user->name}}</h5>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-lg-3 col-md-3">
                                        <input type="number" min="2023" max="2099" step="1"  placeholder="Requested year : 2020" id="year" name="year" value="{{$year}}" class="form-control">
                                    </div>

                                    <div class="col-lg-3 col-md-3">
                                        <select class="form-select form-select-lg" name="month" id="month">
                                            <option value="01" {{$month=='01'?'selected':''}}> Jan </option>
                                            <option value="02" {{$month=='02'?'selected':''}}> Feb </option>
                                            <option value="03" {{$month=='03'?'selected':''}}> Mar </option>
                                            <option value="04" {{$month=='04'?'selected':''}}> Apr </option>
                                            <option value="05" {{$month=='05'?'selected':''}}> May </option>
                                            <option value="06" {{$month=='06'?'selected':''}}> Jun </option>
                                            <option value="07" {{$month=='07'?'selected':''}}> Jul </option>
                                            <option value="08" {{$month=='08'?'selected':''}}> Aug </option>
                                            <option value="09" {{$month=='09'?'selected':''}}> Sept </option>
                                            <option value="10" {{$month=='10'?'selected':''}}> Oct </option>
                                            <option value="11" {{$month=='11'?'selected':''}}> Nov </option>
                                            <option value="12" {{$month=='12'?'selected':''}}> Dec </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2 col-md-4">
                                        <button type="button" id="btn-filter" class="btn btn-block btn-primary form-control">Filter</button>
                                    </div>

                                    <div class="col-lg-2 col-md-4">
                                        <button type="button" id="download-excel" data-href="https://digitalhr.cyclonenepal.com/admin/attendances/1"
                                                class="btn btn-block btn-secondary form-control">
                                            CSV Export
                                        </button>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>Check In At</th>
                                        <th>Check Out At</th>
                                        <th>Attendance Status</th>
                                        <th>Remark</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $start_date = "01-".$month."-".$year;
                                            $start_time = strtotime($start_date);

                                            $end_time = strtotime("+1 month", $start_time);

                                            for($i=$start_time; $i<$end_time; $i+=86400)
                                            {
                                                 //$list[] = date('Y-m-d-D', $i);
                                                 ?>
                                    <tr class="{{date('Y-m-d', $i)}}">
                                        <td>{{ date('D-Y-m-d', $i) }}</td>
                                        <td class="check-in"></td>
                                        <td class="check-out"></td>
                                        <td class="status"></td>
                                        <td class="remark"></td>
                                    </tr>
                                    <?php }
                                    ?>

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- container -->

    </div> <!-- content -->
    <script>
        $(document).ready(function() {

            $("#filter_date").on('change', function() {
                var date_value = $(this).val();
                window.location.replace("http://127.0.0.1:8000/all/attendance?attendance_date=" +
                    date_value);
            });

            //
            var month = {{$month}};
            var year = {{$year}};
            var emp_id = {{$employee->id}};
            $.ajax({
                url: "{{ url('/attendance/ajax?month=') }}" + month+"&year="+ year+"&emp_id="+emp_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        // $('select[name="position_id"]').append('<option value="' + value.id +
                        //     '">' + value.position_name + '</option>');
                        console.log("."+value.date)
                        // $('.'+value.date).children(".check-in").css({
                        //     "background-color": "lightgreen",
                        //     "border-style": "inset"
                        // });
                        $('.'+value.date).children(".check-in").append(value.check_in)
                        $('.'+value.date).children(".check-out").append(value.check_out)
                        $('.'+value.date).children(".status").append(value.status)
                        $('.'+value.date).children(".remark").append(value.remark)
                    });
                },
            });


            $("#btn-filter").on('click', function() {
                var month =  $('#month').val();
                var year = $('#year').val();
                var date = year+"-"+month+"-01";
                var emp = {{$employee->id}};

                window.location.replace("http://127.0.0.1:8000/show/attendance/"+emp+"/"+date);
            });

            // $(".2023-04-27").children(".check-out").css({
            //     "background-color": "lightgreen",
            //     "border-style": "inset"
            // });

        })
    </script>
@endsection
