<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;

class OthersInfoController extends Controller
{
    public function about()
    {
        $data=AboutCompany::first();
        return view('backend.othersInfo.about',compact('data'));
    }
}
