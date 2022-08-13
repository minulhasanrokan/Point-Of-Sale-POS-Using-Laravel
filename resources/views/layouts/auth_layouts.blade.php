<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Inventory Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Inventory Management System" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    </head>
    <body class="authentication-page">
        <div class="account-pages my-5">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    </body>
</html>