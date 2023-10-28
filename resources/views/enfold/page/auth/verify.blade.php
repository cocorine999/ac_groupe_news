@extends('enfold.page.auth.auth')
@section('title','Connexion')

@push('css')

@endpush

@section('content')

<div class="card-body">

    
    <div class="alert alert-success" role="alert">
        Un lien de verification vient d'être fraichement envoyé dans votre boite email.
    </div>
    

    <div>Avant de continuez, veuillez bien consulter votre boite email pour accéder au lien de verification</div>
    <div style="margin-top: 5px; margin-bottom: 10px;">Si vous n'avez pas reçu l'email,</div>
    
    <form class="d-inline" method="POST" action="{{ route('resend.email.link') }}">
        @csrf
        <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? '' }}" required autocomplete="email">
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="float: right;">
            Cliquez ici pour recevoir un autre email    
        </button>
    </form>

</div>
@endsection