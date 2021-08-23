@extends('admin.layout.outside')
@section('content')

<div id="content-body">
    <div class="mt-5 py-5 text-center w-100">
        <div class="mx-auto w-xxl w-auto-xs">
            <div class="px-3" id="login-form">
                <form id="login-user-form">
                    <div class="form-group">
                        <img src="{{ url('/assets/images/logo.png')}}" style="width: 200px" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>
                    <div class="mb-3">

                    </div>
                    <div class="alert" id="login-msg" style="display: none;"></div>
                    <button type="submit" class="md-btn md-raised mb-1 w-xs cyan" id="sign-in">
                        <i class="fa fa-spinner fa-spin icon-spinner" id="login-sign-up-spin" style="display: none"></i>
                        <span id="login-sign-up-text">Sign in</span>
                    </button>
                </form>
                <input type="hidden" class="server-url" value="{{ url('/') }}">
            </div>
        </div>
    </div>
</div>
@endsection
