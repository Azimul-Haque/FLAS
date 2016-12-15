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
}


