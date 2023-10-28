@extends('enfold.index')

@section('title', ucfirst(strtolower($post->title)))

@push('css')

<style type="text/css">
    #form1 {
        display: none;
    }
    #replied {
        display: none;
    }
</style>

<style>

</style>
@endpush


@section('content')
<div class="main section" id="main" name="Main Posts">
    <div class="widget Blog" data-version="2" id="Blog1">
        <div class="blog-posts hfeed container item-post-wrap">
            <div class="blog-post hentry item-post">

                <div class="breadcrumbs" xmlns:v="#">
                    <span typeof="v:Breadcrumb">
                        <a class="bhome" href="{{route('home')}}" property="v:title" rel="v:url">Home</a>
                    </span>
                    @foreach ( $post->categories as $key=>$category)
                    <i class="fa fa-times"></i>
                    <span typeof="v:Breadcrumb">
                        <a href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->name)}}" property="v:title" rel="v:url">{{ ucfirst(strtolower($category->name)) }}</a>
                    </span>
                    @endforeach
                    <i class="fa fa-times"></i>
                    <span>{{ucfirst(strtolower($post->title))}}</span>
                </div>

                <h1 class="post-title" style="border-bottom: 2px solid #555; padding: 0px 1px 7px;">
                    {{ucfirst(strtolower($post->title))}}
                </h1>
                <div class="post-meta postheader" style=" border-bottom:0px; padding: 10px 1px 0px;">
                    <span class="post-author"><a href="#" target="_blank" title="{{$post->author->name}} ">{{$post->author->name}} </a></span>
                    <span class="post-timestamp">
                        <i class="fa fa-calendar"></i>
                        <meta content="#" itemprop="url">
                        <a class="timestamp-link" href="#" rel="bookmark" title="permanent link">
                            <abbr class="published timeago" itemprop="datePublished" title="December 05, 2015"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </abbr>
                        </a>
                    </span>
                    <span class="label-head">
                        <i class="fa fa-folder-o"></i>
                        @foreach ( $post->categories as $key=>$category)
                        <span typeof="v:Breadcrumb">
                            <a href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->name)}}" rel="tag" style="font-size:13px; font-weight:bolder;">{{ ucfirst(strtolower($category->name)) }}, </a>
                        </span>
                        @endforeach
                    </span>
                </div>

                <!-- ads-posting -->

                <div class="widget HTML FollowByEmail" data-version="2" id="HTML7 FollowByEmail1">
                
                    <div class="widget-content " style="margin: 20px 0; background-color:#fff; " >
                        
                        <span style="float:left; width:30%;"> 
                            <img src="{{ asset('enfold/images/enfold.png') }}" alt="ENFOLD" style="width:25%;height:25%;" />
                            
                            <p><a href="{{route('home')}}"> Suivez les Dernières actualités du monde sur enfold</a></p>
                        </span>
                        <span style="float:right;width:70%;">
                            <img src="{{ asset('enfold/images/hipster-865295_960_720.jpg') }}" alt="header ads" style="width:100%;height:100%;">
                        </span>
                        
                    </div>
                </div>

                <div class="post-body post-content">
                    @foreach ( $post->images->slice(0, 1) as $key=>$image)
                    <img class="post-thumb" alt="{{$image->name}}" title="{{$image->name}}" src="{{asset($image->url)}}" border="0">
                    <br>
                    @endforeach

                    <div><br></div>
                    <div>{{$post->title}}.<br><br>
                        <blockquote class="tr_bq">{{$post->sub_title}}.</blockquote><br>

                        <div><br>{!!$post->description !!} </div>

                    </div>
                </div>

                <div class="post-footer">

                    <div class="tag">
                        <span class="label-head">
                            <span class="label-title">Tags</span>
                            @foreach ( $post->tags as $key=>$tag)
                            <a href="{{route('show.tag.posts',"search&index=".$tag->id."&query=".$tag->name)}}" rel="tag"># {{$tag->name}}</a>
                            @endforeach
                        </span>
                    </div>

                    <!-- <div style="margin-bottom:20px; display:block; border-bottom: 2px solid #ccc; border-top: 2px solid #ccc; padding: 20px 1px 20px;"> -->

                    <div id="meta-post" class=" meta-ok" style="margin-bottom:2%; border-bottom: 2px solid #1111; border-top: 2px solid #1111;  padding: 3% 4% 3%; ">


                        @guest
                        <a class="g-profile" rel="author" title=" MD.Blogger " style="color:#333;" href="javascript:void(0);" onclick="document.getElementById('like-form-{{$post->id}}').submit();">
                            <span itemprop="name">
                                @if($post->favorite_to_users()->count()!=0)

                                <i class="fa fa-heart-o" style="color:#cc0a0a;"></i>
                                {{ $post->favorite_to_users()->count() }}

                                @else
                                <i class="fa fa-heart-o" style="color:#333;"></i>
                                {{ $post->favorite_to_users()->count() }}

                                @endif
                            </span>
                        </a>
                        @else
                        <a class="g-profile {{!Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()==0 ? 'favorite_posts' : ''}}" rel="author" title=" MD.Blogger " style="color:#333;" href="javascript:void(0);" onclick="document.getElementById('like-form-{{$post->id}}').submit();">

                            <span itemprop="name">

                                @if(Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()!=0)
                                <i class="fa fa-heart" style="color:#cc0a0a;"></i>
                                @else
                                <i class="fa fa-heart-o" style="color:#cc0a0a;"></i>
                                @endif
                                {{ $post->favorite_to_users()->count() }}
                            </span>
                        </a>
                        @endguest

                        <form id="like-form-{{$post->id}}" style="display: none;" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display:none;">
                            @csrf
                            @method('POST')
                        </form>

                        <i aria-hidden="true" class="fa fa-ellipsis" style="font-size: 8px;margin: 0 5px;"></i>
                        <i class="fa fa-comments-o"></i>{{ $post->commentaires()->count() }}
                        <i aria-hidden="true" class="fa fa-ellipsis" style="font-size: 8px;margin: 0 5px;"></i>
                        <span class=" post-comment-link">
                            <i class="fa fa-eye"></i>
                            <a class="comment-bubble" style="color: #555;" href="#" onclick="">
                                {{$post->view_count}}
                            </a>
                        </span>

                        <!-- //style="width:7%; margin-right:4px;" -->
                        <ul class="social-counter social social-color ok" style="float:right;list-style:none ;margin-top:-7px;">
                            <style type="text/css">
                                .social-color .ok li a {
                                    background-color: #fff;
                                    color: black;
                                    border: 1px solid #eaeaea;
                                }

                                .social-counter .ok li a:hover {
                                    color: #cc0a0a;

                                    border: 1.5px solid #111;
                                }

                                @media screen and (max-width: 625px) {

                                    .meta-ok ul {
                                        float: none !important;
                                        
                                    }

                                    .meta-ok {
                                        margin-bottom: 4% !important;
                                        padding-bottom: 8% !important;
                                    }

                                    .social .ok {
                                        margin-top: 6%;
                                    }

                                }

                                @media screen and (max-width: 544px) {

                                    .meta-ok ul {
                                        padding-bottom: 0% !important;
                                    }

                                }

                                @media screen and (max-width: 530px) {

                                    .meta-ok ul {
                                        padding-bottom: 2.7% !important;
                                    }

                                }

                                @media screen and (max-width: 500px) {

                                    .meta-ok ul {
                                        padding-bottom: 2.7% !important;
                                    }

                                }

                                @media screen and (max-width: 440px) {

                                    .meta-ok ul {
                                        padding-bottom: 6% !important;
                                    }

                                }

                                @media screen and (max-width: 360px) {

                                    .meta-ok ul {
                                        padding-bottom: 6% !important;
                                    }

                                }

                                @media screen and (max-width: 340px) {

                                    .meta-ok ul {
                                        padding-bottom: 8% !important;
                                    }

                                }
                            </style>
                            <div class="ok">
                                <li style="width:80px;margin-top:8px; font-weight:bold;">Partager :</li>
                                <li class="facebook" style="margin-right:4px;">
                                    <a href="#" target="_blank" title="facebook"></a>
                                </li>
                                <li class="twitter" style="margin-right:4px;">
                                    <a href="#" target="_blank" title="twitter"></a>
                                </li>
                                <li class="pinterest" style="margin-right:4px;">
                                    <a href="#" target="_blank" title="pinterest"></a>
                                </li>
                                <li class="linkedin" style="margin-right:4px;">
                                    <a href="#" target="_blank" title="linkedin"></a>
                                </li>
                                <li class="email" style="margin-right:4px;">
                                    <a href="#" target="_blank" title="email"></a>
                                </li>

                            </div>
                        </ul>

                    </div>


                <div class="widget HTML FollowByEmail" data-version="2" id="HTML7 FollowByEmail1">
                
                    <div class="widget-content " style="margin: 0; background-color:#fff; " >

                        <section class="main" >
                            <div class="container" id="carouselContainer">
                                
                                <div class="content-carousel" id="carousel">
                                    <div class="content">
                                        <img src="{{asset('enfold/images/photographer-1150052_960_720.jpg')}}">
                                    </div>
                                    <div class="content">
                                        <img src="{{asset('enfold/images/woman-1150067_960_720.jpg')}}">
                                    </div>
                                    <div class="content">
                                        <img src="{{asset('enfold/images/hipster-865295_960_720.jpg')}}">
                                    </div>
                                </div>
                                
                            </div>
                        </section>
                        
                    </div>
                </div>

                    @if ($post->images->count() > 1)
                    <div id="related-wrap" style="margin-bottom:-20px;margin-top:30px">
                        <div class="title-wrap">
                            <h3>Featured posts</h3>
                        </div>
                        <div class="related-ready">
                            <ul class="related-posts">
                                @foreach ( $post->images->slice(1,$post->images->count()) as $image)
                                <li class="related-item item-0" style="padding-bottom:3%;">
                                    <div class="post-image-wrap">
                                        <a class="post-image-link" href="">
                                            <img src="{{ asset($image->url) }}" alt="{{$image->name}}" title="{{$image->name}}" class="img post-thumb">
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <ul class="post-nav">

                        <li class="post-next">
                            <a class="next-post-link" href="#" id="Blog1_blog-pager-newer-link" rel="next">
                                <div class="post-nav-inner"><span>Newer</span>
                                    <p>
                                        Old books stacked on top of a ladder
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="post-prev">
                            <a class="prev-post-link" href="#" id="Blog1_blog-pager-older-link" rel="previous">
                                <div class="post-nav-inner"><span>Older</span>
                                    <p>
                                        Cars waiting pedestrians cross the street
                                    </p>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <div class="about-author">
                        <div class="avatar-container">
                            <img alt="{{$post->author->name}}" class="author-avatar" src="{{ asset($post->author->image) }} ">
                        </div>
                        <h3 class="author-name">
                            <span>Posted by:</span><a alt="{{$post->author->name}}" href="#" target="_blank">
                                {{$post->author->name}}</a>
                        </h3>
                        <span class="author-description">{{$post->author->name}} {{$post->author->about}}. </span>
                        <span style="text-align:center;">

                            <ul class="social-counter social social-color social-text" style="margin-top: 10px;">
                                <li class="facebook" style="margin-right: 5px;">
                                    <a href="#" target="_blank" title="facebook"></a>
                                </li>
                                <li class="twitter" style="margin-right: 5px;">
                                    <a href="#" target="_blank" title="twitter"></a>
                                </li>
                                <li class="linkedin" style="margin-right: 5px;">
                                    <a href="#" target="_blank" title="linkedin"></a>
                                </li>
                                <li class="instagram" style="margin-right: 5px;">
                                    <a href="#" target="_blank" title="instagram"></a>
                                </li>
                                <li class="email" style="margin-right: 5px;">
                                    <a href="#" target="_blank" title="email"></a>
                                </li>
                            </ul>
                        
                        </span>
                    </div>

                    <div id="related-wrap" style="margin-top: 30px;">
                        <div class="title-wrap">
                            <h3>You may like these posts</h3>
                        </div>

                        <div class="related">
                            @if($like_posts->count()!=0)
                                
                                @foreach ( $like_posts as $key=>$like_post)
                                    
                                    <li>
                                        <div class="related-thumb">
                                            <div class="yard-label">
                                                
                                                    @foreach ( $like_post->categories->slice(0, 1) as $key=>$category)
                                                        <a class="icon Beauty" href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->name)}}">{{ucfirst($category->name)}}</a>
                                                    @endforeach 
                                               
                                            </div>
                                            
                                            @foreach ( $like_post->images->slice(0, 1) as $key=>$image)
                                            <?php $img = $image ?>
                                            @endforeach
                                            <a class="related-img" href="{{route('show.post',"search&index=".$like_post->id."&query=".$like_post->slug)}}" style="background:url({{asset($img->url ?? '')}}) no-repeat center center;background-size: cover"></a>
                                        </div>
                                        <h3 class="related-title"><a href="{{route('show.post',"search&index=".$like_post->id."&query=".$like_post->slug)}}" style="padding: 10px 0 0px 0px;">{{ucfirst($like_post->title)}} </a></h3>

                                        <div class="post-meta" style="border-bottom: 0px;">
                                            <span class="post-author"> {{$like_post->author->name}} </span>
                                            <span class="post-date published" datetime="2016-03-17T00:34:00-07:00"> {{$like_post->created_at->isoFormat('MMMM d, YYYY')}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="blog-post-comments comments-system-blogger" style="display: block;">
                <div class="title-wrap comments-title">
                    <h3>Post a Comment</h3>
                </div>
                <section class="comments threaded" data-embed="true" data-num-comments="4" id="comments">
                    <a name="comments"></a>
                    <div class="comments-content">
                        <div id="comment-holder">
                            <div class="comment-thread toplevel-thread">

                                <h3 class="title">{{$post->commentaires->count()}} Commentaires</h3>
                                @if(Auth::user())
                                <div class="comment" style="padding-bottom: 0px;">
                                    <div class="comment-replybox-thread" id="top-ce" style="border-bottom:1px solid #eaeaea;margin-bottom: 2.5%;padding-bottom: 1%;">
                                        <div class="avatar-image-container" style="border-radius:50%; height: 48px;max-height: 48px; width: 48px; max-width: 48px; margin-top: 2.2%;">
                                            <img src="{{asset(Auth::user()->image)}}" alt="" style="height: 48px;max-height: 48px; width: 48px; max-width: 48px;">
                                        </div>
                                        <div class="comment-block" style="padding-bottom: 0px; ">
                                            <div class="comment-header" style="margin-top: -1%; padding-top: 1%;border-bottom:none;">

                                                <form action="{{route('add_comment')}}" method="POST">
                                                    @csrf
                                                    <cite class="user" style="text-transform: none;">
                                                        <a href="" rel="nofollow">{{strtolower(Auth::user()->email)}}</a>
                                                        <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">

                                                    </cite>

                                                    <span class=" secondary-text">
                                                        <textarea cols="94" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none;margin-top:1.6%; padding:0.5% 2% 0% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                    </span>
                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="comment-replybox-thread" id="top-ce">
                                    <div class="comment-block">
                                        <div class="comment-header" style="margin-top: -1%; padding-top: 1%;border-bottom:none;">

                                            <form action="{{route('add_comment')}}" method="POST">
                                                @csrf
                                                <cite class="user" style="text-transform: none;">

                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Saisissez votre nom et prenom" required autocomplete="name" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%; margin-right:6%;">

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%;">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </cite>

                                                <span class=" secondary-text">
                                                    <textarea cols="60" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none; border-bottom:1px solid #eaeaea; margin-top:2%; padding:2% 2% 2% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                </span>
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">


                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($post->commentaires->count()!=0)
                                <ol id="top-ra">
                                    @foreach($post->commentaires()->where('commentaire_id',null)->orderBy('created_at','desc')->get() as $commentaire)
                                    <li class="comment" id="c3238237750416603049" style="border-bottom:1px solid #eaeaea;margin-bottom: 2.5%;/* padding-bottom: 3%; */">
                                        <div class="avatar-image-container" style="border-radius: 50%;">
                                            @if($commentaire->user)
                                            <img src="{{asset($commentaire->user->image)}}" alt="ghjj" title="{{$commentaire->user->name}}">
                                            @else
                                            <img src="" alt="{{substr($commentaire->name,0,1)}}" style="padding-top: 36%; vertical-align: middle;">
                                            @endif
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-header" style="border-bottom:none;">
                                                <div class="post-meta" style="text-transform:none;">
                                                    <span class="post-author" style="font-size:12px;  font-weight: 700; color:#111111">{{ucfirst(strtolower($commentaire->name))}} </span>
                                                    <span class="post-date published" style="font-size:11px;color:#aaa;text-transform:none;" datetime="2016-03-17T00:34:00-07:00">{{$commentaire->created_at->diffForHumans()}}</span>

                                                    <style type="text/css">
                                                        .comment-header .post-meta .post-author:before {
                                                            content: none;
                                                        }

                                                        .comments .avatar-image-container {
                                                            background-color: #3b5999;
                                                            ;
                                                            color: #fff !important;
                                                            font-size: 16.5px;
                                                            font-weight: bold;
                                                            text-align: center;
                                                            text-transform: uppercase;
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                            <p class="comment-content">{{ucfirst(strtolower($commentaire->commentaire))}}</p>
                                            <span class="comment-actions">
                                                <a class="comment-reply" target="_self" href="#" id="formButton">Reply</a>
                                                @if(Auth::user() && Auth::id()==$commentaire->user_id)
                                                <a href="" target="_self" onclick="event.preventDefault(); document.getElementById('delete-comment').submit();">Delete</a>
                                                <form id="delete-comment" action="{{ route('delete_comment',$commentaire->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endif

                                                <?php $reply_count=$commentaire->reply_commentaires->count();?>
                                                @if($reply_count!=0)
                                                    @if($reply_count==1)
                                                        <h5 class="title" id="repliedComments" style="border:none; color:#00acee;"> {{$reply_count}} Reponse</h5>
                                                    @else
                                                        <h5 class="title" id="repliedComments" style="border:none; color:#00acee;">{{$reply_count}} Reponses</h5>
                                                    @endif
                                                    <div style="padding-top: 10px;" id="replied">
                                                        @if(Auth::user())
                                                            <div class="comment" style="padding-bottom: 0px;">
                                                                <div class="comment-replybox-thread" id="top-ce" style="border-bottom:1px solid #eaeaea;margin-bottom: 2.5%;padding-bottom: 1%;">
                                                                    <div class="avatar-image-container" style="border-radius:50%; height: 48px;max-height: 48px; width: 48px; max-width: 48px; margin-top: 2.2%;">
                                                                        <img src="{{asset(Auth::user()->image)}}" alt="" style="height: 48px;max-height: 48px; width: 48px; max-width: 48px;">
                                                                    </div>
                                                                    <div class="comment-block" style="padding-bottom: 0px; ">
                                                                        <div class="comment-header" style="margin-top: -1%; padding-top: 1%;border-bottom:none;">

                                                                            <form action="{{route('add_comment')}}" method="POST">
                                                                                @csrf
                                                                                <cite class="user" style="text-transform: none;">
                                                                                    <a href="" rel="nofollow">{{strtolower(Auth::user()->email)}}</a>
                                                                                    <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">

                                                                                </cite>

                                                                                <span class=" secondary-text">
                                                                                    <textarea cols="94" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none;margin-top:1.6%; padding:0.5% 2% 0% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                                                </span>
                                                                                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                                                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                                <input type="hidden" name="commentaire_id" value="{{$commentaire->id}}">
                                                                                <input type="hidden" name="deepth" value="{{$commentaire->deepth+1}}">
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="comment-replybox-thread" id="top-ce">
                                                                <div class="comment-block">
                                                                    <div class="comment-header" style="margin-top: -1%; padding-top: 1%;border-bottom:none;">

                                                                        <form action="{{route('add_comment')}}" method="POST">
                                                                            @csrf
                                                                            <cite class="user" style="text-transform: none;">

                                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Saisissez votre nom et prenom" required autocomplete="name" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%; margin-right:6%;">

                                                                                @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror

                                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%;">

                                                                                @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </cite>

                                                                            <span class=" secondary-text">
                                                                                <textarea cols="60" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none; border-bottom:1px solid #eaeaea; margin-top:2%; padding:2% 2% 2% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                                            </span>
                                                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                            <input type="hidden" name="commentaire_id" value="{{$commentaire->id}}">
                                                                            <input type="hidden" name="deepth" value="{{$commentaire->deepth+1}}">
                                                                            <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">


                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <ol id="top-ra">
                                                            <?php 
                                                                $reply_commentaires=collect();

                                                                foreach ($commentaire->reply_commentaires as $key => $reply_commentaire) {
                                                                    $reply_commentaires=$reply_commentaires->push($reply_commentaire);
                                                                    
                                                                    $replies=$reply_commentaire->reply_commentaires;
                                                                    
                                                                    if ($replies) {
                                                                        foreach ($replies as $key => $replied) {
                                                                            $reply_commentaires=$reply_commentaires->push($replied);
                                                                        }
                                                                    }
                                                                }
                                                                
                                                            ?>
                                                            @foreach($reply_commentaires->sortBy('created_at') as $reply_commentaire)
                                                            
                                                                <li class="comment" id="c3238237750416603049" style="border-bottom:1px solid #eaeaea;margin-bottom: 2.5%;/* padding-bottom: 3%; */">
                                                                    <div class="avatar-image-container" style="border-radius: 50%;">
                                                                        @if($reply_commentaire->user)
                                                                        <img src="{{asset($reply_commentaire->user->image)}}" alt="ghjj" title="{{$reply_commentaire->user->name}}">
                                                                        @else
                                                                        <img src="" alt="{{substr($reply_commentaire->name,0,1)}}" style="padding-top: 36%; vertical-align: middle;">
                                                                        @endif
                                                                    </div>
                                                                    <div class="comment-block">
                                                                        <div class="comment-header" style="border-bottom:none;">
                                                                            <div class="post-meta" style="text-transform:none;">
                                                                                <span class="post-author" style="font-size:12px;  font-weight: 700; color:#111111">{{ucfirst(strtolower($reply_commentaire->name))}} </span>
                                                                                <span class="post-date published" style="font-size:11px;color:#aaa;text-transform:none;" datetime="2016-03-17T00:34:00-07:00">{{$reply_commentaire->created_at->diffForHumans()}}</span>

                                                                                <style type="text/css">
                                                                                    .comment-header .post-meta .post-author:before {
                                                                                        content: none;
                                                                                    }

                                                                                    .comments .avatar-image-container {
                                                                                        background-color: #3b5999;
                                                                                        ;
                                                                                        color: #fff !important;
                                                                                        font-size: 16.5px;
                                                                                        font-weight: bold;
                                                                                        text-align: center;
                                                                                        text-transform: uppercase;
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                        </div>
                                                                        <p class="comment-content"> 
                                                                            
                                                                            @if($reply_commentaire->deepth!=0)
                                                                                <a class="name" style="border:none; color:#00acee;">{{'@'.$reply_commentaire->replied->name}}</a>
                                                                            @endif
                                                                                    
                                                                            {{ucfirst(strtolower($reply_commentaire->commentaire))}}
                                                                        </p>
                                                                        <span class="comment-actions">
                                                                            <a class="comment-reply" target="_self" href="#" id="formButton">Reply</a>
                                                                            @if(Auth::user() && Auth::id()==$reply_commentaire->user_id)
                                                                            <a href="" target="_self" onclick="event.preventDefault(); document.getElementById('delete-comment-'+{{$reply_commentaire->id}}).submit();">Delete {{$reply_commentaire->id}}</a>
                                                                            <form id="delete-comment-{{$reply_commentaire->id}}" action="{{ route('delete_comment',$reply_commentaire->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                            @endif

                                                                            @if($reply_commentaire->reply_commentaires->count()==1)
                                                                            <h5 class="title" id="repliedComments" style="border:none; color:#00acee;">{{$reply_commentaire->reply_commentaires->count()}} Reponse</h5>
                                                                            @elseif($reply_commentaire->reply_commentaires->count()!=0)
                                                                            <h5 class="title" id="repliedComments" style="border:none; color:#00acee;">{{$reply_commentaire->reply_commentaires->count()}} Reponses</h5>
                                                                            @endif

                                                                            <div style="padding-top: 10px;">
                                                                                @if(Auth::user())
                                                                                <form id="form1" action="{{route('add_comment')}}" method="POST">
                                                                                    @csrf
                                                                                    <cite class="user" style="text-transform: none;">
                                                                                        <a href="" rel="nofollow">{{strtolower(Auth::user()->email)}}</a>
                                                                                        <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">

                                                                                    </cite>

                                                                                    <span class=" secondary-text">
                                                                                        <textarea cols="94" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none;margin-top:1.6%; padding:0.5% 2% 0% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                                                    </span>
                                                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                                    <input type="hidden" name="commentaire_id" value="{{$reply_commentaire->id}}">
                                                                                    <input type="hidden" name="deepth" value="{{$reply_commentaire->deepth+1}}">
                                                                                </form>
                                                                                @else
                                                                                <form id="form1" action="{{route('add_comment')}}" method="POST">
                                                                                    @csrf
                                                                                    <cite class="user" style="text-transform: none;">

                                                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Saisissez votre nom et prenom" required autocomplete="name" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%; margin-right:6%;">

                                                                                        @error('name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                        @enderror

                                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%;">

                                                                                        @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                        @enderror
                                                                                    </cite>

                                                                                    <span class=" secondary-text">
                                                                                        <textarea cols="60" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none; border-bottom:1px solid #eaeaea; margin-top:2%; padding:2% 2% 2% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                                                    </span>
                                                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                                    <input type="hidden" name="commentaire_id" value="{{$reply_commentaire->id}}">
                                                                                    <input type="hidden" name="deepth" value="{{$reply_commentaire->deepth+1}}">
                                                                                    <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">


                                                                                </form>
                                                                                @endif
                                                                            </div>
                                                                        </span>
                                                                    </div>

                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </div>
                                                @endif

                                                <div style="padding-top: 10px;">
                                                    @if(Auth::user())
                                                    <form id="form1" action="{{route('add_comment')}}" method="POST">
                                                        @csrf
                                                        <cite class="user" style="text-transform: none;">
                                                            <a href="" rel="nofollow">{{strtolower(Auth::user()->email)}}</a>
                                                            <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">

                                                        </cite>

                                                        <span class=" secondary-text">
                                                            <textarea cols="94" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none;margin-top:1.6%; padding:0.5% 2% 0% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                        </span>
                                                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        <input type="hidden" name="deepth" value="{{$commentaire->deepth+1}}">
                                                        <input type="hidden" name="commentaire_id" value="{{$commentaire->id}}">
                                                    </form>
                                                    @else
                                                    <form id="form1" action="{{route('add_comment')}}" method="POST">
                                                        @csrf
                                                        <cite class="user" style="text-transform: none;">

                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Saisissez votre nom et prenom" required autocomplete="name" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%; margin-right:6%;">

                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror

                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Saisissez votre adresse email" required autocomplete="email" style="border: none; border-bottom:1px solid #eaeaea; padding-bottom:1.5%; padding-left:2%; padding-top:1.5%;">

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </cite>

                                                        <span class=" secondary-text">
                                                            <textarea cols="60" name="commentaire" placeholder="Ajouter votre commentaire" style="border:none; border-bottom:1px solid #eaeaea; margin-top:2%; padding:2% 2% 2% ; font-size:14px; font-family: Open Sans, sans-serif;" rows="1"></textarea>
                                                        </span>
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <input type="hidden" name="commentaire_id" value="{{$commentaire->id}}">
                                                        <input type="hidden" name="deepth" value="{{$commentaire->deepth+1}}">
                                                        <input class="publish" type="submit" value="PUBLIER" style="float: right; background: transparent;border: 0; box-shadow: none; color: #cc0a0a; cursor: pointer;font-size: 14px; font-weight: 500; outline: none; text-decoration: none;text-transform: uppercase; width: auto; margin: 0 0 0 10px; padding: 0;">


                                                    </form>
                                                    @endif
                                                </div>
                                            </span>
                                        </div>

                                    </li>
                                    @endforeach
                                </ol>
                                @else
                                    <div class="card">
                                        Aucun commentaire
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="comment-footer">
                    </p>
                    <div class="comment-form">
                        <a name="comment-form"></a>
                        <a href="#" id="comment-editor-src"></a>
                    </div>
                    <p></p>
                </section>
            </div>
        </div>

    </div>
</div>
@endsection

@section('sidebar')
@include('enfold.componants.sidebar')
@endsection

@push('js')
<script type="text/javascript">
    function deleteCommentaire(id) {


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Êtes vous sûr?',
            text: "Voulez-vous vraiment supprimé cette categorie!",
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

<script src="{{ asset('enfold/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $("#formButton").click(function() {
        $("#form1").toggle(700);
    });
</script>
<script type="text/javascript">
    $("#repliedComments").click(function() {
        $("#replied").toggle(700);
    });
</script>
@endpush