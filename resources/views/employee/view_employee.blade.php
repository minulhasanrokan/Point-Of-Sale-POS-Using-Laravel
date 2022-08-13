@extends('layouts.master')
@section('title')
View Employee
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
                    <li class="breadcrumb-item"><a href="#">View Employee</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end page title -->

<!--Widget-4 -->
<div class="row justify-content-center">
    <!-- Basic example -->
    <div class="col-xl-6 ">
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">View Employee Details</h3>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('edit-employee/'.$singlaEmployee->id)}}" type="button" class="btn btn-icon waves-effect waves-light btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('delete-employee/'.$singlaEmployee->id)}}"  type="button" class="delete_employee btn btn-icon waves-effect waves-light btn-danger">
                    <i class="fas fa-times"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('change-employee-status/'.$singlaEmployee->id)}}"  type="button" class="change_employee_status btn btn-icon waves-effect waves-light btn-primary">
                    @if($singlaEmployee->employee_status==1)
                        <i class="fas fa-thumbs-down"></i>
                    @else
                        <i class="fas fa-thumbs-up"></i>
                    @endif 
                </a>
            </div>
            <div class="card-body">
                    <img align="right" height="150" width="150"  src="{{asset('')}}employee/{{$singlaEmployee->photo}}"/>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <p>{{$singlaEmployee->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Status</label>
                        <p>
                            @if($singlaEmployee->employee_status==1)
                                Active
                            @else
                                Inactive
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Email</label>
                        <p>{{$singlaEmployee->email}}</p>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Employee Phone</label>
                        <p>{{$singlaEmployee->phone}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Address</label>
                        <p>{{$singlaEmployee->address}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Experience</label>
                        <p>{{$singlaEmployee->experience}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee NID NO</label>
                        <p>{{$singlaEmployee->nid_no}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Salary</label>
                        <p>{{$singlaEmployee->salary}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Vacation</label>
                        <p>{{$singlaEmployee->vacation}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee City</label>
                        <p>{{$singlaEmployee->city}}</p>
                    </div>
            </div>
            <!-- card-body -->
        </div>
        <!-- card -->
    </div>
    <!-- col-->
</div>
<!-- end row -->
</div>
<!-- end container-fluid -->
</div>
@endsection

@section('css')
<link href="{{asset('')}}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- App css -->
<link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
<link href="{{asset('')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('')}}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
@endsection

@section('js')
 <script src="{{asset('')}}assets/js/vendor.min.js"></script>

<script src="{{asset('')}}assets/libs/moment/moment.min.js"></script>
<script src="{{asset('')}}assets/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
<script src="{{asset('')}}assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Chat app -->
<script src="{{asset('')}}assets/js/pages/jquery.chat.js"></script>

<!-- Todo app -->
<script src="{{asset('')}}assets/js/pages/jquery.todo.js"></script>

<!-- flot chart -->
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.time.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.resize.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.pie.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.selection.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.stack.js"></script>
<script src="{{asset('')}}assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
<!-- Dashboard init JS -->
<script src="{{asset('')}}assets/js/pages/dashboard.init.js"></script>
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
                text: 'This Customer and it`s details will be Changed!',
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


