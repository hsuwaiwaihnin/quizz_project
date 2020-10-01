<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Category;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects=Subject::all();

        return view('backend.subject.index',compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.subject.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "photo"=>"required",
            "category"=>"required"
        ]);

        //Upload File
         if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName(); 
            $filePath = $request->file('photo')->storeAs('subject_photo', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }

        // data store

        $subject=new Subject;
        
        $subject->name = $request->name;
        $subject->photo=$path;
        $subject->category_id=$request->category;
        $subject->save();

        // return redirect
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject=Subject::find($id);
        $categories=Category::all();
        return view('backend.subject.edit',compact('subject','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Validate
        $request->validate([
            "name"=>"required",
            "photo"=>"sometimes",
            "category"=>"required",
            
        ]);

        //Upload File
         if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName(); 
            $filePath = $request->file('photo')->storeAs('subject_photo', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }else{
            $path=$request->oldphoto;
        }

        // data store
        $subject=Subject::find($id);
        $subject->name = $request->name;
        $subject->photo = $path;
        $subject->category_id = $request->category;
        $subject->save();

        // return redirect
        return redirect()->route('subject.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject=Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index');
        
    }
}
