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
                        <h1>{{ $edit['item']->item_type_name }} - Attributes</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/item-type') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a>
                        </ol>
                    </div>
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
                           <form action="{{ route('admin.attributes') }}" method="post" id="checkout_form" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           @endif
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                            @if($edit['item']->item_type_slug == 'scripts' or $edit['item']->item_type_slug == 'plugins')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Compatible Browsers</label>
                                                <textarea name="compatible_browsers" id="compatible_browsers" class="form-control" rows="5">{{ $allattributes->compatible_browsers }}</textarea>
                                                <small>(every text separated by commas. ex: Internet Explorer,Mozilla Firefox,Google Chrome,....ect)</small>
                                            </div>
                                            @endif
                                            @if($edit['item']->item_type_slug == 'themes')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Package Includes</label>
                                                <textarea name="package_includes_two" id="package_includes_two" class="form-control" rows="5">{{ $allattributes->package_includes_two }}</textarea>
                                                <small>(every text separated by commas. ex: Layered PNG,Layered PSD,JPG Image,....ect)</small>
                                            </div>
                                            @endif
                                            @if($edit['item']->item_type_slug == 'themes')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Layout</label>
                                                <textarea name="layout" id="layout" class="form-control" rows="5">{{ $allattributes->layout }}</textarea>
                                                <small>(every text separated by commas. ex: Responsive,Fixed,Liquid,....ect)</small>
                                            </div>
                                            @endif
                                            @if($edit['item']->item_type_slug == 'print' or $edit['item']->item_type_slug == 'graphics')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Package Includes</label>
                                                <textarea name="package_includes_three" id="package_includes_three" class="form-control" rows="5">{{ $allattributes->package_includes_three }}</textarea>
                                                <small>(every text separated by commas. ex: Photoshop PSD,Transparent PNG,Layered PNG,JPG Image,....ect)</small>
                                            </div>
                                            @endif
                                            @if($edit['item']->item_type_slug == 'mobile-apps')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Package Includes</label>
                                                <textarea name="package_includes_four" id="package_includes_four" class="form-control" rows="5">{{ $allattributes->package_includes_four }}</textarea>
                                                <small>(every text separated by commas. ex: .apk,.dex,.so,.dat,....ect)</small>
                                            </div>
                                            @endif
                                           
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                            @if($edit['item']->item_type_slug == 'scripts' or $edit['item']->item_type_slug == 'plugins')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Package Includes</label>
                                                <textarea name="package_includes" id="package_includes" class="form-control" rows="5">{{ $allattributes->package_includes }}</textarea>
                                                <small>(every text separated by commas. ex: JavaScript JS,JavaScript JSON,HTML,....ect)</small>
                                            </div>
                                            @endif
                                            @if($edit['item']->item_type_slug == 'themes')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Columns</label>
                                                <textarea name="columns" id="columns" class="form-control" rows="5">{{ $allattributes->columns }}</textarea>
                                                <small>(every text separated by commas. ex: 1,2,3,4+,....ect)</small>
                                            </div>
                                            @endif 
                                            @if($edit['item']->item_type_slug == 'print' or $edit['item']->item_type_slug == 'graphics')
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Minimum Adobe CS Version</label>
                                                <textarea name="cs_version" id="cs_version" class="form-control" rows="5">{{ $allattributes->cs_version }}</textarea>
                                                <small>(every text separated by commas. ex: CS,CS2,CS3,CS4,,....ect)</small>
                                            </div>
                                            @endif 
                            
                             
                             </div>
                                </div>

                            </div>
                             
                             <input type="hidden" name="attr_id" value="1">
                             <input type="hidden" name="save_compatible_browsers" value="{{ $allattributes->compatible_browsers }}">
                             <input type="hidden" name="save_package_includes_two" value="{{ $allattributes->package_includes_two }}">
                             <input type="hidden" name="save_layout" value="{{ $allattributes->layout }}">
                             <input type="hidden" name="save_package_includes_three" value="{{ $allattributes->package_includes_three }}">
                             <input type="hidden" name="save_package_includes_four" value="{{ $allattributes->package_includes_four }}">
                             <input type="hidden" name="save_package_includes" value="{{ $allattributes->package_includes }}">
                             <input type="hidden" name="save_columns" value="{{ $allattributes->columns }}">
                             <input type="hidden" name="save_cs_version" value="{{ $allattributes->cs_version }}">
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
