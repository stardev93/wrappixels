<div class="col-lg-4 col-md-12" style="margin-top: -3.7rem">
    <aside class="sidebar sidebar_author pt-4 pt-lg-0">
        <div class="author-card sidebar-card rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
            
            <div class="px-4 mb-4">
                <div class="media align-items-center">
                    <div class="img-thumbnail rounded-circle position-relative" style="width: 7rem; margin-top: 1.5rem">
                        @if($user['user']->user_photo != '')
                            <img class="rounded-circle" src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_photo }}" alt="{{ $user['user']->username }}">
                            @else
                            <img class="rounded-circle" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user['user']->username }}">
                        @endif      
                    </div>
                    <div class="media-body pl-3">
                      <h3 class="font-size-base mb-0">{{ $user['user']->username }}</h3>
                      <span class="text-accent font-size-sm">{{ $user['user']->email }}</span>
                    </div>
                </div>
                <p style="text-align: center; margin-top: 1rem">
                    @if($user['user']->user_type == 'vendor')
                    @if($user['user']->country_badge == 1){{ $country['view']->country_name }},@endif @endif @if($user['user']->user_type == 'customer') @if($user['user']->country != '') {{ $country['view']->country_name }}, @endif @endif {{ Helper::translation(3077,$translate) }} {{ $since }}
               </p>
            </div>

             <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Account</h3>
            </div>

            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/user-profile') }}/{{ $user['user']->username }}">
                        <i class="dwg-settings opacity-60 mr-2"></i>{{ Helper::translation(2926,$translate) }}
                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-purchases') }}/{{ $user['user']->username }}">
                        <i class="dwg-basket opacity-60 mr-2"></i>{{ Helper::translation(3024,$translate) }}</a>
                    </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-favourites') }}/{{ $user['user']->username }}">
                        <i class="dwg-heart opacity-60 mr-2"></i>{{ Helper::translation(2929,$translate) }}</a>
                </li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-withdrawals') }}/{{ $user['user']->username }}">
                    <i class="dwg-currency-exchange opacity-60 mr-2"></i>{{ Helper::translation(2933,$translate) }}</a>
                </li>
                <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/logout') }}">
                  <i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a>
                </li>
            </ul>


            <div class="author-infos">
                
                
                @if($user['user']->user_type == 'vendor')
                <div class="social social--color--filled">
                    <ul>
                        @if($sold_amount >= $badges['setting']->author_sold_level_six)
                        <div class="sidebar-card card--metadata">
                            <div>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="single-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}" /> 
                                    {{ $badges['setting']->author_sold_level_six_label }}
                            </div>
                            
                        </div> 
                        @endif
                         @if($user['user']->country_badge == 1)
                        @if($country['view']->country_badges != "")
                        <li>
                          <img src="{{ url('/') }}/public/storage/flag/{{ $country['view']->country_badges }}" border="0" class="icon-badges" title="Located in {{ $country['view']->country_name }}">  
                        </li>
                        @endif
                        @endif
                        
                        @if($featured_count->has($user['user']->id) ? count($featured_count[$user['user']->id]) : 0 != 0)
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" class="other-badges" title="Featured Item: Had an item featured on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($free_count->has($user['user']->id) ? count($free_count[$user['user']->id]) : 0 != 0)
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->free_item_icon }}" border="0" class="other-badges" title="Free Item : Contributed a free file of this item">
                        </li>
                        @endif
                        
                        @if($tren_count->has($user['user']->id) ? count($tren_count[$user['user']->id]) : 0 != 0)
                         <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->trends_icon }}" border="0" class="other-badges" title="Trendsetter: Had an item that was trending">
                        </li>
                        @endif
                        
                        @if($user['user']->exclusive_author == 1)
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
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_one_icon }}" border="0" class="other-badges" title="Author Level 1: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_one }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_two &&  $badges['setting']->author_sold_level_three > $sold_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_two_icon }}" border="0" class="other-badges" title="Author Level 2: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_two }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_three &&  $badges['setting']->author_sold_level_four > $sold_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->	author_sold_level_three_icon }}" border="0" class="other-badges" title="Author Level 3: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_three }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_four &&  $badges['setting']->author_sold_level_five > $sold_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_four_icon }}" border="0" class="other-badges" title="Author Level 4: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_four }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_five &&  $badges['setting']->author_sold_level_six > $sold_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_five_icon }}" border="0" class="other-badges" title="Author Level 5: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_five }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_six) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_six_icon }}" border="0" class="other-badges" title="Author Level 6: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($sold_amount >= $badges['setting']->author_sold_level_six)
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="other-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_one_icon }}" border="0" class="other-badges" title="Collector Level 1: Has collected {{ $badges['setting']->author_collect_level_one }}+ items on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_two_icon }}" border="0" class="other-badges" title="Collector Level 2: Has collected {{ $badges['setting']->author_collect_level_two }}+ items on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_three_icon }}" border="0" class="other-badges" title="Collector Level 3: Has collected {{ $badges['setting']->author_collect_level_three }}+ items on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_four_icon }}" border="0" class="other-badges" title="Collector Level 4: Has collected {{ $badges['setting']->author_collect_level_four }}+ items on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_five_icon }}" border="0" class="other-badges" title="Collector Level 5: Has collected {{ $badges['setting']->author_collect_level_five }}+ items on {{ $allsettings->site_title }}">
                        </li>
                        @endif
                        
                        @if($collect_amount >= $badges['setting']->author_collect_level_six) 
                        <li>
                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_six_icon }}" border="0" class="other-badges" title="Collector Level 6: Has collected {{ $badges['setting']->author_collect_level_six }}+ items on {{ $allsettings->site_title }}">
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
                <!-- end /.social -->

                <div class="author-btn">
                @if(Auth::guest())
                    <a href="javascript:void(0);" class="btn btn--md theme-button" onClick="alert('Login user only');">{{ Helper::translation(3202,$translate) }}</a>
                @endif 
                @if (Auth::check())
                @if($user['user']->username != Auth::user()->username)
                @if($followcheck == 0)
                <a href="{{ url('/user') }}/{{ Auth::user()->id }}/{{ $user['user']->id }}" class="btn btn--md theme-button">{{ Helper::translation(3202,$translate) }}</a>
                @else
                <a href="{{ url('/user') }}/unfollow/{{ Auth::user()->id }}/{{ $user['user']->id }}" class="btn btn--md theme-primary">{{ Helper::translation(3203,$translate) }}</a>
                @endif
                @endif
                @endif   
                </div>
                
                <!-- end /.author-btn -->
            </div>
            <!-- end /.author-infos -->


        </div>
  
        @if($user['user']->user_freelance == 1)
        <div class="sidebar-card freelance-status">
            <div class="custom-radio freelance">
                <input type="radio" id="opt1" class="" name="filter_opt" checked>
                <label for="opt1">
                    <span class="circle"></span>{{ Helper::translation(3208,$translate) }}</label>
            </div>
        </div>
        @endif
        
        @if (Auth::check())
        @if($user['user']->username != Auth::user()->username)
        <div class="sidebar-card message-card">
            

            <div class="card-title">
                <h4>{{ Helper::translation(2915,$translate) }} {{ $user['user']->username }}</h4>
            </div>

            <div class="message-form">
                
                <form action="{{ route('user') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="message" class="text_field" id="author-message" placeholder="{{ Helper::translation(3209,$translate) }}" data-bvalidator="required"></textarea>
                    </div>
                    
                    <input type="hidden" name="from_email" value="{{ Auth::user()->email }}" />
                    <input type="hidden" name="from_name" value="{{ Auth::user()->name }}" />
                    <input type="hidden" name="to_email" value="{{ $user['user']->email }}" />
                    <input type="hidden" name="to_name" value="{{ $user['user']->name }}" />

                    <div class="msg_submit">
                        <button type="submit" class="btn btn--md theme-button">{{ Helper::translation(3210,$translate) }}</button>
                    </div>
                </form>
                
                   
            </div>
             
           
           
        </div>
        @endif
        @endif
        
        
         @if(Auth::guest())
        <div class="sidebar-card message-card">
            
            <div class="card-title">
                <h4>{{ Helper::translation(2915,$translate) }} {{ $user['user']->username }}</h4>
            </div>

            <div class="message-form">
             
                <p> {{ Helper::translation(3061,$translate) }}
                    <a href="{{ url('/login') }}" class="theme-color">{{ Helper::translation(3020,$translate) }}</a> {{ Helper::translation(3062,$translate) }}</p>
                
            </div>
            
        </div>
        @endif 
        
      
    </aside>
</div>                        
                        