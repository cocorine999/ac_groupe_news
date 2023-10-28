@extends('enfold.backend.app')

@section('title','Liste des favoris articles')
@push('css')
<link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="{{ asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
@endpush
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>FAVORIS ARTICLES</h2>
    </div>

    <br>
    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 align-left">
                            <h2>Favoris post
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th><i class="material-icons">favorite</i></th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th><i class="material-icons">favorite</i></th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($favorite_posts as $key=>$favorite_post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ \Str::limit($favorite_post->title, 10) }}</td>
                                    <td>{{$favorite_post->author->name}}</td>
                                    <td>{{$favorite_post->view_count}}</td>
                                    <td>{{$favorite_post->favorite_to_users->count()}}</td>

                                    <td>{{$favorite_post->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if (Auth::user()->role_id==3)
                                        <a href="{{route('admin.favorite.show',$favorite_post->id)}}" class="btn btn-success waves-effect align-center">
                                            <i class="material-icons ">visibility</i>
                                        </a>
                                        @else
                                        <a href="{{route('blogger.favorite.show',$favorite_post->id)}}" class="btn btn-success waves-effect align-center">
                                            <i class="material-icons ">visibility</i>
                                        </a>
                                        @endif


                                        <button class="btn btn-danger waves-effect align-center" type="button" onclick="deletePost({{$favorite_post->id}})"><i class="material-icons">delete</i></button>
                                        @if (Auth::user()->role_id==3)
                                        <form id="delete-form-{{$favorite_post->id}}" style="display: none;" method="POST" action="{{ route('admin.posts.destroy',$favorite_post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @else
                                        <form id="delete-form-{{$favorite_post->id}}" style="display: none;" method="POST" action="{{ route('blogger.posts.destroy',$favorite_post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    function deletePost(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Êtes vous sûr?',
            text: "Voulez-vous vraiment supprimé ce post!",
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