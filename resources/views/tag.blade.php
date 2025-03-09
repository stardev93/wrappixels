@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2974,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload blog-page1">

   @include('header')
   
    @if($type == 'blog')
    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row" data-uk-grid>
                
               
                @foreach($blogData['post'] as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog blog--card">
                        <figure>
                            
                            <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                                @if($post->post_image!='')
                                    <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}" class="tag-img">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}" class="tag-img">
                                @endif
                            </a>
                            <figcaption>
                                <div class="blog__content">
                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}" class="blog__title ellipsis">
                                        <h4>{{ $post->post_title.'...' }}</h4>
                                    </a>
                                    <p>{{ substr($post->post_short_desc,0,200).'...' }}</p>
                                </div>

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
                            </figcaption>
                        </figure>
                    </div>
                    
                </div>
                @endforeach 
            
            </div>
            
        </div>
        
    </section>
    @endif
    
    
    
    
    @if($type == 'item')
    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row" data-uk-grid>
    
    @foreach($itemData['item'] as $item)
                        <div class="col-lg-4 col-md-4 col-sm-6 li-item">
                            <!-- start .single-product -->
                            <div class="product product--card">

                                <div class="product__thumbnail">
                                   @if($item->item_preview!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}" class="item-thumbnail">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}" class="item-thumbnail">
                                        @endif
                                    <div class="prod_btn">
                                        <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="transparent btn--sm btn--round">{{ Helper::translation(2999,$translate) }}</a>
                                        <a href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="transparent btn--sm btn--round" target="_blank">{{ Helper::translation(3000,$translate) }}</a>
                                    </div>
                                    <!-- end /.prod_btn -->
                                </div>
                                <!-- end /.product__thumbnail -->

                                <div class="product-desc">
                                    <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="product_title ellipsis">
                                    <h4>{{ $item->item_name }}</h4>
                                </a>
                                    <ul class="titlebtm">
                                        <li>
                                            @if($item->user_photo!='')
                                        <img  src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" class="auth-img">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" class="auth-img">
                                        @endif
                                            <p>
                                                <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                             <a href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}" class="theme-color">
                                            <span class="lnr lnr-book"></span>{{ str_replace('-',' ',$item->item_type) }}</a>
                                        </li>
                                    </ul>

                                    <p>{{ substr($item->item_shortdesc,0,120).'...' }}</p>
                                </div>
                                <!-- end /.product-desc -->

                                <div class="product-purchase">
                                    <div class="price_love">
                                        @if($item->free_download == 1)
                                    <span>Free</span>
                                    @else
                                    <span>{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                    @endif
                                        <p>
                                            <span class="lnr lnr-heart"></span> {{ $item->item_liked }}</p>
                                    </div>
                                    <div class="sell">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <span>{{ $item->item_sold }}</span>
                                        </p>
                                    </div>
                                </div>
                                <!-- end /.product-purchase -->
                            </div>
                            <!-- end /.single-product -->
                        </div>
                       @endforeach 
    </div>
            
            
            
           
        </div>
        
    </section>
    @endif
    
    
    
    
    
   @include('footer')
    
   @include('javascript')
    
</body>

</html>
@else
@include('503')
@endif