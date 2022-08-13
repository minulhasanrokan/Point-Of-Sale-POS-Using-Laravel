@extends('layouts.master')

@section('title')
All Complete Order
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
                    <li class="breadcrumb-item"><a href="#">All Pending Order</a></li>
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
                <h3 class="card-title">All Pending Order</h3>
                <a style="width: 200px; float: right; display: inline-block;" href="{{route('index.pos')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Add New Order
                </a>
            </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="120">Name</th>
                            <th width="120">Date</th>
                            <th width="120">Total Products</th>
                            <th width="120">Total Amount</th>
                            <th width="60">Payment</th>
                            <th width="60">Order Status</th>
                            <th width="50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach($orders as $row)
                        <tr>
                            <td>{{$row->customers_name}}</td>
                            <td>{{$row->order_date}}</td>
                            <td>{{$row->total_products}}</td>
                            <td>{{$row->sub_total}}</td>
                            <td>{{$row->payment_status}}</td>
                            <td>{{$row->order_status}}</td>
                            <td>
                                <a  href="{{URL::to('change-order-status/'.$row->id)}}"  type="button" class="change_product_status btn btn-icon waves-effect waves-light btn-danger">

                                    @if($row->order_status!="Pending")
                                        <i class="fas fa-thumbs-down"></i>
                                    @else
                                        <i class="fas fa-thumbs-up"></i>
                                    @endif 
                                </a>
                                <a  href="{{URL::to('delete-order/'.$row->id)}}"  type="button" class="delete_product btn btn-icon waves-effect waves-light btn-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                                <a href="{{URL::to('edit-order/'.$row->id)}}" type="button" class="btn btn-icon waves-effect waves-light btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{URL::to('view-order/'.$row->id)}}" id="view_{{$sl}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                                    <i class="fa fa-eye"></i>
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
        $(document).on('click','.delete_product', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Product and it`s details will be permanantly deleted!',
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

         $(document).on('click','.change_product_status', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This Product and it`s details will be Changed!',
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


