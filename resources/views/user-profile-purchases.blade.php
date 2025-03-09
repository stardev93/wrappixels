@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3200,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload author-followers">

    @include('header')

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="topbar-text dropdown d-md-none">
                <!-- <div class="container d-lg-flex justify-content-between py-2 py-lg-3" style="padding-bottom: 2rem !important;"> -->
                <div class="container d-lg-flex justify-content-between py-lg-3" style="padding-bottom: 2rem !important;">
                    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                                <li class="breadcrumb-item">
                                    <a class="text-nowrap" href="{{ URL::to('/') }}">
                                        <i class="dwg-home"></i>{{ Helper::translation(2862,$translate) }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(3024,$translate) }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                        <h1 class="h3 mb-0 text-white">{{ Helper::translation(3024,$translate) }}</h1>
                    </div>

                </div>
            </div>

            <div class="topbar-text text-nowrap d-none d-md-inline-block col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="text-white line-height-base">
                        {{ Helper::translation(3024,$translate) }}
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 offset-md-1">
                        <ul class="breadcrumb">
                            <li style="list-style:none;">
                                <a class="text-white line-height-base" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate) }} / </a>
                            </li>
                            <li class="text-white line-height-base" aria-current="page">{{ Helper::translation(3024,$translate) }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container mb-5 pb-3" style="margin-top:-3.5rem">
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


        <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
            <div class="row">
                <!-- Sidebar-->
                <aside class="col-lg-4">
                    <!-- Account menu toggler (hidden on screens larger 992px)-->
                    <div class="d-block d-lg-none p-4">
                        <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i>Account menu</a>
                    </div>
                        <!-- Actual menu-->
                    <div class="cz-sidebar-static rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
                        <div class="px-4 mb-4">
                            <div class="media align-items-center">
                                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
                                    @if($user['user']->user_photo != '')
                                        <img class="rounded-circle" src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_photo }}" alt="{{ $user['user']->username }}">
                                        @else
                                        <img class="rounded-circle" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user['user']->username }}">
                                    @endif    
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="font-size-base mb-0">{{ $user['user']->username }}</h3><span class="text-accent font-size-sm">{{ $user['user']->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-secondary px-4 py-3">
                            <h3 class="font-size-sm mb-0 text-muted">Account</h3>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/user-profile') }}/{{ $user['user']->username }}"><i class="dwg-settings opacity-60 mr-2"></i>{{ Helper::translation(2926,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-purchases') }}/{{ $user['user']->username }}"><i class="dwg-basket opacity-60 mr-2"></i>{{ Helper::translation(3024,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-favourites') }}/{{ $user['user']->username }}"><i class="dwg-heart opacity-60 mr-2"></i>{{ Helper::translation(2929,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-withdrawals') }}/{{ $user['user']->username }}"><i class="dwg-currency-exchange opacity-60 mr-2"></i>{{ Helper::translation(2933,$translate) }}</a></li>
                            <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a></li>
                        </ul>
                    </div>          
                </aside>

                <!-- Content-->
                <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                    <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
                        
                        <!-- Product-->
                        @foreach($orderData['item'] as $item)
                            <div class="media d-block d-sm-flex align-items-center py-4 border-bottom">
                                <a class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto" href="item/Sectetur-adipiscing-elit" style="width: 12.5rem;">
                                    @if($item->item_thumbnail!='')
                                        <img style="width:200px" class="rounded-lg" src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}">
                                    @else
                                        <img style="width:200px" class="rounded-lg" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                                    @endif
                                </a>

                                <div class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto">
                                    <h3 class="h6 product-title mb-2">
                                        <a href="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ $item->item_name }}</a>
                                    </h3>
                                    <div class="text-accent font-size-sm">
                                        <strong>Price :</strong> {{ $item->item_price }} {{ $allsettings->site_currency }}
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center justify-content-sm-start">
                                        <a class="d-block text-muted text-center my-2" href="javascript:void(0);" data-toggle="modal" data-target="#myModal_{{ $item->ord_id }}">
                                        @if($item->rating != 0)
                                            @if($item->rating == 1)
                                                <div class="star-rating">
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                </div>
                                            @endif
                                            @if($item->rating == 2)
                                                <div class="star-rating">
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                </div>
                                            @endif
                                            @if($item->rating == 3)
                                                <div class="star-rating">
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                    <i class="sr-star dwg-star"></i>
                                                </div>
                                            @endif
                                            @if($item->rating == 4)
                                                <div class="star-rating">
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>>
                                                    <i class="sr-star dwg-star"></i>
                                                </div>
                                            @endif
                                            @if($item->rating == 5)
                                                <div class="star-rating">
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                    <i class="sr-star dwg-star-filled active"></i>
                                                </div>
                                            @endif
                                        @else
                                            <div class="star-rating">
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            </div>
                                        @endif
                                            <div class="font-size-xs">
                                                Rate this product
                                            </div>
                                        </a>
                                    </div>
                                
                                    <div class="d-flex">
                                        
                                        @if($item->approval_status != 'payment released to buyer')
                                            @if($item->approval_status == 'payment released to vendor')
                                                <a href="{{ url('/purchases') }}/{{ $item->item_token }}" class="btn btn-primary btn-sm mr-3"><i class="dwg-download mr-1"></i>{{ Helper::translation(3144,$translate) }}</a>
                                                <a href="{{ url('/invoice') }}/{{ $item->item_token }}/{{ $item->ord_id }}" class="btn btn-danger btn-sm mr-3"><i class="dwg-download mr-1"></i>{{ __('Invoice') }}</a>
                                            @else
                                                <span id="card-errors">{{ Helper::translation(4812,$translate) }}</span>
                                            @endif
                                        @else
                                            <span id="card-errors">{{ $item->approval_status }}</span>
                                        @endif
                                        
                                    </div>
                                </div>

                                <div class="d-block mb-3 mb-sm-0 mr-sm-4 mx-auto">
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ __('Order Id :') }} </strong> {{ $item->ord_id }}</div>
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ __('Purchase Id :') }} </strong> {{ $item->purchase_token }}</div>
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ Helper::translation(3102,$translate) }}:</strong> {{ date("d F Y", strtotime($item->start_date)) }}</div>
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ Helper::translation(3103,$translate) }}:</strong> {{ date("d F Y", strtotime($item->end_date)) }}</div>
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ Helper::translation(3105,$translate) }}:</strong> {{ $item->license }}</div>
                                    <div class="text-accent font-size-sm mb-1"><strong>{{ Helper::translation(3142,$translate) }}:</strong> {{ $item->username }}</div>
                                    @if($item->approval_status != 'payment released to buyer')
                                        <div class="text-accent font-size-sm mb-1"><strong>{{ Helper::translation(3143,$translate) }}:</strong> <a href="javascript:void(0);" data-toggle="modal" data-target="#refund_{{ $item->ord_id }}"> Send Request</a></div>
                                    @endif
                                </div>
                            </div>

                            <div class="modal fade" id="myModal_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Rating this Item</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('purchases') }}" method="post" id="profile_form" enctype="multipart/form-data">
                                            {{ csrf_field() }}  
                                            <div class="modal-body">
                                                <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                                                <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                                                <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                                                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                                <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                                                <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">{{ Helper::translation(3154,$translate) }}</label>
                                                    <select name="rating" class="form-control" required>
                                                        <option value="1" @if($item->rating == 1) selected @endif>1</option>
                                                        <option value="2" @if($item->rating == 2) selected @endif>2</option>
                                                        <option value="3" @if($item->rating == 3) selected @endif>3</option>
                                                        <option value="4" @if($item->rating == 4) selected @endif>4</option>
                                                        <option value="5" @if($item->rating == 5) selected @endif>5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Rating Reason</label>
                                                        <select name="rating_reason" class="form-control" required>
                                                            <option value="design" @if($item->rating_reason == 'design') selected @endif>{{ Helper::translation(3156,$translate) }}</option>
                                                            <option value="customization" @if($item->rating_reason == 'customization') selected @endif>{{ Helper::translation(3157,$translate) }}</option>
                                                            <option value="support" @if($item->rating_reason == 'support') selected @endif>{{ Helper::translation(3055,$translate) }}</option>
                                                            <option value="performance" @if($item->rating_reason == 'performance') selected @endif>{{ Helper::translation(3158,$translate) }}</option>
                                                            <option value="documentation" @if($item->rating_reason == 'documentation') selected @endif>{{ Helper::translation(3159,$translate) }}</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">{{ Helper::translation(3054,$translate) }}</label>
                                                    <textarea name="rating_comment" id="rating_comment" class="form-control" required="required">{{ $item->rating_comment }}</textarea>
                                                        <p>{{ Helper::translation(3160,$translate) }}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn--md btn-outline-accent">{{ Helper::translation(3161,$translate) }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="refund_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ Helper::translation(3143,$translate) }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('refund') }}" method="post" id="profile_form" enctype="multipart/form-data">
                                            {{ csrf_field() }} 
                                            <div class="modal-body">
                                            <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                                                <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                                                <input type="hidden" name="purchased_token" value="{{ $item->purchase_token }}">
                                                <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                                                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                                <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                                                <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">{{ Helper::translation(3146,$translate) }}</label>
                                                    <select name="refund_reason" class="form-control" required>
                                                        <option value="{{ Helper::translation(3147,$translate) }}">{{ Helper::translation(3147,$translate) }}</option>
                                                        <option value="{{ Helper::translation(3148,$translate) }}">{{ Helper::translation(3148,$translate) }}</option>
                                                        <option value="{{ Helper::translation(3149,$translate) }}">{{ Helper::translation(3149,$translate) }}</option>
                                                        <option value="{{ Helper::translation(3150,$translate) }}">{{ Helper::translation(3150,$translate) }}</option>
                                                        <option value="{{ Helper::translation(3151,$translate) }}">{{ Helper::translation(3151,$translate) }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">{{ Helper::translation(3054,$translate) }}</label>
                                                    <textarea name="refund_comment" id="refund_comment" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn--md btn-outline-accent">{{ Helper::translation(3152,$translate) }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        @endforeach 

                    </div> 
                </section>
            </div>
        </div>
    </div>
    
   @include('footer')
    
   @include('javascript')
</body>

</html>
@else
@include('503')
@endif