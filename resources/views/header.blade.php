<header class="bg-light box-shadow-sm navbar-sticky">

    <div class="navbar-sticky">
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">

                @if($allsettings->site_logo != '')
                    <a class="navbar-brand d-none d-sm-block mr-4 order-lg-1" href="{{ URL::to('/') }}" style="min-width: 7rem;">
                        <img width="200" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"/>
                    </a>
                                        <a class="navbar-brand d-sm-none mr-2 order-lg-1" href="{{ URL::to('/') }}" style="min-width: 4.625rem;">
                        <img width="74" src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}"/>
                    </a>
                @endif

                <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-tool d-none d-lg-flex" href="#searchBox" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="searchBox">
                        <span class="navbar-tool-tooltip">{{ __('Search') }}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon dwg-search"></i>
                        </div>
                    </a>
                    <a class="navbar-tool d-none d-lg-flex" href="{{ url('/favourites') }}">
                        <span class="navbar-tool-tooltip">{{ Helper::translation(2989,$translate) }}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon dwg-heart"></i>
                        </div>
                    </a>

                    @if(Auth::guest())
                    <a class="navbar-tool ml-1 mr-n1" href="{{ URL::to('/login') }}">
                        <span class="navbar-tool-tooltip">{{ Helper::translation(3020,$translate) }}</span>
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon dwg-user"></i>
                        </div>
                    </a>
                    @endif


                    @if (Auth::check())
                        <div class="navbar-tool dropdown ml-2">
                            <a class="navbar-tool-icon-box border dropdown-toggle" 
                                @if(Auth::user()->id == 1) 
                                    href="{{ url('/admin') }}" target="_blank" 
                                @else 
                                    href="{{ URL::to('/user') }}/{{ Auth::user()->username }}" 
                                @endif
                            >         
                                @if(!empty(Auth::user()->user_photo))
                                    <img width="32" src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->name }}"/>
                                @else
                                    <img  width="32" src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->name }}">
                                @endif
                            </a>

                            <a class="navbar-tool-text ml-n1"
                                @if(Auth::user()->id == 1) 
                                    href="{{ url('/admin') }}" target="_blank" 
                                    @else 
                                    href="{{ URL::to('/user') }}/{{ Auth::user()->username }}" 
                                @endif
                            >
                                <small>{{ Auth::user()->name }}</small>{{ $allsettings->site_currency }}{{ Auth::user()->earnings }}
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" style="min-width: 14rem;">
                                @if(Auth::user()->user_type == 'vendor')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                        <span class="lnr lnr-user opacity-60 mr-2"></span>{{ Helper::translation(2926,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/profile-settings') }}">
                                        <span class="lnr lnr-cog opacity-60 mr-2"></span>{{ Helper::translation(2927,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/purchases') }}">
                                        <span class="lnr lnr-cart opacity-60 mr-2"></span>{{ Helper::translation(3024,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/favourites') }}">
                                        <span class="lnr lnr-heart opacity-60 mr-2"></span>{{ Helper::translation(2929,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/coupon') }}">
                                        <span class="lnr lnr-location opacity-60 mr-2"></span>{{ Helper::translation(2919,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/sales') }}">
                                        <span class="lnr lnr-chart-bars opacity-60 mr-2"></span>{{ Helper::translation(2930,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/manage-item') }}">
                                        <span class="lnr lnr-book opacity-60 mr-2"></span>{{ Helper::translation(2932,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/withdrawal') }}">
                                        <span class="lnr lnr-briefcase opacity-60 mr-2"></span>{{ Helper::translation(2933,$translate) }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a>
                                @endif

                                @if(Auth::user()->user_type == 'customer')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                        <span class="lnr lnr-user opacity-60 mr-2"></span>{{ Helper::translation(2926,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/profile-settings') }}">
                                        <span class="lnr lnr-cog opacity-60 mr-2"></span>{{ Helper::translation(2927,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/purchases') }}">
                                        <span class="lnr lnr-cart opacity-60 mr-2"></span>{{ Helper::translation(3024,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/favourites') }}">
                                        <span class="lnr lnr-heart opacity-60 mr-2"></span>{{ Helper::translation(2929,$translate) }}
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/withdrawal') }}">
                                        <span class="lnr lnr-briefcase opacity-60 mr-2"></span>{{ Helper::translation(2933,$translate) }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a>
                                @endif

                                @if(Auth::user()->user_type == 'admin')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/admin') }}" target="_blank">
                                        <span class="lnr lnr-cog opacity-60 mr-2"></span>{{ Helper::translation(3022,$translate) }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a>
                                @endif


                                @if(Auth::user()->id == 1)
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin') }}"><i class="dwg-settings opacity-60 mr-2"></i>{{ __('Admin Panel') }}</a>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ __('Logout') }}</a>
                                @endif
                            </div>
                        </div>

                    @endif



                    <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ url('/cart') }}">
                        <span class="navbar-tool-label">{{ Helper::translation(2885,$translate)}}</span><i class="navbar-tool-icon dwg-cart"></i></a>
                        @if($cartcount != 0)
                            <span class="navbar-tool-label">{{$cartcount}}</span>
                        @else
                        <span class="navbar-tool-label">0</span>
                        @endif

                        @if($cartcount != 0)
                            <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                                <div class="widget widget-cart px-3 pt-2 pb-3">
                                    <div data-simplebar data-simplebar-auto-hide="false">
                                        @php $subtotall = 0; @endphp
                                        @foreach($cartitem['item'] as $cart)
                                            <div class="widget-cart-item pb-2 mb-2 border-bottom">
                                                <a href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" class="close text-danger" onClick="return confirm('{{ __('Are you sure you want to delete?') }}');">
                                                    <span aria-hidden="true">&times;</span>
                                                </a>
                                                <div class="media align-items-center">
                                                    <a class="d-block mr-2" href="{{ url('/item') }}/{{ $cart->item_slug }}">
                                                        @if($cart->item_thumbnail!='')
                                                            <img width="64" class="cart-thumb-small" src="{{ url('/') }}/public/storage/items/{{ $cart->item_thumbnail }}" alt="{{ $cart->item_name }}" class="cart-thumb-small">
                                                        @else
                                                            <img width="64" class="cart-thumb-small" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->item_name }}" class="cart-thumb-small">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <h6 class="widget-product-title"><a class="title" href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">{{ substr($cart->item_name,0,20).'...' }}</a></h6>
                                                        <div class="widget-product-meta">
                                                            <span class="text-accent mr-2">{{ $allsettings->site_currency }} {{ $cart->item_price }}</span>
                                                        </div>
                                                        <div class="cat">
                                                            <a href="{{ URL::to('/shop') }}/item-type/{{ $cart->item_type }}" class="theme-color">
                                                                <span class="lnr lnr-book theme-color"></span>{{ str_replace('-',' ',$cart->item_type) }}
                                                            </a>         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @php $subtotall += $cart->item_price; @endphp
                                        @endforeach
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                        <div class="font-size-sm mr-2 py-2">
                                            <span class="text-muted">{{ Helper::translation(2896,$translate) }} :</span>
                                            <span class="text-accent font-size-base ml-1">{{ $subtotall }} {{ $allsettings->site_currency }}</span>
                                        </div>
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ url('/cart') }}">{{ Helper::translation(3021,$translate) }}<i class="dwg-arrow-right ml-1 mr-n1"></i></a>
                                    </div>
                                    <a class="btn btn-primary btn-sm btn-block" href="{{ url('/checkout') }}"><i class="dwg-card mr-2 font-size-base align-middle"></i>{{ Helper::translation(2899,$translate) }}</a>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>


                <div class="collapse navbar-collapse mr-auto order-lg-2" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group-overlay d-lg-none my-3">
                        <div class="input-group-prepend-overlay">
                            <span class="input-group-text"><i class="dwg-search"></i></span>
                        </div>
                        <form action="{{ route('shop') }}" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="{{ Helper::translation(3030,$translate) }}">
                        </form>
                    </div>

                    

                    <!-- Primary menu-->
                    
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ url('/shop') }}" data-toggle="dropdown">{{ Helper::translation(3025,$translate) }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item dropdown-item-color" href="{{ url('/shop') }}/recent-items">{{ Helper::translation(3026,$translate) }}</a></li>
                                <li><a class="dropdown-item dropdown-item-color" href="{{ url('/shop') }}/featured-items">{{ Helper::translation(3027,$translate) }}</a></li>
                                <li><a class="dropdown-item dropdown-item-color" href="{{ url('/free-items') }}">{{ Helper::translation(3016,$translate) }}</a></li>
                                <li><a class="dropdown-item dropdown-item-color" href="{{ url('/top-authors') }}">{{ Helper::translation(3028,$translate) }}</a></li>
                            </ul>
                        </li>

                        @foreach($categories['menu'] as $menu)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('/shop/category/') }}/{{$menu->cat_id}}/{{$menu->category_slug}}">{{ $menu->category_name }}</a>
                            <ul class="dropdown-menu">
                            @foreach($menu->subcategory as $sub_category)
                                <li>
                                    <a class="dropdown-item dropdown-item-color" href="{{ URL::to('/shop/subcategory/') }}/{{$sub_category->subcat_id}}/{{$sub_category->subcategory_slug}}">{{ $sub_category->subcategory_name }}</a>
                                </li>
                                @endforeach  
                            </ul>
                        </li>
                        @endforeach 

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">{{ Helper::translation(3029,$translate) }}</a>
                            <ul class="dropdown-menu">
                                @foreach($allpages['pages'] as $pages)
                                    <li>
                                        <a class="dropdown-item dropdown-item-color" href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ URL::to('/flash-sale') }}">{{ Helper::translation(2993,$translate) }}</a>
                        </li>
                    </ul>
                    
                </div>




            </div>
        </div>
        <div class="search-box collapse" id="searchBox">
          <div class="card pt-2 pb-4 border-0 rounded-0">
            <div class="container">
              <div class="input-group-overlay">
                <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="dwg-search"></i></span></div>
                <form action="{{ route('shop') }}" id="search_form2" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input class="form-control prepended-form-control" type="text" name="product_item" id="product_item_top" placeholder="{{ Helper::translation(3030,$translate) }}">
                </form>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</header>


