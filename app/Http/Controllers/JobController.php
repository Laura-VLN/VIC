<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $jobs = Job::skip((int)($page-1)*9)->take(9)->get();
        return view('user.job.job',compact('jobs'));
    }

    public function filter(Request $request,$page){
        $validRequest = $request->validate([
            'type' => ['string'],
            'keyword' => ['string','nullable'],
            'proximity' => ['string']
        ]);
        $hasType = ($validRequest['type'] != 'aucun')? true : false;
        $hasKeyword = ($validRequest['keyword'] != null)? true : false;
        $hasProximity = ($validRequest['proximity'] != 'aucun')? true : false;
        $jobs = "";
        if(!$hasKeyword & $hasType & !$hasProximity){$jobs = Job::where('type',$validRequest['type'])->skip((int)($page-1)*9)->take(9)->get();}
        else if($hasKeyword & !$hasType & !$hasProximity){$jobs = Job::where('title','like','%'.$validRequest['keyword'].'%')->skip((int)($page-1)*9)->take(9)->get();}
        else if(!$hasKeyword & !$hasType & !$hasProximity){$jobs = Job::skip((int)($page-1)*9)->take(9)->get();}
        else if($hasKeyword & $hasType & !$hasProximity){$jobs = Job::where('title','like','%'.$validRequest['keyword'].'%')->where('type',$validRequest['type'])->skip((int)($page-1)*9)->take(9)->get();}
        else if(!$hasKeyword & !$hasType & $hasProximity){$jobs = Job::where('proximity',$validRequest['proximity'])->skip((int)($page-1)*9)->take(9)->get();}
        else if($hasKeyword & !$hasType & $hasProximity){$jobs = Job::where('proximity',$validRequest['proximity'])->where('title','like','%'.$validRequest['keyword'].'%')->skip((int)($page-1)*9)->take(9)->get();}
        else if(!$hasKeyword & $hasType & $hasProximity){$jobs = Job::where('proximity',$validRequest['proximity'])->where('type',$validRequest['type'])->skip((int)($page-1)*9)->take(9)->get();}
        else if($hasKeyword & $hasType & $hasProximity){$jobs = Job::where('proximity',$validRequest['proximity'])->where('type',$validRequest['type'])->where('title','like','%'.$validRequest['keyword'].'%')->skip((int)($page-1)*9)->take(9)->get();}
        return view('user.job.job',compact('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('user.job.job_show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
