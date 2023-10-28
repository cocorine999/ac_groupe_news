@extends('enfold.backend.app')

@section('title','Création d\'un article')
@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">

    <div class="block-header">
        <h2>ARTICLES</h2>
    </div>
    <div class="body">

        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row clearfix">
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CRÉER UN ARTICLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            <label for="title">Titre</label>
                            <div class="form-group">
                                <div class="form-line col-">
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Tapez le titre du  post">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="sub_title">Description</label>
                            <div class="form-group">
                                <div class="form-line col-">
                                    <textarea required rows="1" , cols="54" id="sub_title" name="sub_title" style="resize:none, " class="form-control @error('sub_title') is-invalid @enderror" value="{{old('sub_title')}}" placeholder="Expliquez en quelsque mots de quoi l'article parle ..."></textarea>
                                    @error('sub_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="image">Images</label>
                            <div class="form-group">
                                <div class="form-line col-">
                                    <input type="file" id="images" class="form-control @error('images') is-invalid @enderror" name="images[]" value="{{ old('images') }}" required multiple>
                                </div>
                                <br />
                                @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }} onclick="verified()">
                                <label for="status">Publié</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CATEGORIES & TAGS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            <label for="title">Select Categories</label>
                            <div class="form-group form-float">
                                <div class="form-line col- {{ $errors->has('categories') ? 'focused error':''}}">
                                    <select name="categories[]" id="category" class="form-control show-tick" data-show-subtext="true" data-live-search="true" multiple required>
                                        @foreach ($categories as $category)
                                        <option data-subtext="{{$category->slug}}" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <label for="title">Select Tags</label>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('tags') ? 'focused error':''}} col-">
                                    <select name="tags[]" id="tag" class="form-control show-tick" required data-show-subtext="true" data-live-search="true" multiple>
                                        @foreach ($tags as $tag)
                                        <option data-subtext="{{$tag->slug}}" value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if (Auth::user()->role_id==3)
                            <div class="form-group">
                                <input type="checkbox" id="is_approved" name="is_approved" value="1" {{ old('is_approved') ? 'checked' : '' }} disabled="true">
                                <label for="is_approved">Approuvé</label>
                            </div>
                            @endif
                            

                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-danger m-t-15 m-r-10 waves-effet"> <i class="material-icons">keyboard_backspace</i> <span> RETOUR </span></a>

                                    <button type="submit" class="btn btn-success m-t-15 waves-effect">CRÉER <i class="material-icons">save</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Contenu
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            @error('description')
                            <span style="color: red" class="invalid-feedback" role="alert">
                                <strong>Entrer le contenu de l'article</strong>
                            </span>
                            @enderror
                            <br />
                            <textarea id="tinymce" name="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
@push('js')

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>

<!-- TinyMCE -->
<script src="{{ asset('backend/plugins/tinymce/tinymce.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<script type="text/javascript">
    $(function() {

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
        tinyMCE.baseURL = '{{ asset('
            backend / plugins / tinymce ') }}';
    });
</script>


<script type="text/javascript">
    function verified(){

        var status = $("input[type='checkbox'][id='status']");
        var is_approved = $("input[type='checkbox'][id='is_approved']");

        status.on('change',function(){
            if(status.is(':checked')){
                is_approved.attr('disabled', false);
            }else{
                is_approved.attr('disabled', true);
            }
        });
    }
</script>
<script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush