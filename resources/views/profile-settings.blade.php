@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
   <title>{{ Helper::translation(3109,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload dashboard-setting">

    @include('header')

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(3109,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/profile-settings') }}">{{ Helper::translation(3109,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
   
    <section class="dashboard-area">
        <div class="dashboard_contents">
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
               
               <form action="{{ route('profile-settings') }}" class="setting_form" method="post" id="item_form" enctype="multipart/form-data">
                {{ csrf_field() }}   
               
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>{{ Helper::translation(3110,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="acname">{{ Helper::translation(2917,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="name" name="name" class="text_field" placeholder="Name" value="{{ Auth::user()->name }}" data-bvalidator="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="usrname">{{ Helper::translation(3111,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="username" name="username" class="text_field" placeholder="Username" value="{{ Auth::user()->username }}" data-bvalidator="required">
                                            <p>{{ Helper::translation(3112,$translate) }}: {{ URL::to('/') }}/user/<span>{{ Auth::user()->username }}</span>
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <label for="emailad">{{ Helper::translation(3011,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email" name="email" class="text_field" placeholder="Email address" value="{{ Auth::user()->email }}" data-bvalidator="required,email">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">{{ Helper::translation(3113,$translate) }}
                                                        
                                                    </label>
                                                    <input type="password" id="password" name="password" class="text_field" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conpassword">{{ Helper::translation(3114,$translate) }}
                                                        
                                                    </label>
                                                    <input type="password" name="password_confirmation" id="password-confirm" class="text_field" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="website">{{ Helper::translation(3115,$translate) }}</label>
                                            <input type="text" id="website" name="website" class="text_field" placeholder="" value="{{ Auth::user()->website }}">
                                        </div>
                                        @if(Auth::user()->user_type == 'customer')
                                        <div class="form-group">
                                            <label for="website">{{ Helper::translation(4833,$translate) }}</label>
                                            <div class="custom_checkbox no-margin">
                                            <input class="form-check-input" type="checkbox" name="become-vendor" id="ch2" value="1">
                                            <label for="ch2">
                                                    <span class="shadow_checkbox"></span>
                                                    <span class="become_vendor">({{ Helper::translation(4836,$translate) }})</span>
                                                </label>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="country">{{ Helper::translation(3116,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country" id="country" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>
                                                    @foreach($country['country'] as $country)
                                                    <option value="{{ $country->country_id }}" @if(Auth::user()->country == $country->country_id ) selected="selected" @endif>{{ $country->country_name }}</option>
                                                   @endforeach
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        
                                        @if(Auth::user()->user_type == 'vendor')
                                        <div class="form-group">
                                            <label for="country">{{ Helper::translation(3117,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="user_freelance" id="user_freelance" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>
                                                    
                                                    <option value="1" @if(Auth::user()->user_freelance == 1 ) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                   <option value="0" @if(Auth::user()->user_freelance == 0 ) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="country">{{ Helper::translation(3118,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country_badge" id="country_badge" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>
                                                    
                                                    <option value="1" @if(Auth::user()->country_badge == 1 ) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                   <option value="0" @if(Auth::user()->country_badge == 0 ) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="country">{{ Helper::translation(3119,$translate) }}
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="exclusive_author" id="exclusive_author" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>
                                                    
                                                    <option value="1" @if(Auth::user()->exclusive_author == 1 ) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                   <option value="0" @if(Auth::user()->exclusive_author == 0 ) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                                <small>({{ Helper::translation(3120,$translate) }} <strong>"{{ Helper::translation(2970,$translate) }}"</strong> {{ Helper::translation(3121,$translate) }})</small>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        


                                        <div class="form-group">
                                            <label for="prohead">{{ Helper::translation(3122,$translate) }} <sup>*</sup></label>
                                            <input type="text" id="profile_heading" class="text_field" name="profile_heading" placeholder="{{ Helper::translation(3123,$translate) }}" value="{{ Auth::user()->profile_heading }}" data-bvalidator="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="authbio">{{ Helper::translation(3124,$translate) }} <sup>*</sup></label>
                                            <textarea name="about" id="about" class="text_field" placeholder="{{ Helper::translation(3125,$translate) }}" data-bvalidator="required">{{ Auth::user()->about }}</textarea>
                                        </div>
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->
                            
                            
                            
                            

                            
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">
                            
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>{{ Helper::translation(3126,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse3">
                                    <div class="information_wrapper">
                                        <div class="form-group">
                                            
                                            <div class="img_info">
                                               
                                                <label for="authbio">{{ Helper::translation(3127,$translate) }}</label>
                                                <p class="subtitle">JPG, GIF or PNG 100x100 px</p>
                                            </div>

                                            <label>
                                                <input type="file" id="user_photo" name="user_photo">
                                            </label><br/>
                                            @if(Auth::user()->user_photo != '')
                                            <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->name }}" width="50">
                                            @else
                                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->name }}" width="50">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            
                                             <label for="authbio">{{ Helper::translation(3128,$translate) }}</label>

                                            <div class="upload_title">
                                                <p>JPG, GIF or PNG 750x370 px</p>
                                                <label for="dp">
                                                    <input type="file" id="user_banner" name="user_banner">
                                                   
                                                </label><br/>
                                                @if(Auth::user()->user_banner != '')
                                            <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_banner }}" alt="{{ Auth::user()->name }}" width="100">
                                            @else
                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ Auth::user()->name }}" width="100">
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="information_module">
                                <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>{{ Helper::translation(3129,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set social_profile toggle_module collapse " id="collapse5">
                                    <div class="information_wrapper">
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-facebook"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="facebook_url" value="{{ Auth::user()->facebook_url }}" placeholder="ex: https://www.facebook.com">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-twitter"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="twitter_url" value="{{ Auth::user()->twitter_url }}" placeholder="ex: https://www.twitter.com">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-google-plus"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="gplus_url" value="{{ Auth::user()->gplus_url }}" placeholder="ex: https://www.google.com">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.social_profile -->
                            </div>
                            
                            
                            
                            
                            
                            @if(Auth::user()->user_type == 'vendor')
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>{{ Helper::translation(3130,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set mail_setting toggle_module collapse" id="collapse4">
                                    <div class="information_wrapper">
                                        

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt2" class="" name="item_update_email" value="1" @if(Auth::user()->item_update_email == 1) checked @endif>
                                            <label for="opt2">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">{{ Helper::translation(3088,$translate) }}</span>
                                                <span class="desc">{{ Helper::translation(3131,$translate) }}</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt3" class="" name="item_comment_email" value="1" @if(Auth::user()->item_comment_email == 1) checked @endif>
                                            <label for="opt3">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">{{ Helper::translation(3132,$translate) }}</span>
                                                <span class="desc">{{ Helper::translation(3133,$translate) }}</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt4" class="" name="item_review_email" value="1" @if(Auth::user()->item_review_email == 1) checked @endif>
                                            <label for="opt4">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">{{ Helper::translation(3134,$translate) }}</span>
                                                <span class="desc">{{ Helper::translation(3135,$translate) }}</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt5" class="" name="buyer_review_email" value="1" @if(Auth::user()->buyer_review_email == 1) checked @endif>
                                            <label for="opt5">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">{{ Helper::translation(3136,$translate) }}</span>
                                                <span class="desc">{{ Helper::translation(3137,$translate) }}</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                       
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information_module -->
                            </div>
                            @endif
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->
                        <input type="hidden" name="user_token" value="{{ Auth::user()->user_token }}">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="save_earnings" value="{{ Auth::user()->earnings }}">
                        <input type="hidden" name="save_photo" value="{{ Auth::user()->user_photo }}">
                        <input type="hidden" name="save_banner" value="{{ Auth::user()->user_banner }}">
                        <input type="hidden" name="save_password" value="{{ Auth::user()->password }}">
                        <div class="col-md-12">
                            <div align="left">
                                <button type="submit" class="btn btn--md btn-outline-accent">{{ Helper::translation(3138,$translate) }}</button>
                            </div>
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </form>
                <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    
    
    @include('footer')
    
   @include('javascript')
    
</body>

</html>
@else
@include('503')
@endif