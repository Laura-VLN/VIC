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
        $sponsors = User::
                    join('sponsors_users', 'users.id', '=', 'sponsors_users.sponsor_id')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        if(empty($sponsors)){
            return view('user.sponsor.sponsor_show')->with('hassponsor', false);
        }else{
            // $documents = Document::where('user_id',$coachId)->get();
            // $agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',$coachId)->get();
            return view('user.sponsor.sponsor_show',compact('sponsors'))->with('hassponsor', true);
        }
    }

    public function showsponsor($id){
        $sponsor = User::findOrFail($id);
        // $document = Document::where('user_id',$user->id);
        // $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.sponsor.sponsor',compact('sponsor'));
    }
}
