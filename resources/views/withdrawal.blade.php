@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3211,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload dashboard-withdraw">

    @include('header')

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(3211,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/withdrawal') }}">{{ Helper::translation(3211,$translate) }}</a>
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
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area clearfix">
                            <div class="dashboard__title pull-left">
                                <h3>{{ Helper::translation(3212,$translate) }} <span class="theme-color">{{ $allsettings->site_minimum_withdrawal }} {{ $allsettings->site_currency }}</span></h3>
                            </div>

                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- end /.dashboard_title_area -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                
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
                                        <!-- end /.options -->
                                    </div>
                                    <!-- end /.modules__content -->
                                </div>
                                <!-- end /.col-md-6 -->

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
                                            <button type="submit" class="btn btn--md theme-button">{{ Helper::translation(3219,$translate) }}</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.col-md-6 -->
                            </div>
                            <!-- end /.row -->
                        </div>
                        </form>
                        <!-- end /.withdraw_module -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

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