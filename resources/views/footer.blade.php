<footer class="footer-big pt-5">
    <div class="container pt-2 pb-3">
        <div class="row">

            <div class="col-md-3 text-center text-md-left mb-4">
           
                <div class="text-nowrap mb-3">
                    @if($allsettings->site_logo != '')
                        <a class="navbar-brand d-none d-sm-block mr-4 order-lg-1" href="{{ URL::to('/') }}" style="min-width: 7rem">
                            <img width="120" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}">
                        </a>
                    @endif
                </div>

                <h6 class="pr-3 mr-3"><span class="text-primary">{{ $total_sale }}</span><span class="font-weight-normal text-white">{{ Helper::translation(2930,$translate) }}</span></h6>
                <h6 class="mr-3"><span class="text-primary">{{ $member_count }}</span><span class="font-weight-normal text-white">{{ Helper::translation(3002,$translate) }}</span></h6>
                
                <div class="widget mt-4 text-md-nowrap text-center text-md-left">
                    @if($allsettings->facebook_url != '')
                        <a class="social-btn sb-light sb-facebook mr-2 mb-2" href="{{ $allsettings->facebook_url }}" target="_blank"><i class="dwg-facebook"></i></a>
                    @endif
                    @if($allsettings->twitter_url != '')
                        <a class="social-btn sb-light sb-twitter mr-2 mb-2" href="{{ $allsettings->twitter_url }}" target="_blank"><i class="dwg-twitter"></i></a>
                    @endif
                    @if($allsettings->pinterest_url != '')
                        <a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="{{ $allsettings->pinterest_url }}" target="_blank"><i class="dwg-pinterest"></i></a>
                    @endif
                    @if($allsettings->gplus_url != '')
                        <a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="{{ $allsettings->gplus_url }}" target="_blank"><i class="dwg-google"></i></a>
                    @endif
                    @if($allsettings->instagram_url != '')
                        <a class="social-btn sb-light sb-behance mr-2 mb-2" href="{{ $allsettings->instagram_url }}" target="_blank"><i class="dwg-instagram"></i></a>
                    @endif
                    @if($allsettings->linkedin_url != '')
                        <a class="social-btn sb-light sb-behance mr-2 mb-2" href="{{ $allsettings->linkedin_url }}" target="_blank"><i class="dwg-linkedin"></i></a>
                    @endif
                </div>
            </div>
        
            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light">{{ Helper::translation(3004,$translate) }}</h3>
                    <ul class="widget-list">
                        @foreach($maincategory['view'] as $maincategory)
                            <li class="widget-list-item">
                                <a href="{{ URL::to('/shop/category/') }}/{{$maincategory->cat_id}}/{{$maincategory->category_slug}}">{{ $maincategory->category_name }}</a>
                            </li> 
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light">{{ Helper::translation(2999,$translate) }}</h3>
                    <ul class="widget-list">
                        @if($allsettings->site_blog_display == 1)
                            <li><a href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate) }}</a></li>
                        @endif
                        <li><a href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate) }}</a></li>
                        @foreach($footerpages['pages'] as $pages)
                            <li>
                                <a href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light">{{ Helper::translation(3005,$translate) }}</h3>
                    <p>{{ $allsettings->site_newsletter }}</p>
                    <ul class="widget-list">
                        @if ($message = Session::get('news-success'))
                            <div class="alert alert-success" role="alert">
                                <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif

                        @if ($message = Session::get('news-error'))
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
                                <span class="alert_icon lnr lnr-warning">
                                </span>
                                @foreach ($errors->all() as $error) 
                                    {{ $error }}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('newsletter') }}" id="footer_form" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-group">  
                                <input type="email" class="form-control" placeholder="{{ Helper::translation(3006,$translate) }}" data-bvalidator="required" name="news_email">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-accent btn--sm theme-button" type="submit">{{ Helper::translation(3007,$translate) }}</button>
                                 
                                </span>
                            </div>
                        </form>  

                    </ul>
                </div>

            </div>

        </div>
    </div>


    <div class="pt-4 bg-darker">
        <div class="container">
            <div class="d-md-flex justify-content-between">
                <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">
                    <p>&copy; {{ date('Y') }}
                        <a href="{{ URL::to('/') }}">{{ $allsettings->site_title }}</a>. {{ Helper::translation(3008,$translate) }}
                    </p>
                </div>
                <div class="widget widget-links widget-light pb-4">
                    <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                        @foreach($footerpages['pages'] as $pages)
                            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a></li>
                        @endforeach  
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

</footer>


<div class="alert text-center cookiealert" role="alert">
        Do you like cookies? We use cookies to ensure you get the best experience on our website.
        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            Allow Cookies
        </button>
</div>
<a class="btn-scroll-top go_top" href="#top" data-scroll style="z-index:1000">
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">{{ __('Top') }}</span>
    <i class="btn-scroll-top-icon dwg-arrow-up"></i>
</a>


