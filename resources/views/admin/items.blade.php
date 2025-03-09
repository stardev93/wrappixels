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
                        <h1>Items</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
                        <ol class="breadcrumb text-right">
                            <button onClick="myFunction()" class="btn btn-success btn-sm dropbtn"><i class="fa fa-plus"></i> Add Item</button>
                            <div id="myDropdown" class="dropdown-content">
                                @foreach($viewitem['type'] as $item_type)
                                @php $encrypted = $encrypter->encrypt($item_type->item_type_id); @endphp
                                <a href="{{ URL::to('/admin/upload-item') }}/{{ $encrypted }}">{{ $item_type->item_type_name }}</a>
                                @endforeach
                            </div>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Items</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Item Image</th>
                                            <th width="100">Item Name</th>
                                            <th>Featured Item?</th>
                                            <th>Free Item?</th>
                                            <th>Flash Request?</th>
                                            <th>Vendor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>@if($item->item_thumbnail != '') <img height="50" width="50" src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}"/>@else <img height="50" width="50" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}" />  @endif</td>
                                            <td><a href="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank" class="black-color">{{ substr($item->item_name,0,50) }}</a></td>
                                            
                                            
                                            <td>@if($item->item_featured == 'no') No @else Yes @endif <a href="items/{{ $item->item_featured }}/{{ $item->item_token }}" style="font-size:12px; color:#0000FF; text-decoration:underline;">Can you change?</a></td>
                                            <td>@if($item->free_download == 1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif</td>
                                            <td>@if($item->item_flash_request == 1) @if($item->item_flash == 0) <span class="badge badge-danger">Waiting for approval</span> @else <span class="badge badge-success">Approved</span> @endif @else <span>---</span> @endif</td>
                                            <td><a href="{{ url('/user') }}/{{ $item->username }}" target="_blank" class="black-color">{{ $item->username }}</a></td>
                                            <td>@if($item->item_status == 1) <span class="badge badge-success">Approved</span> @elseif($item->item_status == 2) <span class="badge badge-danger">Rejected</span> @else <span class="badge badge-warning">UnApproved</span> @endif</td>
                                            <td><a href="edit-item/{{ $item->item_token }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                            @else
                                            <a href="items/{{ $item->item_token }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>@endif</td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                                        
                                    </tbody>
                                </table>
                            </div>
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
