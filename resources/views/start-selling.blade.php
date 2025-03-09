@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3018,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
    
</head>

<body class="preload term-condition-page">

    @include('header')
   
    <section class="why_choose">
        
        <div class="container">
             
            <div class="row border-bottom features mt-3 mb-3 pt-3 pb-3">
            
              <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 right-border border-data">
                   
                <div class="icon">
									@if($setting['setting']->box1_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box1_icon }}" alt="{{ $setting['setting']->box1_title }}" class="img-fluid icon-img">
                  @endif
								</div>
								<div class="info">
									<h3 class="pt-0">{{ $setting['setting']->box1_title }}</h3>
									<p class="no-margin">{!! nl2br($setting['setting']->box1_text) !!}</p>
						    </div>
                    
              </div>
              
              <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 border-data">
                <div class="icon">
									@if($setting['setting']->box2_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box2_icon }}" alt="{{ $setting['setting']->box2_title }}" class="img-fluid icon-img">
                  @endif
								</div>
  							<div class="info">
  								<h3 class="pt-0">{{ $setting['setting']->box2_title }}</h3>
  								<p class="no-margin">{!! nl2br($setting['setting']->box2_text) !!}</p>
  						  </div>
              </div>
                
              <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 right-border">   
                <div class="icon">
									@if($setting['setting']->box3_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box3_icon }}" alt="{{ $setting['setting']->box3_title }}" class="img-fluid icon-img">
                  @endif
								</div>
							  <div class="info">
										<h3 class="pt-0">{{ $setting['setting']->box3_title }}</h3>
										<p class="no-margin">{!! nl2br($setting['setting']->box3_text) !!}</p>
						    </div>
              </div>
            
              <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 ">
                <div class="icon">
									@if($setting['setting']->box4_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box4_icon }}" alt="{{ $setting['setting']->box4_title }}" class="img-fluid icon-img">
                    @endif
								</div>
								<div class="info">
									<h3 class="pt-0">{{ $setting['setting']->box4_title }}</h3>
									<p class="no-margin">{!! nl2br($setting['setting']->box4_text) !!}</p>
						    </div>          
              </div>
                
            </div>
            
            
            
            <div class="row border-bottom features pt-2 pb-5">
              <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3 text-center">
                <h3>{{ $setting['setting']->three_box_heading }}</h3>
              </div>
            
              <div class="col-lg-4 col-md-4 col-sm-12 mt-3 mb-3 pt-3 pb-3 right-border">
                <div class="icon">
									@if($setting['setting']->box5_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box5_icon }}" alt="{{ $setting['setting']->box5_title }}" class="img-fluid icon-img">
                  @endif
									</div>
									<div class="info">
										<h3 class="pt-0">{{ $setting['setting']->box5_title }}</h3>
										<p class="no-margin">{!! nl2br($setting['setting']->box5_text) !!}</p>
						      </div>
                    
              </div>
                
                
              <div class="col-lg-4 col-md-4 col-sm-12 mt-3  mb-3 pt-3 pb-3 right-border">
                <div class="icon">
									@if($setting['setting']->box6_icon != '')
                    <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box6_icon }}" alt="{{ $setting['setting']->box6_title }}" class="img-fluid icon-img">
                  @endif
								</div>
								<div class="info">
									<h3 class="pt-0">{{ $setting['setting']->box6_title }}</h3>
									<p class="no-margin">{!! nl2br($setting['setting']->box6_text) !!}</p>
						    </div>
                
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 mb-3 pt-3 pb-3">
                  <div class="icon">
  									@if($setting['setting']->box7_icon != '')
                      <img src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box7_icon }}" alt="{{ $setting['setting']->box7_title }}" class="img-fluid icon-img">
                    @endif
									</div>
									<div class="info">
										<h3 class="pt-0">{{ $setting['setting']->box7_title }}</h3>
										<p class="no-margin">{!! nl2br($setting['setting']->box7_text) !!}</p>
						      </div>
                </div>
            
            </div>
            
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>   
    
    
		<section class="ash-bg">
            
         <div class="container">
      
           <div class="row border-bottom features">
              <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
              <h3 class="mb-3">{{ $setting['setting']->content_title_one }}</h3>
              
              <div>
              {!! html_entity_decode($setting['setting']->content_text_one) !!}
              </div>
              
              </div>
           
           </div>
        </div>   
            
      </section>		
				
                    
      <section class="white-bg">
    
        <div class="container">
    
         <div class="row border-bottom features">
            <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
            <h3 class="mb-3">{{ $setting['setting']->content_title_two }}</h3>
            
            <div>
            {!! html_entity_decode($setting['setting']->content_text_two) !!}
            </div>
            
            </div>
         
         </div>
        </div>   
    
    </section>   
            
            
    <section class="ash-bg">
    
       <div class="container">
    
         <div class="row border-bottom features">
            <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
            <h3 class="mb-3">{{ $setting['setting']->content_title_three }}</h3>
            
            <div>
            {!! html_entity_decode($setting['setting']->content_text_three) !!}
            </div>
            
            </div>
         
         </div>
      </div>   
    
    </section>   
            
            
    <section class="white-bg">
    
       <div class="container">
    
         <div class="row features mt-3 mb-3 pt-5 pb-5 ">
            <div class="col-lg-12 col-md-12 text-center">
            <h3 class="mb-3 text-center">{{ $setting['setting']->button_title }}</h3>
            
           </div>
           
           <div class="col-md-8 mx-auto text-center">
           <a href="{{ url('/register') }}" class="btn btn--icon btn-ss btn-secondary btn-lg btn-block theme-button w-100 selling-btn"><i class="fa fa-chevron-circle-right"></i> {{ Helper::translation(3187,$translate) }}</a>
           </div>
       
         </div>
      </div>
    </section>      
                    
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