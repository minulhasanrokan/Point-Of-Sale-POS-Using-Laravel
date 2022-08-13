@extends('layouts.auth_layouts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-header bg-img p-5 position-relative">
                <div class="bg-overlay"></div>
                <h4 class="text-white text-center mb-0">Create a new Account</h4>
            </div>
            <div class="card-body p-4 mt-2">
                <form class="p-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                    </div>

                    <div class="form-group mb-3">
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                    </div>

                    <div class="form-group mb-3">
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    </div>

                    <div class="form-group mb-3">
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" >
                    </div>
                     @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox checkbox-primary">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                    @endif
                    <div class="form-group text-center mt-5 mb-4">
                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Register </button>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login') }}">Already have account?</a>
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