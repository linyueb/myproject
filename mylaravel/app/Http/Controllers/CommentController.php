<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
use Auth;
use Carbon\Carbon;

class CommentController extends Controller
{
    //
  
    
    protected function create($name,$content)
    {
        return comment::create([
            'name' => $name,
            'content' =>$content,
            
        ]);
    }
	
	
	public function index()
    {
        $input=Input::all();
        	return $input;
        
		
    }
	

	
	public function addComment(Request $request)
  {
	$content = $request->input('content');
	$name=Auth::user()->name;
	$time=Carbon::now();
	$lastid=0;
	DB::table('comments')->insert(
 	array('lastid'=>$lastid,'name' => $name, 'content' => $content,'created_at'=>$time)
 );
 	$comments = DB::table('comments')->get();
 	return view('comment',compact('comments'));
  }
  
  public function addComment1(Request $request)
  {
  	$lastid=$request->input('lastid');
	$content = $request->input('remark');
	$name=Auth::user()->name;
	$time=Carbon::now();
	
	DB::table('comments')->insert(
 	array('lastid'=>$lastid,'name' => $name, 'content' => $content,'created_at'=>$time)
 );
 	$comments = DB::table('comments')->get();
 	return view('comment',compact('comments'));
  }
  
  public function showComment(){
  	$comments = DB::table('comments')->get();
	return view('comment',compact('comments'));
  }
}
