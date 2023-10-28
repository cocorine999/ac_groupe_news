@extends('enfold.backend.app')

@section('title',' Détails de l\'article : '.ucfirst($favorite_post->title))
@push('css')
    <link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">

    <div class="block-header">
        <h2>FAVORIS ARTICLES</h2>
    </div>
    <div class="body">
        <div class="form-group">
            @if (Auth::user()->role_id==3)
                <a href="{{ route('admin.favorite.index') }}" class="btn btn-danger waves-effet"> <i class="material-icons">keyboard_backspace</i>   <span> RETOUR </span></a>
            @else
                <a href="{{ route('blogger.favorite.index') }}" class="btn btn-danger waves-effet"> <i class="material-icons">keyboard_backspace</i>   <span> RETOUR </span></a>
            @endif
            {{--  <button type="submit" class="btn btn-blue pull-right waves-effect " ><span> Autorisation </span> <i class="material-icons">done</i></button>  --}}
                @if (Auth::user()->role_id==3)
                    
                    @if ($favorite_post->is_approved==true)
                        <a class="btn bg-blue  waves-effet pull-right"> <i class="material-icons">done</i>   <span> Autoriser </span></a>
                    @else
                        <a href="{{route('admin.posts.authorized',$favorite_post->id)}}" type="button" class="btn bg-red pull-right waves-effect " ><span> Autorisation </span> <i class="material-icons">done</i></a>
                    @endif
                @endif
        </div>
        <div class="row clearfix">
                
                
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                
                <div class="card">
                    <div class="header">
                        <h2>
                            {{$favorite_post->title}}
                            <br/>
                            <h5>{!!$favorite_post->sub_title!!}</h5>
                            <small>Posted by <strong> <a href=""> {{$favorite_post->author->name}} </a> </strong> on {{$favorite_post->created_at->toFormattedDateString()}} </small>
                        </h2>

                    </div>
                    <div class="body">
                        {!!$favorite_post->description!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-green">
                        <h2>
                            CATEGORIES
                        </h2>
                    </div>
                    <div class="body">
                        @foreach ($favorite_post->categories as $category)
                            <span class="btn bg-light-green waves-effect m-b-15 m-l-10">{{$category->name}}</span>                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="header bg-lime">
                        <h2>
                            TAGS
                        </h2>
                    </div>
                    <div class="body">
                        @foreach ($favorite_post->tags as $tag)
                            <span class="btn bg-lime waves-effect m-b-15 m-l-10">{{$tag->name}}</span>                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                            IMAGES
                        </h2>
                    </div>
                    <div class="body">
                        @foreach ($favorite_post->images as $image)
                            <img style="width:45%;height:45%; margin:2%;" src="{{asset($image->url)}}" alt="{{$image->name}}"/>
                        @endforeach
                    </div>
                </div>
                {{--  <div class="card">
                        <div class="header bg-green">
                            <h2>
                                TAGS
                            </h2>
                            <ul class="header-dropdown m-r-0">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">info_outline</i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">help_outline</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @foreach ($favorite_post->tags as $tag)
                                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                                    <button class="btn bg-green btn-lg btn-block waves-effect" type="button">{{$tag->name}} <span class="badge">{{$tag->posts->count()}}</span></button>
                                </div>
                            @endforeach
                        </div>
                </div>  --}}
            </div>
        </div>
    </div>

</div>
@endsection
@push('js')

    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('backend/plugins/tinymce/tinymce.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script type="text/javascript">
        $(function () {

            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('backend/plugins/tinymce') }}';
        });
    </script>

    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>



@endpush
