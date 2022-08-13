@extends('layouts.master')

@section('title')
Take Attendance
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
                    <li class="breadcrumb-item"><a href="#">Take Attendance</a></li>
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
                <h3 style="display: inline-block; margin-top: 10px;" class="card-title">Take Attendance - {{date('d/m/Y')}}</h3>
                <a style="width: 100px; float: right; display: inline-block;" href="{{route('all.attendance')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Manage
                </a>
                <a style="width: 120px; float: right; margin-right: 10px; display: inline-block;" href="{{route('today.attendance')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Today
                </a>
                <a style="width: 120px; float: right; margin-right: 10px; display: inline-block;" href="{{route('this.year.attendance')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    This Year
                </a>
                 <a style="width: 120px; float: right; margin-right: 10px; display: inline-block;" href="{{route('this.month.attendance')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    This Month
                </a>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('insert.attendance')}}">
                    @csrf
                <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="20">Image</th>
                            <th width="250">Name</th>
                            <th width="120">Phone</th>
                            <th width="60">Status</th>
                            <th width="50">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach($employees as $row)
                        <tr>
                            <td><img style="width: 40px; height: 40px;" src="employee/{{$row->photo}}"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                @if($row->employee_status==1)
                                    Active
                                @else
                                    Inactive
                                @endif 

                                <input type="hidden" name="user_id[]" id="userId_{{$row->id}}" value="{{$row->id}}">

                                <input type="hidden" name="att_year" value="{{date('Y')}}" class="form-control" id="att_year_{{$row->id}}" placeholder="Expense Amount" required>
                                <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="month_{{$row->id}}" placeholder="Expense Amount" required>
                                <input type="hidden" name="att_date" value="{{date('d/m/y')}}" class="form-control" id="att_date_{{$row->id}}" placeholder="Expense Amount" required>
                            </td>

                            <td>
                                
                                <input type="radio" name="attendance[{{$row->id}}]" id="attendance_{{$row->id}}" value="Present"> Present
                                <input type="radio" name="attendance[{{$row->id}}]" id="attendance_{{$row->id}}" value="Absence"> Absence
                                
                            </td>
                        </tr>
                        @php
                            $sl ++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <button style="float: right;" type="submit" class="btn btn-success">Take Attendance</button>
                </form>
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

</script>
@endsection


