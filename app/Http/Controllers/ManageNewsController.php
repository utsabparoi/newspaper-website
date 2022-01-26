<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Mpdf\Tag\Input;

class ManageNewsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIC NEWS METHOD
    |--------------------------------------------------------------------------
    */
    public function publishNews($id){
        $data=News::find($id)->update([
            'publish_status'=>1,
        ]);

       return redirect('manage-news')->with('success','News Published successfully ! ');

   }

    /*
    |--------------------------------------------------------------------------
    | LOAD SUB CATEGORY METHOD
    |--------------------------------------------------------------------------
    */

   public function loadSubcategory($id)
   {
        $subCat=SubCategory::where('status',1)->where('fk_category_id',$id)->pluck('name','id');
        return view('backend.news.loadSubcat',compact('subCat'));

   }



   /*
    |--------------------------------------------------------------------------
    | SEARCH METHOD
    |--------------------------------------------------------------------------
    */
   public function search()
   {
       $q = Input::get ('q');
       $allData = News::where('title','LIKE','%'.$q.'%')->paginate(10);
       if(!$allData){

        //    return view ('backend.news.message')->withMessage('No Details found. Try to search again !');
        return view ('backend.news.message')->with('error','No Details found. Try to search again !');
       }
       else{
          return view('backend.news.search',compact('allData'))->withQuery($q);
           // dd('nothing');
       }
   }
}
