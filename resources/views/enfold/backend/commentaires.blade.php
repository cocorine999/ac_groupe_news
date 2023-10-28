@extends('enfold.backend.app')

@section('title','Liste des commentaires')
@push('css')
<link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="{{ asset('backend/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
@endpush
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>COMMENTAIRES DE VOS ARTICLES </h2>
    </div>

    <br>
    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header row">

                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 align-left">
                            <h2>
                                LISTE DES COMMENTAIRES <span class="badge btn-info">{{$commentaires->count()}}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Commentaire</th>
                                    <th>Article</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>N°</th>
                                <th>Commentaire</th>
                                <th>Article</th>
                                <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($commentaires as $key=>$commentaire)
                                @if($commentaire->post)
                                    <tr>
                                        <td>{{$key+1}}</td>

                                        <td>
                                            @if($commentaire->user)

                                                <div style="margin-top: -1%;">
                                                    <img src="{{asset($commentaire->user->image)}}" alt="ghjj" title="{{$commentaire->user->name}}" style="width: 20%;height: 15% ;border-radius:100%;padding:0%;">
                                                </div>
                                                <div style="float: left; margin-top:-18%; margin-left:25%; font-size:12px; display:block;">
                                                    <a style="color:black;font-weight: bold;">{{$commentaire->name}} .</a> {{$commentaire->created_at->diffForHumans()}}
                                                </div>

                                                <p style="margin-left:25%; margin-top:-8.5%; font-size:12px; ">{{ucfirst(\Str::limit($commentaire->commentaire,35))}}</p>
                                            @else

                                                <p style="width: 15%;height: 15%; margin-top:4.6%;">
                                                    <img src="" alt="{{substr($commentaire->name,0,1)}}" style=" padding:50%; background-color: #3b5999; color: #fff !important; font-size: 16.5px; font-weight: bold; text-align: center; text-transform: uppercase; padding-top: 40%; vertical-align: middle; border-radius:100%;">
                                                </p>
                                                <div style="float: left; margin-top:-15%; margin-left:25%; font-size:12px; display:block;">
                                                    <a style="color:black;font-weight: bold;">{{$commentaire->name}} .</a> {{$commentaire->created_at->diffForHumans()}}
                                                </div>

                                                <p style="margin-left:25%; margin-top:-5.5%; font-size:12px; ">{{ucfirst(\Str::limit($commentaire->commentaire,35))}}</p>
                                            @endif

                                            <p><a style="margin-left:25%;">Répondre</a></p>
                                        </td>
                                        <td>
                                        
                                                <div style="margin-top: 0%;">
                                                    @foreach($commentaire->post->images->slice(0,1) as $image)
                                                        <img src="{{asset($image->url)}}" alt="{{substr($image->name,0,1)}}" title="{{$image->name}}" style="width: 60px;height: 60px ;border-radius:100%;background-color: #3b5999; color: #fff !important; font-size: 16.5px; font-weight: bold; text-align: center; text-transform: uppercase; vertical-align: middle;">
                                                    @endforeach
                                                </div>
                                                <div style="float: left; margin-top:-17%; margin-left:25%; font-size:12px; display:block;">
                                                    <a style="color:black;font-weight: bold;" href="{{route('show.post',"search&index=".$commentaire->post->id."&query=".$commentaire->post->slug)}}">{{ucfirst(strtolower(\Str::limit($commentaire->post->title,35)))}} </a>
                                                </div>

                                                <p style="margin-left:25%; margin-top:-8.5%; font-size:12px; ">{{"By ".ucfirst($commentaire->post->author->name)}}</p>
                                            
                                        </td>
                                        <td>
                                            <button class="btn btn-danger waves-effect align-center" type="button" onclick="deleteMessage({{$commentaire->id}})"><i class="material-icons">delete</i></button>
                                            <form id="delete-form-{{$commentaire->id}}" style="display: none;" method="POST" action="{{ route('admin.commentaires.delete',$commentaire->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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
            text: "Voulez-vous vraiment supprimé ce commentaire !!!",
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