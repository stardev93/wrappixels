@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3093,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload cart-page">

   
   @include('header')
   
    
    <section class="cart_area section--padding2 bgcolor">
        <div class="container">
            <div>
       
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                </div>
            @endif
        
        
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
            </div>
            @endif
        
            @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                     
                    {{ $error }}

                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                </div>
            @endif       
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_archive added_to__cart padding-top-70">
                        
                        <div class="panel-body mb-5 pb-5 pl-5">
                            <h3>{{ Helper::translation(4813,$translate) }}</h3>
                            <h5 class="mt-3">{{ Helper::translation(4814,$translate) }} : {{ $purchase_token }}</h5>	
					    </div>
                        
                        <div class="panel-body mb-5 pb-5 pl-5">
                            <h3>{{ Helper::translation(4815,$translate) }}</h3>
                            <h5 class="mt-3 pb-2">{{ Helper::translation(4816,$translate) }}</h5>
    						<p>{!! nl2br($bank_details) !!}</p>	
					    </div>
                    </div>
                    
                </div>
                <!-- end .col-md-12 -->
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