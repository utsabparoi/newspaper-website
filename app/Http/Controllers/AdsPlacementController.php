<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AdsPosition;
use App\Models\AdsSerial;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Models\AdsPlacement;

class AdsPlacementController extends Controller
{
    use FileSaver;
    /*
    |--------------------------------------------------------------------------
    | Index Method for Reading AdManagement
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['all_placements'] = AdsPlacement::all();
        return view('backend.ads_placement.index', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Method for Creating AdManagement
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['ads_position'] = AdsPosition::where('status',1)->get();
        $data['ads_serial'] = AdsSerial::where('status',1)->get();
        return view('backend.ads_placement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
