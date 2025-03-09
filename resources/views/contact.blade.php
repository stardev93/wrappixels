@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2910,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
    {!! NoCaptcha::renderJs() !!}
</head>

<body class="preload contact-page">

    @include('header') 

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(2910,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    



 
    <section class="contact-area section--padding">
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
                <div class="col-md-12">
                    <div class="row">
                        <!-- start col-md-12 -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h1>{{ Helper::translation(2911,$translate) }}
                                    <span class="highlighted">{{ Helper::translation(2912,$translate) }}</span>
                                </h1>
                                
                            </div>
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="contact_tile">
                                <span class="tiles__icon lnr lnr-map-marker theme-color"></span>
                                <h4 class="tiles__title">{{ Helper::translation(2913,$translate) }}</h4>
                                <div class="tiles__content">
                                    <p>{{ $allsettings->office_address }}</p>
                                </div>
                            </div>
                        </div>
                       

                        <div class="col-lg-4 col-md-6">
                            <div class="contact_tile">
                                <span class="tiles__icon lnr lnr-phone theme-color"></span>
                                <h4 class="tiles__title">{{ Helper::translation(2914,$translate) }}</h4>
                                <div class="tiles__content">
                                    <p>{{ $allsettings->office_phone }}</p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="col-lg-4 col-md-6">
                            <div class="contact_tile">
                                <span class="tiles__icon lnr lnr-envelope theme-color"></span>
                                <h4 class="tiles__title">{{ Helper::translation(2915,$translate) }}</h4>
                                <div class="tiles__content">
                                    <p>{{ $allsettings->office_email }}</p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="col-md-12">
                            <div class="contact_form cardify">
                                <div class="contact_form__title">
                                    <h3>{{ Helper::translation(2916,$translate) }}</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="contact_form--wrapper">
                                            <form action="{{ route('contact') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>{{ Helper::translation(2917,$translate) }}</label>
                                                            <input type="text" name="from_name" data-bvalidator="required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ Helper::translation(2915,$translate) }}</label>
                                                            <input type="text" name="from_email" data-bvalidator="email,required">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <label>{{ Helper::translation(2918,$translate) }}</label>  
                                                <textarea cols="30" rows="10" name="message_text" data-bvalidator="required"></textarea>
                                                
                                                <div class="row">  
                                                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} col-md-12">
                                        
                                                    {!! app('captcha')->display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="help-block">
                                                            <strong class="red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>

                                                <div class="sub_btn">
                                                    <button type="submit" class="btn btn--default btn-outline-accent" style="min-width: 170px;">{{ Helper::translation(2876,$translate) }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end /.col-md-8 -->
                                </div>
                                <!-- end /.row -->
                            </div>
                            <!-- end /.contact_form -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.col-md-12 -->
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