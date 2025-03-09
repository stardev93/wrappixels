<?php

namespace Feberr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Feberr\Models\Blog;
use Feberr\Models\Items;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
	public function view_category_blog($category,$id,$slug)
	{
	  $blogData['post'] = Blog::catpostData($id); 
	  $blog['popular'] = Blog::getpopularData();
	  $blogPost['latest'] = Blog::getlatestData();
	  
	  $catData['post'] = Blog::getblogcatData();
	  $comments = Blog::getgroupcommentData();
	  $category_count = Blog::getgrouppostData();
	  return view('blog',[ 'blogData' => $blogData, 'catData' => $catData, 'blog' => $blog, 'blogPost' => $blogPost, 'slug' => str_replace("-"," ",$slug), 'comments' => $comments, 'category_count' => $category_count]);
	   
	}
	
	
    public function view_blog()
    {
        
	  $blogData['post'] = Blog::allpostData();
	  $blog['popular'] = Blog::getpopularData();
	  $blogPost['latest'] = Blog::getlatestData();
	  $slug = "Blog";
	  
	  $catData['post'] = Blog::getblogcatData();
	  $comments = Blog::getgroupcommentData();
	  $category_count = Blog::getgrouppostData();
	  return view('blog',[ 'blogData' => $blogData, 'catData' => $catData, 'blog' => $blog, 'blogPost' => $blogPost, 'slug' => $slug, 'comments' => $comments, 'category_count' => $category_count]);
    }
	
	
	public function view_tags($type,$slug)
	{
	$blogData['post'] = Blog::alltagData($slug);
	$itemData['item'] = Items::itemtagData($slug);
	$comments = Blog::getgroupcommentData(); 
	return view('tag',[ 'blogData' => $blogData, 'type' => $type, 'slug' => $slug, 'comments' => $comments, 'itemData' => $itemData]);
	
	}
	
	
	
	public function view_single($slug)
	{
	  $edit['post'] = Blog::editsingleData($slug);
	  $view = $edit['post']->post_view + 1;
	  $data = array('post_view'=> $view);
	  
	  $blog['popular'] = Blog::getpopularData();
	  $blogPost['latest'] = Blog::getlatestData();
	  
	  Blog::updatesingleData($slug,$data);
	  $catData['post'] = Blog::getblogcatData();
	  
	  $post_tags = explode(",",$edit['post']->post_tags);
	  
	  $post_id = $edit['post']->post_id;
	  $comment['display'] = Blog::getcommentData($post_id);
	  $count = Blog::getcommentCount($post_id);
	  $category_count = Blog::getgrouppostData();
	  return view('single', [ 'edit' => $edit, 'slug' => $slug, 'catData' => $catData, 'blog' => $blog, 'blogPost' => $blogPost, 'post_tags' => $post_tags, 'comment' => $comment, 'count' => $count, 'category_count' => $category_count]);
	 
	}
	
	
	public function insert_comment(Request $request)
	{
	   $comment_name = $request->input('comment_name');
	   $comment_email = $request->input('comment_email');
	   $comment_content = $request->input('comment_content');
	   $post_id = $request->input('post_id');
	   $getcount  = Blog::commentCheck($post_id,$comment_email);
	   $comment_date = date('Y-m-d');
	   
	   $data = array('post_id' => $post_id, 'comment_name' => $comment_name, 'comment_email' => $comment_email, 'comment_content' => $comment_content, 'comment_date' => $comment_date);
	   if($getcount == 0)
	   {
	      Blog::savecommentData($data);
		  return redirect()->back()->with('success', 'Thanks for your comments. Once admin will approved your comment. will publish on this post.');
	   }
	   else
	   {
	      return redirect()->back()->with('error', 'Sorry your are already comment this post.');
	   }
	   
	   
	
	}
	
	
	
	
	
}
