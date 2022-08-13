@extends('layouts.master')

@section('title')
Company Setting
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
                    <li class="breadcrumb-item"><a href="#">Company Setting</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Company Setting</h3>
                
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
                <form method="post" role="form" action="{{url('/update-company-setting',$setting->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" value="{{$setting->name}}" class="form-control" id="name" placeholder="Enter Company Name" required>
                    </div>
                    <div class="form-group">
                        <label>Company Email</label>
                        <input type="email" name="email" value="{{$setting->email}}" class="form-control" id="email" placeholder="Enter Company Email" required>
                    </div>
                     <div class="form-group">
                        <label>Company Phone</label>
                        <input type="text" name="phone" value="{{$setting->phone}}" class="form-control" id="phone" placeholder="Enter Company Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Company Mobile</label>
                        <input type="text" name="mobile" value="{{$setting->mobile}}" class="form-control" id="mobile" placeholder="Enter Company Mobile" required>
                    </div>
                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" name="address" value="{{$setting->address}}" class="form-control" id="address" placeholder="Enter Company Address" required>
                    </div>
                    <div class="form-group">
                        <label>Company City</label>
                        <input type="text" name="city" value="{{$setting->city}}" class="form-control" id="city" placeholder="Enter Company City" required>
                    </div>
                    <div class="form-group">
                        <label>Company Zip Code</label>
                        <input type="text" name="zip_code" value="{{$setting->zip_code}}" class="form-control" id="zip_code" placeholder="Enter Company  Zip Code" required>
                    </div>
                    <div class="form-group">
                        <label>Company Country</label>
                        <input type="text" name="country" value="{{$setting->country}}" class="form-control" id="country" placeholder="Enter Company Country" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Company Logo</label>
                        <img width="100" id="photo" src="{{asset('')}}company/{{$setting->logo}}"/>
                        <input onchange="readUrl(this);" accept="image/*" type="file" name="logo" class="form-control" id="logo">
                    </div>

                    <button style="float: right;" id="add_new_Company" type="submit" class="btn btn-purple waves-effect waves-light">Save Setting</button>
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


