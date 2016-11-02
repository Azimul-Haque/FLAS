<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Application;
use Validator, Input, Redirect, Session;
use Auth;
use Image;

class ApplicationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'company_name'       => 'required|max:255',
            'email'              => 'required|unique:applications,email',
            'phone'              => 'required|max:255',
            'owner'              => 'required|max:255',
            'chairman'           => 'required|max:255',
            'ceo'                => 'required|max:255',
            'address'            => 'required|min:30|max:255',
            'employees'          => 'required|integer',
            'estd'               => 'required|integer',
            'image'              => 'sometimes|image|max:300'

       ));


        //store to DB
        $application = new Application;

        $application->company_name = $request->company_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->owner = $request->owner;
        $application->chairman = $request->chairman;
        $application->ceo = $request->ceo;
        $application->address = $request->address;
        $application->employees = $request->employees;
        $application->estd = $request->estd;

        // image upload
        if($request->hasFile('image')) {
            $image      = $request->file('image');
            $filename   = time(). '.' . $image->getClientOriginalExtension(); 
            $location   = public_path('images/' . $filename);

            Image::make($image)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save($location);

            $application->image = $filename;
        }

        $application->save();

        Session::flash('success', 'Your application has been submitted for verification. Check your email for further details.');

        //redirect
        return redirect()->route('applications.show', $application->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::where('id', '=' , $id)->first();                  
        return view('applications.show')
                    ->withApplication($application); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
