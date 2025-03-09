@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if($allsettings->site_blog_display == 1) {{ $slug }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload blog-page2">

    @include('header')

    
    @if($allsettings->site_blog_display == 1)

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ $slug }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" id="listShow">
                    
                    @foreach($blogData['post'] as $post)
                    <div class="single_blog blog--default li-items">
                        <figure>
                            <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                                @if($post->post_image!='')
                                    <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}">
                                @endif
                            </a>
                            <figcaption>
                                <div class="blog__content">
                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}" class="blog__title">
                                        <h4>{{ $post->post_title }}</h4>
                                    </a>
                                    <div class="blog__meta">
                                        <div class="date_time">
                                            <span class="lnr lnr-clock"></span>
                                            <p>{{ date('d F Y', strtotime($post->post_date)) }}</p>
                                        </div>
                                        <div class="comment_view">
                                            <p class="comment">
                                                <span class="lnr lnr-bubble"></span>{{ $comments->has($post->post_id) ? count($comments[$post->post_id]) : 0 }}</p>
                                            <p class="view">
                                                <span class="lnr lnr-eye"></span>{{ $post->post_view }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn_text">
                                    <div>{{ substr($post->post_short_desc,0,300).'...' }}</div>
                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}" class="btn btn--md btn-outline-accent">{{ Helper::translation(2878,$translate) }}</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach 
                  
                    <div class="pagination-area">
                        <div class="turn-page" id="blogpager"></div>
                    </div>

                </div>
                
                <div class="col-lg-4">
                    <aside class="sidebar sidebar--blog">
                        
                        
                        <div class="sidebar-card card--blog_sidebar card--category">
                            <div class="card-title">
                                <h4>{{ Helper::translation(2879,$translate) }}</h4>
                            </div>
                            <div class="collapsible-content">
                                <ul class="card-content">
                                   @foreach($catData['post'] as $post)
                                    <li>
                                        <a href="{{ URL::to('/blog') }}/category/{{ $post->blog_cat_id }}/{{ $post->blog_category_slug }}">
                                            <span class="lnr lnr-chevron-right"></span>{{ $post->blog_category_name }}
                                            <span class="item-count">{{ $category_count->has($post->blog_cat_id) ? count($category_count[$post->blog_cat_id]) : 0 }}</span>
                                        </a>
                                    </li>
                                   @endforeach  
                                </ul>
                            </div>
                            <!-- end /.collapsible_content -->
                        </div>
                        

                        <div class="sidebar-card sidebar--post card--blog_sidebar">
                            <div class="card-title">
                                <!-- Nav tabs -->
                                <ul class="nav post-tab" role="tablist">
                                    <li>
                                        <a href="#popular" class="active" id="popular-tab" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true">{{ Helper::translation(2880,$translate) }}</a>
                                    </li>
                                    <li>
                                        <a href="#latest" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false">{{ Helper::translation(2881,$translate) }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.card-title -->

                            <div class="card_content">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade show" id="popular" aria-labelledby="popular-tab">
                                        <ul class="post-list">
                                            
                                            @foreach($blog['popular'] as $post)
                                            <li>
                                                <div class="thumbnail_img">
                                                @if($post->post_image!='')
                                                <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}">
                                                @else
                                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}">
                                                @endif
                                                </div>
                                                <div class="title_area">
                                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                                                        <h4>{{ $post->post_title }}</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>{{ date('d F Y', strtotime($post->post_date)) }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            
                                            
                                        </ul>
                                        <!-- end /.post-list -->
                                    </div>
                                    <!-- end /.tabpanel -->

                                    <div role="tabpanel" class="tab-pane fade" id="latest" aria-labelledby="latest-tab">
                                        <ul class="post-list">
                                        
                                        @foreach($blogPost['latest'] as $post)
                                            <li>
                                                <div class="thumbnail_img">
                                                @if($post->post_image!='')
                                                <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}">
                                                @else
                                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}">
                                                @endif
                                                </div>
                                                <div class="title_area">
                                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                                                        <h4>{{ $post->post_title }}</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>{{ date('d F Y', strtotime($post->post_date)) }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                         @endforeach   
                                            
                                            
                                        </ul>
                                        <!-- end /.post-list -->
                                    </div>
                                    <!-- end /.tabpanel -->
                                </div>
                                <!-- end /.tab-content -->
                            </div>
                            <!-- end /.card_content -->
                        </div>
                        
                        <div class="banner">
                        @if($allsettings->site_blog_adbanner_link !="" ) <a href="{{ $allsettings->site_blog_adbanner_link }}" target="_blank"> @endif
                            @if($allsettings->site_blog_adbanner!='')
                                <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_blog_adbanner }}" alt="">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="">
                            @endif
                            @if($allsettings->site_blog_adbanner_link !="" ) </a> @endif
                        </div>
                        <!-- end /.banner -->
                    </aside>
                    <!-- end /.aside -->
                </div>
                <!-- end /.col-md-4 -->

            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    @else
    @include('not-found')
    @endif
    
    
   @include('footer')
    
   @include('javascript')
   
</body>

</html>
@else
@include('503')
@endif