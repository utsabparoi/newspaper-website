<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$allData=array(
    	'total_service' => '8',
        'total_work'    => '6',
        'total_blog'    => '7',
    	'total_news'    => '7',
        'service'       => array(),
    	'work'          => array(),
    	);
        // dd($allData);
    	return view('backend.index',compact('allData'));
    }
}
