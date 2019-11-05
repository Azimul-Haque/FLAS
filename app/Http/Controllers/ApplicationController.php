<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Application;
use Validator, Input, Redirect, Session;
use Auth;
use Image;
use PDF;
use NoCaptcha;

class ApplicationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Applicant');
    }
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
        $applied = Application::where('created_by_id', '=' , Auth::user()->id)->first();

        return view('applications.create')->withApplied($applied);
    }

    
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'company_name'       => 'required|max:255',
            'email'              => 'required|unique:applications,email|max:255',
            'phone'              => 'required|max:255',
            'owner'              => 'required|max:255',
            'chairman'           => 'required|max:255',
            'ceo'                => 'required|max:255',
            'address'            => 'required|max:255',
            'employees'          => 'required|integer',
            'area'               => 'required|integer',
            'fire_extinguisher'  => 'required|integer',
            'fire_extinguisher_exp_date'  => 'required|max:255',
            'rod_breaker'        => 'required|integer',
            'emergency_exit'     => 'required|integer',
            'storey'             => 'required|integer',
            'nearest_buildings'  => 'required|integer',
            'estd'               => 'required|integer', 
            'company_type'       => 'required|max:300', 
            'layoutplan'         => 'required|max:300',
            'ownershipdocument'  => 'required|max:300',
            'tradelicense'       => 'required|max:300',
            'tinpaper'           => 'required|max:300',
            'bankcertificate'    => 'required|max:300',
            'g-recaptcha-response' => 'sometimes'
       ));


        //store to DB
        $application = new Application;

        $application->created_by_id = Auth::user()->id;
        $application->application_status_id = 1;
        //tracking number
        $datetime_for_trackingNumber = date('dmyHis');
        $characters = 'ABCDE01FGHIJ23KLMNO45PQRST67UVWXYZ89';
        $unique = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 4; $i++) {
            $unique .= $characters[mt_rand(0, $max)];
        }
        $application->tracking_number = $unique.$datetime_for_trackingNumber;
        //tracking number
        $application->is_editable = 1;
        $application->company_name = $request->company_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->owner = $request->owner;
        $application->chairman = $request->chairman;
        $application->ceo = $request->ceo;
        $application->address = $request->address;
        $application->employees = $request->employees;
        $application->area = $request->area;
        $application->fire_extinguisher = $request->fire_extinguisher;
        $application->fire_extinguisher_exp_date = $request->fire_extinguisher_exp_date;
        $application->rod_breaker = $request->rod_breaker;
        $application->emergency_exit = $request->emergency_exit;
        $application->storey = $request->storey;
        $application->nearest_buildings = $request->nearest_buildings;
        $application->estd = $request->estd;
        $application->company_type = $request->company_type;
        
        // reCapcha Validation
        // prevent validation error on captcha
        /*NoCaptcha::shouldReceive('verifyResponse')
            ->once()
            ->andReturn(true);
        // provide hidden input for your 'required' validation
        NoCaptcha::shouldReceive('display')
            ->zeroOrMoreTimes()
            ->andReturn('<input type="hidden" name="g-recaptcha-response" value="1" />');*/

        // file upload
        if($request->hasFile('layoutplan')) {
            $layoutplan      = $request->file('layoutplan');
            $filename   = 'layoutplan' .time(). '.' . $layoutplan->getClientOriginalExtension(); 
            $location   = public_path('files/' . $request->email);
            $request->file('layoutplan')->move($location, $filename);
            $application->layoutplan = $filename;
        }
        if($request->hasFile('ownershipdocument')) {
            $ownershipdocument      = $request->file('ownershipdocument');
            $filename   = 'ownershipdocument' .time(). '.' . $ownershipdocument->getClientOriginalExtension(); 
            $location   = public_path('files/' . $request->email);
            $request->file('ownershipdocument')->move($location, $filename);
            $application->ownershipdocument = $filename;
        }
        if($request->hasFile('tradelicense')) {
            $tradelicense      = $request->file('tradelicense');
            $filename   = 'tradelicense' .time(). '.' . $tradelicense->getClientOriginalExtension(); 
            $location   = public_path('files/' . $request->email);
            $request->file('tradelicense')->move($location, $filename);
            $application->tradelicense = $filename;
        }
        if($request->hasFile('tinpaper')) {
            $tinpaper      = $request->file('tinpaper');
            $filename   = 'tinpaper' .time(). '.' . $tinpaper->getClientOriginalExtension(); 
            $location   = public_path('files/' . $request->email);
            $request->file('tinpaper')->move($location, $filename);
            $application->tinpaper = $filename;
        }
        if($request->hasFile('bankcertificate')) {
            $bankcertificate      = $request->file('bankcertificate');
            $filename   = 'bankcertificate' .time(). '.' . $bankcertificate->getClientOriginalExtension(); 
            $location   = public_path('files/' . $request->email); 
            $request->file('bankcertificate')->move($location, $filename);
            $application->bankcertificate = $filename;
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
        $application = Application::where('id', '=' , $id)
                            ->where('created_by_id', '=' , Auth::user()->id)
                            ->first();                     
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
        $application = Application::where('id', '=' , $id)
                            ->where('created_by_id', '=' , Auth::user()->id)
                            ->first(); 
        return view('applications.edit')
            ->withApplication($application);
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

        $application = Application::find($id);
        //validation
        if($request->email == $application->email){
            $this->validate($request, array(
            'company_name'       => 'required|max:255',
            'email'              => 'required|max:255',
            'phone'              => 'required|max:255',
            'owner'              => 'required|max:255',
            'chairman'           => 'required|max:255',
            'ceo'                => 'required|max:255',
            'address'            => 'required|max:255',
            'employees'          => 'required|integer',
            'area'               => 'required|integer',
            'fire_extinguisher'  => 'required|integer',
            'fire_extinguisher_exp_date'  => 'required|max:255',
            'rod_breaker'        => 'required|integer',
            'emergency_exit'     => 'required|integer',
            'storey'             => 'required|integer',
            'nearest_buildings'  => 'required|integer',
            'estd'               => 'required|integer',
            'company_type'       => 'required|max:255'
           ));
        } else {
            $this->validate($request, array(
            'company_name'       => 'required|max:255',
            'email'              => 'required|unique:applications,email|max:255',
            'phone'              => 'required|max:255',
            'owner'              => 'required|max:255',
            'chairman'           => 'required|max:255',
            'ceo'                => 'required|max:255',
            'address'            => 'required|min:30|max:255',
            'employees'          => 'required|integer',
            'area'               => 'required|integer',
            'fire_extinguisher'  => 'required|integer',
            'fire_extinguisher_exp_date'  => 'required|max:255',
            'rod_breaker'        => 'required|integer',
            'emergency_exit'     => 'required|integer',
            'storey'             => 'required|integer',
            'nearest_buildings'  => 'required|integer',
            'estd'               => 'required|integer',
            'company_type'       => 'required|max:255'
           ));
        }



        //store to DB

        $application->created_by_id = Auth::user()->id;
        $application->application_status_id = 1;
        $application->is_editable = 1;
        $application->company_name = $request->company_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->owner = $request->owner;
        $application->chairman = $request->chairman;
        $application->ceo = $request->ceo;
        $application->address = $request->address;
        $application->employees = $request->employees;
        $application->area = $request->area;
        $application->fire_extinguisher = $request->fire_extinguisher;
        $application->fire_extinguisher_exp_date = $request->fire_extinguisher_exp_date;
        $application->rod_breaker = $request->rod_breaker;
        $application->emergency_exit = $request->emergency_exit;
        $application->storey = $request->storey;
        $application->nearest_buildings = $request->nearest_buildings;
        $application->estd = $request->estd;
        $application->company_type = $request->company_type;

        // file upload
        if($request->hasFile('layoutplan')) {
            $layoutplan      = $request->file('layoutplan');
            $filename   = $application->layoutplan; 
            $location   = public_path('files/' . $request->email);
            $request->file('layoutplan')->move($location, $filename);
        }
        if($request->hasFile('ownershipdocument')) {
            $ownershipdocument      = $request->file('ownershipdocument');
            $filename   = $application->ownershipdocument; 
            $location   = public_path('files/' . $request->email);
            $request->file('ownershipdocument')->move($location, $filename);
        }
        if($request->hasFile('tradelicense')) {
            $tradelicense      = $request->file('tradelicense');
            $filename   = $application->tradelicense; 
            $location   = public_path('files/' . $request->email);
            $request->file('tradelicense')->move($location, $filename);
        }
        if($request->hasFile('tinpaper')) {
            $tinpaper      = $request->file('tinpaper');
            $filename   = $application->tinpaper; 
            $location   = public_path('files/' . $request->email);
            $request->file('tinpaper')->move($location, $filename);
        }
        if($request->hasFile('bankcertificate')) {
            $bankcertificate      = $request->file('bankcertificate');
            $filename   = $application->bankcertificate; 
            $location   = public_path('files/' . $request->email); 
            $request->file('bankcertificate')->move($location, $filename);
        }

        $application->save();

        Session::flash('success', 'Your application has been submitted for verification. Check your email for further details.');

        //redirect
        return redirect()->route('applications.show', $application->id);
    }


    //PDF License Generation
    public function getPDF($id) {
        $application = Application::where('id', '=' , $id)
                            ->where('created_by_id', '=' , Auth::user()->id)
                            ->first(); 
        //$pdf = PDF::loadHTML('<h1>'.$application->id.'</h1>')->setPaper('a4', 'portrait')->setWarnings(false);
        $pdf = PDF::loadView('pdf.index', compact('application'))->setPaper('a4', 'portrait')->setWarnings(false);
        $fileName = $application->license_number.'.pdf';
        return $pdf->stream($fileName);
    }

    public function destroy($id)
    {
        //
    }
}
