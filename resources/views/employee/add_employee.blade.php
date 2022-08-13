@extends('layouts.master')

@section('title')
Add New Employee
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
                    <li class="breadcrumb-item"><a href="#">Add Employee</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Add Employee</h3>
                <a style="width: 200px; float: right; display: inline-block;" href="{{route('all.employee')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    manage Employee
                </a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form method="post" role="form" action="{{url('/insert-employee')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Employee Email" required>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Employee Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Employee Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Employee Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Experience</label>
                        <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Employee Experience" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee NID NO</label>
                        <input type="text" name="nid_no" class="form-control" id="nid_no" placeholder="Enter Employee NID NO" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Salary</label>
                        <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter Employee Salary" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Vacation</label>
                        <input type="text" name="vacation" class="form-control" id="vacation" placeholder="Enter Employee Vacation" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter Employee City" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Photo</label>
                        <img id="photo" src="#"/>
                        <input onchange="readUrl(this);" accept="image/*" type="file" name="image" class="form-control" id="image" placeholder="Enter Employee City" required>
                    </div>

                    <button id="add_new_employee" type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                </form>
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
    function readUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#photo').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection


