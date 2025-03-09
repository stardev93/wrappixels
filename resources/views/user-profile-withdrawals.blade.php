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
                                <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(3211,$translate) }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                        <h1 class="h3 mb-0 text-white">{{ Helper::translation(3211,$translate) }}</h1>
                    </div>

                </div>
            </div>

            <div class="topbar-text text-nowrap d-none d-md-inline-block col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="text-white line-height-base">
                        {{ Helper::translation(3211,$translate) }}
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 offset-md-1">
                        <ul class="breadcrumb">
                            <li style="list-style:none;">
                                <a class="text-white line-height-base" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate) }} / </a>
                            </li>
                            <li class="text-white line-height-base" aria-current="page">{{ Helper::translation(3211,$translate) }}</li>
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
                        <h2 class="h4 py-2 text-center text-sm-left">{{ Helper::translation(3212,$translate) }} <span class="link-color">{{ $allsettings->site_minimum_withdrawal }} {{ $allsettings->site_currency }}</span></h2>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('withdrawal') }}" class="setting_form" method="post" id="item_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="withdraw_module cardify">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="modules__title">
                                                    <h3>{{ Helper::translation(3213,$translate) }}</h3>
                                                </div>

                                                <div class="modules__content">
                                                    
                                                    <div class="options">
                                                        @php $no = 1; @endphp
                                                        @foreach($withdraw_option as $withdraw) 
                                                        <div class="custom-radio">
                                                            <input type="radio" id="withdrawal-{{ $withdraw }}" class="" name="withdrawal" value="{{ $withdraw }}" @if($no == 1) checked @endif>
                                                            <label for="withdrawal-{{ $withdraw }}">
                                                                <span class="circle"></span>{{ $withdraw }}</label>
                                                        </div>
                                                        
                                                        
                                                        @php $no++; @endphp
                                                        @endforeach
                                                        <div class="withdraw_amount" id="ifpaypal">
                                                            <div class="input-group">
                                                                <label class="payemail">{{ Helper::translation(3214,$translate) }}</label>
                                                                <input type="text" id="paypal_email" name="paypal_email" class="text_field" data-bvalidator="email,required">
                                                            </div>
                                                            
                                                        </div> 
                                                        
                                                        <div class="withdraw_amount" id="ifstripe">
                                                            <div class="input-group">
                                                                <label class="payemail">{{ Helper::translation(3215,$translate) }}</label>
                                                                <input type="text" id="stripe_email" name="stripe_email" class="text_field" data-bvalidator="email,required">
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="withdraw_amount" id="ifpaystack">
                                                            <div class="input-group">
                                                                <label class="payemail">Paystack Email ID</label>
                                                                <input type="text" id="paystack_email" name="paystack_email" class="text_field" data-bvalidator="email,required">
                                                            </div>
                                                            
                                                        </div> 
                                                        
                                                        <div class="withdraw_amount" id="iflocalbank">
                                                            <div class="input-group">
                                                                <label class="payemail">{{ Helper::translation(4816,$translate) }}</label>
                                                                <textarea id="bank_details" name="bank_details" class="text_field" data-bvalidator="required"></textarea>
                                                                <small><strong>Example:</strong><br/>
                                                                Bank Name : Test Bank<br/>
                                                                Branch Name : Test Branch<br/>
                                                                Branch Code : 00000<br/>
                                                                IFSC Code : 63632EF</small>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="modules__title">
                                                    <h3>{{ Helper::translation(3216,$translate) }}</h3>
                                                </div>

                                                <div class="modules__content">
                                                    <p class="subtitle">{{ Helper::translation(3217,$translate) }}</p>
                                                    <div class="options">
                                                        <div>
                                                            
                                                            <label>
                                                                <span class="circle"></span>{{ Helper::translation(3218,$translate) }}:
                                                                <span class="bold">{{ Auth::user()->earnings }} {{ $allsettings->site_currency }}</span>
                                                            </label>
                                                        </div>

                                                        <input type="hidden" name="available_balance" value="{{ base64_encode(Auth::user()->earnings) }}">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="user_token" value="{{ Auth::user()->user_token }}">

                                                        <div class="withdraw_amount">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">{{ $allsettings->site_currency }}</span>
                                                                <input type="text" id="rlicense" name="get_amount" class="text_field" data-bvalidator="digit,min[{{ $allsettings->site_minimum_withdrawal }}],max[{{ Auth::user()->earnings }}],required">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="button_wrapper">
                                                        <button type="submit" class="btn btn--md btn-outline-accent">{{ Helper::translation(3219,$translate) }}</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
           

                        <div class="row">
                            <div class="col-md-12">
                                <div class="withdraw_module withdraw_history">
                                    <div class="withdraw_table_header">
                                        <h3>{{ Helper::translation(3220,$translate) }}</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table withdraw__table">
                                            <thead>
                                                <tr>
                                                    <th>{{ Helper::translation(3172,$translate) }}</th>
                                                    <th>{{ Helper::translation(3213,$translate) }}</th>
                                                    <th>{{ Helper::translation(3214,$translate) }}</th>
                                                    <th>{{ Helper::translation(3215,$translate) }}</th>
                                                    <th>Paystack Email ID</th>
                                                    <th>{{ Helper::translation(4816,$translate) }}</th>
                                                    <th>{{ Helper::translation(3224,$translate) }}</th>
                                                    <th>{{ Helper::translation(2873,$translate) }}</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($itemData['item'] as $withdrawal)
                                                <tr>
                                                    <td>{{ date('d F Y', strtotime($withdrawal->wd_date)) }}</td>
                                                    <td>{{ $withdrawal->withdraw_type }}</td>
                                                    <td>@if($withdrawal->paypal_email != ""){{ $withdrawal->paypal_email }}@else <span>---</span> @endif</td>
                                                    <td>@if($withdrawal->stripe_email != ""){{ $withdrawal->stripe_email }}@else <span>---</span> @endif</td>
                                                    <td>@if($withdrawal->paystack_email != ""){{ $withdrawal->paystack_email }}@else <span>---</span> @endif</td>
                                                    <td>@if($withdrawal->bank_details != "") @php echo nl2br($withdrawal->bank_details); @endphp @else <span>---</span> @endif</td>
                                                    <td class="bold">{{ $withdrawal->wd_amount }} {{ $allsettings->site_currency }}</td>
                                                    <td class="@if($withdrawal->wd_status == 'pending') pending @else paid @endif">
                                                        <span>{{ $withdrawal->wd_status }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



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