<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Agenda;
use Auth;

class SponsorController extends Controller
{
    public function index(){
        $sponsorId = Auth::user()->sponsor_id;
        if($sponsorId == null){
            return view('user.sponsor.sponsor')->with('sponsorId',$sponsorId);
        }else{
            $sponsor = User::where('id',$sponsorId)->get()[0];
            $documents = Document::where('user_id',$sponsorId)->get();
            $agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',$sponsorId)->get();
            return view('user.sponsor.sponsor',compact('sponsor','documents','agenda'))->with('sponsorId',$sponsorId);
        }
        
    }
}
