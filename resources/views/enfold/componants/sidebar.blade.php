          <div class="sidebar common-widget no-items section" id="sidebar1" name="Sidebar Right (A)"></div>
          <div class="sidebar section" id="social-widget" name="Social Widget">

            <div class="widget HTML FollowByEmail" data-version="2" id="HTML7 FollowByEmail1">
              <div class="widget-title">
                <h3 class="title">
                  Newsletter
                </h3>

              </div>
              <div class="widget-content ">
                <span class="before-text"> Abonnez-vous à la newsletter et recevez gratuitement l'info en
                  continue.!</span>
                <div class="follow-by-email-inner">
                  <form action="{{route('newsletter')}}" method="POST">
                    @csrf
                    <input autocomplete="off" class="follow-by-email-address" name="email" placeholder="Entrez votre adresse email" type="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="follow-by-email-submit" type="submit" value="S'abonner">
                  </form>
                </div>
              </div>
            </div>

            <div class="widget LinkList" data-version="2" id="LinkList75">
              <div class="widget-title">
                <h3 class="title">
                  Social Plugin
                </h3>
              </div>
              <div class="widget-content">
                <ul class="social-counter social social-color social-text">
                  <li class="facebook">
                    <a href="#" target="_blank" title="facebook"></a>
                  </li>
                  <li class="twitter">
                    <a href="#" target="_blank" title="twitter"></a>
                  </li>
                  <li class="rss">
                    <a href="#" target="_blank" title="rss"></a>
                  </li>
                  <li class="pinterest">
                    <a href="#" target="_blank" title="pinterest"></a>
                  </li>
                  <li class="instagram">
                    <a href="#" target="_blank" title="instagram"></a>
                  </li>
                  <li class="vk">
                    <a href="#" target="_blank" title="vk"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="sidebar common-widget section" id="sidebar2" name="Sidebar Right (B)">

            <div class="widget PopularPosts" data-version="2" id="PopularPosts1">
              <div class="widget-title">
                <h3 class="title">
                  Popular Posts
                </h3>
              </div>
              <div class="widget-content">

                @foreach ( $popular_posts as $cle=>$popular_post)
                  <div class="post">
                    <div class="post-content">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_post->id."&query=".$popular_post->slug)}}">
                        @foreach ( $popular_post->images->slice(0, 1) as $key=>$image)
                          <img class="post-thumb" alt="{{$image->name}}" title="{{$image->name}}" src="{{asset($image->url)}}">
                        @endforeach
                      </a>
                      <div class="post-info">
                        <h2 class="post-title">
                          <a href="{{route('show.post',"search&index=".$popular_post->id."&query=".$popular_post->slug)}}">{{ucfirst(strtolower($popular_post->title))}} </a>
                        </h2>
                        <div class="post-meta">
                          <span class="post-author">{{$popular_post->author->name}} </span>
                          <span class="post-date published" datetime="2016-03-17T00:34:00-07:00">{{$popular_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                @if($popular_posts->count()==0)
                  <p style="text-align: center;line-height: 1px; font-size:12px; font-weight:bold; color:#9999;text-transform: uppercase;">Aucun article</p>
                @endif
              </div>
            </div>

            <div class="widget HTML" data-version="2" id="HTML7">
              <div class="widget-title">
                <h3 class="title">
                  Publication
                </h3>
              </div>
              <div class="widget-content">
                <div style="
                      width: 100%;
                      height: 250px;
                      margin: 0 auto;
                      text-align: center;
                      line-height: 250px;
                      color: #1111;
                      text-transform: uppercase;
                      font-size: 30px;
                      font-weight: bold;
                      cursor: pointer;
                      border: 5px solid #ccc;
                      box-sizing: border-box;
                    ">
                  <a href="https://example.com/">
<video width="300" height="250" fullscreen="false" webkit-playsinline controls autoplay muted poster="http://example.com/thumbnail.gif">
<source src="https://www.adspeed.com/mp4/1280x720.mp4" type="video/mp4">
</video>
</a>
                </div>
              </div>
            </div>
            
            @if($popular_category->count()!=0)
              <div class="widget PopularPosts" data-version="2" id="PopularPosts1">
                <div class="widget-title">
                  <h3 class="title">
                    {{$popular_category->name}}
                  </h3>
                </div>
                <div class="widget-content">
                
                  @foreach ( $popular_category->posts->slice(0, 3) as $cle=>$popular_category_post)
                    <div class="post">
                      <div class="post-content">
                        <a class="post-image-link" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">
                          @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{$image->name}}" title="{{$image->name}}" src="{{asset($image->url)}}">
                          @endforeach
                        </a>
                        <div class="post-info">
                          <h2 class="post-title">
                            <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{$popular_category_post->title}}</a>
                          </h2>
                          <div class="post-meta">
                            <span class="post-author">{{$popular_category_post->author->name}} </span>
                            <span class="post-date published" datetime="2016-03-17T00:34:00-07:00">{{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                
                </div>
              </div>
            @endif

            <div class="widget Label" data-version="2" id="Label1">
              <div class="widget-title">
                <h3 class="title">
                  Categories
                </h3>
              </div>
              <div class="widget-content list-label">
                <ul>
                  @foreach ( $categories as $category)
                    <li>
                      <a class="label-name" href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->slug)}}">
                        {{$category->name}}
                        <span class="label-count">({{$category->posts->count()}})</span>
                      </a>
                    </li>
                  @endforeach
                @if($categories->count()==0)
                  <p style="text-align: center;line-height: 1px; font-size:12px; font-weight:bold; color:#9999;text-transform: uppercase;">Aucune categorie</p>
                @endif
                </ul>
              </div>
            </div>

            <div class="widget Label" data-version="2" id="Label2">
              <div class="widget-title">
                <h3 class="title">
                  Tags
                </h3>
              </div>
              <div class="widget-content cloud-label">
                <ul>
                  @foreach ( $tags as $tag)
                    <li>
                      <a class="label-name" href="{{route('show.tag.posts',"search&index=".$tag->id."&query=".$tag->slug)}}">
                        {{$tag->name}}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>