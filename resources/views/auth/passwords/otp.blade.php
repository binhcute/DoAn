@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
        {{ Session::put('status',null) }}
    </div>
    @endif
    <h4>Lấy Lại Mật Khẩu</h4>
    <hr>
    <form method="POST" action="{{ route('post.otp') }}" id="otp-check">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-form-label">Địa Chỉ Email</label>

            <div class="form-input position-relative">
                <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Session('Email') }}">
                <input disabled class="form-control @error('email') is-invalid @enderror" value="{{ Session('Email') }}">
            </div>
        </div>

        <div class="form-group row" id="noti-validate-reset">
            <label for="token" class="col-form-label">Nhập Mã OTP <abbr class="required">*</abbr></label>

            <div class="form-input position-relative">
                <input type="text" class="form-control" name="token">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Gửi
                </button>
            </div>
        </div>
    </form>
</div>
@endsection