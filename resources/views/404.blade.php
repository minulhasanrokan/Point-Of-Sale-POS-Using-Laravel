@extends('layouts.master')

@section('title')
Home Page
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
                    <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end page title -->

<!--Widget-4 -->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box">
            <div class="media">
                <div class="avatar-md bg-info rounded-circle mr-2">
                    <i class="ion-logo-usd avatar-title font-26 text-white"></i>
                </div>
                <div class="media-body align-self-center">
                    <div class="text-right">
                        <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">15852</span></h4>
                        <p class="mb-0 mt-1 text-truncate">Total Sales</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box">
            <div class="media">
                <div class="avatar-md bg-purple rounded-circle">
                    <i class="ion-md-cart avatar-title font-26 text-white"></i>
                </div>
                <div class="media-body align-self-center">
                    <div class="text-right">
                        <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">956</span></h4>
                        <p class="mb-0 mt-1 text-truncate">New Orders</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h6 class="text-uppercase">Target <span class="float-right">90%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">90% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box">
            <div class="media">
                <div class="avatar-md bg-success rounded-circle">
                    <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                </div>
                <div class="media-body align-self-center">
                    <div class="text-right">
                        <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">5210</span></h4>
                        <p class="mb-0 mt-1 text-truncate">New Users</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h6 class="text-uppercase">Target <span class="float-right">57%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                        <span class="sr-only">57% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box">
            <div class="media">
                <div class="avatar-md bg-primary rounded-circle">
                    <i class="ion-md-eye avatar-title font-26 text-white"></i>
                </div>
                <div class="media-body align-self-center">
                    <div class="text-right">
                        <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">20544</span></h4>
                        <p class="mb-0 mt-1 text-truncate">Unique Visitors</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h5 class="card-title mb-0"> Website Stats</h5>
            </div>
            <div id="cardCollpase1" class="collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="website-stats" style="position: relative;height: 320px"></div>
                            <div class="row text-center mt-4">
                                <div class="col-sm-4">
                                    <h5 class="my-1"><span data-plugin="counterup">86,956</span></h5>
                                    <small class="text-muted"> Weekly Report</small>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                    <small class="text-muted">Monthly Report</small>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="my-1"><span data-plugin="counterup">948,16</span></h5>
                                    <small class="text-muted">Yearly Report</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                    <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                </div>
                <h5 class="card-title mb-0"> Website Stats</h5>
            </div>
            <div id="cardCollpase2" class="collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="pie-chart">
                                <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                </div>
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-sm-6">
                                    <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                    <small class="text-muted"> Weekly Report</small>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="my-1"><span data-plugin="counterup">86,69</span></h5>
                                    <small class="text-muted">Monthly Report</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>
<!-- End row -->

<div class="row">
    <!-- INBOX -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
            </div>
            <div class="card-body">
                <div class="inbox-widget slimscroll" style="min-height: 384px;">
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Chadengle</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">13:40 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Tomaslau</p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">13:34 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Stillnotdavid</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">13:17 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Kurafire</p>
                            <p class="inbox-item-text">Nice to meet you</p>
                            <p class="inbox-item-date">12:20 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Shahedk</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">10:15 AM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Adhamdannaway</p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                            <p class="inbox-item-date">9:56 AM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Arashasghari</p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                            <p class="inbox-item-date">10:15 AM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/avatar-9.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author">Joshaustin</p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                            <p class="inbox-item-date">9:56 AM</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <!-- CHAT -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chat</h3>
            </div>
            <div class="card-body">
                <div class="chat-conversation">
                    <ul class="conversation-list slimscroll" style="min-height: 330px;">
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="male">
                                <i>10:00</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>John Deo</i>
                                    <p>
                                        Hello!
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" alt="Female">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Smith</i>
                                    <p>
                                        Hi, How are you? What about our next meeting?
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="male">
                                <i>10:01</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>John Deo</i>
                                    <p>
                                        Yeah everything is fine
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="assets/images/users/avatar-5.jpg" alt="male">
                                <i>10:02</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Smith</i>
                                    <p>
                                        Wow that's great
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-sm-9 chat-inputbar">
                            <input type="text" class="form-control chat-input" placeholder="Enter your text">
                        </div>
                        <div class="col-sm-3 chat-send">
                            <button type="submit" class="btn btn-info btn-block waves-effect waves-light">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col-->

    <!-- TODOs -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="m-0 card-title">Todo</h3>
            </div>
            <div class="card-body todoapp">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 id="todo-message" class="mt-0"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h5>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="float-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                    </div>
                </div>

                <ul class="list-group slimscroll todo-list" style="max-height: 290px" id="todo-list"></ul>

                <form name="todo-form" id="todo-form" class="mt-4">
                    <div class="row">
                        <div class="col-sm-9 todo-inputbar">
                            <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                        </div>
                        <div class="col-sm-3 todo-send">
                            <button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
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


