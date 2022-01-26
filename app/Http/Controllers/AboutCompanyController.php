<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\Company;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class AboutCompanyController extends Controller
{
    use FileSaver;
    /*
     |--------------------------------------------------------------------------
     | Index METHOD for company information edit & view
     |--------------------------------------------------------------------------
    */
    function company_index(){
        return view('company_info.company_info',[
            'allSiteInfo'=> AboutCompany::first(),
        ]);
    }





    /*
     |--------------------------------------------------------------------------
     | Update METHOD for user information update
     |--------------------------------------------------------------------------
    */
    function company_update(Request $request){

        $request->validate([
            '*'=> 'required',
            'logo'=> 'nullable',
        ]);

        try {
            $id = 1; // only one data for admin and the id is 1
            $model = AboutCompany::find($id);

            $model->update([
                'company_name'=> $request->company_name,
                'address'=> $request->address,
                'email'=> $request->email,
                'mobile_no'=> $request->mobile_no,
                'fb_link'=> $request->fb_link,
                'short_description'=> $request->short_description,
                'description'=> $request->description,
                'map_embed'=> $request->map_embed,
                'logo'=> $model->logo,
            ]);

        // $this->uploadFileWithResize($request->logo, $model, 'logo', 'admin/img/logo', 300, 130);
        $this->upload_file($request->logo, $model, 'logo', 'images/logo');

        return back()->with('success','Data Updated Successfully');

        }
        catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }

        // if(AboutCompany::where('email',$request->email)->exists()){
        //     return back()->with('failed','Email Already Exists');
        // }
        // else{
        //     AboutCompany::find($id)->update([
        //         'email'=> $request->email,
        //     ]);
        // }

    }
}
