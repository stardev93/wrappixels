<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ __('Payment Approval Cancelled') }}</title>
    
</head>

<body class="preload dashboard-upload">

    
    
    
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ __('Payment Approval Cancelled') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p><strong>Your payment approval is cancelled and amount will be credit on your account. Please check your earning balance on your account</strong></p>   
                        
                        <p><strong> your payment is : </strong> {{ $total_price }} {{ $currency }}</p>   
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
    
    
   

    
</body>

</html>