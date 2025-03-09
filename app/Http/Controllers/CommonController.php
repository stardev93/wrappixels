<?php

namespace Feberr\Http\Controllers;

use Illuminate\Http\Request;
use Feberr\Models\Members;
use Feberr\Models\Settings;
use Feberr\Models\Items;
use Feberr\Models\Blog;
use Feberr\Models\Category;
use Feberr\Models\Comment;
use Feberr\Models\Attribute;
use Feberr\Models\SubCategory;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Validation\Rule;
use URL;
use Cookie;
use Redirect;
//use Spatie\Sitemap\SitemapGenerator;

class CommonController extends Controller
{
    
	
	public function cookie_translate($id)
	{
	
	  Cookie::queue(Cookie::make('translate', $id, 3000));
      return Redirect::route('index')->withCookie('translate');
	  
	}
	
	public function view_start_selling()
	{
	  $setting['setting'] = Settings::editSelling();
	  $data = array('setting' => $setting);
	  return view('start-selling')->with($data);
	}
	
	
	public function view_preview($item_slug,$item_id)
	{
	   $item['item'] = Items::singleitemData($item_slug,$item_id);
	   $data = array('item' => $item);
	   return view('preview')->with($data);
	}
	
	public function not_found()
	{
	  return view('404');
	}

    public function view_index()
	{
	   
	   $blog['data'] = Blog::homeblogData();
	   $comments = Blog::getgroupcommentData();
	   $review['data'] = Items::homereviewsData();
	   $totalmembers = Members::getmemberData();
	   $totalsales = Items::totalsaleitemCount();
	   $totalfiles = Items::totalfileItems();
	   $total['earning'] = Items::totalearningCount();
	   $featured['items'] = Items::featuredItems();
	   $free['items'] = Items::freeItems();
	   
	   $sid = 1;
	   $setting['setting'] = Settings::editGeneral($sid);
	   $category_limit = $setting['setting']->site_category_newest_files;
	   $newest_limit = $setting['setting']->site_newest_files;
	   $newest['items'] = Category::homecategoryData($category_limit);
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->take($newest_limit)->get();
	   
	   
	   $totalearning = 0;
	   foreach($total['earning'] as $earning)
	   {
	     $totalearning += $earning->total_price;
	   } 
	   
	   $data = array('blog' => $blog, 'comments' => $comments, 'review' => $review, 'totalmembers' => $totalmembers, 'totalsales' => $totalsales, 'totalfiles' => $totalfiles, 'totalearning' => $totalearning, 'featured' => $featured, 'newest' => $newest, 'itemData' => $itemData, 'free' => $free);
	  //SitemapGenerator::create(URL::to('/'))->writeToFile('sitemap.xml');
	  
	  return view('index')->with($data);
	}
	
	public function payment_cancel()
	{
	  return view('cancel');
	}
	

    public function user_verify($user_token)
    {
        $data = array('verified'=>'1');
		$user['user'] = Members::verifyuserData($user_token, $data);
		
		return redirect('login')->with('success','Your e-mail is verified. You can now login.');
    }
	
	public function view_forgot()
	{
	   return view('forgot');
	}
	
	public function view_contact()
	{
	   return view('contact');
	}
	
	
	public function view_reset($token)
	{
	  $data = array('token' => $token);
	  return view('reset')->with($data);
	}
	
	
	public function view_unfollow($unfollow,$my_id,$follow_id)
	{
	  Items::unFollow($my_id,$follow_id);
	  return redirect()->back();
	  
	}
	
	public function view_free_item($item_token)
	{
	
	  $token = base64_decode($item_token);
	  
	  $item['data'] = Items::edititemData($token);
	  $item_count = $item['data']->download_count + 1;
	  $data = array('download_count' => $item_count);
	  Items::updateitemData($token,$data);
	  
	  $filename = public_path().'/storage/items/'.$item['data']->item_file;
		$headers = ['Content-Type: application/octet-stream'];
		$new_name = uniqid().time().'.zip';
		return response()->download($filename,$new_name,$headers);
	
	}
	
	
	
	
	public function view_follow($my_id,$follow_id)
	{
	   $user_id = $follow_id;
	   $followcheck = Items::getfollowuserCheck($user_id);
	   $data = array('follower_user_id' => $my_id, 'following_user_id' => $follow_id);
	   if($followcheck == 0)
	   {
	       Items::saveFollow($data);
	   }
	   else
	   {
	      return redirect()->back();
	   }
	   return redirect()->back();
	   
	}
	
	
	public function view_top_authors()
	{
	  
	  $user['user'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->leftJoin('item_order','item_order.item_user_id','users.id')->leftJoin('country','country.country_id','users.country')->where('users.drop_status','=','no')->where('users.id','!=',1)->orderByRaw('count(*) DESC')->groupBy('item_order.item_user_id')->get();
	  $count_items = Items::getgroupItems();
	  $count_sale = Items::getgroupSale();
	  $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	  $data = array('user' => $user,'count_items' => $count_items, 'count_sale' => $count_sale, 'badges' => $badges);
	  return view('top-authors')->with($data);
	}
	
	
	
	public function view_user_reviews($slug)
	{
	
	  $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
		
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-reviews')->with($data);
	
	}
	


	
	public function view_user_followers($slug)
	{
	  $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		
		}
		else
		{
		 $followcheck = 0;
		 
		}
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$viewfollowing['view'] = Items::getfollowerView($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		//$viewfollowing['view'] = Follow::with('followers')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('follow.following_user_id','=',$user_id)->orderBy('follow.fid', 'desc')->get();
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'viewfollowing' => $viewfollowing, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-followers')->with($data); 
	  
	}
	



	
	
	public function view_user_following($slug)
	{
	  $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	    $ratingview['list'] = Items::getreviewUser($user_id);
		$countreview = Items::getreviewCountUser($user_id);
		
		if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		
		}
		else
		{
		 $followcheck = 0;
		 
		}
		$followingcount = Items::getfollowingCount($user_id);
		
		$followercount = Items::getfollowerCount($user_id);
		
		$viewfollowing['view'] = Items::getfollowingView($user_id);
		
		$featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
		//$viewfollowing['view'] = Follow::with('followers')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('follow.following_user_id','=',$user_id)->orderBy('follow.fid', 'desc')->get();
		
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'ratingview' => $ratingview, 'countreview' => $countreview, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' =>  $followingcount, 'followercount' => $followercount, 'viewfollowing' => $viewfollowing, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-following')->with($data); 
	  
	}
	
	 public function view_user_profile_settings($slug)
    {
    	$user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	  
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	   return view('user-profile-settings')->with($data);
       
    }
	

	public function view_user_purchases_settings($slug)
	{
		$user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	   $orderData['item'] = Items::getuserOrders();
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count, 'orderData' => $orderData);
	   
	  
	  return view('user-profile-purchases')->with($data); 
	
	 
	}
	

	public function view_user_favourites($slug)
	{
		$user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	   $fav['item'] = Items::getfavitemData();

	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count, 'fav' => $fav);
	   return view('user-profile-favourites')->with($data);
	}




	public function view_user_withdrawals($slug)
	{
		$user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	   
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }
	   
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	   

	   $allsettings = Settings::allSettings();
	   $withdraw_option = explode(',', $allsettings->withdraw_option);
	   $itemData['item'] = Items::getdrawalData();
	  



	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count, 'withdraw_option' => $withdraw_option, 'itemData' => $itemData);
	   return view('user-profile-withdrawals')->with($data);
	}


	
	public function view_user($slug)
	{
	
	   $user['user'] = Members::getInuser($slug);
	   $user_id = $user['user']->id;
	   
	   /* badges */
	   $sid = 1;
	   $badges['setting'] = Settings::editBadges($sid);
	   $sold['item'] = Items::SoldAmount($user_id);
	   $sold_amount = 0;
	   foreach($sold['item'] as $iter)
	   {
			$sold_amount += $iter->total_price;
	   }
	   $country['view'] = Settings::editCountry($user['user']->country);
	   $membership = date('m/d/Y',strtotime($user['user']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	   $collect_amount = Items::CollectedAmount($user_id);
	   $referral_count = $user['user']->referral_count;
	   /* badges */
	
	   $itemData['item'] = Items::getuserItem($user_id);
	   
	   $since = date("F Y", strtotime($user['user']->created_at));
	   
	   $getitemcount = Items::getuseritemCount($user_id);
	   
	   $getsalecount = Items::getsaleitemCount($user_id);
	   
	   if (Auth::check())
		{
		$followcheck = Items::getfollowuserCheck($user_id);
		}
		else
		{
		 $followcheck = 0;
		}
	   
	   $followingcount = Items::getfollowingCount($user_id);
	   
	   $followercount = Items::getfollowerCount($user_id);
	   
		  $getreview  = Items::getreviewData($user_id);
		  if($getreview !=0)
		  {
			  $review['view'] = Items::getreviewRecord($user_id);
			  $top = 0;
			  $bottom = 0;
			  foreach($review['view'] as $review)
			  {
				 if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
				 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
				 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
				 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
				 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
				 
				 $top += $value1 + $value2 + $value3 + $value4 + $value5;
				 $bottom += $review->rating;
				 
			  }
			  if(!empty(round($top/$bottom)))
			  {
				$count_rating = round($top/$bottom);
			  }
			  else
			  {
				$count_rating = 0;
			  }
			  
			  
			  
		  }
		  else
		  {
			$count_rating = 0;
			$bottom = 0;
		  }

		  
	   $featured_count = Items::getfeaturedUser($user_id);
	   $free_count = Items::getfreeUser($user_id);
	   $tren_count = Items::getTrendUser($user_id);
	  
	
	   $data = array('user' => $user, 'since' => $since, 'itemData' => $itemData, 'getitemcount' => $getitemcount, 'getsalecount' => $getsalecount, 'count_rating' => $count_rating, 'bottom' => $bottom, 'getreview' => $getreview, 'followcheck' => $followcheck, 'followingcount' => $followingcount, 'followercount' => $followercount, 'badges' => $badges, 'sold_amount' => $sold_amount, 'country' => $country, 'year' => $year, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'featured_count' => $featured_count, 'free_count' => $free_count, 'tren_count' => $tren_count);
	
	   return view('user')->with($data);
	}
	
	
	public function send_message(Request $request)
	{
	  $message_text = $request->input('message');
	  $from_email = $request->input('from_email');
	  $from_name = $request->input('from_name');
	  $to_email = $request->input('to_email');
	  $to_name = $request->input('to_name');
	  		
		$record = array('message_text' => $message_text, 'from_name' => $from_name);
		Mail::send('user_mail', $record, function($message) use ($from_name, $from_email, $to_email, $to_name) {
			$message->to($to_email, $to_name)
					->subject('New message received');
			$message->from($from_email,$from_name);
		});
 
        return redirect()->back()->with('success','Your message has been sent successfully');     
		
	
	
	}
	
	
	
	public function update_reset(Request $request)
	{
	
	   $user_token = $request->input('user_token');
	   $password = bcrypt($request->input('password'));
	   $password_confirmation = $request->input('password_confirmation');
	   $data = array("user_token" => $user_token);
	   $value = Members::verifytokenData($data);
	   $user['user'] = Members::gettokenData($user_token);
	   if($value)
	   {
	   
	      $request->validate([
							'password' => 'required|confirmed|min:7',
							
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
		   
		   $record = array('password' => $password);
           Members::updatepasswordData($user_token, $record);
           return redirect('login')->with('success','Your new password updated successfully. Please login now.');
		
		}
	   
	   
	   }
	   else
	   {
              
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	   
	   
	
	}
	
	
	
	public function update_forgot(Request $request)
	{
	   $email = $request->input('email');
	   
	   $data = array("email"=>$email);
 
       $value = Members::verifycheckData($data);
	   $user['user'] = Members::getemailData($email);
       
	   if($value)
	   {
			
		$user_token = $user['user']->user_token;
		$name = $user['user']->name;
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		
		$record = array('user_token' => $user_token);
		Mail::send('forgot_mail', $record, function($message) use ($from_name, $from_email, $email, $name, $user_token) {
			$message->to($email, $name)
					->subject('Forgot Password');
			$message->from($from_email,$from_name);
		});
 
         return redirect('forgot')->with('success','We have e-mailed your password reset link!');     
			  
       }
	   else
	   {
              
			  return redirect()->back()->with('error', 'These credentials do not match our records.');
       }
	   
	  
	   
	   
	   
	}
	
	/* shop */
	
	
	public function view_all_items()
	{
	  /*$itemData['item'] = Items::allitemData();*/
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'asc')->get();
	  $catData['item'] = Items::getitemcatData();
	  
	  return view('shop',[ 'itemData' => $itemData, 'catData' => $catData]);
	  
	}
	
	
	public function view_flash_items()
	{
	  
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.item_flash','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  
	  if($setting['setting']->site_flash_end_date < date("Y-m-d"))
	  {
	     $data = array('item_flash' => 0);
		 Items::updateFlash($data);
	  }
	  return view('flash-sale',[ 'itemData' => $itemData]);
	  
	}
	
	
	
	
	public function view_free_items()
	{
	  
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.free_download','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	  
	  
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  
	  if($setting['setting']->site_free_end_date < date("Y-m-d"))
	  {
	     $data = array('free_download' => 0);
		 Items::updateFree($data);
	  }
	  
	  return view('free-items',[ 'itemData' => $itemData]);
	  
	}
	
	
	public function view_all_list_items()
	{
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'asc')->get();
	  $catData['item'] = Items::getitemcatData();
	  
	  return view('shop-list',[ 'itemData' => $itemData, 'catData' => $catData]);
	  
	}
	
	
	
	
	public function view_item_type($item_type,$slug)
	{
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_type','=',$slug)->orderBy('items.item_id', 'desc')->get();
	  
	  $catData['item'] = Items::getitemcatData();
	  
	  return view('shop',[ 'itemData' => $itemData, 'catData' => $catData]);
	  
	}
	
	
	public function view_filter_items($filter)
	{
	  if($filter == "recent-items")
	  {
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();
	  }
	  else if($filter == "featured-items")
	  {
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_featured','=','yes')->orderBy('items.item_id', 'desc')->get();
	  }
	  else if($filter == "free-items")
	  {
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.free_download','=',1)->orderBy('items.item_id', 'desc')->get();
	  }
	  
	  $catData['item'] = Items::getitemcatData();
	  
	  return view('shop',[ 'itemData' => $itemData, 'catData' => $catData]);
	  
	}
	
	public function view_category_items($type,$id,$slug)
	{
	  
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category','=',$id)->where('items.item_category_type','=',$type)->orderBy('items.item_id', 'desc')->get();
	  
	  $catData['item'] = Items::getitemcatData();
	  
	  return view('shop',[ 'itemData' => $itemData, 'catData' => $catData]);
	
	}
	
	
	public function view_shop_items(Request $request)
	{
	  
	 if(!empty($request->input('product_item')))
	 {
	 $product_item = $request->input('product_item');
	 
	 $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_name', 'LIKE', "%$product_item%")->orderBy('items.item_id', 'desc')->get();
	   
	 } 
	 else if(!empty($request->input('category')))
	 {
	 
	 $category = $request->input('category');
	 $split = explode("_", $category);
	 $cat_id = $split[1];
	 $cat_name = $split[0];
	 
	 
	 $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_category','=',$cat_id)->where('items.item_category_type','=',$cat_name)->orderBy('items.item_id', 'desc')->get();
	 }
	 else if(!empty($request->input('product_item')) && !empty($request->input('category')))
	 {
	    $product_item = $request->input('product_item');
		$category = $request->input('category');
		 $split = explode("_", $category);
		 $cat_id = $split[1];
		 $cat_name = $split[0];
		 $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.item_name', 'LIKE', "%$product_item%")->where('items.item_category','=',$cat_id)->where('items.item_category_type','=',$cat_name)->orderBy('items.item_id', 'desc')->get();
	 }
	 else
	 {
	   $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->orderBy('items.item_id', 'desc')->get();;
	 }
	 
	 $catData['item'] = Items::getitemcatData();
	
	return view('shop',[ 'itemData' => $itemData, 'catData' => $catData]);
	}
	/* shop */
	
	
	/* item */
	
	
	public function view_single_item($item_slug,$item_id)
	{
	  
	  $sid = 1;
	  $badges['setting'] = Settings::editBadges($sid);
	  
	  $item['item'] = Items::singleitemData($item_slug,$item_id);
	  
	  $membership = date('m/d/Y',strtotime($item['item']->created_at));
	  $membership_date = explode("/", $membership);
      $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
		? ((date("Y") - $membership_date[2]) - 1)
		: (date("Y") - $membership_date[2]));
	  
	  $token = $item['item']->item_token;
	  $trends = Items::trendsCount($token);
	  $item_cat_id = $item['item']->item_category;
	  $item_user_id = $item['item']->user_id;
	  $item_cat_type = $item['item']->item_category_type;
	  $country['view'] = Settings::editCountry($item['item']->country);
	  
	  $sold['item'] = Items::SoldAmount($item_user_id);
	  $sold_amount = 0;
	  foreach($sold['item'] as $iter)
	  {
	    $sold_amount += $iter->total_price;
	  }
	  $collect_amount = Items::CollectedAmount($item_user_id);
	  $referral_count = $item['item']->referral_count;
	  
	  
	  
	  if($item_cat_type == 'category')
	  {
	     $category['name'] = Category::getsinglecatData($item_cat_id);
		 $category_name = $category['name']->category_name;
	  }
	  else if($item_cat_type == 'subcategory')
	  {
	    $category['name'] = SubCategory::getsinglesubcatData($item_cat_id);
		$category_name = $category['name']->subcategory_name;
	  }
	  else
	  {
	    $category_name = "";
	  }
	  
	  $item_tags = explode(',',$item['item']->item_tags);
	  
	  $getcount  = Items::getimagesCount($token);
	  $item_image['item'] = Items::getsingleimagesData($token);
	  $item_allimage = Items::getimagesData($token);
	  $itemData['item'] = Items::with('ratings')->leftjoin('users', 'users.id', '=', 'items.user_id')->where('items.item_status','=',1)->where('items.drop_status','=','no')->where('items.user_id','=',$item_user_id)->where('items.item_id','!=',$item_id)->orderBy('items.item_id', 'asc')->take(3)->get();
	  
	  if (Auth::check()) 
	  {
	  $checkif_purchased = Items::ifpurchaseCount($token);
	  }
	  else
	  {
	    $checkif_purchased = 0;
	  }
	  
	  $getreview  = Items::getreviewCount($item_id);
	  if($getreview !=0)
	  {
	      $review['view'] = Items::getreviewView($item_id);
		  $top = 0;
		  $bottom = 0;
		  foreach($review['view'] as $review)
		  {
		     if($review->rating == 1) { $value1 = $review->rating*1; } else { $value1 = 0; }
			 if($review->rating == 2) { $value2 = $review->rating*2; } else { $value2 = 0; }
			 if($review->rating == 3) { $value3 = $review->rating*3; } else { $value3 = 0; }
			 if($review->rating == 4) { $value4 = $review->rating*4; } else { $value4 = 0; }
			 if($review->rating == 5) { $value5 = $review->rating*5; } else { $value5 = 0; }
			 
			 $top += $value1 + $value2 + $value3 + $value4 + $value5;
			 $bottom += $review->rating;
			 
		  }
		  if(!empty(round($top/$bottom)))
		  {
		    $count_rating = round($top/$bottom);
		  }
		  else
		  {
		    $count_rating = 0;
		  }
		  
		  
		  
	  }
	  else
	  {
	    $count_rating = 0;
	  }
	  
	  $getreviewdata['view']  = Items::getreviewItems($item_id);
	  
	  	  
	  $comment['view'] = Comment::with('ReplyComment')->leftjoin('users', 'users.id', '=', 'item_comments.comm_user_id')->where('item_comments.comm_item_id','=',$item_id)->orderBy('comm_id', 'asc')->get();
	  
	  $comment_count = $comment['view']->count();
	  
	   
	   $viewattribute['details'] = Attribute::getattributeViews($token);
	  
	  $data = array('item' => $item, 'getcount' => $getcount, 'item_image' => $item_image, 'item_allimage' => $item_allimage, 'category_name' => $category_name, 'item_tags' => $item_tags, 'itemData' => $itemData, 'checkif_purchased' => $checkif_purchased, 'getreview' => $getreview, 'count_rating' => $count_rating, 'getreviewdata' => $getreviewdata, 'comment' => $comment, 'comment_count' => $comment_count, 'badges' => $badges, 'country' => $country, 'trends' => $trends, 'year' => $year, 'sold_amount' => $sold_amount, 'collect_amount' => $collect_amount, 'referral_count' => $referral_count, 'viewattribute' => $viewattribute);
	  return view('item')->with($data);
	}
	
	
	/* item */
	
	
	/* contact */
	
	public function update_contact(Request $request)
	{
	
	  $from_name = $request->input('from_name');
	  $from_email = $request->input('from_email');
	  $message_text = $request->input('message_text');
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $admin_name = $setting['setting']->sender_name;
	  $admin_email = $setting['setting']->sender_email;
	  
	  $record = array('from_name' => $from_name, 'from_email' => $from_email, 'message_text' => $message_text, 'contact_date' => date('Y-m-d'));
	  $contact_count = Items::getcontactCount($from_email);
	  if($contact_count == 0)
	  {
	  
	     $request->validate([
							'from_name' => 'required',
							'from_email' => 'required|email',
							'message_text' => 'required',
							'g-recaptcha-response' => 'required|captcha',
							
							
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
	  
	  
			  Items::saveContact($record);
			  Mail::send('contact_mail', $record, function($message) use ($admin_name, $admin_email, $from_email, $from_name) {
						$message->to($admin_email, $admin_name)
								->subject('Contact');
						$message->from($from_email,$from_name);
					});
			  return redirect('contact')->with('success','Your message has been sent successfully');
			  
		}	  
			  
	  }
	  else
	  {
	  return redirect('contact')->with('error','Sorry! Your message already sent');
	  }
	  
	  
	
	}
	
	/* contact */
	
	
	/* newsletter */
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	return $randomString;
    }
	
	
	public function activate_newsletter($token)
	{
	   
	   $check = Members::checkNewsletter($token);
	   if($check == 1)
	   {
	      
		  $data = array('news_status' => 1);
		
		  Members::updateNewsletter($token,$data);
		  
		  return redirect('/newsletter')->with('success', 'Thank You! Your subscription has been confirmed!');
		  
	   }
	   else
	   {
	       return redirect('/newsletter')->with('error', 'This email address already subscribed');
	   }
	
	}
	
	
	public function view_newsletter()
	{
	 
	  return view('newsletter');
	
	}
	
	
	public function update_newsletter(Request $request)
	{
	
	   $news_email = $request->input('news_email');
	   $news_status = 0;
	   $news_token = $this->generateRandomString();
	   
	   $request->validate([
							
							'news_email' => 'required|email',
							
							
							
         ]);
		 $rules = array(
		 
		      'news_email' => ['required',  Rule::unique('newsletter') -> where(function($sql){ $sql->where('news_status','=',0);})],
								
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make($request->all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 /*return back()->withErrors($validator);*/
		 return redirect()->back()->with('news-error', 'This email address already subscribed.');
		} 
		else
		{
		
		
		$data = array('news_email' => $news_email, 'news_token' => $news_token, 'news_status' => $news_status);
		
		Members::savenewsletterData($data);
		
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
		$from_name = $setting['setting']->sender_name;
        $from_email = $setting['setting']->sender_email;
		$activate_url = URL::to('/newsletter').'/'.$news_token;
		
		$record = array('activate_url' => $activate_url);
		Mail::send('newsletter_mail', $record, function($message) use ($from_name, $from_email, $news_email) {
			$message->to($news_email)
					->subject('Newsletter');
			$message->from($from_email,$from_name);
		});
		
			   
		return redirect()->back()->with('news-success', 'Your email address subscribed. You will receive a confirmation email.');
		
		}
	   
	
	}
	
	
	
	/* newsletter */
	
	
	
	
}
