<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $formations = Formation::skip((int)($page-1)*9)->take(9)->get();
        return view('user.formation.formation',compact('formations'));
    }

    public function filter(Request $request, $page){
        $validRequest = $request->validate([
            'keyword'=>['nullable'],
            'proximity'=>['string']
        ]);
        $hasKeyword = ($validRequest['keyword'] != null) ? true : false;
        $hasProximity = ($validRequest['proximity'] != 'aucun') ? true : false;
        $formations = "";
        if($hasKeyword & $hasProximity)$formations = Formation::where('title','like','%'.$validRequest['keyword'].'%')->where('proximity',$validRequest['proximity'])->skip((int)($page-1)*9)->take(9)->get();
        else if(!$hasKeyword & $hasProximity)$formations = Formation::where('proximity',$validRequest['proximity'])->skip((int)($page-1)*9)->take(9)->get();
        else if($hasKeyword & !$hasProximity)$formations = Formation::where('title','like','%'.$validRequest['keyword'].'%')->skip((int)($page-1)*9)->take(9)->get();
        else if(!$hasKeyword & !$hasProximity)$formations = Formation::skip((int)($page-1)*9)->take(9)->get();

        return view('user.formation.formation',compact('formations'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::findOrFail($id);
        return view('user.formation.formation_show',compact('formation'));
    }
}
