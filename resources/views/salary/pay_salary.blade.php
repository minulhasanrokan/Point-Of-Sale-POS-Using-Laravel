@extends('layouts.master')

@section('title')
Pay Employee Salary
@endsection
@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Welcome !</h4>
            <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Pay Employee Salary</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pay Employee Salary - <span>{{date("F Y",)}}</span></h3>
                <a style="width: 200px; float: right; display: inline-block;" href="{{route('add.employee')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Manage Pay Salary
                </a>
            </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="20">Image</th>
                            <th width="250">Name</th>
                            <th width="120">Phone</th>
                            <th width="60">Salary</th>
                            <th width="60">Adavanced</th>
                            <th width="60">Month</th>
                            <th width="10">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach($employees as $row)

                        @php

                            $month = date('m');
                            $year = date('Y');

                            if($month==1){
                                $year = $year-1;
                                $month = 12;
                            }
                            else{
                                $month = date('m')-1;
                            }
                            
                            $advancedSalary = DB::table('advanced_salaries')
                            ->join('create_employes_tables', 'create_employes_tables.id', '=', 'advanced_salaries.user_id')
                            ->where('advanced_salaries.status',1)
                            ->where('advanced_salaries.user_id',$row->id)
                            ->where('advanced_salaries.month',$month)
                            ->where('advanced_salaries.year',$year)
                            ->where('create_employes_tables.status',1)
                            ->where('create_employes_tables.employee_status',1)
                            ->groupBy('advanced_salaries.month')
                            ->groupBy('advanced_salaries.year')
                            ->groupBy('advanced_salaries.user_id')
                            ->sum('advanced_salaries.advance_salary');
                        @endphp
                        <tr>
                            <td><img style="width: 40px; height: 40px;" src="employee/{{$row->photo}}"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->salary}}</td>
                            <td>{{$advancedSalary}}</td>
                            <td>{{date("F", strtotime("-1 months"))}}</td>

                            <td>
                                <a style="width: 100%;" href="{{URL::to('view-employee/'.$row->id)}}" id="view_{{$sl}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                                    Pay Salary
                                </a>
                            </td>
                        </tr>
                        @php
                            $sl ++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

</div>
<!-- end container-fluid -->

</div>
@endsection

@section('css')
    <link href="{{asset('')}}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Table datatable css -->
    <link href="{{asset('')}}assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}assets/libs/datatables/fixedHeader.bootstrap4.min.html" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
@endsection

@section('js')
    <!-- Vendor js -->
    <script src="{{asset('')}}assets/js/vendor.min.js"></script>

    <!-- third party js -->
    <script src="{{asset('')}}assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="{{asset('')}}assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="{{asset('')}}assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="{{asset('')}}assets/libs/jszip/jszip.min.js"></script>
    <script src="{{asset('')}}assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('')}}assets/libs/pdfmake/vfs_fonts.js"></script>

    <script src="{{asset('')}}assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/buttons.print.min.js"></script>

    <script src="{{asset('')}}assets/libs/datatables/dataTables.fixedHeader.min.html"></script>
    <script src="{{asset('')}}assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/dataTables.scroller.min.js"></script>

    <!-- Datatables init -->
    <script src="{{asset('')}}assets/js/pages/datatables.init.js"></script>
    
    <!-- App js -->
    <script src="{{asset('')}}assets/js/app.min.js"></script>

    <script type="text/javascript">
        $(document).on('click','.delete_employee', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Employee and it`s details will be permanantly deleted!',
                type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Ok!',
              cancelButtonText: 'Cancel',
            }).then(function(willDelete) {
                if (willDelete) {
                    window.location.href = url;
                }
                else{
                    swal("safe data!!");
                }
            });
        });

        $(document).on('click','.change_employee_status', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Employee and it`s details will be Changed!',
                type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Ok!',
              cancelButtonText: 'Cancel',
            }).then(function(willDelete) {
                if (willDelete) {
                    window.location.href = url;
                }
                else{
                    swal("safe data!!");
                }
            });
        });

</script>
@endsection


