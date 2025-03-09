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
                        <h1>Withdrawal Request</h1>
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
                                <strong class="card-title">Withdrawal Request</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>User Name</th>
                                            <th>Date</th>
                                            
                                            <th>Withdrawal Type</th>
                                            <th>Paypal Email</th>
                                            <th>Stripe Email</th>
                                            <th>Paystack Email</th>
                                            <th width="200">Bank Details</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $withdraw)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $withdraw->username }}" target="_blank" class="blue-color">{{ $withdraw->username }}</a></td>
                                            <td>{{ $withdraw->wd_date }} </td>
                                            <td>{{ $withdraw->withdraw_type }} </td>
                                            <td>@if($withdraw->paypal_email != "") {{ $withdraw->paypal_email }} @else <span>---</span> @endif</td>
                                            <td>@if($withdraw->stripe_email != "") {{ $withdraw->stripe_email }} @else <span>---</span> @endif</td>
                                            <td>@if($withdraw->paystack_email != "") {{ $withdraw->paystack_email }} @else <span>---</span> @endif</td>
                                            <td width="200">@if($withdraw->bank_details != "") @php echo nl2br($withdraw->bank_details); @endphp @else <span>---</span> @endif</td>
                                            <td>{{ $withdraw->wd_amount }} {{ $allsettings->site_currency }}</td>
                                            <td>
                                            @if($withdraw->wd_status == 'pending')
                                            <a href="{{ URL::to('/admin/withdrawal') }}/{{ $withdraw->wd_id }}/{{ $withdraw->wd_user_id }}" class="btn btn-success btn-sm" onClick="return confirm('Are you sure you want to complete withdrawal request?');"><i class="fa fa-money"></i>&nbsp; Complete Withdrawal</a>
                                            
                                            @else
                                            <span class="badge badge-success">{{ $withdraw->wd_status }}</span>
                                            @endif
                                            </td>
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
