@extends('enfold.page.auth.auth')
@section('title','Connexion')

@push('css')

@endpush

@section('content')

<div class="card-body">
    <h4 class="card-title">Authentification</h4>
    
    <form method="POST" class="my-login-validation" novalidate="" action="{{ route('login') }}">
        @csrf

        <input id="errors" type="hidden" class="form-control @error('errors') is-invalid @enderror" name="errors">

        @error('errors')
        <span class="invalid-feedback" role="alert" style="text-align: center; font-size:12px; margin:10px;"> 
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="phone">Identifiant </label>
            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Saisissez votre numero de téléphone" required autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe
                <a href="{{route('show.email.form')}}" class="float-right">
                    Mot de passe oublié?
                </a>

            </label>
            <input id="password" type="password" placeholder="Saisissez votre mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" data-eye>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-checkbox custom-control">
                <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                <label for="remember" class="custom-control-label">Se rappeller de moi</label>
            </div>
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                S'authentifier
            </button>
        </div>
        <div class="mt-4 text-center">
            Pas encore de compte? <a href="{{route('register')}}">Créer un nouveau compte</a>
        </div>
    </form>
</div>
@endsection