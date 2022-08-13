@extends('layouts.master')

@section('title')
Order Details Point Of Sale Page
@endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                <h4 class="page-title">Invoice</h4>
                <div  class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li  class="breadcrumb-item"><a  href="#">Point Of Sale Page</a></li>
                       <li  class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
            </div>
        </div>
        <!-- end page title -->
         <!-- start row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                            </div> -->
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-right">Point Of sale(POS)</h4>

                                            </div>
                                            <div class="float-right">
                                                <h5>Invoice # 
                                                            <strong>{{date("d-m-Y")}}</strong>
                                                        </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="float-left mt-4">
                                                    <address>
                                                            <strong>Shop Name: {{$order->shopname }}</strong><br>
                                                            <strong>Name: {{$order->name }}</strong><br>
                                                            <abbr title="Phone">City:</abbr> {{$order->city }}
                                                            <br>
                                                            <abbr title="Phone">Address:</abbr> {{$order->address }}
                                                            <br>
                                                            <abbr title="Phone">Phone:</abbr> {{$order->phone}}
                                                            <br>
                                                            <abbr title="Phone">Email:</abbr> {{$order->email}}
                                                            </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong> {{$order->order_date}}</p>
                                                    <p class="mt-2"><strong>Order Status: </strong> <span class="badge badge-pink">{{$order->order_status}}</span></p>
                                                    <p class="mt-2"><strong>Order ID: </strong>#POS-{{$order->id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i= 1;
                                                            @endphp
                                                            @foreach($orderDetails as $details)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$details->product_name}}</td>
                                                                <td>{{$details->quantity}}</td>
                                                                <td>{{$details->unit_cost}}</td>
                                                                <td>{{$details->unit_cost*$details->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <p class="text-right"><b>Sub-total:</b>&#2547; {{$order->sub_total}}</p>
                                                <p class="text-right">Discout: 0%</p>
                                                <p class="text-right">VAT: 0</p>
                                                <hr>
                                                <h3 class="text-right">&#2547; {{$order->sub_total}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                @if($order->order_status=="Pending")
                                                <a style="float: right;" href="{{route('done.order',$order->order_mst_id)}}"  type="submit" class="btn btn-info waves-effect waves-light">Done</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->
    </div>
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


