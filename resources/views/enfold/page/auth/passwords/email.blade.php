@extends('enfold.page.auth.auth')
@section('title','Connexion')

@push('css')

@endpush

@section('content')
<div class="card-body">
    <h4 class="card-title">Réinitialisation de mot de passe</h4>
    <form method="POST" class="my-login-validation" novalidate="" action="{{route('send.email.link')}}">
        @csrf

        <div class="form-group">
            <label for="email">Adresse email </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                Envoyer le lien de réinitialisation
            </button>
        </div>
        <div class="mt-4 text-center">
            J'ai déjà un compte? <a href="{{route('login')}}">S'authentifier</a>
        </div>
    </form>
</div>
@endsection