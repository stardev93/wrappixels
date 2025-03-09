@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if($allsettings->site_blog_display == 1) {{ $edit['post']->post_title }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload single-blog-page">

    @include('header')
    @if($allsettings->site_blog_display == 1)
    
    <section class="blog_area section--padding2">
        <div class="container">
            <div>
                   
            @if ($message = Session::get('success'))
               <div class="alert alert-success" role="alert">
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            
            
            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            
            @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                     
                    {{ $error }}

                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
                   
        </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="single_blog blog--default">
                        <article>
                            <figure>
                                @if($edit['post']->post_image!='')
                                    <img src="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" alt="{{ $edit['post']->post_title }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $edit['post']->post_title }}">
                                @endif
                            </figure>
                            <div class="blog__content">
                                <a href="{{ URL::to('/single') }}/{{ $edit['post']->post_slug }}" class="blog__title">
                                    <h4>{{ $edit['post']->post_title }}</h4>
                                </a>

                                <div class="blog__meta">
                                    
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>{{ date('d F Y', strtotime($edit['post']->post_date)) }}</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment">
                                            <span class="lnr lnr-bubble"></span>{{ $count }}</p>
                                        <p class="view">
                                            <span class="lnr lnr-eye"></span>{{ $edit['post']->post_view }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="single_blog_content">
                                <div>
                                {!! html_entity_decode($edit['post']->post_desc) !!}
                                </div>

                                <div class="share_tags">
                                    <div class="share">
                                        <p>Share this post</p>
                                        <div class="social_share active">
                                            <ul class="social_icons">
                                                <li>
                                                    <a class="share-button" data-share-url="{{ URL::to('/single') }}/{{ $edit['post']->post_slug }}" data-share-network="facebook" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <span class="fa fa-facebook"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="share-button" data-share-url="{{ URL::to('/single') }}/{{ $edit['post']->post_slug }}" data-share-network="twitter" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <span class="fa fa-twitter"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="share-button" data-share-url="{{ URL::to('/single') }}/{{ $edit['post']->post_slug }}" data-share-network="googleplus" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <span class="fa fa-google-plus"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="share-button" data-share-url="{{ URL::to('/single') }}/{{ $edit['post']->post_slug }}" data-share-network="linkedin" data-share-text="{{ $edit['post']->post_short_desc }}" data-share-title="{{ $edit['post']->post_title }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/post/{{ $edit['post']->post_image }}" href="javascript:void(0)">
                                                        <span class="fa fa-linkedin"></span>
                                                    </a>
                                                </li>
                                                                                                
                                            </ul>
                                        </div>
                                        <!-- end social_share -->
                                    </div>
                                    <!-- end bog_share_ara  -->

                                    
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- end /.single_blog -->

                    
                   

                    <div class="comment_area">
                        <div class="comment__title">
                            <h4>{{ $count }} {{ Helper::translation(3054,$translate) }}</h4>
                        </div>

                        <div class="comment___wrapper">
                            <ul class="media-list">
                                
                                @foreach($comment['display'] as $comment)
                                <li class="depth-1">
                                    <div class="media">
                                        <div class="pull-left no-pull-xs">
                                           
                                                <img src="{{ url('/') }}/public/img/no-user.png" class="media-object" alt="{{ $comment->comment_name }}">
                                           
                                        </div>
                                        <div class="media-body">
                                            <div class="media_top">
                                                <div class="heading_left pull-left">
                                                    
                                                        <h4 class="media-heading">{{ $comment->comment_name }}</h4>
                                                    
                                                    <span>{{ date('d F Y', strtotime($comment->comment_date)) }}</span>
                                                </div>
                                                
                                            </div>
                                            <p>{{ $comment->comment_content }}</p>
                                            
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                        <!-- end /.comment___wrapper -->
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="comment_area comment--form">
                        <!-- start reply_form -->
                        <div class="comment__title">
                            <h4>{{ Helper::translation(3185,$translate) }}</h4>
                        </div>
                        <div class="commnet_form_wrapper">
                            <div class="row">
                                <!-- start form -->
                                <form class="cmnt_reply_form" action="{{ route('single') }}" id="comment_form" method="post">
                                {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="text" name="comment_name" placeholder="{{ Helper::translation(2917,$translate) }}" data-bvalidator="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="input_field" type="text" name="comment_email" placeholder="{{ Helper::translation(2915,$translate) }}" data-bvalidator="required,email">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input_field" name="comment_content" placeholder="{{ Helper::translation(3186,$translate) }}" rows="10" cols="80" data-bvalidator="required"></textarea>
                                        </div>
                                        
                                        <input type="hidden" name="post_id" value="{{ $edit['post']->post_id }}">

                                        <button type="submit" class="btn btn--default theme-button" name="btn">{{ Helper::translation(3064,$translate) }}</button>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                        <!-- end /.commnet_form_wrapper -->
                    </div>
                    <!-- end /.comment_area_wrapper -->
                </div>
                <!-- end /.col-md-8 -->

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
                                        <a href="#popular" id="popular-tab" class="active" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true">{{ Helper::translation(2880,$translate) }}</a>
                                    </li>
                                    <li>
                                        <a href="#latest" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false">{{ Helper::translation(2881,$translate) }}</a>
                                    </li>
                                </ul>
                            </div>
                            

                            <div class="card_content">
                                
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
                                        
                                    </div>
                                    

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
                                       
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        

                        
                        
                        <div class="sidebar-card card--blog_sidebar card--tags">
                            <div class="card-title">
                                <h4>{{ Helper::translation(2974,$translate) }}</h4>
                            </div>

                            <ul class="tags">
                            @foreach($post_tags as $tags)
                               
                                <li>
                                    <a href="{{ url('/tag') }}/blog/{{ strtolower(str_replace(' ','-',$tags)) }}">{{ $tags }}</a>
                                </li>
                            @endforeach    
                            </ul>
                            
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
                       
                    </aside>
                    
                </div>
                

            </div>
           
        </div>
        
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