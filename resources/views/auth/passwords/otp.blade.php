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
    <form method="POST" action="{{ route('post.otp') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-form-label">Địa Chỉ Email</label>

            <div class="form-input position-relative">
                <input hidden id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="token" class="col-form-label">Nhập Mã OTP</label>

            <div class="form-input position-relative">
                <input type="text" class="form-control" name="token">

                @error('token')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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