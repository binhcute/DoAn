@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
        {{ Session::put('status',null) }}
    </div>
    @endif
    <h4 class="text-center">Lấy Lại Mật Khẩu</h4>
    <hr>    
    <form method="POST" action="{{ route('postQuenMatKhau') }}" id="email-check">
        @csrf

        <div class="form-group row" id="noti-validated-email">
            <label for="email" class="col-form-label">Nhập Địa Chỉ Email <abbr class="required">*</abbr></label>

            <div class="form-input position-relative">
                <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" autofocus>
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