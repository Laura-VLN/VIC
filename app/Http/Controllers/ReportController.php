<?php

namespace App\Http\Controllers;

use App\Reports;
use Auth;
use App\User;
use App\Document;
use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     /* 
     Download file version of report
     public function store(Request $request)
     {
        
         $request->validate([
             'report' => 'required|mimes:png,jpg,jpeg,doc,pdf,docx,zip,txt|max:1000000',
         ]);
         
         $validrequest = $request->validate([
             'title' => ['string']
         ]);
         
         if ($request->file('report')) {
             $reportPath = $request->file('report');
             $reportName = $reportPath->getClientOriginalName();
             
             $path = $request->file('report')->storeAs('reports', $reportName, 'public');
             $path = "storage/".$path;
             $report = Reports::create([
                 'title' => $validrequest['title'],
                 'link' => $path,
                 'author_id' => Auth::user()->id
             ]);
         }
         
         return redirect('/young');
     } */

     public function store(Request $request){
        $validrequest = $request->validate([
            'title' => ['string','max:255','required'],
            'description' => ['string','required'],
            'time' => ['date','required'],
            'hour' => ['required'],
            'dest' => ['required'],
        ]);

        $role = Auth::user()->role;
        $topic = ($role == 1) ? "coach" : "sponsor";

        Reports::create([
            'time'=> $validrequest['time'],
            'title'=> $validrequest['title'],
            'description' => $validrequest['description'],
            'topic' => $topic,
            'young_id' => $validrequest['dest'],
            'author_id' => Auth::user()->id,
            'author_name' => Auth::user()->first_name,
            'hour'=> $validrequest['hour']
        ]);

        $young = User::findOrFail($validrequest['dest']);
        $document = Document::where('young_id',$validrequest['dest']);
        $reports = Reports::where('young_id',$validrequest['dest'])->get();
        $agenda = Agenda::where('user_id',$young->id)->where('follower_id',Auth::user()->id)->get();
        return view('user.young.young',compact('young','document','reports', 'agenda'))->with('haveYoung',true);
    }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Document  $document
      * @return \Illuminate\Http\Response
      */
     /* 
     ////Old report version////
     public function GetCoachReports(Request $request)
     {
        $reports = Reports::where('author_id',Auth::user()->id)->get();
         return view('reports.reports',compact('reports'));
     } */

     public function get(Request $request, $id)
    {
        $report = Reports::findOrFail($id);
        return response()->download(public_path($report['link']));
    }

    public function storeReportView($id){
        $user = User::findOrFail($id);
        return view('reports.reports',compact('user'));

    }
}

