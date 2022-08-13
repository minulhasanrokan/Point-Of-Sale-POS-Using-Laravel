@extends('layouts.master')

@section('title')
Edit Supplier - {{$singleSupplier->name}}
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
                    <li class="breadcrumb-item"><a href="#">Edit Supplier</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Add Supplier</h3>
                <a style="width: 200px; float: right; display: inline-block;" href="{{route('add.supplier')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Add Supplier
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
                <form id="supplier_form" method="post" role="form" action="{{url('/update-supplier',$singleSupplier->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Supplier Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$singleSupplier->name}}" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$singleSupplier->email}}" placeholder="Enter Supplier Email" required>
                    </div>
                     <div class="form-group">
                        <label>Supplier Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$singleSupplier->phone}}" placeholder="Enter Supplier Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{$singleSupplier->address}}" placeholder="Enter Supplier Address" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier Shop Name</label>
                        <input type="text" name="shop" class="form-control" id="shop" value="{{$singleSupplier->shop}}" placeholder="Enter Supplier Shop Name" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier NID NO</label>
                        <input type="text" name="nid_no" class="form-control" id="nid_no" value="{{$singleSupplier->nid_no}}" placeholder="Enter Supplier NID NO" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier City</label>
                        <input type="text" name="city" class="form-control" id="city" value="{{$singleSupplier->city}}" placeholder="Enter Supplier City" required>
                    </div>
                    <div class="form-group">
                        <label>Customer Account Name</label>
                        <input type="text" name="account_holder" class="form-control" id="account_holder" value="{{$singleSupplier->account_holder}}" placeholder="Enter Customer Account Name" >
                    </div>
                    <div class="form-group">
                        <label>Customer Account NUmber</label>
                        <input type="text" name="account_number" class="form-control" id="account_number" value="{{$singleSupplier->account_number}}" placeholder="Enter Customer Account NUmber" >
                    </div>

                    <div class="form-group">
                        <label>Customer Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="bank_name" value="{{$singleSupplier->bank_name}}" placeholder="Enter Customer Bank Name" >
                    </div>
                    <div class="form-group">
                        <label>Customer Branch Bank Name</label>
                        <input type="text" name="bank_branch" class="form-control" id="bank_branch" value="{{$singleSupplier->bank_branch}}" placeholder="Enter Customer Branch Bank Name">
                    </div>
                    <div class="form-group">
                        <label>Supplier Type</label>
                        <select class="form-select" name="type" id="type" required style="width: 100%;">
                          <option selected>Select Supplier Type</option>
                          <option value="1">Distributor</option>
                          <option value="2">Wholesaler</option>
                          <option value="3">Brochure</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Supplier Photo</label>
                        <img width="60" id="photo" src="{{asset('')}}supplier/{{$singleSupplier->photo}}"/>
                        <input onchange="readUrl(this);" accept="image/*" type="file" name="image" class="form-control" id="image">
                    </div>

                    <button id="add_new_supplier" type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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

    document.forms['supplier_form'].elements['type'].value={{$singleSupplier->type}};
</script>
@endsection