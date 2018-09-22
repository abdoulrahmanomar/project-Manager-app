<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $project = Project::where('user_id',Auth::user()->id)->get();
           
            return view('projects.index')->withProject($project);
        }else{
            return view('auth.login');
        }
    
    }

    public function adduser(Request $request)
    {
        //add user to project

        //take a project add a user to it 
        $project = Project::fin($request->input('project_id'));
        
        if(Auth::User()->id == $project->user_id)
        {
            $user = User::where('email',$request->input('email'))->get();
             if($user && $project)
        {
             $project->users()->attach($user->id);
        }

        }
       
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id= null)
    {
        $companies= null;
        if(!$company_id)
        {
           $companies = Company::where('user_id',Auth::user()->id)->get();
        }
       return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $project =new Project;
            $project->name = $request->name;
            $project->description = $request->description;
            $project->company_id =$request->input('company_id');
            $project->user_id = Auth::user()->id;
            $project->save();


        }
        Session::flash('success','Project Created Successfully!!');
            return redirect()->route('projects.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $project = Project::find($id);
         $comment = $project->comments;
        return view('projects.show')->withProject($project)->withcomment($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit')->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'name'=>'required|max:30',
            'description'=>'max:255',
        ));
        $project=Project::findOrFail($id);

        $project->name = $request->name;
        $project->description =$request->description;
        $project->save();
        Session::flash('success','Project Information Updated Successfully!!');
        return redirect()->route('projects.show',$project->id);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
        Session::flash('success','Project Deleted Successfully!!');
        return redirect()->route('projects.index');
    }
}
