<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator, Input, Redirect, Session;
use App\Application;
use App\User;
use Mail;
use NoCaptcha;

class PagesController extends Controller
{
    public function getIndex() {                              
        return view('pages.welcome');
	}  

	public function getAbout() {
		return view('pages.about');
	}  

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, array(
            'email'       => 'required|email',
            'subject'     => 'required|min:5' ,
            'message'     => 'required|min:5'       
        ));

       $data = ['email'   => $request->email,
                'subject'   => $request->subject,
                'bodyMessage'   => $request->message];

       Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->sender('blog@HoTg.org', 'John Doe');
        
            $message->to('blog@HoTg.org');
        
            $message->cc('orbachinujbuk@gmail.com', 'John Doe');
            //$message->bcc('john@johndoe.com', 'John Doe');
        
            $message->replyTo($data['email']);
            $message->subject($data['subject']);        
            $message->priority(3);
        
            //$message->attach('pathToFile');
        });
        Session::flash('success', 'We have received your message successfully.');

        //redirect
        return view('pages.contact');
	}

    public function getApplicationStatusSearchPage() {
        return view('pages.applicationstatussearch');
    }

    public function getApplicationStatus(Request $request) {
        $this->validate($request, array(
            'tracking_number'       => 'required|max:255',
            'g-recaptcha-response'  => 'required'   
        ));

        $applicationstatus = Application::where('tracking_number', '=' , $request->tracking_number)
                            ->first(); 

        return view('pages.applicationstatussearch')
                    ->withApplicationstatus($applicationstatus); 
    }
    
}
