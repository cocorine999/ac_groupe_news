<div class="section" id="hot-section" name="Hot Posts">
  <div class="widget HTML show-hot" data-version="2" id="HTML2">
    <div class="widget-content">
      <ul class="hot-posts thumb ">
          @if($posts->count()!=0)
            <?php $i=0;?>
            @foreach ( $posts->slice(0, 5) as $key=>$post)

              @if($i==0)

                <li class="hot-item item-0  post-home-image font">
                  <div class="hot-item-inner">
                    <div class="post-thumb tyard-thumb">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                          @foreach ( $post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}} " title="{{ucfirst(strtolower($post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                          <span class="tyimg-lay"></span>
                      </a>
                    </div>
                    <div class="post-info">
                      @foreach ( $post->categories->slice(0, 2) as $key=>$category)
                        <span class="post-tag" style="margin-right: 15px;">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach

                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="post-author"> {{$post->author->name}} </span>
                        <span class="ty-time" style="color: #f0f0f0;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              @if($i==1)

                <li class="hot-item item-1  post-home-image font-right">
                  <div class="hot-item-inner">
                    <div class="post-thumb tyard-thumb">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                          @foreach ( $post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}} " title="{{ucfirst(strtolower($post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                          <span class="tyimg-lay"></span>
                      </a>
                    </div>
                    <div class="post-info">
                      
                      @foreach ( $post->categories->slice(0, 2) as $key=>$category)
                        <span class="post-tag" style="margin-right: 15px;">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach

                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="post-author"> {{$post->author->name}} </span>
                        <span class="ty-time" style="color: #f0f0f0;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              @if($i==2)

                <li class="hot-item item-2  post-home-image font-right">
                  <div class="hot-item-inner">
                    <div class="post-thumb tyard-thumb">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                          @foreach ( $post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}} " title="{{ucfirst(strtolower($post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                          <span class="tyimg-lay"></span>
                      </a>
                    </div>
                    <div class="post-info">
                      
                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                        <span class="post-tag" style="margin-right: 15px;">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach
                      
                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="ty-time" style="color: #f0f0f0;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              @if($i==3)

                <li class="hot-item item-3  post-home-image font-right">
                  <div class="hot-item-inner">
                    <div class="post-thumb tyard-thumb">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                          @foreach ( $post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}} " title="{{ucfirst(strtolower($post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                          <span class="tyimg-lay"></span>
                      </a>
                    </div>
                    <div class="post-info">
                      
                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                        <span class="post-tag" style="margin-right: 15px;">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach
                      
                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="ty-time" style="color: #f0f0f0;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              @if($i==4)

                <li class="hot-item item-4  post-home-image font-right">
                  <div class="hot-item-inner">
                    <div class="post-thumb tyard-thumb">
                      <a class="post-image-link" href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">
                          @foreach ( $post->images->slice(0, 1) as $key=>$image)
                            <img class="post-thumb" alt="{{ucfirst(strtolower($post->title))}} " title="{{ucfirst(strtolower($post->title))}} " src="{{asset($image->url)}}">
                          @endforeach
                          <span class="tyimg-lay"></span>
                      </a>
                    </div>
                    <div class="post-info">
                      
                      @foreach ( $post->categories->slice(0, 1) as $key=>$category)
                        <span class="post-tag" style="margin-right: 15px;">{{ucfirst(strtolower($category->name))}} </span>
                      @endforeach
                      
                      <h2 class="post-title">
                        <a href="{{route('show.post',"search&index=".$post->id."&query=".$post->slug)}}">{{ ucfirst(strtolower($post->title)) }}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="ty-time" style="color: #f0f0f0;"> {{$post->created_at->isoFormat('MMMM d, YYYY')}} </span>
                      </div>
                    </div>
                  </div>
                </li>

              @endif

              <?php $i++;?>
            @endforeach
          @endif
      </ul>
    </div>
  </div>
</div>