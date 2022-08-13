@extends('layouts.master')

@section('title')
Invoice Point Of Sale Page
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
                                                            <strong>Shop Name: {{$customer->shopname }}</strong><br>
                                                            <strong>Name: {{$customer->name }}</strong><br>
                                                            <abbr title="Phone">City:</abbr> {{$customer->city }}
                                                            <br>
                                                            <abbr title="Phone">Address:</abbr> {{$customer->address }}
                                                            <br>
                                                            <abbr title="Phone">Phone:</abbr> {{$customer->phone}}
                                                            <br>
                                                            <abbr title="Phone">Email:</abbr> {{$customer->email}}
                                                            </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong> {{date("d, F, Y")}}</p>
                                                    <p class="mt-2"><strong>Order Status: </strong> <span class="badge badge-pink">Pending</span></p>
                                                    <p class="mt-2"><strong>Order ID: </strong>#POS-{{$orderId}}</p>
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
                                                            @foreach($contents as $content)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$content->name}}</td>
                                                                <td>{{$content->quantity}}</td>
                                                                <td>{{$content->price}}</td>
                                                                <td>{{$content->price*$content->quantity}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <p class="text-right"><b>Sub-total:</b>&#2547; {{Cart::getSubTotal()}}</p>
                                                <p class="text-right">Discout: 0%</p>
                                                <p class="text-right">VAT: 0</p>
                                                <hr>
                                                <h3 class="text-right">&#2547; {{Cart::getSubTotal()}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#con-close-modal" class="btn btn-primary waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->
    </div>
</div>
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Invoice Of {{$customer->name }}</h5>
                    <span style="float: right;" >Total : &#2547; {{Cart::getSubTotal()}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <form method="post" role="form" action="{{url('/final-invoice')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Payment</label>
                                <select class="form-control" name="payment_status" id="payment_status" required>
                                    <option value="">Select Option</option>
                                    <option value="Hand Cas">Hand Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Pay</label>
                                <input type="number" name="pay" class="form-control" id="pay" placeholder="Enter Customer Email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                             <div class="form-group">
                                <label>Due</label>
                                <input type="number" name="due" class="form-control" id="due" placeholder="Enter Customer Phone">
                            </div>
                        </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                <input type="hidden" value="{{$customer->id }}" name="customer_id" id="customer_id">
                                <input type="hidden" value="{{date('d/m/y')}}" name="order_date" id="order_date">
                                
                                <input type="hidden" value="Pending" name="order_status" id="order_status">
                                <input type="hidden" value="{{Cart::getContent()->count()}}" name="total_products" id="total_products">
                                <input type="hidden" value="{{Cart::getSubTotal()}}" name="sub_total" id="sub_total">
                                <input type="hidden" value="{{Cart::getSubTotal()}}" name="total" id="total"> 
                                <button style="float: right;"  type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                             </div>
                         </div>
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


