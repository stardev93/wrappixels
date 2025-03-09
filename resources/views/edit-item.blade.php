@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2935,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
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
                    {{ Helper::translation(2935,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/favourites') }}">{{ Helper::translation(2935,$translate) }}</a>
                        </li>
                        <!-- <li class="active" style="list-style:none;">
                            {{ $type_name->item_type_name }}
                        </li> -->
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
                        <form action="{{ route('edit-item') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>{{ Helper::translation(2936,$translate) }}</h3>
                                </div>
                                

                                <div class="modules__content">
                                    
                                    
                                    <input type="hidden" name="item_type" value="{{ $edit['item']->item_type }}">
                                    <input type="hidden" name="type_id" value="{{ $typer_id }}">
                                    
                                    <div class="form-group">
                                        <label for="product_name">{{ Helper::translation(2938,$translate) }} <sup>*</sup>
                                            <span>({{ Helper::translation(2939,$translate) }})</span>
                                        </label>
                                        <input type="text" id="item_name" name="item_name" class="text_field" value="{{ $edit['item']->item_name }}" data-bvalidator="required,maxlen[100]">
                                    </div>
                                    
                                    <div class="form-group no-margin">
                                        <p class="label">{{ Helper::translation(2940,$translate) }} <sup>*</sup></p>
                                        <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required">{{ $edit['item']->item_shortdesc }}</textarea>
                                    </div>
                                    

                                    <div class="form-group no-margin">
                                        <p class="label">{{ Helper::translation(2941,$translate) }} <sup>*</sup></p>
                                        <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['item']->item_desc) }}</textarea>
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
                                                    <input type="file" id="item_thumbnail" name="item_thumbnail" class="files"><br/>
                                        @if($edit['item']->item_thumbnail!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $edit['item']->item_thumbnail }}" alt="{{ $edit['item']->item_name }}" class="item-thumb">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $edit['item']->item_name }}" class="item-thumb">
                                        @endif
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2945,$translate) }} <sup>*</sup>
                                                <span>({{ Helper::translation(2946,$translate) }} : 361x230px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="item_preview" name="item_preview" class="files"><br/>
                                        @if($edit['item']->item_preview!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $edit['item']->item_preview }}" alt="{{ $edit['item']->item_name }}" class="item-thumb">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $edit['item']->item_name }}" class="item-thumb">
                                        @endif
                                                    
                                                </label>
                                            </div>
                                            

                                           
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2947,$translate) }} <sup>*</sup>
                                                <span>({{ Helper::translation(2948,$translate) }})</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="main_file">
                                                    <input type="file" id="item_file" name="item_file" class="files">
                                                    @if($allsettings->site_s3_storage == 1)
                                                    @php $fileurl = Storage::disk('s3')->url($edit['item']->item_file); @endphp
                                                    <a href="{{ $fileurl }}" download>{{ $edit['item']->item_file }}</a>
                                                    @else
                                                    @if($edit['item']->item_file!='')
                                                    <a href="{{ url('/') }}/public/storage/items/{{ $edit['item']->item_file }}" download>{{ $edit['item']->item_file }}</a>
                                                    @endif
                                                    @endif
                                                    
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group mb-0 pb-0">
                                        <div class="upload_wrapper">
                                            <p class="label">{{ Helper::translation(2950,$translate) }}
                                                <span>({{ Helper::translation(2946,$translate) }} : 750x430px)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="screenshot">
                                                    <input type="file" id="item_screenshot" name="item_screenshot[]" class="files"><br/><br/>@foreach($item_image['item'] as $item)
                                                    
                                                    <div class="item-img"><img src="{{ url('/') }}/public/storage/items/{{ $item->item_image }}" alt="{{ $item->item_image }}" class="item-thumb">
                                                    <a href="{{ url('/edit-item') }}/dropimg/{{ base64_encode($item->itm_id) }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');" class="drop-icon"><span class="lnr lnr-trash drop-icon"></span></a>
                                                    </div>
                                                    
                                                    @endforeach
                                                   
                                                </label>
                                            </div>
                                            

                                            
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="tags">Video Preview Type (optional)</label>
                                        <div class="select-wrap select-wrap2">
                                                <select name="video_preview_type" id="video_preview_type" class="text_field">
                                                <option value=""></option>
                                                    <option value="youtube" @if($edit['item']->video_preview_type == 'youtube') selected @endif>Youtube</option>
                                                    <option value="mp4" @if($edit['item']->video_preview_type == 'mp4') selected @endif>MP4</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                    </div>
                                    
                                    <div id="youtube" @if($edit['item']->video_preview_type == 'youtube') class="form-group force-block" @else class="form-group force-none" @endif>
                                        <label for="tags">{{ Helper::translation(2967,$translate) }}
                                            
                                        </label>
                                        <input type="text" id="video_url" name="video_url" class="text_field" data-bvalidator="required" value="{{ $edit['item']->video_url }}">
                                        <small>({{ Helper::translation(2968,$translate) }} : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                    </div>
                                    
                                    <div id="mp4" @if($edit['item']->video_preview_type == 'mp4') class="form-group force-block" @else class="form-group force-none" @endif>
                                        <label for="tags">Upload MP4 Video <sup>*</sup></label>
                                        <input type="file" id="video_file" name="video_file" class="text_field files"><small>(MP4 - file only)</small>
                                        @if($allsettings->site_s3_storage == 1)
                                        @php $videofileurl = Storage::disk('s3')->url($edit['item']->video_file); @endphp
                                        <br/><a href="{{ $videofileurl }}" download>{{ $edit['item']->video_file }}</a>
                                        @else
                                        <br/>@if($edit['item']->video_file!='')
                                        <a href="{{ url('/') }}/public/storage/items/{{ $edit['item']->video_file }}"  download>{{ $edit['item']->video_file }}</a>                                        @endif
                                        @endif
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
                                               <option value="category_{{ $menu->cat_id }}" @if($cat_name == 'category') @if($menu->cat_id == $cat_id) selected="selected" @endif @endif>{{ $menu->category_name }}</option>
                                                @foreach($menu->subcategory as $sub_category)
                                                <option value="subcategory_{{$sub_category->subcat_id}}" @if($cat_name == 'subcategory') @if($sub_category->subcat_id == $cat_id) selected="selected" @endif @endif> - {{ $sub_category->subcategory_name }}</option>
                                                @endforeach  
                                            @endforeach
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                  
                                       
                                    </div>
                                    @if(count($attribute['fields']) != 0)
                                    @foreach($attri_field['display'] as $attribute_field)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="tags">{{ $attribute_field->attr_label }}<sup>*</sup></label>
                                            @php 
                                                $field_value=explode(',',$attribute_field->attr_field_value); 
                                                $checkpackage=explode(',',$attribute_field->item_attribute_values);
                                                @endphp
                                                @if($attribute_field->attr_field_type == 'multi-select')
                                                <div class="select-wrap select-wrap2">
                                                <select  name="attributes_{{ $attribute_field->attr_id }}[]" class="text_field" multiple="multiple" data-bvalidator="required">
                                                @foreach($field_value as $field)
                                                <option value="{{ $field }}" @if(in_array($field,$checkpackage)) selected="selected" @endif>{{ $field }}</option>
                                                @endforeach
                                                </select>
                                                </div>
                                                @endif
                                                @if($attribute_field->attr_field_type == 'single-select')
                                                <div class="select-wrap select-wrap2">
                                                <select name="attributes_{{ $attribute_field->attr_id }}[]" class="text_field" data-bvalidator="required">
                                                  <option value=""></option>
                                                  @foreach($field_value as $field)
                                                  <option value="{{ $field }}" @if($attribute_field->item_attribute_values == $field) selected @endif>{{ $field }}</option>
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
                                    @else
                                    @foreach($attri_field['display'] as $attribute_field)
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">{{ $attribute_field->attr_label }} <span class="require">*</span></label>
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
                                       @endforeach
                                    @endif
                                    <!-- end /.row -->
                                    
                                    
                                    <div class="form-group">
                                        <label for="tags">{{ Helper::translation(2966,$translate) }}
                                            
                                        </label>
                                        <input type="text" id="demo_url" name="demo_url" class="text_field" value="{{ $edit['item']->demo_url }}" data-bvalidator="url">
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                                <label for="selected">{{ Helper::translation(2969,$translate) }} <sup>*</sup></label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="free_download" id="free_download" class="text_field" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" @if($edit['item']->free_download == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0" @if($edit['item']->free_download == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            </div>
                                    
                                    <div class="form-group">
                                                <label for="selected">{{ Helper::translation(2972,$translate) }}</label>
                                                <div class="select-wrap select-wrap2">
                                                <select name="item_flash_request" id="item_flash_request" class="text_field">
                                                <option value=""></option>
                                                    <option value="1" @if($edit['item']->item_flash_request == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0" @if($edit['item']->item_flash_request == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                            <small>({{ Helper::translation(2973,$translate) }})</small>
                                            </div>
                                       
                                    <div class="form-group">
                                        <label for="tags">{{ Helper::translation(2974,$translate) }}
                                           
                                        </label>
                                        <textarea name="item_tags" id="item_tags" class="text_field">{{ $edit['item']->item_tags }}</textarea>
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
                                                    <option value="1" @if($edit['item']->future_update == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0" @if($edit['item']->future_update == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
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
                                                    <option value="1" @if($edit['item']->item_support == 1) selected="selected" @endif>{{ Helper::translation(2970,$translate) }}</option>
                                                    <option value="0" @if($edit['item']->item_support == 0) selected="selected" @endif>{{ Helper::translation(2971,$translate) }}</option>
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
                                                    <input type="text" id="regular_price" name="regular_price" class="text_field" value="{{ $edit['item']->regular_price }}" data-bvalidator="digit,min[1],required">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense">{{ Helper::translation(2980,$translate) }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">{{ $allsettings->site_currency }}</span>
                                                    <input type="text" id="extended_price" name="extended_price" class="text_field" value="@if($edit['item']->extended_price==0) @else {{ $edit['item']->extended_price }} @endif" data-bvalidator="digit,min[1]">
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <input type="hidden" name="save_file" value="{{ $edit['item']->item_file }}">
                            <input type="hidden" name="save_thumbnail" value="{{ $edit['item']->item_thumbnail }}">
                            <input type="hidden" name="save_preview" value="{{ $edit['item']->item_preview }}">
                            <input type="hidden" name="save_extended_price" value="{{ $edit['item']->extended_price }}">
                            <input type="hidden" name="item_token" value="{{ $edit['item']->item_token }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="save_video_file" value="{{ $edit['item']->video_file }}">
                            @if($allsettings->item_approval == 0)
                            <button type="submit" class="btn btn--fullwidth btn--lg btn-outline-accent">{{ Helper::translation(2981,$translate) }}</button>
                            @else
                            <button type="submit" class="btn btn--fullwidth btn--lg btn-outline-accent">{{ Helper::translation(2876,$translate) }}</button>
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
	$(document).ready(function()
	{
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