<?php

namespace App\Http\Controllers;

use App\Company;
use Session;
use Auth;
use Illuminate\Http\Request;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $company = Company::where('user_id',Auth::user()->id)->get();
           
            return view('companies.index')->withcompany($company);
        }else{
            return view('auth.login');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('companies.create');
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
            $company =new Company;
            $company->name = $request->name;
            $company->description = $request->description;
            $company->save();


        }
        Session::flash('success','Company Created Successfully!!');
            return redirect()->route('companies.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $company = Company::find($id);
        return view('companies.show')->withcompany($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->withcompany($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'name'=>'required|max:30',
            'description'=>'max:255',
        ));
        $company=Company::findOrFail($id);

        $company->name = $request->name;
        $company->description =$request->description;
        $company->save();
        Session::flash('success','Company Information Updated Successfully!!');
        return redirect()->route('companies.show',$company->id);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::find($id);
        $company->delete();
        Session::flash('success','Com[any Deleted Successfully!!');
        return redirect()->route('companies.index');
    }
}
