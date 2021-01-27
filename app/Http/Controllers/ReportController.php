<?php

namespace App\Http\Controllers;

use App\Report;
use Auth;
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
             $report = Report::create([
                 'title' => $validrequest['title'],
                 'link' => $path,
                 'author_id' => Auth::user()->id
             ]);
         }
         
         return redirect('/young');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Document  $document
      * @return \Illuminate\Http\Response
      */
     public function GetCoachReports(Request $request)
     {
        $reports = Report::where('author_id',Auth::user()->id)->get();
         return view('reports.reports',compact('reports'));
     }

     public function get(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        return response()->download(public_path($report['link']));
    }
}

