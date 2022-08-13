@extends('layouts.master')

@section('title')
Edit Customer
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
                    <li class="breadcrumb-item"><a href="#">Edit Customer</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Edit Customer</h3>
                <a style="width: 180px; float: right; display: inline-block;" href="{{route('all.customer')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Manage Customer
                </a>
                <a style="margin-right: 10px; width: 180px; float: right; display: inline-block;" href="{{route('add.customer')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Add New Customer
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
                <form method="post" role="form" action="{{url('/update-customer',$singleCustomer->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$singleCustomer->name}}" placeholder="Enter Customer Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Email</label>
                        <input type="email" name="email" value="{{$singleCustomer->email}}" class="form-control" id="email" placeholder="Enter Customer Email" required>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Customer Phone</label>
                        <input type="text" name="phone" value="{{$singleCustomer->phone}}" class="form-control" id="phone" placeholder="Enter Customer Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Address</label>
                        <input type="text" name="address" value="{{$singleCustomer->address}}" class="form-control" id="address" placeholder="Enter Customer Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Shopname</label>
                        <input type="text" name="shopname" value="{{$singleCustomer->shopname}}" class="form-control" id="shopname" placeholder="Enter Shopname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Account Name</label>
                        <input type="text" name="account_holder" value="{{$singleCustomer->account_holder}}" class="form-control" id="account_holder" placeholder="Enter Customer Account Name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Account NUmber</label>
                        <input type="text" name="account_number" value="{{$singleCustomer->account_number}}" class="form-control" id="account_number" placeholder="Enter Customer Account NUmber" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Bank Name</label>
                        <input type="text" name="bank_name" value="{{$singleCustomer->bank_name}}" class="form-control" id="bank_name" placeholder="Enter Customer Bank Name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Branch Bank Name</label>
                        <input type="text" name="bank_branch" value="{{$singleCustomer->bank_branch}}" class="form-control" id="bank_branch" placeholder="Enter Customer Branch Bank Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer City</label>
                        <input type="text" name="city" value="{{$singleCustomer->city}}" class="form-control" id="city" placeholder="Enter Customer City">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Photo</label>
                        <img width="100" height="100" id="photo" src="{{asset('')}}customer/{{$singleCustomer->photo}}"/>
                        <input onchange="readUrl(this);" accept="image/*" type="file" name="image" class="form-control" id="image">
                    </div>

                    <button style="float: right;" id="add_new_Customer" type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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


