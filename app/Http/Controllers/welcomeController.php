<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Contact;
USE App\Models\About;
use App\Models\Service;
use App\Models\Works;
use App\Models\Blog;    
use App\Models\Skill;
use App\Models\Resume;
use Illuminate\Console\View\Components\Alert;

class welcomeController extends Controller
{
        public function welcome(){
            $testimonials = Testimonial::select('name','designation','image','text')->orderBy('id','DESC')->where('status',true)->get();
            $services = Service::orderBy('id','ASC')->where('status',true)->get();
            $works = Works::orderBy('id','DESC')->where('status',true)->take(20)->get();
            $blogs = Blog::orderBy('id','DESC')->where('status',true)->get();
            $skill = Skill::orderBy('id','DESC')->where('status',true)->get();
            $educationResume = Resume::orderBy('id','DESC')->where('type','edu')->where('status',true)->get();
            $workResume = Resume::orderBy('id','DESC')->where('type','work')->where('status',true)->get();
            $about = About::orderBy('id','DESC')->where('status',true)->first();
            return view('welcome',compact('testimonials','about','services','works','blogs','skill','educationResume',
            'workResume'));
        }
        
        // ========================== Contact Form =============================

        public function submitContact(Request $request){
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            toast('Thanks ,I will contact you soon, stay with me.','success');
            return back();
        }

        public function footerDetails(){
            $about = About::orderBy('id','DESC')->where('status',true)->first();
            return $about;

        }

}
