@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3015,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload home1 mutlti-vendor">

    
    @include('header')
    
    <section class="login_area section--padding2">
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
                <div class="col-lg-6 offset-lg-3">
                    <form method="POST" action="{{ route('reset') }}">
                        @csrf

                        <input type="hidden" name="user_token" value="{{ $token }}">
                        <div class="cardify login">
                           

                            <div class="login--form">
                                
                                <div class="form-group">
                                    <label for="pass">{{ Helper::translation(3113,$translate) }}</label>
                                                                   
                                <input id="password" type="password" class="text_field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="pass">{{ Helper::translation(3114,$translate) }}</label>
                               <input id="password-confirm" type="password" class="text_field" name="password_confirmation" required autocomplete="new-password">                                    
                               
                                
                                </div>
                                
                                

                                

                                <button class="btn btn--md btn-outline-accent" type="submit">{{ Helper::translation(3015,$translate) }}</button>
                            
                                
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    
 
    
   @include('footer')
    
   @include('javascript')
    
</body>

</html>
@else
@include('503')
@endif
