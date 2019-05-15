<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon; 
use App\Http\Controllers\Controller;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $projects = Project::paginate(2);
        return view('admin.project.index')->with('projects',$projects); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/project'))
            {
                mkdir('uploads/project', 0777 , true);
            }
            $image->move('uploads/project',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $imagename;
        $project->save();
        return redirect()->route('project.index')->with('success', 'Project Succesfffully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $project = Project::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/project'))
            {
                mkdir('uploads/project', 0777 , true);
            }
            $image->move('uploads/project',$imagename);
        }else {
            $imagename = $project->image;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $imagename;
        $project->save();
        return redirect()->route('project.index')->with('success','Project Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (file_exists('uploads/project/'.$project->image))
        {
            unlink('uploads/project/'.$project->image);
        }
        $project->delete();
        return redirect()->back()->with('success','Project Successfully Deleted');
    }
}
