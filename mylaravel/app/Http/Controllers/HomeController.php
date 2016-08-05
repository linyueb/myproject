<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$lists = DB::table('comments')->where('lastid', '0')->paginate(5);
        $comments = DB::table('comments')->where('lastid','!=','0')->get();
	return view('comment',['comments'=>$lists],['commentss'=>$comments]);
    }
}
