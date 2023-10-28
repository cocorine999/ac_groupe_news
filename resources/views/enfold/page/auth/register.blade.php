@extends('enfold.page.auth.auth')
@section('title','Création de compte')

@push('css')

@endpush

@section('content')
<div class="card-body">
    <h4 class="card-title">Register</h4>
    <form method="POST" class="my-login-validation" novalidate="" action="{{route('register')}}">
        @csrf
        <div class="form-group">
            <label for="name">Nom & Prénom</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Saisissez votre nom et prénom" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Téléphone </label>
            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Saisissez votre numero de téléphone" required autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Adresse email </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-checkbox custom-control">
                <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                <label for="agree" class="custom-control-label">J'accepte les <a href="#">Themes et Conditions</a></label>
                <div class="invalid-feedback">
                    Vous devez accepter nos Themes et Conditions
                </div>
            </div>
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                Créer le nouveau compte
            </button>
        </div>
        <div class="mt-4 text-center">
            J'ai déjà un compte? <a href="{{route('login')}}">S'authentifier</a>
        </div>
    </form>
</div>
@endsection