@extends('enfold.backend.app')

@section('title','Liste des messages de renseignement')
@push('css')
<link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="{{ asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
@endpush
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>MESSAGES DE RENSEIGNEMENT </h2>
    </div>

    <br>
    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 align-left">
                            <h2>
                                LISTE DES MESSAGES <span class="badge btn-info">{{$messages->count()}}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom & Prenom</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Envoyer le </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom & Prenom</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Envoyer le </th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($messages as $key=>$message)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{ucfirst($message->message)}}</td>

                                    <td>{{$message->created_at}}</td>
                                    <td>
                                        <button class="btn btn-danger waves-effect align-center" type="button" onclick="deleteMessage({{$message->id}})"><i class="material-icons">delete</i></button>
                                        <form id="delete-form-{{$message->id}}" style="display: none;" method="POST" action="{{ route('admin.messages.delete',$message->id) }}">
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
    function deleteMessage(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Êtes vous sûr?',
            text: "Voulez-vous vraiment supprimé ce message !!!",
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