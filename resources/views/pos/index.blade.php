@extends('layouts.master')

@section('title')
Point Of Sale Page
@endsection
@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-info">
            <div class="page-title-box">
                <h4 style="color: white;" class="page-title">Date: {{date('d/F/Y')}}</h4>
                <div style="color: white;" class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li  class="breadcrumb-item"><a style="color: white;" href="#">Point Of Sale Page</a></li>
                       <li  class="breadcrumb-item active"><a style="color: white;" href="{{route('dashboard')}}">Dashboard</a></li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="portfolioFilter">
                @foreach($productCategories as $category)
                <a href="#" data-filter="*" class="current">{{$category->cat_name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <form method="post" action="{{route('create.invoice')}}">
            @csrf
    <div class="row">
        
            <div class="col-lg-6">
                <div style="background: white;" class="panel">
                    <h4 style="display: inline-block; margin: 0px;" class="text-info">Customers</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a style="float: right;" href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add Customer</a>
                    <br>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}option>
                        @endforeach
                    </select>
                </div>
                <div class="card text-center">
                    <table class="table">
                        <thead class="bg-info">
                            <th style="color: white;">Name</th>
                            <th style="color: white;">Quantity</th>
                            <th style="color: white;">price</th>
                            <th style="color: white;">Sub Total</th>
                            <th style="color: white;">Action</th>
                        </thead>
                        <tbody>
                            @foreach($cartData as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>
                                    <form  method="post" action="{{route('update.cart',$data->id)}}">
                                        @csrf
                                        <input style="width: 50px;" type="hidden" value="{{$data->id}}" name="id">
                                        <input id="cart_qty_{{$data->id}}" style="width: 50px;" type="number" value="{{$data->quantity}}" name="cart_qty_{{$data->id}}">
                                        <button style="height: 27px; margin-top: -2px;" type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                 <td>{{$data->price}}</td>
                                <td>{{$data->price*$data->quantity}}</td>
                                <td>
                                    <a href="{{route('delete.cart.product',$data->id)}}" id="view" type="button" class="btn btn-icon waves-effect waves-light btn-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-primary">
                        <p style="color: white;">Quantity: {{Cart::getTotalQuantity()}}</p>
                        <p style="color: white;">Product: {{Cart::getContent()->count()}}</p>
                        <p style="color: white;">Vat: &#2547;00</p>
                        <hr style="background: white;">
                        <p style="color: white;">Sub Total: &#2547;{{Cart::getSubTotal()}}</p>
                    </div>
                    <button type="submit" class="btn btn-success width-md waves-effect waves-light">Create Invoice</button>
                </div>
            </div>
        </form>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="20">Image</th>
                            <th width="250">Name</th>
                            <th width="120">Code</th>
                            <th width="120">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $row)
                        <tr>
                            <td><a href="{{route('add.cart',$row->id)}}" id="view" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                                    <i class="fa fa-plus"></i>
                                </a></i><img style="width: 40px; height: 40px;" src="product/{{$row->product_image}}"></td>
                            <td>{{$row->product_name}}</td>
                            <td>{{$row->product_code}}</td>
                            <td>{{$row->category_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div>
<!-- end container-fluid -->
</div>

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" role="form" action="{{url('/insert-customer')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Customer Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                             <div class="form-group">
                                <label>Customer Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Customer Phone" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Customer Address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Shopname</label>
                                <input type="text" name="shopname" class="form-control" id="shopname" placeholder="Enter Shopname">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Account Name</label>
                                <input type="text" name="account_holder" class="form-control" id="account_holder" placeholder="Enter Customer Account Name" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Account NUmber</label>
                                <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter Customer Account NUmber" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Bank Name</label>
                                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Customer Bank Name" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Branch Bank Name</label>
                                <input type="text" name="bank_branch" class="form-control" id="bank_branch" placeholder="Enter Customer Branch Bank Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Enter Customer City">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Customer Photo</label>
                                <img id="photo" src="#"/>
                                <input onchange="readUrl(this);" accept="image/*" type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button style="float: right;" type="submit" class="btn btn-info waves-effect waves-light">Add New Customer</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
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
    <!--<script src="{{asset('')}}assets/libs/datatables/buttons.print.min.js"></script>-->

    <script src="{{asset('')}}assets/libs/datatables/dataTables.fixedHeader.min.html"></script>
    <script src="{{asset('')}}assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{asset('')}}assets/libs/datatables/dataTables.scroller.min.js"></script>

    <!-- Datatables init -->
    <script src="{{asset('')}}assets/js/pages/datatables.init.js"></script>
    
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


