@extends('enfold.index')

@section('title','Acceuil')

@push('css')

@endpush

@section('hot-wrapper')
<!-- --------------------------- Hot ---------------------------------------- -->
@include('enfold.componants.hot')
<!-- -------------x------------- Hot --------------------x------------------- -->

@endsection

@section('slider-wrapper')

<!-- --------------------------- Slider ---------------------------------------- -->
@include('enfold.componants.slider')
<!-- -------------x------------- Slider --------------------x------------------- -->
@endsection

@section('tybox-wrapper')

<!-- --------------------------- Tybox ---------------------------------------- -->
@include('enfold.componants.tybox')
<!-- -------------x------------- Tybox --------------------x------------------- -->
@endsection

@section('sidebar')
    @include('enfold.componants.sidebar')
@endsection

@section('content')

<!-- ads-posting -->

<div class="ads-posting" style="margin-bottom: 30px;">

        <div class="demo-box">
          
          <!-- DEMO3 HTML STARTS HERE *-->
          <!-- *********************** -->
            <div class="bn-breaking-news bn-effect-slide-left bn-direction-ltr" id="newsTicker13" style="border-color: rgb(249, 168, 40); color: rgb(249, 168, 40); height: 40px; line-height: 38px; border-radius: 2px; border-width: 1px;">
              <div class="bn-label" style="background: rgb(249, 168, 40) none repeat scroll 0% 0%;">ANNONCES</div>
              <div class="bn-news" style="left: 129px; right: 60px;">
                <ul>
                  <li style="left: 50%; opacity: 0; display: none;"><span class="bn-prefix">Braveheart, 1995 :</span>"They may take our lives, but they'll never take our freedom!"</li>
                  <li style="left: 50%; opacity: 0; display: none;"><span class="bn-prefix">Star Wars Episode VII: The Force Awakens, 2015 :</span>"Chewie, we're home."</li>
                  <li style="left: 50%; opacity: 0; display: none;"><span class="bn-prefix">Pulp Fiction, 1994 :</span>"They call it a Royale with cheese."</li>
                  <li style="left: 50%; opacity: 0; display: none;"><span class="bn-prefix">Jerry Maguire, 1996 :</span>"You complete me."</li>
                  <li style="left: 0px; opacity: 1; display: list-item;"><span class="bn-prefix">The Godfather: Part III, 1990 :</span>"Just when I thought I was out, they pull me back in."</li>
                </ul>
              </div>
              <div class="bn-controls">
                <button><span class="bn-arrow bn-prev"></span></button>
                <button><span class="bn-arrow bn-next"></span></button>
              </div>
            </div>
          <!-- *********************** -->
          <!-- DEMO3 HTML END HERE *** -->

        </div>
  <a name="ad-post-bottom"></a>
</div>


<div class="clearfix"></div>
<div class="featured-posts section" id="featured-posts-1" name="Featured Posts 01">

  <?php $i = 0;
  $taille = $popular_categories->count(); ?>

  @foreach ( $popular_categories as $key=>$popular_category)

  @if($i==0)
  <div class="widget HTML show-widget" data-version="2" id="HTML5">
    <div class="widget-title">
      <h3 class="title">
        {{$popular_category->name}}
      </h3>
      <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
    </div>
    <div class="widget-content">
      <ul class="feat-big date-posts thumb">
        <?php $var = 0; ?>
        @foreach ( $popular_category->posts->slice(0, 5) as $key=>$popular_category_post)

        @if($var==0)

        <li class="feat-item item-big item-0 post-home-image  font">
          <div class="feat-inner">
            <div class="post-thumb tyard-thumb">

              <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                @endforeach
              </a>

            </div>
            <div class="post-info">

              <h2 class="post-title">
                <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a>
              </h2>

              <div class="date-header">
                <div id="meta-post">
                  <i class="fa fa-pencil"></i>
                  <a class="g-profile" href="" rel="author" title="{{$popular_category_post->author->name}}" style="color:#555;">
                    <span itemprop="name">{{$popular_category_post->author->name}}</span></a>
                  <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                  <i class="fa fa-calendar"></i>
                  <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                  <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                  <span class=" post-comment-link">
                    <i class="fa fa-eye"></i>
                    <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                      {{$popular_category_post->view_count}}
                    </a>
                  </span></div>
                <div class="resumo">
                  <p class="post-snippet" style="font-size: 12.8px; color:#555">
                    {{ucfirst(strtolower($popular_category_post->sub_title))}} ...
                  </p>
                </div>
              </div>
            </div>
          </div>
        </li>

        @else

        <li class="feat-item item-small item-{{$var}} post-home-image">
          <div class="post-thumb">

            <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
              @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
              <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
              @endforeach
            </a>

          </div>
          <div class="post-info">
            <h2 class="post-title">

              <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a>

            </h2>
            <div class="post-meta">
              <span class="post-author"> {{$popular_category_post->author->name}} </span>
              <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
            </div>
          </div>
        </li>

        @endif

        <?php $var++; ?>
        @endforeach
      </ul>
    </div>
  </div>
  @elseif($i==1)
  <div class="widget HTML show-widget" data-version="2" id="HTML12">

    <div class="widget-title">
      <h3 class="title">
        {{$popular_category->name}}
      </h3>
      <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
    </div>
    <div class="widget-content">
      <ul class="grid-small thumb">
        <?php $var = 0; ?>
        @foreach ( $popular_category->posts->slice(0, 3) as $key=>$popular_category_post)

        <li class="feat-item item-small item-{{$var}} post-home-image">
          <div class="post-image-wrap post-thumb">
            <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
              @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
              <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
              @endforeach
            </a>
          </div>
          <div class="post-info">

            <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
            <div class="post-meta">
              <span class="post-author"> {{$popular_category_post->author->name}} </span>
              <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
            </div>

          </div>
        </li>

        <?php $var++; ?>
        @endforeach
      </ul>

    </div>
  </div>
  @endif
  <?php $i++; ?>
  @endforeach

  @if($taille >= 4 )

  <div class="featured-posts section" id="featured-posts-1" name="Featured Posts 01">

    <?php $i = 0; ?>

    @foreach ( $popular_categories as $key=>$popular_category)

    @if($i==2)

    <div class="widget HTML col-width show-widget" data-version="2" id="HTML8">
      <div class="widget-title">
        <h3 class="title">
          {{$popular_category->name}}
        </h3>
        <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
      </div>
      <div class="widget-content">
        <ul class="feat-col post-home-image">
          <?php $var = 0; ?>
          @foreach ( $popular_category->posts->slice(0, 3) as $key=>$popular_category_post)
              @if($var==0)

                  <li class="feat-item item-big item-{{$var}} font">
                    <div class="feat-inner">
                      <div class="post-thumb tyard-thumb">
                        <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                          @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                          <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                        </a>
                      </div>

                      <div class="post-info">
                        <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
                        <div class="date-header">
                          <div id="meta-post">
                            <i class="fa fa-pencil"></i>
                            <a class="g-profile" href="" rel="author" title=" {{$popular_category_post->author->name}} " style="color:#555;">
                              <span itemprop="name"> {{$popular_category_post->author->name}} </span>
                            </a>
                            <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                            <i class="fa fa-calendar"></i>
                            <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                            <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                            <span class=" post-comment-link">
                              <i class="fa fa-eye"></i>
                              <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                                {{$popular_category_post->view_count}}
                              </a>
                            </span>
                          </div>
                          <div class="resumo">
                            <p class="post-snippet" style="font-size: 12.8px; color:#555">
                              {{ucfirst(strtolower($popular_category_post->sub_title))}} ...
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

              @else

                  <li class="feat-item item-small item-{{$var}}">
                    <div class="post-thumb">

                      <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                        @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                        <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                        @endforeach
                      </a>

                    </div>

                    <div class="post-info">
                      <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
                      <div class="post-meta">
                        <span class="post-author"> {{$popular_category_post->author->name}} </span>
                        <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </li>

              @endif
              <?php $var ++; ?>
          @endforeach
        </ul>
      </div>
    </div>

    @elseif($i==3)

    <div class="widget HTML col-right col-width show-widget" data-version="2" id="HTML9">
      <div class="widget-title">
        <h3 class="title">
          {{$popular_category->name}}
        </h3>
        <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
      </div>
      <div class="widget-content">
      <ul class="feat-col post-home-image">
          <?php $var = 0; ?>
          @foreach ( $popular_category->posts->slice(0, 3) as $key=>$popular_category_post)
              @if($var==0)

                  <li class="feat-item item-big item-{{$var}} font-right">
                    <div class="feat-inner">
                      <div class="post-thumb tyard-thumb">
                        <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                          @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                          <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                        </a>
                      </div>

                      <div class="post-info">
                        <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
                        <div class="date-header">
                          <div id="meta-post">
                            <i class="fa fa-pencil"></i>
                            <a class="g-profile" href="" rel="author" title=" {{$popular_category_post->author->name}} " style="color:#555;">
                              <span itemprop="name"> {{$popular_category_post->author->name}} </span>
                            </a>
                            <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                            <i class="fa fa-calendar"></i>
                            <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                            <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                            <span class=" post-comment-link">
                              <i class="fa fa-eye"></i>
                              <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                                {{$popular_category_post->view_count}}
                              </a>
                            </span>
                          </div>
                          <div class="resumo">
                            <p class="post-snippet" style="font-size: 12.8px; color:#555">
                              {{ucfirst(strtolower($popular_category_post->sub_title))}} ...
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

              @else

                  <li class="feat-item item-small item-{{$var}}">
                    <div class="post-thumb">

                      <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                        @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                        <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                        @endforeach
                      </a>

                    </div>

                    <div class="post-info">
                      <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
                      <div class="post-meta">
                        <span class="post-author"> {{$popular_category_post->author->name}} </span>
                        <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </li>

              @endif
              <?php $var ++; ?>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- ads-posting -->
    <div class="clearfix"></div>
    <div class="ads-posting" style="margin-bottom: 30px;">
      <span>
        <span>
          <div class="lalulintas">
            <span class="rambuhijau">Responsive Ads Here</span>
          </div>
          <style type="text/css">
            .lalulintas {
              width: 100%;
              height: 100px;
              background: #ccc;
              margin: 0 auto;
              position: relative;
            }

            .rambuhijau {
              background: #fff;
              position: absolute;
              display: block;
              color: #cc0a0a;
              text-align: center;
              text-transform: uppercase;
              letter-spacing: 2px;
              font-size: 180%;
              padding: 10px;
              margin: 5px;
              left: 0;
              right: 0;
              top: 0;
              bottom: 0;
              font-weight: 700;
              line-height: 4.4rem;
            }

            @media only screen and (max-width: 768px) {
              .rambuhijau {
                font-size: 100%;
              }
            }
          </style>
        </span></span>
      <a name="ad-post-bottom"></a>
    </div>

    @endif

    <?php $i++; ?>

    @endforeach

  </div>

  @endif

  <div class="clearfix"> </div>
  <div class="featured-posts section" id="featured-posts-2" name="Featured Posts 02">

    <?php $i = 0; ?>

    @foreach ( $popular_categories as $key=>$popular_category)

    @if($i==4 || $taille < 4 && $i!=0 && $i!=1 && $i!=5) <div class="widget HTML show-widget" data-version="2" id="HTML12">
      <div class="widget-title">
        <h3 class="title">
          {{$popular_category->name}}
        </h3>
        <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
      </div>
      <div class="widget-content">

        <ul class="grid-small thumb">

          <?php $var = 0; ?>
          @foreach ( $popular_category->posts->slice(0, 6) as $key=>$popular_category_post)

          <li class="feat-item item-small item-{{$var}} post-home-image">
            <div class="post-image-wrap post-thumb">
              <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                @endforeach
              </a>
            </div>
            <div class="post-info">

              <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>
              <div class="post-meta">
                <span class="post-author"> {{$popular_category_post->author->name}} </span>
                <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
              </div>

            </div>
          </li>

          <?php $var++; ?>
          @endforeach
        </ul>
      </div>
  </div>

  @elseif($i==5 || $taille < 4 && $i!=0 && $i!=1 && $i!=4) <div class="clearfix">
</div>
<div class="featured-posts section" id="featured-posts-2" name="Featured Posts 02">
  <div class="clearfix"></div>
  <div class="widget HTML show-widget" data-version="2" id="HTML11">
    <div class="widget-title">
      <h3 class="title">
        {{$popular_category->name}}
      </h3>
      <a class="view-all" href="{{route('show.category.posts',"search&index=".$popular_category->id."&query=".$popular_category->slug)}}">Voir tout</a>
    </div>
    <div class="widget-content">
      <ul class="grid-big item">
        <style type="text/css">
          .item .feat-inner {
            margin-bottom: 30px;
          }
        </style>

        <?php $var = 0;
        $font = "font" ?>
        @foreach ( $popular_category->posts->slice(0, 6) as $key=>$popular_category_post)

        <li class="feat-item item-big item-{{$var}} post-home-image {{$font}}">
          <div class="feat-inner">
            <div class="post-thumb tyard-thumb">
              <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                <img class="post-thumb" alt="{{ucfirst(strtolower($popular_category_post->title))}} " title="{{ucfirst(strtolower($popular_category_post->title))}} " src="{{asset($image->url)}}">
                @endforeach
              </a>
            </div>
            <div class="post-info">

              <h2 class="post-title"> <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a> </h2>

              <div class="date-header">
                <div id="meta-post">
                  <i class="fa fa-pencil"></i>
                  <a class="g-profile" href="" rel="author" title=" {{$popular_category_post->author->name}} " style="color:#555;">
                    <span itemprop="name"> {{$popular_category_post->author->name}} </span>
                  </a>
                  <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                  <i class="fa fa-calendar"></i>
                  <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                  <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                  <span class=" post-comment-link">
                    <i class="fa fa-eye"></i>
                    <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                      {{$popular_category_post->view_count}}
                    </a>
                  </span>
                </div>
                <div class="resumo">
                  <p class="post-snippet" style="font-size: 12.8px; color:#555">
                    {{ucfirst(strtolower($popular_category_post->title))}} ...
                  </p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <?php if ($var == 0) {
          $var = 1;
          $font = "font-right";
        } else {
          $var = 0;
          $font = "font";
        }

        ?>


        @endforeach
      </ul>
    </div>
  </div>
</div>

@endif
<?php $i++; ?>

@endforeach

</div>

</div>

<div class="clearfix"></div>

<div class="main section" id="main" name="Main Posts">

  <div class="widget Blog" data-version="2" id="Blog1">

    <div class="featured-posts section" id="featured-posts-1" name="Featured Posts 01">

      <div class="widget HTML show-widget" data-version="2" id="HTML10">

        <div class="widget-title">
          <h3 class="title">
            Article
          </h3>
          <a class="view-all" href="{{route('show.all.posts')}}">Voir tout</a>
        </div>

        <div class="widget-content">
          <ul class="feat-list post-home-image">
            <?php $i = 0; ?>
            @foreach ( $posts as $key=>$post)

              @if($i==0)

                <li class="feat-item item-0 ">
                  <div class="feat-inner">
                    <div class="post-thumb">

                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                        @foreach ( $post->images->slice(0, 1) as $key=>$image)
                        <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}}" title="{{ucfirst(strtolower($post->title))}}" src="{{asset($image->url)}}">
                        @endforeach
                      </a>

                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                      <span class="post-tag">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach

                    </div>
                    <div class="post-info">

                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>

                      <div class="date-header">
                        <div id="meta-post">
                          <i class="fa fa-pencil"></i>
                          <a class="g-profile" href="" rel="author" title="{{$post->author->name}}" style="color:#555;">
                            <span itemprop="name">{{$post->author->name}}</span>
                          </a>
                          <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <i class="fa fa-calendar"></i>
                          <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                          <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <span class=" post-comment-link">
                            <i class="fa fa-eye"></i>
                            <a class="comment-bubble" style="color: #555;" href="#" onclick=""> {{$post->view_count}} </a>
                          </span>
                        </div>
                        <div class="resumo">
                          <span> {{ucfirst(strtolower($post->sub_title))}} ...</span>
                        </div>
                        <div style="clear: both;"></div>
                        <a class="read-more anchor-hover" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">Lire plus</a>
                      </div>
                    </div>
                  </div>
                </li>

              @else

                <li class="feat-item item-1 ">
                  <div class="feat-inner">
                    <div class="post-thumb">

                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                        @foreach ( $post->images->slice(0, 1) as $key=>$image)
                        <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}}" title="{{ucfirst(strtolower($post->title))}}" src="{{asset($image->url)}}">
                        @endforeach
                      </a>

                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                      <span class="post-tag">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach

                    </div>
                    <div class="post-info">

                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>

                      <div class="date-header">
                        <div id="meta-post">
                          <i class="fa fa-pencil"></i>
                          <a class="g-profile" href="" rel="author" title="{{$post->author->name}}" style="color:#555;">
                            <span itemprop="name">{{$post->author->name}}</span>
                          </a>
                          <i aria-hidden="true" class="fa  fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <i class="fa fa-calendar"></i>
                          <abbr class="published timeago" title="December 05, 2015" style="color:#555;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                          <i aria-hidden="true" class="fa fa-ellipsis-h" style="font-size: 8px;margin: 0 5px;"></i>
                          <span class=" post-comment-link">
                            <i class="fa fa-eye"></i>
                            <a class="comment-bubble" style="color: #555;" href="#" onclick=""> {{$post->view_count}} </a>
                          </span>
                        </div>
                        <div class="resumo">
                          <span> {{ucfirst(strtolower($post->sub_title))}} ...
                          </span>
                        </div>
                        <div style="clear: both;"></div>
                        <a class="read-more anchor-hover" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">Lire plus</a>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              <?php $i++; ?>
            @endforeach

                @if($posts->count()==0)
                  <p style="text-align: center;line-height: 10px; font-size:17px; font-weight:bold; color:#9999;text-transform: uppercase;">Aucun article</p>
                @endif
          </ul>
        </div>
      </div>

    </div>


    <div class="blog-pager container" id="blog-pager">
      <a class="blog-pager-older-link" href="#" id="Blog1_blog-pager-older-link" title="Older Posts">
        Older Posts
      </a>
    </div>
    <!-- <script type="text/javascript">
                var messages = {
                  viewAll: "Voir tout",
                };
              </script> -->
  </div>
</div>

@endsection

@section('sidebar')
    @include('enfold.componants.sidebar')
@endsection