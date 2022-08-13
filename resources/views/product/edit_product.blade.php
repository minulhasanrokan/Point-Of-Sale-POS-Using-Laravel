@extends('layouts.master')

@section('title')
Edit Product - {{$product->product_name}}
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
                    <li class="breadcrumb-item"><a href="#">Edit Product</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Edit Product</h3>
                <a style="width: 150px; float: right; display: inline-block;" href="{{route('all.product')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Manage Product
                </a>
                <a style="width: 150px; margin-right: 10px;float: right; display: inline-block;" href="{{route('add.product')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Add Product
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
                <form id="product_form" method="post" role="form" action="{{url('/update-product',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" value="{{$product->product_code}}" name="product_code" class="form-control" id="product_code" placeholder="Enter Product Code" required>
                    </div>
                    <div class="form-group">
                        <label>Product Category</label>
                        <select required class="form-select" name="cat_id" id="cat_id" required style="width: 100%;">
                          <option>Select Category</option>
                          @foreach($productCategories as $category)
                          <option value="{{$category->id}}">{{$category->cat_name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Supplier</label>
                        <select required class="form-select" name="supplier_id" id="supplier_id" required style="width: 100%;">
                          <option>Select Supplier</option>
                          @foreach($suppliers as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Godown</label>
                        <input type="text" value="{{$product->product_place}}" name="product_place" class="form-control" id="product_place" placeholder="Product Godown Number" required>
                    </div>
                    <div class="form-group">
                        <label>Product Route</label>
                        <input type="text" value="{{$product->product_route}}" name="product_route" class="form-control" id="product_route" placeholder="Enter Product Route">
                    </div>
                    <div class="form-group">
                        <label>Product Buying Date</label>
                        <input type="date" value="{{$product->buy_date}}" name="buy_date" class="form-control" id="buy_date" placeholder="Enter Product Buying Date" >
                    </div>
                    <div class="form-group">
                        <label>Product Expire Date</label>
                        <input type="date" value="{{$product->expire_date}}" name="expire_date" class="form-control" id="expire_date" placeholder="Enter CProduct Expire Date" >
                    </div>
                    <div class="form-group">
                        <label>Product Buying Price</label>
                        <input type="number" value="{{$product->buying_price}}" name="buying_price" class="form-control" id="buying_price" placeholder="Enter Product Buying Price" >
                    </div>
                    <div class="form-group">
                        <label>Product Saling Price</label>
                        <input type="number" value="{{$product->sale_price}}" name="sale_price" class="form-control" id="sale_price" placeholder="Enter CProduct Saling Price" >
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea name="product_des" id="product_des" class="form-control"> {{$product->product_des}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Photo</label>
                        <img width="100" id="photo" src="{{asset('')}}product/{{$product->product_image}}"/>
                        <input onchange="readUrl(this);" accept="image/*" type="file" name="product_image" class="form-control" id="product_image">
                    </div>
                    <button style="float: right" id="add_new_Customer" type="submit" class="btn btn-purple waves-effect waves-light">Update Product</button>
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

    document.forms['product_form'].elements['cat_id'].value={{$product->cat_id}};
    document.forms['product_form'].elements['supplier_id'].value={{$product->supplier_id}};
</script>
@endsection


