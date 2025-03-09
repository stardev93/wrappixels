@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(4782,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload term-condition-page">

    @include('header')
   
    <section class="term_condition_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
                    <div class="cardify term_modules">
                        <div class="row justify-content-center pb-2 mb-2 mt-5 pt-5">
                        <div class="col-md-6 mx-auto">
                        <h3>{{ Helper::translation(4783,$translate) }} <span>:</span> {{ $allsettings->site_currency }}{{ $final_amount }}</h3>
                        </div>
                        </div> 
                        <div class="row justify-content-center pb-2 mb-2 mt-2 pt-2">
                <div class="col-md-6 mx-auto">
                    <div class="card bg-light mb-3">
                <div class="card-body">
                <form action="{{ route('2checkout') }}" class="needs-validation" id="subscribe_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                   <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="info-title black" for="exampleInputName">{{ Helper::translation(4784,$translate) }} <span class="red">*</span></label>
                                        <input id="ccNo" type="text" size="20" value="" class="form-control" autocomplete="off" data-bvalidator="required" placeholder="{{ Helper::translation(4785,$translate) }}" />
                                    </div>
                                </div>
                                
                            </div>
                       <div class="row">
                       <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="info-title black" for="exampleInputName">{{ Helper::translation(4786,$translate) }} <span class="red">*</span></label>
                                        <input type="number" size="2" id="expMonth" class="form-control" data-bvalidator="required,maxlen[2]" placeholder="{{ Helper::translation(4790,$translate) }}" />
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="info-title black" for="exampleInputName">{{ Helper::translation(4787,$translate) }} <span class="red">*</span></label>
                                        <input type="number" size="4" id="expYear" class="form-control" data-bvalidator="required,maxlen[4]" placeholder="{{ Helper::translation(4791,$translate) }}" />
                                    </div>
                                </div>
                                </div>     
                     <div class="row">
                       <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="info-title black" for="exampleInputName">{{ Helper::translation(4788,$translate) }} <span class="red">*</span></label>
                                        <input id="cvv" size="4" type="number" class="form-control" value="" autocomplete="off" data-bvalidator="required,maxlen[4]" />
                                    </div>
                                </div>
                                </div>
                                <input type="hidden" name="two_checkout_private" value="{{ $two_checkout_private }}">
                                <input type="hidden" name="two_checkout_account" value="{{ $two_checkout_account }}">
                                <input type="hidden" name="two_checkout_mode" value="{{ $two_checkout_mode }}">
                                <input type="hidden" name="purchase_token" value="{{ $purchase_token }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="site_currency" value="{{ $site_currency }}">
                                <input type="hidden" name="amount" value="{{ base64_encode($final_amount) }}">
                                <input type="hidden" name="product_names" value="{{ $item_names_data }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
                                <div class="mx-auto">
                        <button type="submit" class="btn btn--sm theme-button">{{ Helper::translation(4789,$translate) }}</button>
                        </div>
                   </form>
                   </div>
                   </div>
                   </div>
                   </div>
                        
                        <!-- end /.term -->
                    </div>
                    <!-- end /.term_modules -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    
    
   @include('footer')
    
   @include('javascript')
<!--- 2Checkout --->
<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
<script>
            
			
			
            var successCallback = function(data) {
                var myForm = document.getElementById('subscribe_form');

                
                myForm.token.value = data.response.token.token;

                
                myForm.submit();
            };

           
            var errorCallback = function(data) {
                if (data.errorCode === 200) {
                    tokenRequest();
                } else {
                    alert(data.errorMsg);
                }
            };

            var tokenRequest = function() {
                
                var args = {
                    sellerId: "{{ $two_checkout_account }}",
                    publishableKey: "{{ $two_checkout_publishable }}",
                    ccNo: $("#ccNo").val(),
                    cvv: $("#cvv").val(),
                    expMonth: $("#expMonth").val(),
                    expYear: $("#expYear").val()
					
                };

               
                TCO.requestToken(successCallback, errorCallback, args);
            };
			
			

            $(function() {
			
			  
                
                TCO.loadPubKey('sandbox');

                $("#subscribe_form").submit(function(e) {
                    
                    tokenRequest();

                    
                    return false;
                });
				
				
				
				
            });
			
			
			
 </script>
<!-- 2Checkout --->    
</body>

</html>
@else
@include('503')
@endif