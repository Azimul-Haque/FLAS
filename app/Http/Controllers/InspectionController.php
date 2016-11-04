<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Input, Redirect, Session;
use App\Application;
use App\Inspection;

class InspectionController extends Controller
{
    public function __construct(){
        $this->middleware('role:Inspector');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::orderBy('id','DESC')->paginate(5);

        return view('inspections.index')
                ->withApplications($applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);
        return view('inspections.show')->withApplication($application);
    }

    public function getInspect($id)
    {
        $application = Application::find($id);
        return view('inspections.inspect')->withApplication($application);
    }
    
    public function postInspect(Request $request)
    {
        //validation
        $this->validate($request, array(
            'check_company_name'         => 'sometimes',
            'initial_company_name'       => 'sometimes|max:255',
            'check_email'                => 'sometimes',
            'initial_email'              => 'sometimes|max:255',
            'check_ephone'               => 'sometimes',
            'initial_ephone'             => 'sometimes|max:255',
            'check_owner'                => 'sometimes',
            'initial_owner'              => 'sometimes|max:255',
            'check_hairman'              => 'sometimes',
            'initial_chairman'           => 'sometimes|max:255',
            'check_ceo'                  => 'sometimes',
            'initial_ceo'                => 'sometimes|max:255',
            'check_address'              => 'sometimes',
            'initial_address'            => 'sometimes|max:255',
            'check_employees'            => 'sometimes',
            'initial_employees'          => 'sometimes|max:255',
            'check_estd'                 => 'sometimes',
            'initial_estd'               => 'sometimes|max:255',
            'check_image'                => 'sometimes',
            'initial_image'              => 'sometimes|max:255'
       ));

        //store to DB
        $inspection = new Inspection;

        $inspection->applications_id = $request->applications_id; 

        $inspection->check_company_name = $request->check_company_name;
        $inspection->initial_company_name = $request->initial_company_name;

        $inspection->check_email = $request->check_email;
        $inspection->initial_email = $request->initial_email;

        $inspection->check_phone = $request->check_phone;
        $inspection->initial_phone = $request->initial_phone;
        
        $inspection->check_owner = $request->check_owner;
        $inspection->initial_owner = $request->initial_owner;
        
        $inspection->check_chairman = $request->check_chairman;
        $inspection->initial_chairman = $request->initial_chairman;
        
        $inspection->check_ceo = $request->check_ceo;
        $inspection->initial_ceo = $request->initial_ceo;
        
        $inspection->check_address = $request->check_address;
        $inspection->initial_address = $request->initial_address;
        
        $inspection->check_employees = $request->check_employees;
        $inspection->initial_employees = $request->initial_employees;
        
        $inspection->check_estd = $request->check_estd;
        $inspection->initial_estd = $request->initial_estd;
        
        $inspection->check_image = $request->check_image;
        $inspection->initial_image = $request->initial_image;


        $inspection->save();

        // Turn Application Status PENDING to INSPECTED
        $application = Application::find($request->applications_id);
        $application->application_status_id = 2;
        $application->save();


        Session::flash('success', 'The applicant has been sent a notification via email.');

        //redirect
        return redirect()->route('inspections.response', $inspection->applications_id);
    }

    public function getResponse($id){
        $application = Application::find($id);
        return view('inspections.response')->withApplication($application);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
