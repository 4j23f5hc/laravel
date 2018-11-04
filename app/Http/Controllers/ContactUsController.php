<?php

namespace App\Http\Controllers;

use App\Mail\contactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    // Contact Us view ///
	public function contact(){
		
		return view('frontEnd.contact');
	}
    
    // Contact Us Email Sending ///
	public function contactEmail(Request $request){
		
            $validatedData = $request->validate([
                'name'  => 'required|min:10|max:100',
                'phone' => 'required|min:10|max:100',
                'email' => 'required|min:10|max:100',
                'sub'   => 'required|in:general,product,purchase,delivery',
                'msg'   => 'required|min:10|max:1000',

            ]);
		
            Mail::to('manikbd.888@gmail.com')->send(new contactUs($request));
            
            return back()->with('success','We will contact with you very soon...');
	}
        
}
