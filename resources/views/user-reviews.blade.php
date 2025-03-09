@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3207,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload">

    @include('header')
    
    <section class="author-profile-area">
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
                @include('user-menu-guest')
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12" style="margin-top: 4rem"> 
                    <div class="row">
                        @include('user-box')
                        
                    </div>
                    <!-- end /.row -->

                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>
                                        <span class="bold">{{ $countreview }}</span> {{ Helper::translation(3207,$translate) }}</h2>
                                </div>
                            </div>
                            <!-- end /.product-title-area -->

                            <div class="thread thread_review thread_review2">
                                <ul class="media-list thread-list" id="listShow">
                                    
                                    @foreach($ratingview['list'] as $review)
                                    <li class="single-thread li-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="{{ url('/user') }}/{{ $review->username }}">
                                                @if($review->user_photo != '')
                                                   <img src="{{ url('/') }}/public/storage/users/{{ $review->user_photo }}" alt="{{ $review->username }}" class="media-object">
                                                 @else
                                                 <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $review->username }}" class="media-object">
                                                 @endif
                                                 </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="{{ url('/user') }}/{{ $review->username }}">
                                                                <h4>{{ $review->username }}</h4>
                                                            </a>
                                                            <a href="{{ url('/item') }}/{{ $review->item_slug }}/{{ $review->item_id }}" class="theme-color">{{ $review->item_name }}</a>
                                                        </div>
                                                        <div class="rating product--rating">
                                                            <ul>
                                                                @if($review->rating == 0)
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                @endif
                                                                @if($review->rating == 1)
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                @endif
                                                                @if($review->rating == 2)
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                @endif
                                                                @if($review->rating == 3)
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                @endif
                                                                 @if($review->rating == 4)
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                @endif
                                                                @if($review->rating == 5)
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <span class="review_tag">{{ $review->rating_reason }}</span>
                                                    </div>

                                                    <div class="pull-right rev_time">{{ date('F d Y, h:i:s', strtotime($review->rating_date)) }}</div>
                                                </div>
                                                <p>{{ $review->rating_comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                   @endforeach

                                    

                                    
                                    
                                </ul>
                                <!-- end /.media-list -->

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                        <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                                    </nav>
                                </div>
                                <!-- end /.comment pagination area -->
                            </div>
                            <!-- end /.comments -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    
                    
                    
                    <!-- end /.row -->
                </div>
                <!-- end /.col-md-8 -->

            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    
    
    
    
    
    
    @include('footer')
    
    @include('javascript')
</body>

</html>
@else
@include('503')
@endif