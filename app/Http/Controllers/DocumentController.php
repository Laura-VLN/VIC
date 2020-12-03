<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('user.document.document')->with('id',$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,doc,pdf,docx,zip,txt|max:1000000',
        ]);
        
        $validrequest = $request->validate([
            'title' => ['string']
        ]);
            
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            
            $path = $request->file('file')->storeAs('documents', $imageName, 'public');
            $path = "storage/".$path;
            $document = Document::create([
                'title' => $validrequest['title'],
                'link' => $path,
                'user_id' => $id
            ]);
        }

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        return response()->download(public_path($request['link']));
    }

    
}
