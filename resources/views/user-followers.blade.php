@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3197,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload author-followers">

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
                                        <span class="bold">{{ $followercount }}</span> @if($followercount <= 1) {{ Helper::translation(3198,$translate) }} @else {{ Helper::translation(3197,$translate) }} @endif</h2>
                                </div>
                            </div>
                            <!-- end /.product-title-area -->

                            <div class="user_area">
                                <ul id="listShow">
                                
                                    @foreach($viewfollowing['view'] as $follower)
                                    <li class="li-item">
                                        <div class="user_single">
                                            <div class="user__short_desc">
                                                <div class="user_avatar">
                                                    <a href="{{ url('/user') }}/{{ $follower->username }}">
                                                   @if($follower->user_photo != '')
                                                   <img src="{{ url('/') }}/public/storage/users/{{ $follower->user_photo }}" alt="{{ $follower->username }}" width="60">
                                                 @else
                                                 <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $follower->username }}" width="60">
                                                 @endif
                                                 </a>
                                                </div>
                                                <div class="user_info">
                                                    <a href="{{ url('/user') }}/{{ $follower->username }}">{{ $follower->username }}</a>
                                                    <p>{{ Helper::translation(3077,$translate) }}: {{ date("F Y", strtotime($follower->created_at))}} </p>
                                                </div>
                                            </div>
                                            <div class="user__meta">
                                                <p class="height-40"></p>
                                                <p>{{ Helper::translation(3199,$translate) }} : @if($follower->country !='') {{ $follower->country_name }} @else - @endif</p>
                                               
                                            </div>
                                            
                                            <div class="user__status">
                                                <a href="{{ url('/user') }}/{{ $follower->username }}" class="btn btn--md theme-button">{{ Helper::translation(3078,$translate) }}</a>
                                            </div>
                                            
                                        </div>
                                        <!-- end /.user_single -->
                                    </li>
                                    @endforeach
                                   
                                    
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                      <div class="turn-page" id="pager"></div>  
                                    </nav>
                                </div>
                            </div>
                            <!-- end /.user_area -->
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