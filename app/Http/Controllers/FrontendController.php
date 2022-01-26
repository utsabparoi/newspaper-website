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

    public function index()
    {


        $info=AboutCompany::first();
        Session::put('title_msg',$info->comapny_name);
        Session::put('metaDescription',$info->comapny_name);

        $slider_news    = News::where('status',1)->where('is_slider',1)->latest()->first();
        $featurd_news   = News::where('status',1)->where('publish_status',1)->where('is_featured',1)->whereNotIn('id',[$slider_news->id])->latest()->paginate(10);
        $popular_news   = News::where('status',1)->where('publish_status',1)->latest()->paginate(8);
        $latest_news    = News::where('status',1)->where('publish_status',1)->latest()->paginate(8);



        // category-1 news


        $category_1=Category::where('status',1)->where('serial_num',1)->first();
        $cat1_sub_cat=SubCategory::where('status',1)->where('fk_category_id',$category_1->id)->simplePaginate(7);



        if(count($cat1_sub_cat)>0){

            foreach ($cat1_sub_cat as $key => $subValue) {
                 $cat1_sub_cat_news[$subValue->id]=News::where('status',1)->where('publish_status',1)->where('fk_sub_category_id',$subValue->id)->latest()->simplePaginate(5);
            }
            //  my custom code
            $cat1_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_1->id)->latest()->simplePaginate(5);

        }
        else{
            $cat1_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_1->id)->latest()->simplePaginate(5);
        }



        // category 2 news


        $category_2=Category::where('status',1)->where('serial_num',2)->first();

        $cat2_sub_cat=SubCategory::where('status',1)->where('fk_category_id',$category_2->id)->simplePaginate(7);

        if(count($cat2_sub_cat)>0){
            foreach ($cat2_sub_cat as $key => $subValue) {
                 $cat2_sub_cat_news[$subValue->id]=News::where('status',1)->where('publish_status',1)->where('fk_sub_category_id',$subValue->id)->latest()->simplePaginate(5);
            }
            // my custom code
            $cat2_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_2->id)->latest()->simplePaginate(5);

        }
        else{
            $cat2_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_2->id)->latest()->simplePaginate(5);
        }


        // category-5 news

        $category_5_news=Category::where('status',1)->where('serial_num',5)->first();
        $cat5_sub_cat=SubCategory::where('status',1)->where('fk_category_id',$category_5_news->id)->simplePaginate(7);

        if(count($cat5_sub_cat)>0){
            foreach ($cat5_sub_cat as $key => $subValue) {
                 $cat5_sub_cat_news[$subValue->id]=News::where('status',1)->where('publish_status',1)->where('fk_sub_category_id',$subValue->id)->latest()->simplePaginate(5);
            }
            // my custom code
            $cat5_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_5_news->id)->latest()->simplePaginate(5);

        }
        else{
            $cat5_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_5_news->id)->latest()->simplePaginate(5);
        }
        //end category news


        $category_3=Category::where('status',1)->where('serial_num',3)->first();
        $cat_news3=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_3->id)->latest()->paginate(4);

        $category_4=Category::where('status',1)->where('serial_num',4)->first();
        $cat_news4=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_4->id)->latest()->paginate(4);

        $category_5=Category::where('status',1)->where('serial_num',5)->first();
        $cat_news5=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_5->id)->latest()->paginate(4);



        // category-1 news


        $category_6=Category::where('status',1)->where('serial_num',6)->first();
        $cat6_sub_cat=SubCategory::where('status',1)->where('fk_category_id',$category_6->id)->simplePaginate(7);


        if($cat6_sub_cat!=null){
            foreach ($cat6_sub_cat as $key => $subValue) {
                 $cat6_sub_cat_news[$subValue->id]=News::where('status',1)->where('publish_status',1)->where('fk_sub_category_id',$subValue->id)->latest()->simplePaginate(5);
            }
            // my custom code *1/6*
            $cat6_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_1->id)->latest()->simplePaginate(5);

        }
        else{
            $cat6_news=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_1->id)->latest()->simplePaginate(5);
        }
        //end category news


        $category_7=Category::where('status',1)->where('serial_num',7)->first();
        $cat_news7=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_7->id)->latest()->paginate(4);

        $category_8=Category::where('status',1)->where('serial_num',8)->first();
        $cat_news8=News::where('status',1)->where('publish_status',1)->where('fk_category_id',$category_8->id)->latest()->paginate(4);



        //all ads management


         $ads1=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',2)->first();
         $ads2=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',3)->first();
         $ads3=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',4)->first();
         $ads4=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',5)->first();
         $ads5=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',6)->first();
         $ads6=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',7)->first();
         $ads7=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',8)->first();
         $ads8=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',9)->first();
         $ads9=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',10)->first();
         $ads10=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',11)->first();
         $ads11=AdsManagement::where('status',1)->where('position_id',1)->where('serial_num',12)->first();


        // without cat_news2
        return view('frontend.home',compact('slider_news','featurd_news','popular_news','latest_news','category_1','cat1_sub_cat','cat1_sub_cat_news','cat1_news',
            'category_2','category_3','cat_news3','category_4','cat_news4','category_5','cat_news5','cat5_sub_cat_news','category_7','cat_news7',
            'category_8','cat_news8','category_6','cat6_sub_cat','cat6_sub_cat_news','cat6_news','ads1','ads2','ads3','ads4','ads5','ads6','cat2_news',
            'cat2_sub_cat','cat2_sub_cat_news','ads7','category_5_news','cat5_sub_cat','cat5_news','ads8','ads9','ads10','ads11')
        );

        // return view('frontend.home',compact('slider_news','featurd_news','popular_news','latest_news','category_1','cat1_sub_cat','cat1_sub_cat_news','cat1_news',
        //     'category_2','cat_news2','category_3','cat_news3','category_4','cat_news4','category_5','cat_news5','cat5_sub_cat_news','category_7','cat_news7',
        //     'category_8','cat_news8','category_6','cat6_sub_cat','cat6_sub_cat_news','cat6_news','ads1','ads2','ads3','ads4','ads5','ads6','cat2_news',
        //     'cat2_sub_cat','cat2_sub_cat_news','ads7','category_5_news','cat5_sub_cat','cat5_news','ads8','ads9','ads10','ads11')
        // );
    }























    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
