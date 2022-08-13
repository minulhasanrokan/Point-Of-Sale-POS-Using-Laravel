@extends('layouts.auth_layouts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-header bg-img p-5 position-relative">
                <div class="bg-overlay"></div>
                <h4 class="text-white text-center mb-0">Sign In to Inventory Management System</h4>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card-body p-4 mt-2">
                <form class="p-3" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group mb-3">
                        <input class="form-control" name="email" type="email" required="" placeholder="Username Or Email">
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" name="password" id="password" type="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group text-center mt-5 mb-4">
                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In </button>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-7">
                            <a href="{{ route('password.request') }}"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="{{ route('register') }}">Create an account</a>
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->

        <!-- end row -->

    </div>
    <!-- end col -->
</div>
@endsection