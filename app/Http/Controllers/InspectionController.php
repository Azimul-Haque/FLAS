<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Input, Redirect, Session;
use App\Application;
use App\Inspection;
use Mail;
use Carbon\Carbon;
use PDF;

class InspectionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Inspector');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::orderBy('id','DESC')
                        ->whereIn('application_status_id', [1, 2])
                        ->paginate(5);

        return view('inspections.index')
                ->withApplications($applications);
    }    

    public function getPending()
    {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 1)
                        ->paginate(5);

        return view('inspections.tables.pending')
                ->withApplications($applications);
    }   

    public function getInspected()
    {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 2)
                        ->paginate(5);

        return view('inspections.tables.inspected')
                ->withApplications($applications);
    }

    public function getApproved()
    {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 3)
                        ->paginate(5);

        return view('inspections.tables.approved')
                ->withApplications($applications);
    }

    public function getRejected()
    {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 4)
                        ->paginate(5);

        return view('inspections.tables.rejected')
                ->withApplications($applications);
    }

    public function getExpired()
    {
        $today = Carbon::today();
        $startday = '1971-16-12 12:00:00';
        $applications = Application::orderBy('id','DESC')
                        ->whereDate('expiry_date','<', $today)
                        ->whereDate('expiry_date','>', $startday)
                        ->where('application_status_id', '=', 3)
                        ->paginate(5);

        return view('inspections.tables.expired')
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
            'application_id'             => 'unique:inspections,application_id',
            'email'                      => 'required|email',
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

        $inspection->application_id = $request->application_id;

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
        $application = Application::find($request->application_id);
        $application->application_status_id = 2;
        $application->is_editable = 1;
        $application->save();

         
        $data = array(
            'email' => $request->email,
            'from' => 'flasbfscd@gmail.com',
            'subject' => 'FLAS Application Inspection Report',
            'bodyMessage' => $request->initial_company_name
            );
        Mail::send('emails.inspect', $data, function($message) use ($data){
            $message->from($data['from']);
            $message->to('orbachinujbuk@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'The applicant has been sent a notification via email.');

        //redirect
        return redirect()->route('inspections.response', $application->id);
    }


    public function getResponse($id){
        $application = Application::find($id);
        return view('inspections.response')->withApplication($application);
    }


    public function getPhase2($id)
    {
        $application = Application::find($id);
        return view('inspections.phase2')->withApplication($application);
    }
    
    public function postPhase2(Request $request, $id)
    {
        
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);
        $inspection = Inspection::where('application_id', '=' ,$application->id)->first();
        return view('inspections.edit')
            ->withApplication($application)
            ->withInspection($inspection); 
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
        $inspection = Inspection::find($id);
        //validation
        $this->validate($request, array(
            'check_company_name'         => 'sometimes',
            'email'                      => 'required|email',
            'initial_company_name'       => 'sometimes|max:255',
            'check_email'                => 'sometimes',
            'initial_email'              => 'sometimes|max:255',
            'check_phone'                => 'sometimes',
            'initial_phone'              => 'sometimes|max:255',
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
        $application = Application::find($request->application_id);
        $application->application_status_id = 2;
        $application->is_editable = 1;
        $application->save();

        $data = array(
            'email' => $request->email,
            'from' => 'flasbfscd@gmail.com',
            'subject' => 'FLAS Application Inspection Report',
            'bodyMessage' => $request->initial_company_name
            );
        Mail::send('emails.inspect', $data, function($message) use ($data){
            $message->from($data['from']);
            $message->to('orbachinujbuk@gmail.com');
            $message->subject($data['subject']);
        });


        Session::flash('success', 'The applicant has been sent a notification via email again.');

        //redirect
        return redirect()->route('inspections.response', $application->id);
    }

    public function getApprove($id)
    {
        $application = Application::find($id);
        return view('inspections.approve')->withApplication($application);
    }

    public function postApprove(Request $request, $id) {

        $application = Application::find($id);
        //validation
        $this->validate($request, array(
            'email'                      => 'required|email',
            'approval_message'           => 'required',
            'license_number'             => 'required|max:255',
            'expiry_date'                => 'required|max:255'
       ));

       // Turn Application Status INSPECTED to APPROVED
        $application->application_status_id = 3;
        $application->is_editable = 0;

        //generate license number
        $year = date('dmy');
        $characters = 'ABCDE01FGHIJ23KLMNO45PQRST67UVWXYZ89';
        $unique = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 4; $i++) {
            $unique .= $characters[mt_rand(0, $max)];
        }
        $expiry_date_year = substr($request->expiry_date, 2, 2);
        $expiry_date_month = substr($request->expiry_date, 5, 2);
        $expiry_date_day = substr($request->expiry_date, 8, 2);
        $expiry_date_date_for_license = $expiry_date_day.$expiry_date_month.$expiry_date_year;

        $application->license_number = $year.$application->company_type.$unique.$expiry_date_date_for_license;
        $application->expiry_date = $request->expiry_date;
        $application->save();

        $inspection = Inspection::firstOrCreate(['application_id' => $application->id]);

        $data = array(
            'from' => 'flasbfscd@gmail.com',
            'email' => $request->email,
            'subject' => 'FLAS Application Inspection Report',
            'approval_message' => $request->approval_message,
            'license_number' => $year.$application->company_type.$unique.$expiry_date_date_for_license,
            'expiry_date' => $request->expiry_date
            );
        Mail::send('emails.approve', $data, function($message) use ($data){
            $message->from($data['from']);
            $message->to('orbachinujbuk@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'The applicant has been sent a notification via email.');

        //redirect
        return redirect()->route('inspections.response', $application->id);
    }

    //PDF TESTING
    public function getPDF($id) {
        $application = Application::find($id);
        //$pdf = PDF::loadHTML('<h1>'.$application->id.'</h1>')->setPaper('a4', 'portrait')->setWarnings(false);
        $pdf = PDF::loadView('pdf.index', compact('application'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function getReject($id) {
        $application = Application::find($id);
        return view('inspections.reject')->withApplication($application);
    }

    public function postReject(Request $request, $id){
        $application = Application::find($id);
        //validation
        $this->validate($request, array(
            'email'                      => 'required|email',
            'rejection_message'           => 'required'
       ));

       // Turn Application Status INSPECTED to APPROVED
        $application->application_status_id = 4;
        $application->is_editable = 0;
        $application->save();

        $inspection = Inspection::firstOrCreate(['application_id' => $application->id]);

        $data = array(
            'from' => 'flasbfscd@gmail.com',
            'email' => $request->email,
            'subject' => 'FLAS Application Inspection Report',
            'rejection_message' => $request->rejection_message
            );
        Mail::send('emails.reject', $data, function($message) use ($data){
            $message->from($data['from']);
            $message->to('orbachinujbuk@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'The applicant has been sent a notification via email.');

        //redirect
        return redirect()->route('inspections.response', $application->id);
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
