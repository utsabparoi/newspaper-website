<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\AdsManagement;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Index METHOD for Frontend page view
     |--------------------------------------------------------------------------
    */
    public function index(){

        $info=AboutCompany::first();
        Session::put('title_msg',$info->comapny_name);
        Session::put('metaDescription',$info->comapny_name);

        // all news
        $all_news_in_one = News::where('status',1)->where('publish_status',1)->latest()->get();

        
        // all category news
        $categories = Category::with(['subcategories' => function ($q) {
            $q->with(['news' => function ($q) {
                $q->select('id','title','link','fk_category_id','fk_sub_category_id','photo','short_description')->where('publish_status',1)->where('status', 1)->latest();
            }])->select('id','name','link','fk_category_id')->where('status',1)->latest();
        }])->select('id','name','link','serial_num','is_home')->where('status', 1)->get();



        //all ads management
        $ads_manages = AdsManagement::where('status',1)->where('position_id',1)->get();

        return view('frontend.home',compact('categories','all_news_in_one','ads_manages')
        );

    }


}
