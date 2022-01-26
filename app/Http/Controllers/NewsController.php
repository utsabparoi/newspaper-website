<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\AdsManagement;
use App\Models\News;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading Category
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('news.index',[
            'all_adds'=> News::all(),
        ]);
    }





    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating Category
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('news.create',[
            'category_infos'=> Category::all(),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Store Method for Storing the data into Category
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|max:70|unique:news',
            'fk_category_id' => 'required',
            'short_description' => 'required|max:255',
            'description' => 'required',

            'photo' => 'required|image|Max:1000',
        ]);

        try {
            $model = News::create([
                'title'=> $request->title,
                'link'=> $request->link,
                'fk_category_id'=> $request->fk_category_id,
                'fk_sub_category_id'=> $request->fk_sub_category_id,
                'short_description'=> $request->short_description,
                'description'=> $request->description,
                'hit_counter'=> $request->hit_counter,
                'is_featured'=> $request->is_featured,
                'is_not_home'=> $request->is_not_home,
                'is_slider'=> $request->is_slider,
                'tags'=> $request->tags,
                'status'=> $request->status,
                'publish_status'=> $request->publish_status,
                'created_by'=> $request->created_by,
                'updated_by'=> $request->updated_by,
                'photo'=> 'default.jpg',
            ]);

        $this->upload_file($request->photo, $model, 'photo', 'images/news-photo');

           return back()->with('success','Data Added Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }




    public function show($id)
    {
        //
    }




    /*
    |--------------------------------------------------------------------------
    | Edit Method for Edit the Category
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return view('news.edit',[
            'target_ads'=> News::find($id),
            'category_infos'=> Category::all(),
            'subcategory_infos'=> SubCategory::all(),
        ]);
    }




    /*
    |--------------------------------------------------------------------------
    | Update Method for Updating Category
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|max:70',
            'short_description' => 'required|max:255',
            'description' => 'required',

        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|Max:500',
            ]);
        }
        try {
            $model = News::find($id);

            $model->update([
                'title'=> $request->title,
                'link'=> $request->link,
                'fk_category_id'=> $request->fk_category_id,
                'fk_sub_category_id'=> $request->fk_sub_category_id,
                'short_description'=> $request->short_description,
                'description'=> $request->description,
                'hit_counter'=> $request->hit_counter,
                'is_featured'=> $request->is_featured,
                'is_not_home'=> $request->is_not_home,
                'is_slider'=> $request->is_slider,
                'tags'=> $request->tags,
                'status'=> $request->status,
                'publish_status'=> $request->publish_status,
                'created_by'=> $request->created_by,
                'updated_by'=> $request->updated_by,
                'photo'=> $model->photo,
            ]);

            $this->upload_file($request->photo, $model, 'photo', 'images/news-photo');

           return back()->with('success','Data Edited Successfully');

        } catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $smart_move = News::find($id);
        $smart_move->update([
            'status'=> 0,
        ]);
        $smart_move->delete();
        return back()->with('deleted','Deleted!');
    }



    /*
    |--------------------------------------------------------------------------
    | Destroy Method for deleting Category
    |--------------------------------------------------------------------------
    */
    public function change_status($id)
    {
        if (News::find($id)->status == 0) {
            News::find($id)->update([
                'status'=> 1
            ]);
        } else {
            News::find($id)->update([
                'status'=> 0
            ]);
        }
        return back()->with('success','Ads Status Changed!');
    }



    /*
    |--------------------------------------------------------------------------
    | Get Sub Category Method for getting sub Category info
    |--------------------------------------------------------------------------
    */
    public function getsubcat_method(Request $request)
    {
        $show_cat = "<option value=''>-Select a Sub Category-</option>";
        foreach (SubCategory::where('fk_category_id',$request->catx_id)->get(['id','name']) as $subcat_data) {
            $show_cat .= "<option value='$subcat_data->id'>$subcat_data->name</option>";
        }
       echo $show_cat;
    }




    /*
    |--------------------------------------------------------------------------
    | SUB SUB Category Method for getting Sub Sub Category info
    |--------------------------------------------------------------------------
    */
    // public function getsubcatedit_method(Request $request)
    // {

    //     $show_cat = "<option value=''>-Select a Sub Category-</option>";
    //     foreach (SubCategory::where('fk_category_id',$request->catx_id)->get(['id','name']) as $subcat_data) {
    //         // $show_cat .= "<option value='$subcat_data->id'>$subcat_data->name</option>";
    //         $show_cat .= "<option value='{{ $subcat_data->id }}' {{ ( $subcat_data->id )== (News::where('fk_category_id',$request->catx_id)->first())->relationtoSubCategory->id ? 'selected' : '' }}>{{ $subcat_data->name }}</option>";
    //     }
    //    echo $show_cat;
    // }


    /*
    |--------------------------------------------------------------------------
    | NEWS Details Method for article
    |--------------------------------------------------------------------------
    */

    public function news_details($id,$link)
    {

      $news_details=News::where('link',$link)->first();
      $data=array();
      $data['hit_counter']=$news_details->hit_counter+1;
      $news_details=News::where('link',$link)->update($data);

       $news_details=News::leftJoin('category','news.fk_category_id','category.id')

                         ->leftJoin('sub_category','news.fk_sub_category_id','sub_category.id')
                         ->leftJoin('users','news.created_by','users.id')
                        ->select('category.name as cat_name','category.id as category_id','news.*','users.id as user_id','users.name as admin_name','sub_category.name as sub_cat_name')
                        ->where('news.link',$link)


                        ->first();
					         if($news_details==null){
					    		return redirect()->back();
					    	}
        $category_id=$news_details->category_id;

        $related_news=News::where('fk_category_id',$category_id)->where('status',1)->orderby('id','DESC')->paginate(10);
          $popular_news=News::where('status',1)->orderBy('hit_counter','DESC')->where('fk_category_id',$category_id)->paginate(5);
          //title message
           $info=AboutCompany::first();
         Session::put('title_msg',$news_details->title);
         Session::put('metaDescription',$news_details->short_description);
         Session::put('tags',$news_details->tags);
         $ads1=AdsManagement::where('status',1)->where('position_id',4)->where('serial_num',1)->first();
          $ads2=AdsManagement::where('status',1)->where('position_id',4)->where('serial_num',2)->first();

        $singleTitle=$news_details->title;
        $ogImage=$news_details->photo;
        $ads=AdsManagement::where('status',1)->where('position_id',4)->get()->keyBy('serial_num');
    	return view('frontend.article',compact('news_details','related_news','popular_news','ads1','ads2','singleTitle','ogImage','ads'));
    }
}
