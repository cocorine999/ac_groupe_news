@extends('enfold.index')

@section('title','Searching '.$query)

@push('css')

@endpush

@section('sidebar')
    @include('enfold.componants.sidebar')
@endsection

@section('content')

<div class="main section" id="main" name="Main Posts">

  <div class="widget Blog" data-version="2" id="Blog1">

    <div class="featured-posts section" id="featured-posts-1" name="Featured Posts 01">

      <div class="widget HTML show-widget" data-version="2" id="HTML10">

        <div class="widget-title">
          <h3 class="title">
            Recherche {{$query}}
          </h3>
          <a class="view-all" href="{{route('home')}}">Retour</a>
        </div>

        <div class="widget-content">
          <ul class="feat-list post-home-image undo">
            <?php $var = 0; ?>
              @foreach ( $posts as $cle=>$post)
                <li class="feat-item item-{{$var}} ">
                  <div class="feat-inner">
                    <div class="post-thumb">
                      <a class="post-image-link related-thumb" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                        @foreach ( $post->images->slice(0, 1) as $key=>$image)
                          <img class="post-thumb" alt="{{$image->name}}" title="{{$image->name}}" src="{{asset($image->url)}}">
                        @endforeach
                      </a>
                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                        <span class="post-tag">{{ucfirst(strtolower($category->name))}}</span>
                      @endforeach
                    </div>
                    <div class="post-info">

                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ucfirst(strtolower($post->title))}} </a>
                      </h2>

                      <div class="date-header">
                        <div id="meta-post">
                          <i class="fa fa-pencil"></i>
                          <a class="g-profile" href="" rel="author" title="{{$post->author->name}}" style="color:#555;">
                            <span itemprop="name">{{$post->author->name}} </span></a>
                          <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <i class="fa fa-calendar"></i>
                          <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </abbr><i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <span class=" post-comment-link">
                            <i class="fa fa-eye"></i>
                            <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                            {{$post->view_count}}
                            </a>
                          </span></div>
                        <div class="resumo">
                          <span>{{$post->sub_title}} ...</span>
                        </div>
                        <div style="clear: both;"></div>
                        <a class="read-more anchor-hover" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">Lire plus</a>
                      </div>

                    </div>
                  </div>
                </li>
                <?php $var = 1; ?>
              @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>

  @if($posts->count()==0)
    <p style="line-height: 250px; text-align: center; font-size:30px; font-weight:bold; color:#1111;text-transform: uppercase;">Aucun résultats trouvé</p>
  @else
    <div class="blog-pager container" id="blog-pager">
      
    </div>
  @endif
</div>
@endsection

@push('js')


@endpush