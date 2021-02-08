<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Agenda;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    public function index(){
        $coachs = User::
                    join('coaches_users', 'users.id', '=', 'coaches_users.coach_id')
                    ->where('user_id', Auth::user()->id)
                    ->get();
        if($coachs == null){
            return view('user.coach.coach_show')->with('hascoaches', null);
        }else{
            // $documents = Document::where('user_id',$coachId)->get();
            // $agenda = Agenda::where('user_id',Auth::user()->id)->where('follower_id',$coachId)->get();
            return view('user.coach.coach_show',compact('coachs'))->with('hascoaches', true);
        }
    }

    public function showcoach($id){
        $coach = User::findOrFail($id);
        // $document = Document::where('user_id',$user->id);
        // $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.coach.coach',compact('coach'));
    }
    
//----------------> Change requete
    public function showyoungs(){
        $iscoach = (Auth::user()->role == 1) ? true : false;
        $issponsor = (Auth::user()->role == 2) ? true : false;
        $isAdmin = (Auth::user()->role == 3) ? true : false;
        $users = [];
        if($iscoach || $isAdmin){
            $users = DB::table('users')
            ->join('coaches_users', 'users.id', '=', 'coaches_users.user_id')
            ->where('coach_id', Auth::user()->id)
            ->get();
        };
        if($issponsor || $isAdmin)$users = User::where('sponsor_id',Auth::user()->id)->take(1)->get();
        if(sizeof($users) == 0){
            return view('user.young.young_show')->with('haveYoung',false);
        }else{
            return view('user.young.young_show',compact('users'))->with('haveYoung',true);
        }
    }

    public function showyoung($id){
        $user = User::findOrFail($id);
        $document = Document::where('user_id',$user->id);
        $agenda = Agenda::where('user_id',$user->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.young.young',compact('user', 'document', 'agenda'));
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
