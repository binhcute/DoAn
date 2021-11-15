@extends('layouts.app')

@section('content')

<div class="card-body">
    <h4>Lấy Lại Mật Khẩu</h4>
    <hr>
    <form method="POST" action="{{ route('post.datmatkhau') }}" id="reset-check">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-form-label">Địa Chỉ Email</label>

            <div class="form-input position-relative">
                <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Session('Email') }}">
                <input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Session('Email') }}">

            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-form-label">Tài Khoản</label>

            <div class="form-input position-relative">
                <input disabled id="username" type="text" class="form-control" name="email" value="{{ $email->username }}">


            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-form-label">Mật Khẩu <abbr class="required">*</abbr></label>

            <div class="form-input position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" autofocus>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row" id="noti-validated-reset">
            <label for="password-confirm" class="col-form-label">Nhập Lại Mật Khẩu <abbr class="required">*</abbr></label>

            <div class="form-input position-relative">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection