<?php

namespace App\Http\Controllers;

use App\Housing;
use App\HousingGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $logements = Housing::join('housing_galleries', function($leftjoin){$leftjoin->on("housings.id", '=', 'housing_galleries.housing_id')->where('housing_galleries.id', '=', DB::raw("(select id from housing_galleries WHERE housing_id = housings.id LIMIT 1)"));})->skip((int)($page-1)*9)->take(9)->get();
        foreach($logements as $logement){
            $logement->img_link = asset($logement->img_link);
        }
        return view('user.logement.logement',compact('logements'));
    }


    public function filter(Request $request,$page){
        $validRequest = $request->validate([
            'type'=>['string'],
            'proximity'=>['string']
        ]);
        $hasType = ($validRequest['type'] != 'aucun')?true:false;
        $hasProximity = ($validRequest['proximity'] != 'aucun')?true:false;
        $logements="";
        if(!$hasType & !$hasProximity)$logements = Housing::leftJoin('housing_galleries', function($leftjoin){$leftjoin->on("housings.id", '=', 'housing_galleries.housing_id')->where('housing_galleries.id', '=', DB::raw("(select id from housing_galleries WHERE housing_id = housings.id LIMIT 1)"));})->skip((int)($page-1)*9)->take(9)->get();
        else if(!$hasType & $hasProximity)$logements = Housing::where('proximity',$validRequest['proximity'])->leftJoin('housing_galleries', function($leftjoin){$leftjoin->on("housings.id", '=', 'housing_galleries.housing_id')->where('housing_galleries.id', '=', DB::raw("(select id from housing_galleries WHERE housing_id = housings.id LIMIT 1)"));})->skip((int)($page-1)*9)->take(9)->get();
        else if($hasType & !$hasProximity)$logements = Housing::where('type',$validRequest['type'])->leftJoin('housing_galleries', function($leftjoin){$leftjoin->on("housings.id", '=', 'housing_galleries.housing_id')->where('housing_galleries.id', '=', DB::raw("(select id from housing_galleries WHERE housing_id = housings.id LIMIT 1)"));})->skip((int)($page-1)*9)->take(9)->get();
        else if($hasProximity & $hasType)$logements = Housing::where('type',$validRequest['type'])->where('proximity',$validRequest['proximity'])->leftJoin('housing_galleries', function($leftjoin){$leftjoin->on("housings.id", '=', 'housing_galleries.housing_id')->where('housing_galleries.id', '=', DB::raw("(select id from housing_galleries WHERE housing_id = housings.id LIMIT 1)"));})->skip((int)($page-1)*9)->take(9)->get();
        
        foreach($logements as $logement){
            $logement->img_link = asset($logement->img_link);
        }
        
        return view('user.logement.logement',compact('logements'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Housing  $housing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logement = Housing::findOrFail($id);
        $gallery = HousingGallery::where('housing_id',$id)->get();
        foreach($gallery as $pics){
            $pics->img_link = asset($pics->img_link);
        }
        return view('user.logement.logement_show',compact('logement','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Housing  $housing
     * @return \Illuminate\Http\Response
     */
    public function edit(Housing $housing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Housing  $housing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Housing $housing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Housing  $housing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Housing $housing)
    {
        //
    }
}
