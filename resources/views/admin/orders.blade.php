@include('version')
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    @include('admin.stylesheet')
</head>

<body>
    
    @include('admin.navigation')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Orders</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
         @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Orders</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Order ID</th>
                                            <th>Buyer</th>
                                            <th>Vendor Amount</th>
                                            <th>Admin Amount</th>
                                            <th>Processing Fee</th>
                                            <th>Payment Type</th>
                                            <th>Payment Id</th>
                                            <th>Complete Payment? (Localbank Only)</th>
                                            <!--<th>Payment Approval?</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $order)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $order->purchase_token }} </td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $order->username }}" target="_blank" class="blue-color">{{ $order->username }}</a></td>
                                            <td>{{ $order->vendor_amount }} {{ $allsettings->site_currency }} </td>
                                            <td>{{ $order->admin_amount }} {{ $allsettings->site_currency }}</td>
                                            <td>{{ $order->processing_fee }} {{ $allsettings->site_currency }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>@if($order->payment_token != ""){{ $order->payment_token }}@else <span>---</span> @endif</td>
                                            <td>@if($order->payment_type == 'localbank' && $order->payment_status == 'pending') <a href="orders/{{ base64_encode($order->purchase_token) }}" class="blue-color"onClick="return confirm('Are you sure click to complete payment?');">Click to Complete Payment?</a> @else <span>---</span> @endif</td>
                                            <!--<td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-money"></i>&nbsp; Waiting for approval</a></td>-->
                                            <td><a href="order-details/{{ $order->purchase_token }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; View More</a></td>
                                        </tr>
                                        
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

 
                </div>
            </div>
        </div>


    </div>

    


   @include('admin.javascript')


</body>

</html>
