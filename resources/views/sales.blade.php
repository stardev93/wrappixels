@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2930,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload dashboard-statement">

    @include('header')
    @if(Auth::user()->user_type == 'vendor')
    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(2930,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/sales') }}">{{ Helper::translation(2930,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

   
    <section class="dashboard-area">


        <div class="dashboard_contents dashboard_statement_area">
            <div class="container">
               

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-tag icon mcolorbg1"></span>
                                <div class="info">
                                    <p>{{ $total_sale }} {{ $allsettings->site_currency }}</p>
                                    <span>{{ Helper::translation(3039,$translate) }}</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-cart icon mcolorbg2"></span>
                                <div class="info">
                                    <p>{{ $purchase_sale }} {{ $allsettings->site_currency }}</p>
                                    <span>{{ Helper::translation(3169,$translate) }}</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-dice icon mcolorbg3"></span>
                                <div class="info">
                                    <p>{{ $credit_amount }} {{ $allsettings->site_currency }}</p>
                                    <span>{{ Helper::translation(3170,$translate) }}</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-briefcase icon mcolorbg4"></span>
                                <div class="info">
                                    <p>{{ $drawal_amount }} {{ $allsettings->site_currency }}</p>
                                    <span>{{ Helper::translation(3171,$translate) }}</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->
                </div>
                <!-- end /.row -->
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ Helper::translation(3172,$translate) }}</th>
                                        <th>{{ Helper::translation(3173,$translate) }}</th>
                                        <th>{{ Helper::translation(3174,$translate) }}</th>
                                        <th>{{ Helper::translation(3175,$translate) }}</th>
                                        <th>{{ Helper::translation(2888,$translate) }}</th>
                                        <th>{{ Helper::translation(3106,$translate) }}</th>
                                        <th>{{ Helper::translation(2922,$translate) }}</th>
                                    </tr>
                                </thead>

                                <tbody id="listShow">
                                @foreach($orderData['item'] as $item)
                                    <tr class="li-item">
                                        <td>{{ date("d F Y", strtotime($item->payment_date)) }}</td>
                                        
                                        <td class="author">{{ $item->purchase_token }}</td>
                                        <td class="detail">
                                            {{ $item->payment_token }}
                                        </td>
                                        <td class="type">
                                            {{ $item->payment_type }}
                                        </td>
                                        <td>{{ $item->total }} {{ $allsettings->site_currency }}</td>
                                        <td class="earning theme-color">{{ $item->vendor_amount }} {{ $allsettings->site_currency }}</td>
                                        <td>
                                            <a href="{{ URL::to('/sales') }}/{{ $item->purchase_token }}" class="btn btn--sm theme-button">{{ Helper::translation(3177,$translate) }}</a>
                                        </td>
                                    </tr>
                                @endforeach 
                                   
                                    
                                    
                                </tbody>
                            </table>

                           <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                        
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    @else
    @include('not-found')
    @endif
    <!--================================
            END DASHBOARD AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
   @include('footer')
    
   @include('javascript')
</body>

</html>
@else
@include('503')
@endif