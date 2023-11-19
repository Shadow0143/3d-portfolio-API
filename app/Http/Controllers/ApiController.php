<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\Projects;
use App\Models\Contact;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class ApiController extends Controller
{
    public function about(){
        try {
            $allAbout = About::where('status', 1)->first(); 
            return response()->json([
                'errorCode' => 0,
                'statusCode' => 200,
                'details' => $allAbout,
            ]);
        } catch(Exception $e) { 
            return response()->json([
                'errorCode' => 1,
                'statusCode' => 200,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function skills(){
        try {
            $allSkills = Skill::where('status', 1)->orderBy('id','desc')->get(); 
            return response()->json([
                'errorCode' => 0,
                'statusCode' => 200,
                'details' => $allSkills,
            ]);
        } catch(Exception $e) { 
            return response()->json([
                'errorCode' => 1,
                'statusCode' => 200,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function worksDetails(){
        try {
            $allWorkDetails = Resume::where('status', 1)->where('type','work')->orderBy('id','desc')->get(); 
            return response()->json([
                'errorCode' => 0,
                'statusCode' => 200,
                'details' => $allWorkDetails,
            ]);
        } catch(Exception $e) { 
            return response()->json([
                'errorCode' => 1,
                'statusCode' => 200,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function projects(){
        try {
            $allProjects = Projects::where('status', 1)->orderBy('id','desc')->get(); 
            return response()->json([
                'errorCode' => 0,
                'statusCode' => 200,
                'details' => $allProjects,
            ]);
        } catch(Exception $e) { 
            return response()->json([
                'errorCode' => 1,
                'statusCode' => 200,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function submitContactQuery(Request $request){
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            // $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return response()->json([
                'errorCode' => 0,
                'statusCode' => 200,
                'message' => 'Thanks ,I will contact you soon, stay with me.',
            ]);
        } catch(Exception $e) { 
            return response()->json([
                'errorCode' => 1,
                'statusCode' => 200,
                'message' => $e->getMessage(),
            ]);
        }
        
    }
    
}
 