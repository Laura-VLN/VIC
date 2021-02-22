<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Agenda;
use Illuminate\Support\Facades\DB;
use Auth;

class CoachController extends Controller
{
    public function index(){
        $coachId = Auth::user()->coach_id;
        if($coachId == null){
            return view('user.coach.coach')->with('coachId',$coachId);
        }else{
            $coach = User::where('id',$coachId)->get()[0];
            $documents = Document::where('user_id',$coachId)->get();
            $agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',$coachId)->get();
            return view('user.coach.coach',compact('coach','documents','agenda'))->with('coachId',$coachId);
        }
    }
//----------------> Change requete
    public function showyoungs(){
        $iscoach = (Auth::user()->role == 1) ? true : false;
        $issponsor = (Auth::user()->role == 2) ? true : false;
        $isAdmin = (Auth::user()->role == 3) ? true : false;
        $user = [];
        if($iscoach || $isAdmin){
            $user= DB::table('users')->join('coaches_users', 'users.id', '=', 'coaches_users.user_id')->where('coach_id', Auth::user()->id)->get();
        }
        if($issponsor || $isAdmin)$user = User::where('sponsor_id',Auth::user()->id)->take(1)->get();
        dd($user);
        if(sizeof($user) == 0){
            return view('user.young.young')->with('haveYoung',false);
        }else{
            $user = $user[0];
            $document = Document::where('user_id',$user->id);
            $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
            return view('user.young.young_show',compact('user','document','agenda'))->with('haveYoung',true);
        }
    }

    public function showyoung($id){
        $user = User::findOrFail($id);
        $document = Document::where('user_id',$user->id);
        $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.young.young',compact('user','document','agenda'));
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

        $user = User::findOrFail($validrequest['dest']);
        $document = Document::where('user_id',$validrequest['dest']);
        $agenda = Agenda::where('user_id',$validrequest['dest'])->where('follower_id', Auth::user()->id)->get();
        return view('user.young.young',compact('user','document','agenda'))->with('haveYoung',true);
    }

    public function storeAgendaView($id){
        $user = User::findOrFail($id);
        return view('user.young.agenda',compact('user'));

    }
}
