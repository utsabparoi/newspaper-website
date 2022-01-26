<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    use FileSaver;
    /*
     |--------------------------------------------------------------------------
     | Index METHOD for company information edit & view
     |--------------------------------------------------------------------------
    */
    function company_index(){
        return view('backend.company_info.company_info',[
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
            $model = AboutCompany::first();;

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

        $this->upload_file($request->logo, $model, 'logo', 'images/logo');

        return back()->with('success','Data Updated Successfully');

        }
        catch(\Exception $ex) {
            return redirect()->back()->withError($ex->getMessage());
        }


    }
}
