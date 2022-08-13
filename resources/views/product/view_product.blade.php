@extends('layouts.master')
@section('title')
View Product - {{$product->product_name}}
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
                    <li class="breadcrumb-item"><a href="#">View Product</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">View Product Details</h3>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('edit-product/'.$product->id)}}" type="button" class="btn btn-icon waves-effect waves-light btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('delete-product/'.$product->id)}}"  type="button" class="delete_product btn btn-icon waves-effect waves-light btn-primary">
                    <i class="fas fa-times"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('change-product-status/'.$product->id)}}"  type="button" class="change_product_status btn btn-icon waves-effect waves-light btn-danger">
                    @if($product->product_status==1)
                        <i class="fas fa-thumbs-down"></i>
                    @else
                        <i class="fas fa-thumbs-up"></i>
                    @endif 
                </a>
            </div>
            <div class="card-body">
                    <img align="right" height="150" width="150"  src="{{asset('')}}product/{{$product->product_image}}"/>
                    <div class="form-group">
                        <label>Product Name</label>
                        <p>{{$product->product_name}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <p>{{$product->product_code}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Status</label>
                        <p>
                            @if($product->product_status==1)
                                Active
                            @else
                                Inactive
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Product Category</label>
                        <p>{{$product->category_name}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Supplier</label>
                        <p>{{$product->supplier_name}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Godown</label>
                        <p>{{$product->product_place}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Route</label>
                        <p>{{$product->product_route}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Buying Date</label>
                        <p>{{$product->buy_date}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Expire Date</label>
                        <p>{{$product->expire_date}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Buying Price</label>
                        <p>{{$product->buying_price}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Saling Price</label>
                        <p>{{$product->sale_price}}</p>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <p>{{$product->product_des}}</p>
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
        $(document).on('click','.delete_product', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');

            var proceed = confirm("This Product and it`s details will be permanantly deleted!");
            if (proceed) {
              window.location.href = url;
            } else {
              return;
            }
        });


        $(document).on('click','.change_product_status', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');

            var proceed = confirm("This Product and it`s details will be Changed!");
            if (proceed) {
              window.location.href = url;
            } else {
              return;
            }
        });

</script>
@endsection


