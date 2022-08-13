<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('')}}assets/images/favicon.ico">
        @yield('css')
        <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            @include('layouts/top_bar')
            
            @include('layouts/left_sidebar')

            @yield('content')
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2016 - 2020 &copy; Moltran theme by <a href="#">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
        </div>
       @yield('js')
       <script>
    @if(Session::has('messege'))
        var type ="{{Session::get('alert-type')}}";
        switch(type){
            case 'info' :
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success' :
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning' :
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error' :
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
    @endif
</script>
    </body>
</html>