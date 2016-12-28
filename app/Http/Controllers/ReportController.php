<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Application;
use Validator, Input, Redirect, Session;
use Auth;
use PDF;
use Excel;
use App\User;
use App\FireStations;
use App\AppMessages;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Rapporteur');
    }

    public function getIndex(){
        $pendings = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 1)
                        ->get();
        $inspecteds = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 2)
                        ->get();        
        $approveds = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 3)
                        ->get();       
        $rejecteds = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 4)
                        ->get();     
        $expireds = Application::orderBy('id','DESC')
                        ->where('application_status_id', '=', 5)
                        ->get();

        return view('reports.index')
                ->withPendings($pendings)
                ->withInspecteds($inspecteds)
                ->withApproveds($approveds)
                ->withRejecteds($rejecteds)
                ->withExpireds($expireds);
    }
    

    public function getExcelPending(){
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 1)
                        ->get();
        $fileName = 'Pending_Applications_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }


    public function getExcelInspected(){
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 2)
                        ->get();
        $fileName = 'Inspected_Applications_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }



    public function getExcelApproved(){
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 3)
                        ->get();
        $fileName = 'Approved_Applications_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }


    public function getExcelRejected(){
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 4)
                        ->get();
        $fileName = 'Rejected_Applications_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }


    public function getExcelExpired(){
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 5)
                        ->get();
        $fileName = 'Expired_Applications_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }





    public function getPDFPending() {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 1)
                        ->get();
        //$pdf = PDF::loadHTML('<h1>'.$application->id.'</h1>')->setPaper('a4', 'portrait')->setWarnings(false);
        $pdf = PDF::loadView('reports.pdf.index', compact('applications'))->setPaper('a4', 'landscape')->setWarnings(false);
        $fileName = 'Pending_Applications_'. date('F_d_Y') .'.pdf';
        return $pdf->stream($fileName);
    }


    public function getPDFInspected() {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 2)
                        ->get();
        $pdf = PDF::loadView('reports.pdf.index', compact('applications'))->setPaper('a4', 'landscape')->setWarnings(false);
        $fileName = 'Inspected_Applications_'. date('F_d_Y') .'.pdf';
        return $pdf->stream($fileName);
    }


    public function getPDFApproved() {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 3)
                        ->get();
        $pdf = PDF::loadView('reports.pdf.index', compact('applications'))->setPaper('a4', 'landscape')->setWarnings(false);
        $fileName = 'Pending_Applications_'. date('F_d_Y') .'.pdf';
        return $pdf->stream($fileName);
    }


    public function getPDFRejected() {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 4)
                        ->get();
        $pdf = PDF::loadView('reports.pdf.index', compact('applications'))->setPaper('a4', 'landscape')->setWarnings(false);
        $fileName = 'Rejected_Applications_'. date('F_d_Y') .'.pdf';
        return $pdf->stream($fileName);
    }


    public function getPDFExpired() {
        $applications = Application::orderBy('id','DESC')
                        ->where('application_status_id', 5)
                        ->get();
        $pdf = PDF::loadView('reports.pdf.index', compact('applications'))->setPaper('a4', 'landscape')->setWarnings(false);
        $fileName = 'Expired_Applications_'. date('F_d_Y') .'.pdf';
        return $pdf->stream($fileName);
    }

    // Fire Emergency Application
    public function getAndroidApp() {
        $firestations = FireStations::orderBy('id','DESC')->paginate(10);
        $totalfirestations = FireStations::orderBy('id','DESC')->count();
        $appmessages = AppMessages::orderBy('id','DESC')->get();
        $totalappmessages = AppMessages::orderBy('id','DESC')->count();
        $firestationsfordistance = FireStations::orderBy('id','DESC')->get();

        return view('reports.androidapp')
                    ->withFirestations($firestations)
                    ->withTotalfirestations($totalfirestations)
                    ->withAppmessages($appmessages)
                    ->withTotalappmessages($totalappmessages)
                    ->withFirestationsfordistance($firestationsfordistance);

    }

    public function getExcelAppMessages(){
        $applications = AppMessages::orderBy('id','DESC')->get();

        $fileName = 'Emergency_Messages_'. date('F_d_Y');                
        Excel::create($fileName, function($excel) use($applications) {
            $excel->sheet('Sheet 1', function($sheet) use($applications) {
                $sheet->fromArray($applications);
            });
        })->export('xlsx');
    }

    public function postNewFireStation(Request $request) {
        //validation
        $this->validate($request, array(
            'name'       => 'required|max:255',
            'lat'        => 'required|max:255',
            'lon'        => 'required|max:255',
            'phone'        => 'required|max:255'
       ));

       //store to DB
        $firestation = new FireStations;

        $firestation->name = $request->name;
        $firestation->lat = $request->lat;
        $firestation->lon = $request->lon;
        $firestation->phone = $request->phone;

        $firestation->save();

        Session::flash('success', 'নতুন ফায়ার স্টেশন যোগ করা হয়েছে:'. $request->name);

        //redirect
        return redirect()->route('reports.androidapp');
    }


}


