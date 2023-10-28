                            
                            @if($popular_category->posts->count()>=3)
                              <div class="tybox-wrapper">
                                <div class="featured section comload" id="featured">
                                  <div class="widget HTML tyard templatesyard" data-version="1" id="HTML299">
                                    <div class="widget-content">
                                      <div class="ty-feat">
                                      <?php $i = 0; $img;?>

                                        @foreach ( $popular_category->posts->slice(0, 3) as $key=>$popular_category_post)

                                          @if($i==0)

                                              <div class="ty-first">
                                                <div class="ty-feat-image">
                                                  <div class="tyard-thumb">
                                                    
                                                    @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                                                        <?php  $img=$image?>
                                                    @endforeach
                                                    <a class="ty-img" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}" 
                                                      style=" background: url({{asset($img->url)}})
                                                              no-repeat center center; background-size: cover; ">
                                                      <span class="tyimg-lay"></span>
                                                    </a>
                                                  </div>
                                                  <div class="ty-con-yard post-info">
                                                    <div class="yard-label">
                                                      @foreach ( $popular_category_post->categories->slice(0, 1) as $key=>$category)
                                                          <a class="icon Beauty" href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->name)}}">{{$category->name}}</a>
                                                      @endforeach
                                                    </div>
                                                    <h3 class="tyard-title">
                                                      <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a>
                                                    </h3>
                                                    <div class="post-meta">
                                                      <span class="post-author" style="color: #f0f0f0;">{{$popular_category_post->author->name}}</span>
                                                      <span class="ty-time" style="color: #f0f0f0;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                                                    </div>
                                                    <p class="recent-summary">
                                                    {{ucfirst(strtolower($popular_category_post->sub_title))}}  It bachelor cheerful of mistaken. Tore has sons put
                                                      upon wife us bred seen. Its dissimilar invitati...
                                                    </p>
                                                  </div>
                                                </div>
                                              </div>
                                          @else
                                              <div class="ty-rest-wrap">
                                                <div class="ty-rest">
                                                  <div class="tyard-thumb">

                                                    @foreach ( $popular_category_post->images->slice(0, 1) as $key=>$image)
                                                        <?php  $img=$image?>
                                                    @endforeach
                                                    <a class="yard-img" href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}" 
                                                      style=" background: url({{asset($img->url)}})
                                                              no-repeat center center; background-size: cover; ">
                                                      <span class="tyimg-lay"></span>
                                                    </a>

                                                  </div>
                                                  <div class="yard-tent-ty">
                                                    <div class="yard-label">
                                                      @foreach ( $popular_category_post->categories->slice(0, 1) as $key=>$category)
                                                          <a class="icon Beauty" href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->name)}}">{{$category->name}}</a>
                                                      @endforeach
                                                    </div>
                                                    
                                                    <h3 class="tyard-title">
                                                      <a href="{{route('show.post',"search&index=".$popular_category_post->id."&query=".$popular_category_post->slug)}}">{{ucfirst(strtolower($popular_category_post->title))}} </a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-author" style="color: #f0f0f0;">{{$popular_category_post->author->name}}</span>
                                                        <span class="ty-time" style="color: #f0f0f0;"> {{$popular_category_post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                                                    </div>
                                                  </div>
                                                  <div class="clear"></div>
                                                </div>
                                              </div>
                                          @endif

                                              <?php $i ++;?>
                                        @endforeach

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            @endif