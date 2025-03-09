@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2931,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
    
</head>

<body class="preload dashboard-upload">

    @include('header')
    @if(Auth::user()->user_type == 'vendor')
   
    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(2931,$translate) }}
                    </h1>
                </div>

                <div class="col-md-3 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/upload-item') }}">{{ Helper::translation(2931,$translate) }} /</a>
                        </li>
                        <li class="active" style="list-style:none;">
                           
                            <a class="text-white line-height-base" href="#"> {{ $type_name->item_type_name }}</</a>
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
                    <div class="col-lg-8 col-md-7">
                        <form action="{{ route('upload-item') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2936,$translate) }}</h3>
                                </div>
                                

                                <div class="modules__content">
                                    
                                     
                                     <input type="hidden" name="item_type" value="{{ $type_name->item_type_slug }}">
                                     <input type="hidden" name="type_id" value="{{ $type_id }}">       
                                    
                                    <div class="form-group">
                                        <label for="product_name">{{ Helper::translation(2938,$translate) }} <sup>*</sup>
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input type="text" id="item_name" name="item_name" class="text_field" data-bvalidator="required,maxlen[100]">
                                    </div>
                                    
                                    <div class="form-group no-margin">
                                        <p class="label">{{ Helper::translation(2940,$translate) }} <sup>*</sup></p>
                                        <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                    </div>
                                    

                                    <div class="form-group no-margin">
                                        <p class="label">{{ Helper::translation(2941,$translate) }} <sup>*</sup></p>
                                        <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"></textarea>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules module--upload">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2942,$translate) }}</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2943,$translate) }} <sup>*</sup>
                                                <span>({{ Helper::translation(2946,$translate) }} : 80x80px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="item_thumbnail" name="item_thumbnail" class="files">
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->
                                    
                                    
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2945,$translate) }} <sup>*</sup>
                                                <span>({{ Helper::translation(2946,$translate) }} : 361x230px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="item_preview" name="item_preview" class="files">
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2947,$translate) }} <sup>*</sup>
                                                <span>({{ Helper::translation(2948,$translate) }})</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="main_file">
                                                    <input type="file" id="item_file" name="item_file" class="files">
                                                    
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2950,$translate) }}
                                                <span>({{ Helper::translation(2946,$translate) }} : 750x430px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="screenshot">
                                                    <input type="file" id="item_screenshot" name="item_screenshot[]" class="files">
                                                   
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="tags">Video Preview Type (optional)
                                            
                                        </label>
                                        <div class="select-wrap select-wrap2">
                                                <select name="video_preview_type" id="video_preview_type" class="text_field">
                                                <option value=""></option>
                                                    <option value="youtube">Youtube</option>
                                                    <option value="mp4">MP4</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                    </div>
                                    
                                    
                                    <div class="form-group" id="youtube">
                                        <label for="tags">{{ Helper::translation(2967,$translate) }} <sup>*</sup></label>
                                        <input type="text" id="video_url" name="video_url" class="text_field" data-bvalidator="required">
                                        <small>(example : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                    </div>
                                    
                                    
                                    <div class="form-group" id="mp4">
                                        <label for="tags">Upload MP4 Video <sup>*</sup></label>
                                        <input type="file" id="video_file" name="video_file" class="text_field files"><small>(MP4 - file only)</small>
                                    </div>
                                    
                                    <!-- end /.form-group -->
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2951,$translate) }}</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                    
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category">{{ Helper::translation(2952,$translate) }} <sup>*</sup></label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="item_category" id="item_category" class="text_field" data-bvalidator="required">
                                            <option value="">Select</option>
                                            @foreach($categories['menu'] as $menu)
                                                
                                                <option value="category_{{ $menu->cat_id }}">{{ $menu->category_name }}</option>
                                                @foreach($menu->subcategory as $sub_category)
                                                <option value="subcategory_{{$sub_category->subcat_id}}"> - {{ $sub_category->subcategory_name }}</option>
                                                @endforeach  
                                            @endforeach
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                    </div>
                                    
                                  
                                  
                                  
                                  
                                  
                                
                                       
                                    </div>

                                    @foreach($attribute['fields'] as $attribute_field)
                                    <div class="row">
                                        <div class="col-md-12">
                                         <div class="form-group">
                                        <label for="tags">{{ $attribute_field->attr_label }}<sup>*</sup></label>
                                        @php $field_value=explode(',',$attribute_field->attr_field_value); @endphp
                                                @if($attribute_field->attr_field_type == 'multi-select')
                                                <div class="select-wrap select-wrap2">
                                                <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="text_field" multiple="multiple" data-bvalidator="required">
                                                @foreach($field_value as $field)
                                                <option value="{{ $field }}">{{ $field }}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'single-select')
                                                <div class="select-wrap select-wrap2">
                                                <select name="attributes_{{ $attribute_field->attr_id }}[]" class="text_field" data-bvalidator="required">
                                                  <option value=""></option>
                                                  @foreach($field_value as $field)
                                                  <option value="{{ $field }}">{{ $field }}</option>
                                                  @endforeach
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'textbox')
                                                <input name="attributes_{{ $attribute_field->attr_id }}[]" type="text" class="text_field" data-bvalidator="required">
                                                @endif
                                        
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- end /.row -->
                                      
                                    <div class="form-group">
                                        <label for="tags">{{ Helper::translation(2966,$translate) }}
                                            
                                        </label>
                                        <input type="text" id="demo_url" name="demo_url" class="text_field" data-bvalidator="url">
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                                <label for="selected">{{ Helper::translation(2969,$translate) }} <sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="free_download" id="free_download" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1">{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0">{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                    
                                    <div class="form-group">
                                                <label for="selected">{{ Helper::translation(2972,$translate) }}</label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="item_flash_request" id="item_flash_request" class="text_field">
                                                <option value=""></option>
                                                    <option value="1">{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0">{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            <small>({{ Helper::translation(2973,$translate) }})</small>
                                            </div>
                                       
                                    <div class="form-group">
                                        <label for="tags">{{ Helper::translation(2974,$translate) }}
                                           
                                        </label>
                                        <textarea name="item_tags" id="item_tags" class="text_field"></textarea>
                                        <small>({{ Helper::translation(2975,$translate) }})</small>
                                    </div>
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->
                            
                            
                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2976,$translate) }}</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense">{{ Helper::translation(2977,$translate) }}<sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="future_update" id="future_update" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1">{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0">{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense">{{ Helper::translation(2978,$translate) }}<sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="item_support" id="item_support" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1">{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0">{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            
                            
                            
                            
                            
                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2888,$translate) }}</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense">{{ Helper::translation(2979,$translate) }}<sup>*</sup></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">{{ $allsettings->site_currency }}</span>
                                                    <input type="text" id="regular_price" name="regular_price" class="text_field" data-bvalidator="digit,min[1],required">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense">{{ Helper::translation(2980,$translate) }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">{{ $allsettings->site_currency }}</span>
                                                    <input type="text" id="extended_price" name="extended_price" class="text_field" data-bvalidator="digit,min[1]">
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @if($allsettings->item_approval == 0)
                            <button type="submit" class="btn btn--fullwidth btn--lg theme-button">{{ Helper::translation(2981,$translate) }}</button>
                            @else
                            <button type="submit" class="btn btn--fullwidth btn--lg theme-button">{{ Helper::translation(2876,$translate) }}</button>
                            @endif
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>{{ Helper::translation(2982,$translate) }}</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>{{ Helper::translation(2983,$translate) }}</h4>
                                        <p>{{ Helper::translation(2984,$translate) }} : <strong>jpeg, jpg, png</strong>
                                         </p>
                                         
                                    </div>

                                    <div class="card_info">
                                        <h4>{{ Helper::translation(2985,$translate) }}</h4>
                                        <p>{{ Helper::translation(2984,$translate) }} : <strong>zip</strong> format
                                        </p>
                                    </div>

                                    
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>{{ Helper::translation(2986,$translate) }}</h3>
                                </div>

                                <div class="card_content">
                                    <p>{{ Helper::translation(2987,$translate) }}</p><br/>
                                    <p>{{ Helper::translation(2988,$translate) }}</p>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            
                            <!-- end /.sidebar-card -->
                        </aside>
                        <!-- end /.sidebar -->
                    </div>
                    <!-- end /.col-md-4 -->
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
    
   @include('footer')
    
   @include('javascript')
<script type="text/javascript">
	$(document).ready(function(){
	$("#mp4").hide();
	$("#youtube").hide();	
	$('#video_preview_type').on('change', function() {
      if ( this.value == 'youtube')
      
      {
	     $("#youtube").show();
		 $("#mp4").hide();
	  }	
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
	  }
	  
	 });
});
</script>
    
</body>

</html>
@else
@include('503')
@endif