@extends('enfold.backend.app')

@section('title','Liste des articles')
@push('css')
<link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="{{ asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
@endpush
@section('content')


<div class="container-fluid">
    <div class="block-header">
        <h2></h2>
    </div>
    <div>
        <a class="btn btn-success waves-effect" href="{{ route('blogger.posts.create') }}" role="button"><i class="material-icons primary">add</i><span>Nouveau</span> </a>
    </div>

    <br>
    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 align-left">
                            <h2>
                                LISTE DES POSTS <span class="badge bg-info">{{$posts->count()}}</span>
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
                                    <th>Permission</th>
                                    <th>Publication</th>
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
                                    <th>Permission</th>
                                    <th>Publication</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($posts as $key=>$post)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ \Str::limit($post->title, 15) }}</td>
                                    <td>{{$post->author->name}}</td>
                                    <td>{{$post->view_count}}</td>
                                    <td>
                                        @if ($post->is_approved==true)
                                        <span class="badge bg-blue">Approuvé</span>
                                        @else
                                        <span class="badge bg-red">Non Approuvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->status==true)
                                        <span class="badge bg-blue">Publié</span>
                                        @else
                                        <span class="badge bg-red">Non Publié</span>
                                        @endif
                                    </td>
                                    <td>{{$post->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('blogger.posts.show',$post->id)}}" class="btn btn-success waves-effect align-center">
                                            <i class="material-icons ">visibility</i>
                                        </a>
                                        <a href="{{route('blogger.posts.edit',$post->id)}}" class="btn btn-info waves-effect align-center">
                                            <i class="material-icons ">edit</i>
                                        </a>
                                        <button class="btn btn-danger waves-effect align-center" type="button" onclick="deletePost({{$post->id}})"><i class="material-icons">delete</i></button>
                                        <form id="delete-form-{{$post->id}}" style="display: none;" method="POST" action="{{ route('blogger.posts.destroy',$post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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