@extends('layouts.master')
@section('title')
View Supplier - {{$singleSupplier->name}}
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
                    <li class="breadcrumb-item"><a href="#">View Supplier</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">View Supplier Details</h3>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('edit-supplier/'.$singleSupplier->id)}}" type="button" class="btn btn-icon waves-effect waves-light btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('delete-supplier/'.$singleSupplier->id)}}"  type="button" class="delete_supplier btn btn-icon waves-effect waves-light btn-primary">
                    <i class="fas fa-times"></i>
                </a>
                <a style="width: 50px; float: right; display: inline-block;" href="{{URL::to('change-supplier-status/'.$singleSupplier->id)}}"  type="button" class="change_supplier_status btn btn-icon waves-effect waves-light btn-danger">
                    @if($singleSupplier->supplier_status==1)
                        <i class="fas fa-thumbs-down"></i>
                    @else
                        <i class="fas fa-thumbs-up"></i>
                    @endif 
                </a>
            </div>
            <div class="card-body">
                    <img align="right" height="150" width="150"  src="{{asset('')}}supplier/{{$singleSupplier->photo}}"/>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Name</label>
                        <p>{{$singleSupplier->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Status</label>
                        <p>
                            @if($singleSupplier->supplier_status==1)
                                Active
                            @else
                                Inactive
                            @endif
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Email</label>
                        <p>{{$singleSupplier->email}}</p>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Phone</label>
                        <p>{{$singleSupplier->phone}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier NID No.</label>
                        <p>{{$singleSupplier->nid_no}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Address</label>
                        <p>{{$singleSupplier->address}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Shopname</label>
                        <p>{{$singleSupplier->shop}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Account Name</label>
                        <p>{{$singleSupplier->account_holder}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Account NUmber</label>
                        <p>{{$singleSupplier->account_number}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Bank Name</label>
                        <p>{{$singleSupplier->bank_name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier Branch Bank Name</label>
                        <p>{{$singleSupplier->bank_branch}}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier City</label>
                        <p>{{$singleSupplier->city}}</p>
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
        $(document).on('click','.delete_supplier', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Supplier and it`s details will be permanantly deleted!',
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


        $(document).on('click','.change_supplier_status', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Supplier and it`s details will be Changed!',
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


