<?php

namespace Feberr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Feberr\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Feberr\Models\Settings;
use Feberr\Models\Pages;
use Auth;
use Mail;


class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
    
	public function logout(Request $request) {
	  Auth::logout();
	  return redirect('/login');
    }
	
	
	public function view_contact()
	{
	  
	  $contactData['view'] = Pages::getcontactData();
	  $data = array('contactData' => $contactData);
	  return view('admin.contact')->with($data);
	}
	
	
	public function view_contact_delete($id)
	{
	   Pages::deleteContact($id);
	   return redirect()->back()->with('success','Contact details has been deleted');
	}
	
	/* newsletter */
	
	public function view_newsletter()
	{
	  
	  $newsData['view'] = Pages::getnewsletterData();
	  $data = array('newsData' => $newsData);
	  return view('admin.newsletter')->with($data);
	
	}
	
	public function view_newsletter_delete($id)
	{
	   Pages::deleteNewsletter($id);
	   return redirect()->back()->with('success','Delete successfully.');
	}
	
	
	public function view_send_updates()
	{
	  $newsData['view'] = Pages::getactiveNewsletter();
	  $data = array('newsData' => $newsData);
	  return view('admin.send-updates')->with($data);
	}
	
	
	public function send_updates(Request $request)
	{
	   
	   
	   $news_heading = $request->input('news_heading');
	   $news_content = $request->input('news_content');
	   $news_email = $request->input('news_email');
	   
	     
         
		 $request->validate([
		 
							
					'news_heading' => 'required',
					'news_content' => 'required',		
							
							
         ]);
		 
		  
		 
         
		 
		 $rules = array(
				
				
				
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
		   
		   foreach($news_email as $to_email)
		   {
		     
			    $sid = 1;
				$setting['setting'] = Settings::editGeneral($sid);
				$from_name = $setting['setting']->sender_name;
				$from_email = $setting['setting']->sender_email;
				$record = array('news_heading' => $news_heading, 'news_content' => $news_content);
				Mail::send('admin.newsletter_update_mail', $record, function($message) use ($from_name, $from_email, $to_email) {
					$message->to($to_email)
							->subject('Newsletter Updates');
					$message->from($from_email,$from_name);
				});
		
		   
		   }
		
			
           return redirect()->back()->with('success', 'Your message has been sent successfully.');
            
 
        } 
     
	
	
	}
	
	
	
	/* newsletter */
	
	
}
