@extends('layouts.master')

@section('title')
Add New Expense
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
                    <li class="breadcrumb-item"><a href="#">Add New Expense</a></li>
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
                <h3 style="display: inline-block;margin-top:10px ;" class="card-title">Add Expense</h3>
                <a style="width: 100px; float: right; display: inline-block;" href="{{route('all.expense')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Manage
                </a>
                <a style="width: 100px; float: right; margin-right: 10px; display: inline-block;" href="{{route('today.expense')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    Today
                </a>
                <a style="width: 120px; float: right; margin-right: 10px; display: inline-block;" href="{{route('this.month.expense')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    This Month
                </a>
                <a style="width: 120px; float: right; margin-right: 10px; display: inline-block;" href="{{route('this.year.expense')}}" type="button" class="btn btn-icon waves-effect waves-light btn-primary">
                    This Year
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
                <form method="post" id="add_expense" role="form" action="{{url('/insert-expense')}}">
                    @csrf
                    <div class="form-group">
                        <label>Expense Details</label>
                        <textarea name="details" id="details" class="form-control" required> </textarea>
                    </div>
                    <div class="form-group">
                        <label>Expense Amount</label>
                        <input type="number" name="amount" class="form-control" id="amount" placeholder="Expense Amount" required>
                    </div>
                    <div class="form-group">
                        <label style="display: none;">Expense Date</label>
                        <input type="hidden" name="date" value="{{date('d/m/y')}}" class="form-control" id="date" placeholder="Expense Amount" required>
                    </div>
                    <div class="form-group">
                        <label style="display: none;">Expense Month</label>
                        <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="month" placeholder="Expense Amount" required>
                    </div>
                    <div class="form-group">
                        <label style="display: none;">Expense Year</label>
                        <input type="hidden" name="year" value="{{date('Y')}}" class="form-control" id="year" placeholder="Expense Amount" required>
                    </div>
                    <button style="float: right" id="add_new_advanced_salary" type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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

@endsection


