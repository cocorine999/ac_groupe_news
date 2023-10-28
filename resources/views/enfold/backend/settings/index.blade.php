@extends('enfold.backend.app')

@section('title','Parametre')
@push('css')
<link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="{{ asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">


@endpush
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>PARAMETRE</h2>
    </div>

    <br>
    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab"><i class="material-icons">home</i> PROFIL</a></li>
                                    <li role="presentation"><a href="#profile_animation_2" data-toggle="tab"><i class="material-icons">face</i> PROFIL</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">

                                        <!-- User Info -->
                                        <div class="user-info">
                                            <div class="image align-center">
                                                <img style="border-radius: 100px; width=10%; height=10%;" src="{{asset(auth()->user()->image)}}" alt="{{ auth()->user()->image }}" />
                                            </div>
                                        </div>
                                        <div class="body">
                                            <form method="POST" action="{{ route('parametre.update',Auth::id()) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method("PUT")
                                                <label for="name">Nom & Prenom</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}" placeholder="Entrez votre nom" name="name" required autocomplete="name">
                                                    </div>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label for="username">Pseudonime</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{auth()->user()->username}}" placeholder="Entrez votre pseudonime" name="username" required autocomplete="username">
                                                    </div>
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label for="phone">Numero de telephone</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{auth()->user()->phone}}" placeholder="Entrez votre numero de telephone" name="phone" required autocomplete="phone">
                                                    </div>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label for="email">Adresse email</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{auth()->user()->email}}" placeholder="Entrez votre numero de telephone" name="email" autocomplete="email">
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <label for="about">À propos</label>
                                                <div class="form-group">
                                                    <div class="form-line col-">
                                                        <textarea required rows="1" , cols="54" id="about" name="about" style="resize:none, " class="form-control @error('about') is-invalid @enderror" value="{{auth()->user()->about}}" placeholder="Decrivez vous un peu ...">{{auth()->user()->about}}</textarea>
                                                        @error('about')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <label for="image">Profil</label>
                                                <div class="form-group">
                                                    <div class="form-line col-">
                                                        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" />
                                                    </div>
                                                    <br />
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <input type="checkbox" id="remember_me" class="filled-in">
                                                <label for="remember_me">Remember Me</label>
                                                <br>
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Mise à jour</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                                        {{--
                                                    <div class="body">
                                                        <form method="POST" action="{{ route('update.password') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <label for="passe">Mot de passe actuel</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="passe" type="password" class="form-control @error('passe') is-invalid @enderror" placeholder="Entrez votre mot de passe actuel" name="passe" required autocomplete="passe">
                                            </div>

                                            @error('passe')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="password">Nouveau mot de passe</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez le nouveau mot de passe" name="password" required autocomplete="password">
                                            </div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <label for="password_confirmation">Confirmation du nouveau mot de passe</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirmer le nouveau mot de passe" name="password_confirmation" required autocomplete="password_confirmation">
                                            </div>

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <input type="checkbox" id="remember_me" class="filled-in">
                                        <label for="remember_me">Remember Me</label>
                                        <br>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">MODIFIER</button>
                                        </form>
                                    </div>
                                    --}}

                                    <form method="POST" action="{{ route('update.password') }}">
                                        @csrf
                                        @method('PUT')
                                        <label for="old_password">Mot de passe actuel</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="old_password" type="password" minlength="8" class="form-control @error('old_password') is-invalid @enderror" placeholder="Entrez votre mot de passe actuel" name="old_password" required autocomplete="old_password">
                                            </div>
                                            @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="new_password">Nouveau mot de passe</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="new_password" type="password" minlength="8" class="form-control @error('new_password') is-invalid @enderror" placeholder="Entrez le nouveau mot de passe" name="new_password" required autocomplete="new_password">
                                            </div>
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input id="new_password_confirmation" type="password" minlength="8" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="Entrez le nouveau mot de passe" name="new_password_confirmation" required autocomplete="new_password_confirmation">
                                            </div>
                                            @error('new_password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">MODIFIER</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('js')

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>


<script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{ asset('backend/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.1/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset('backend/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('backend/js/pages/ui/dialogs.js') }}"></script>


<script type="text/javascript">
    function deleteSubscriber(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Êtes vous sûr?',
            text: "Voulez-vous vraiment supprimé cet abonné !!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimé!',
            cancelButtonText: 'Non, annulé!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Annulation',
                    'Annulé :)',
                    'error'
                )
            }
        })

    }
</script>



@endpush