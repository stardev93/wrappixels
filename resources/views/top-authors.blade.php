@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3028,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload term-condition-page">

    @include('header')


<div id="demo">

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                        {{ Helper::translation(3028,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/top-authors') }}">{{ Helper::translation(3028,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">                
                    <div class="user_area">
                        <ul>
                            @foreach($user['user'] as $user)
                                @if($count_sale->has($user->id) != 0)
                                    @php
                                        $membership = date('m/d/Y',strtotime($user->created_at));
                                        $membership_date = explode("/", $membership);
                                        $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md") ? ((date("Y") - $membership_date[2]) - 1) : (date("Y") - $membership_date[2]));
                                        $referral_count = $user->referral_count;  
                                    @endphp     
                                    <li class="li-item border_bottom" style="display: list-item;">
                                        <div class="user_single">
                                            <div class="user__short_desc own-user">

                                                <div class="user_avatar">
                                                    <a href="{{ url('/user') }}/{{ $user->username }}">
                                                    @if($user->user_photo != '')
                                                    <img src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" alt="" width="70" class="rounded">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user->name }}" width="70" class="rounded">
                                                    @endif
                                                    </a>
                                                </div>

                                                <div class="user_info">
                                                    <a href="{{ url('/user') }}/{{ $user->username }}">{{ $user->name }}</a>
                                                    <br/>

                                                    @if($user->country_badge == 1)
                                                        <div class="social social--color--filled">
                                                            <ul>
                                                                @if($user->country_badges != "")
                                                                    <li>
                                                                      <img src="{{ url('/') }}/public/storage/flag/{{ $user->country_badges }}" border="0" class="icon-badges" title="Located in {{ $user->country_name }}">  
                                                                    </li>
                                                                @endif

                                                                @if($user->exclusive_author == 1)
                                                                    <li>
                                                                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->exclusive_author_icon }}" border="0" class="other-badges" title="Exclusive Author: Sells items exclusively on {{ $allsettings->site_title }}">
                                                                    </li>
                                                                @endif

                                                                @if($year == 1)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->one_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 2)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->two_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 3)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->three_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                
                                                                @if($year == 4)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->four_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 5)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->five_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif 
                                                                
                                                                @if($year == 6)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->six_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 7)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->seven_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 8)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->eight_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year == 9)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->nine_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($year >= 10)
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->ten_year_icon }}" border="0" class="other-badges" title="@if($year >= 10) 10+ @else {{ $year }} @endif Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over @if($year >= 10) 10+ @else {{ $year }} @endif years">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_one_icon }}" border="0" class="other-badges" title="Affiliate Level 1: Has referred {{ $badges['setting']->author_referral_level_one }}+ members">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_two_icon }}" border="0" class="other-badges" title="Affiliate Level 2: Has referred {{ $badges['setting']->author_referral_level_two }}+ members">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_three_icon }}" border="0" class="other-badges" title="Affiliate Level 3: Has referred {{ $badges['setting']->author_referral_level_three }}+ members">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_four_icon }}" border="0" class="other-badges" title="Affiliate Level 4: Has referred {{ $badges['setting']->author_referral_level_four }}+ members">
                                                                </li>
                                                                @endif
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_five_icon }}" border="0" class="other-badges" title="Affiliate Level 5: Has referred {{ $badges['setting']->author_referral_level_five }}+ members">
                                                                </li>
                                                                @endif
                                                                
                                                                
                                                                @if($referral_count >= $badges['setting']->author_referral_level_six) 
                                                                <li>
                                                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_six_icon }}" border="0" class="other-badges" title="Affiliate Level 6: Has referred {{ $badges['setting']->author_referral_level_six }}+ members">
                                                                </li>
                                                                @endif
                                                    
                                                            </ul>
                                                        </div>
                                                    @endif                         
                                                </div>
                                            </div>

                                            <div class="user__meta own-next">
                                                <p>{{ $count_items->has($user->id) ? count($count_items[$user->id]) : 0 }} Items</p>
                                                <p>{{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($user->created_at)) }}</p>
                                                <p>@if($user->country_badge == 1){{ $user->country_name }}@endif</p>
                                                
                                            </div>


                                            <div class="user__status user--following text-center last-next">
                                                <p><span class="sale-count">{{ $count_sale->has($user->id) ? count($count_sale[$user->id]) : 0 }}</span><br/>{{ Helper::translation(2930,$translate) }}</p>
                                                @php
                                                if(count($user->ratings) != 0)
                                                {
                                                    $top = 0;
                                                    $bottom = 0;
                                                    
                                                    foreach($user->ratings as $view)
                                                    { 
                                                        if($view->rating == 1){ $value1 = $view->rating*1; } else { $value1 = 0; }
                                                        if($view->rating == 2){ $value2 = $view->rating*2; } else { $value2 = 0; }
                                                        if($view->rating == 3){ $value3 = $view->rating*3; } else { $value3 = 0; }
                                                        if($view->rating == 4){ $value4 = $view->rating*4; } else { $value4 = 0; }
                                                        if($view->rating == 5){ $value5 = $view->rating*5; } else { $value5 = 0; }
                                                        $top += $value1 + $value2 + $value3 + $value4 + $value5;
                                                        $bottom += $view->rating;
                                                
                                                    }
                                                
                                                
                                                    if(!empty(round($top/$bottom)))
                                                    {
                                                        $count_rating = round($top/$bottom);
                                                    }
                                                    else
                                                    {
                                                       $count_rating = 0;
                                                    }
                                                }
                                                else
                                                {
                                                  $count_rating = 0;
                                                }  
                                                @endphp

                                                <div class="rating product--rating">
                                                    <ul>
                                                        @if($count_rating == 0)
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
                                                       @if($count_rating == 1)
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
                                                       @if($count_rating == 2)
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
                                                       @if($count_rating == 3)
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
                                                       @if($count_rating == 4)
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
                                                       @if($count_rating == 5)
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
                                            </div>
                                        </div>

                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                    </div>
				
                </div>
            </div>
        </div>
    </section>
</div>
    
   @include('footer')
    
   @include('javascript')
    
</body>

</html>
@else
@include('503')
@endif