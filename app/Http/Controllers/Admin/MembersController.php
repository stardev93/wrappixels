<?php

namespace Feberr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Feberr\Http\Controllers\Controller;
use Session;
use Feberr\Models\Members;
use Feberr\Models\Settings;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	/* customer */
	
    public function customer()
    {
        
		
		$userData['data'] = Members::getuserData();
		return view('admin.customer',[ 'userData' => $userData]);
    }
	
	public function add_customer()
	{
	   
	   return view('admin.add-customer');
	}
	
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	public function save_customer(Request $request)
	{
 
    
         $name = $request->input('name');
		 $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 $password = bcrypt($request->input('password'));
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 
		 
		 $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:7',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		if ($request->hasFile('user_photo')) {
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = "";
		  }
		  $verified = 1;
		  $token = $this->generateRandomString();
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token);
 
            
            Members::insertData($data);
            return redirect()->back()->with('success', 'Insert successfully.');
            
 
       } 
     
    return redirect('/admin/add-customer');
  }
  
  
  public function delete_customer($token){

      $data = array('drop_status'=>'yes');
	  
      Members::deleteData($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  public function edit_customer($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   return view('admin.edit-customer', [ 'edit' => $edit, 'token' => $token]);
	}
	
	
	public function update_customer(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 if(!empty($request->input('earnings')))
		 {
		 $earnings = $request->input('earnings');
         }
		 else
		 {
		   $earnings = 0;
		 }
		 
		  $token = $request->input('edit_id');
		  
		 $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
         
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'password' => 'min:7',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'user_token') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droPhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
 
            
            
			Members::updateData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       return redirect('/admin/customer');
	
	
	}
	
	/* customer */
	
	
	/* vendor */
	
	public function vendor()
    {
        
		$userData['data'] = Members::getvendorData();
		return view('admin.vendor',[ 'userData' => $userData]);
    }
	
	public function add_vendor()
	{
	   
	   return view('admin.add-vendor');
	}
	
	
	public function edit_vendor($token)
	{
	   
	   $edit['userdata'] = Members::editData($token);
	   return view('admin.edit-vendor', [ 'edit' => $edit, 'token' => $token]);
	}
	
	/* vendor */
	
    
	
	/* edit profile */
	
	
	public function edit_profile()
    {
        $token = 1;
		$edit['userdata'] = Members::editprofileData($token);
		
		return view('admin.edit-profile', [ 'edit' => $edit, 'token' => $token]);
		
    }
	
	
	
	public function update_profile(Request $request)
	{
	
	   $name = $request->input('name');
	   $username = $request->input('username');
         $email = $request->input('email');
		 $user_type = $request->input('user_type');
		 
		 if(!empty($request->input('password')))
		 {
		 $password = bcrypt($request->input('password'));
		 $pass = $password;
		 }
		 else
		 {
		 $pass = $request->input('save_password');
		 }
		 
		 
		 
		  $token = $request->input('edit_id');
		 
         $allsettings = Settings::allSettings();
		  $image_size = $allsettings->site_max_image_size;
		 $request->validate([
							'name' => 'required',
							'username' => 'required',
							'email' => 'required|email',
							'user_photo' => 'mimes:jpeg,jpg,png,gif|max:'.$image_size,
							
         ]);
		 $rules = array(
				'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				'email' => ['required', 'email', 'max:255', Rule::unique('users') ->ignore($token, 'id') -> where(function($sql){ $sql->where('drop_status','=','no');})],
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		if ($request->hasFile('user_photo')) {
		     
			Members::droprofilePhoto($token); 
		   
			$image = $request->file('user_photo');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/users');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$user_image = $img_name;
		  }
		  else
		  {
		     $user_image = $request->input('save_photo');
		  }
		  
		 
		 
		$data = array('name' => $name, 'username' => $username, 'email' => $email,'user_type' => $user_type, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
 
            
            
			Members::updateprofileData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	/* edit profile */
	
	
	
}
