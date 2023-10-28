@extends('enfold.page.auth.auth')
@section('title','Connexion')

@push('css')

@endpush

@section('content')

<div class="card-body">
    <h4 class="card-title">Reset Password</h4>
    <form method="POST" action="{{ route('updated.password') }}" class="my-login-validation" novalidate="">
        @csrf
        
        <div class="form-group">
            {{session()->get('email')}}
            <label for="email">Adresse email </label>
            <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ session()->get('email') }}" required autofocus >

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Nouveau mot de passe </label>
            <input id="password" type="password" placeholder="Saisissez votre mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" data-eye>

            <div class="form-text text-muted">
                Make sure your password is strong and easy to remember
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">

            <label for="password_confirmation">Confirmer le nouveau mot de passe </label>
            <input id="password_confirmation" type="password" placeholder="Saisissez votre mot de passe" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" data-eye>

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                Reset Password
            </button>
        </div>
    </form>
</div>

@endsection