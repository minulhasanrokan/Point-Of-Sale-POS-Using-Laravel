@extends('layouts.auth_layouts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-header bg-img p-5 position-relative">
                <div class="bg-overlay"></div>
                <h4 class="text-white text-center mb-0">Reset Password</h4>
            </div>
            <div class="card-body p-4 mt-2">
                <form class="p-3" method="POST" action="{{ route('password.email') }}">
                @csrf
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required="">
                            <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light">Reset</button> </span>
                        </div>
                    </div>

                    <div class="form-group  mt-2 row mb-0">
                        <div class="col-sm-7">
                            <a href="{{ route('login') }}">Already have account?</a>
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

    </div>
    <!-- end col -->
</div>
@endsection