<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Document;
use App\Agenda;
use Auth;

class CoachController extends Controller
{
    public function index(){
        $coachs = User::
                    join('coaches_users', 'users.id', '=', 'coaches_users.coach_id')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        if(empty($coachs[0])){
            return view('user.coach.coach')->with('hascoaches', false);
        }else{
            //$documents = Document::where('user_id',1)->get();
            //$agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',1)->get();
            return view('user.coach.coach',compact('coachs'/* ,'documents','agenda' */))->with('hascoaches', true);
        }
    }

    public function showyoung(){
        $iscoach = (Auth::user()->role == 1) ? true : false;
        $issponsor = (Auth::user()->role == 2) ? true : false;
        $isAdmin = (Auth::user()->role == 3) ? true : false;
        $user = [];
        if($iscoach || $isAdmin){
            $users = User::
            join('coaches_users', 'users.id', '=', 'coaches_users.user_id')
            ->where('coach_id', Auth::user()->id)
            ->get();
        }
        if($issponsor || $isAdmin){
            $users = User::
            join('sponsors_users', 'users.id', '=', 'sponsors_users.user_id')
            ->where('sponsor_id', Auth::user()->id)
            ->get();
        }
        if(sizeof($user) == 0){
            return view('user.young.young')->with('haveYoung',false);
        }else{
            $user = $user[0];
            $document = Document::where('user_id',$user->id);
            $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
            return view('user.young.young',compact('user','document','agenda'))->with('haveYoung',true);
        }
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
