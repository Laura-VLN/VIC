<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Agenda;
use App\Document;

class CoachController extends Controller
{
    public function index(){
        $coachs = User::
                    join('coaches_users', 'users.id', '=', 'coaches_users.coach_id')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        if(empty($coachs[0])){
            return view('user.coach.coach_show')->with('hascoaches', null);
        }else{
            return view('user.coach.coach_show',compact('coachs'))->with('hascoaches', true);
        }
    }

    public function showcoach(){
        $coach = User::
                    join('coaches_users', 'users.id', '=', 'coaches_users.coach_id')
                    ->firstWhere('user_id', Auth::user()->id);
        if(is_null($coach)){
            return view('user.coach.coach_show')->with('hascoaches', null);
        }else{
            $documents = Document::where('user_id',$coach->id)->get();
            $agenda = Agenda::where('user_id', Auth::user()->id)->where('follower_id',$coach->id)->get();
            return view('user.coach.coach',compact('coach','documents','agenda'))->with('hascoaches', true);
        }   
    }

    // public function showcoach($id){
    //     $coach = User::findOrFail($id);
    //     $documents = Document::where('user_id',$coach->id)->get();
    //     $agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',$coach->id)->get();
    //     return view('user.coach.coach',compact('coach','documents','agenda'));
    // }
    
    public function showyoungs(){
        $iscoach = (Auth::user()->role == 1) ? true : false;
        $issponsor = (Auth::user()->role == 2) ? true : false;
        $isAdmin = (Auth::user()->role == 3) ? true : false;
        $youngs = [];
        if($iscoach || $isAdmin){
            $youngs = DB::table('users')
            ->join('coaches_users', 'users.id', '=', 'coaches_users.user_id')
            ->where('coach_id', Auth::user()->id)
            ->get();
        };
        if($issponsor || $isAdmin){
            $youngs = User::
            join('sponsors_users', 'users.id', '=', 'sponsors_users.user_id')
            ->where('sponsor_id', Auth::user()->id)
            ->get();
        }
        if(sizeof($youngs) == 0){
            return view('user.young.young_show')->with('haveYoung',false);
        }else{
            return view('user.young.young_show',compact('youngs'))->with('haveYoung',true);
        }
    }

    public function showyoung($id){
        $young = User::findOrFail($id);
        $document = Document::where('user_id',$young->id)->get();
        $agenda = Agenda::where('user_id',$young->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.young.young',compact('young', 'document', 'agenda'));
    }

    public function addAgenda(Request $request){
        $validrequest = $request->validate([
            'title' => ['string','max:255','required'],
            'description' => ['string','required'],
            'time' => ['date','required'],
            'hour' => ['required'],
            'dest' => ['required'],
            'location' => ['string','required','max:255']    
        ]);

        $role = Auth::user()->role;
        $topic = ($role == 1) ? "coach" : "sponsor";

        Agenda::create([
            'time'=> $validrequest['time'],
            'title'=> $validrequest['title'],
            'description' => $validrequest['description'],
            'topic' => $topic,
            'location' => $validrequest['location'],
            'user_id' => $validrequest['dest'],
            'follower_id' => Auth::user()->id,
            'hour'=> $validrequest['hour']
        ]);

        $young = User::findOrFail($validrequest['dest']);
        $document = Document::where('user_id',$validrequest['dest']);
        $agenda = Agenda::where('user_id',$validrequest['dest'])->where('follower_id', Auth::user()->id)->get();
        return view('user.young.young',compact('young','document','agenda'))->with('haveYoung',true);
    }

    public function storeAgendaView($id){
        $user = User::findOrFail($id);
        return view('user.young.agenda',compact('user'));

    }
}
