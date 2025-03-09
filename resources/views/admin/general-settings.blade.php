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
                        <h1>General Settings</h1>
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

@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)
      
         {{$error}}
      
     @endforeach
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
                           @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                           <form action="{{ route('admin.general-settings') }}" method="post" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Title <span class="require">*</span></label>
                                                <input id="site_title" name="site_title" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_title }}" required>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Meta Description (max 160 chars)<span class="require">*</span></label>
                                                
                                            <textarea name="site_desc" id="site_desc" rows="6" placeholder="site description" class="form-control noscroll_textarea" maxlength="160" required>{{ $setting['setting']->site_desc }}</textarea>
                                            </div>
                                                
                                               <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Meta Keywords (max 160 chars)<span class="require">*</span></label>
                                                
                                            <textarea name="site_keywords" id="site_keywords" rows="6" placeholder="separate keywords with commas" class="form-control noscroll_textarea" maxlength="160" required>{{ $setting['setting']->site_keywords }}</textarea>
                                            </div>  
                                                
                                                
                                              <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Currency <span class="require">*</span></label>
                                                <select name="site_currency" class="form-control" required>
                                                <option value=""></option>
                                                @foreach($currencyData['currency'] as $currency)
                                                <option value="{{ $currency->currency_code }}" @if($currency->currency_code == $setting['setting']->site_currency) selected="selected" @endif>{{ $currency->currency_code }}</option>
                                                @endforeach
                                                </select>
                                                
                                            </div>  
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Banner (size 1920 x 300)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_banner" name="site_banner" class="form-control-file" @if($setting['setting']->site_banner == '') required @endif>
                                            @if($setting['setting']->site_banner != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_banner }}" />
                                                @endif
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Item Auto Approval? <span class="require">*</span></label>
                                                <select name="item_approval" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->item_approval == 1) selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->item_approval == 0) selected @endif>No</option>
                                                </select>
                                                <small>(if <strong>Yes</strong> selected vendor item will published automatically) </small>
                                                
                                            </div>  
                                            
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_blog_adbanner" class="control-label mb-1">Blog Ad Banner (size 360 x 270)</label>
                                                
                                            <input type="file" id="site_blog_adbanner" name="site_blog_adbanner" class="form-control-file">
                                            @if($setting['setting']->site_blog_adbanner != '')
                                                <img height="50" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_blog_adbanner }}" />
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Blog Ad Banner Link</label>
                                                <input id="site_blog_adbanner_link" name="site_blog_adbanner_link" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_blog_adbanner_link }}" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Email</label>
                                                <input id="office_email" name="office_email" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_email }}" required>
                                            </div>
                                                
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Phone Number</label>
                                                <input id="office_phone" name="office_phone" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->office_phone }}" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Address<span class="require">*</span></label>
                                                
                                            <textarea name="office_address" id="office_address" rows="6" class="form-control noscroll_textarea" required>{{ $setting['setting']->office_address}}</textarea>
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Home Page Layout?</label>
                                                <select name="site_layout" class="form-control">
                                                <option value=""></option>
                                                <option value="" @if($setting['setting']->site_layout == "") selected @endif>Normal</option>
                                                <option value="tooltip" @if($setting['setting']->site_layout == "tooltip") selected @endif>Tooltip</option>
                                                </select>
                                                
                                                
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Footer Newsletter Content <span class="require">*</span></label>
                                                <input id="site_newsletter" name="site_newsletter" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_newsletter }}" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Google Analytics</label>
                                                <input id="google_analytics" name="google_analytics" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->google_analytics }}">
                                                <span>Example : UA-xxxxxx-1</span>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Multi Language?</label>
                                                <select name="multi_language" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->multi_language == "1") selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->multi_language == "0") selected @endif>No</option>
                                                </select>
                                                
                                                
                                            </div> 
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">New Registration For Email Verification?<span class="require">*</span></label><br/>                                         <select name="email_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->email_verification == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->email_verification == 0) selected @endif>OFF</option>
                                                        </select>
                                                        <small>(If selected "OFF" automatically verified customers / vendors)</small>
                                            </div>
                                            
                                           <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Manual Payment Verification?<span class="require">*</span></label><br/>                                         <select name="payment_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->payment_verification == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->payment_verification == 0) selected @endif>OFF</option>
                                                        </select>
                                                        <small>(If selected "OFF" users can download file immediately after payment without approval)</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Maintenance Mode?<span class="require">*</span></label><br/>                                         <select name="maintenance_mode" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->maintenance_mode == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->maintenance_mode == 0) selected @endif>OFF</option>
                                                        </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Maintenance Mode Title</label>
                                                <input id="m_mode_title" name="m_mode_title" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->m_mode_title }}" @if($setting['setting']->maintenance_mode == 1) required @endif>
                                                
                                            </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                             
                             <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Banner Heading <span class="require">*</span></label>
                                                <input id="site_banner_heading" name="site_banner_heading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_banner_heading }}" required>
                                            </div>  
                                            
                              <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Banner Sub Heading <span class="require">*</span></label>
                                                <input id="site_banner_subheading" name="site_banner_subheading" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_banner_subheading }}" required>
                                            </div>              
                             
                             
                             <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Favicon (max 24 x 24)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_favicon" name="site_favicon" class="form-control-file" @if($setting['setting']->site_favicon == '') required @endif>
                                            @if($setting['setting']->site_favicon != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_favicon }}" />
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Logo (size 180 x 50)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_logo" name="site_logo" class="form-control-file" @if($setting['setting']->site_logo == '') required @endif>
                                            @if($setting['setting']->site_logo != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_logo }}" />
                                                @endif
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Watermark?<span class="require">*</span></label>
                                                <select name="watermark_option" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" @if($setting['setting']->watermark_option == "1") selected @endif>Yes</option>
                                                <option value="0" @if($setting['setting']->watermark_option == "0") selected @endif>No</option>
                                                </select>
                                                
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Watermark Image</label>
                                                
                                            <input type="file" id="site_watermark" name="site_watermark" class="form-control-file">
                                            @if($setting['setting']->site_watermark != '')
                                                <img height="150" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_watermark }}" />
                                                @endif
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Primary Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_primary_color" name="site_primary_color" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_primary_color }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Secondary Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_secondary_color" name="site_secondary_color" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_secondary_color }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Button Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_button_color" name="site_button_color" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_button_color }}" required>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">How Many Category Display On Menu? <span class="require">*</span></label>
                                                <input id="site_menu_category" name="site_menu_category" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_menu_category }}" required>
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Item, Review, Sale, Purchase Per Page <span class="require">*</span></label>
                                                <input id="site_item_per_page" name="site_item_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_item_per_page }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Post Per Page <span class="require">*</span></label>
                                                <input id="site_post_per_page" name="site_post_per_page" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_post_per_page }}" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Price range min price <span class="require">*</span></label>
                                                <input id="site_range_min_price" name="site_range_min_price" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_range_min_price }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Price range max price <span class="require">*</span></label>
                                                <input id="site_range_max_price" name="site_range_max_price" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_range_max_price }}" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Homepage Count Background (size 1920 x 350)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_count_bg" name="site_count_bg" class="form-control-file" @if($setting['setting']->site_count_bg == '') required @endif>
                                            @if($setting['setting']->site_count_bg != '')
                                                <img height="24" src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->site_count_bg }}" />
                                                @endif
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Homepage Newest Files Category Display Count <span class="require">*</span></label>
                                                <input id="site_category_newest_files" name="site_category_newest_files" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_category_newest_files }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Homepage Newest Files Display Count <span class="require">*</span></label>
                                                <input id="site_newest_files" name="site_newest_files" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_newest_files }}" required>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flash Sale End Date <span class="require">*</span></label>
                                                <input id="site_flash_end_date" name="site_flash_end_date" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_flash_end_date }}" required>
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Free File End Date <span class="require">*</span></label>
                                                <input id="site_free_end_date" name="site_free_end_date" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->site_free_end_date }}" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Blog<span class="require">*</span></label><br/>                                         <select name="site_blog_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->site_blog_display == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->site_blog_display == 0) selected @endif>OFF</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Homepage Blog Post Display?<span class="require">*</span></label><br/>                                         <select name="home_blog_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" @if($setting['setting']->home_blog_display == 1) selected @endif>ON</option>
                                                        <option value="0" @if($setting['setting']->home_blog_display == 0) selected @endif>OFF</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Maintenance Mode Content</label>
                                                <input id="m_mode_content" name="m_mode_content" type="text" class="form-control noscroll_textarea" value="{{ $setting['setting']->m_mode_content }}" @if($setting['setting']->maintenance_mode == 1) required @endif>
                                                
                                            </div>
                                            
                                               
                                                 <input type="hidden" name="save_count_bg" value="{{ $setting['setting']->site_count_bg }}">
                                                <input type="hidden" name="save_blog_adbanner" value="{{ $setting['setting']->site_blog_adbanner }}">
                                                <input type="hidden" name="save_banner" value="{{ $setting['setting']->site_banner }}">
                                                <input type="hidden" name="save_logo" value="{{ $setting['setting']->site_logo }}">
                                                <input type="hidden" name="save_favicon" value="{{ $setting['setting']->site_favicon }}">
                                                <input type="hidden" name="save_watermark" value="{{ $setting['setting']->site_watermark }}">
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
