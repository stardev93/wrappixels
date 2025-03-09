<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                @if($allsettings->site_logo != '')
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}"  alt="{{ $allsettings->site_title }}" width="180"/></a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,10) }}</a>
                @endif
                @if($allsettings->site_favicon != '')
                <a class="navbar-brand hidden" href="{{ url('/') }}"><img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}"  alt="{{ $allsettings->site_title }}" width="24"/></a>
                @else
                <a class="navbar-brand hidden" href="{{ url('/') }}">{{ substr($allsettings->site_title,0,1) }}</a>
                @endif
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/admin') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/general-settings') }}">General Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/currency-settings') }}">Currency Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/country-settings') }}">Country Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/email-settings') }}">Email Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/media-settings') }}">Media Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/badges-settings') }}">Badges Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/payment-settings') }}">Payment Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="{{ url('/admin/social-settings') }}">Social Settings</a></li>
                        </ul>
                    </li>
                    
                   <li class="menu-item-has-children dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Members</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-user"></i><a href="{{ url('/admin/customer') }}">Customers</a></li>
                            <li><i class="fa fa-user"></i><a href="{{ url('/admin/vendor') }}">Vendors</a></li>
                         </ul>
                    </li>
                                       
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-text-o"></i><a href="{{ url('/admin/pages') }}">Pages</a></li>
                           </ul>
                    </li>

                   

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/category') }}">Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/sub-category') }}">Sub Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/items') }}">Items</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/item-type') }}">Item Type</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/attributes') }}">Attributes</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="{{ url('/admin/orders') }}">Orders</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ url('/admin/refund') }}"> <i class="menu-icon fa fa-paper-plane"></i>Refund Request </a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/admin/rating') }}"> <i class="menu-icon fa fa-star"></i>Rating & Reviews </a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/admin/withdrawal') }}"> <i class="menu-icon fa fa-money"></i>Withdrawal Request </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/blog-category') }}">Category</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="{{ url('/admin/post') }}">Post</a></li>
                        </ul>
                    </li>
                    
                    
                    
                    <li>
                        <a href="{{ url('/admin/highlights') }}"> <i class="menu-icon fa fa-magic"></i>Features </a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/admin/start-selling') }}"> <i class="menu-icon fa fa-shopping-cart"></i>Start Selling </a>
                    </li>
                    
                    
                    <li>
                        <a href="{{ url('/admin/contact') }}"> <i class="menu-icon fa fa-address-book-o"></i>Contact </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/newsletter') }}"> <i class="menu-icon fa fa-newspaper-o"></i>Newsletter </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/languages') }}"> <i class="menu-icon fa fa-language"></i>Languages </a>
                    </li>
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>