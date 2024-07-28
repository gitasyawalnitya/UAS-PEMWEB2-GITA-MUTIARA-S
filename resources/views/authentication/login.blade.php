@extends('authentication.layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong> {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>
@endif

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset("img/article.png")}}" alt="Logo" width="50" height="50">
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <h3 class="mt-2">e-Article</h3>
                </div>

            <form action="{{ route('login-auth') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="mb-1"><strong>Email</strong></label>
                    <input type="email" class="form-control" placeholder="Masukan Email" name="email" id="email" value="{{ old('email') }}" required>
                    <div class="text-danger email-error"></div>
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Password</strong></label>
                    <input type="password" class="form-control" name="password" placeholder="Masukan Password" id="password" required>
                    <div class="text-danger password-error"></div>
                </div>
                <div class="row d-flex justify-content-between mt-4 mb-2">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
