<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\About;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Works;
use App\Models\Blog;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Projects;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    //====================== Dashboard ===================================
        public function index()
        {
            return view('home');
        }
    //====================== / Dashboard ===================================


    //====================== Testimonial ===================================
        public function testimonialList(){
            $allTestimonial = Testimonial::orderBy('id', 'desc')->paginate(10);
            return view('testiminial/list',compact('allTestimonial'));
        }

        public function testimonialAdd(){
            return view('testiminial/addedit');
        }

        public function testimonialEdit($id){
            $testimonial = Testimonial::find($id);
            return view('testiminial/addedit',compact('testimonial'));
        }

        public function testimonialSave(Request $request){
            if (!empty($request->id)) {
                $testimonial = Testimonial::find($request->id);
                $testimonial->name = $request->user_name;
                $testimonial->designation = $request->designation;
                $testimonial->text = $request->description;
                $testimonial->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Testiminial' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('testimonialImage');
                    $image->move($result, $name);
                    $testimonial->image = $name;
                }
                $testimonial->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $testimonial = new Testimonial();
                $testimonial->name = $request->user_name;
                $testimonial->designation = $request->designation;
                $testimonial->text = $request->description;
                $testimonial->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Testiminial' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('testimonialImage');
                    $image->move($result, $name);
                    $testimonial->image = $name;
                }
                $testimonial->save();
                toast('New Testimonial as been added!', 'success');
            }
            return redirect()->route('testimonialList');
        }

        public function testimonialDelete(Request $request){
            $package = Testimonial::find($request->id);
            $package->delete();
        }
    //====================== / Testimonial ===================================


    //====================== About Me ===================================
        public function aboutMeList(){
            $allAbout = About::orderBy('id', 'desc')->paginate(10);
            return view('about/list',compact('allAbout'));
        }

        public function aboutMeAdd(){
            return view('about/addedit');
        }

        public function aboutMeEdit($id){
            $aboutme = About::find($id);
            return view('about/addedit',compact('aboutme'));
        }

        public function aboutMeSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $aboutme = About::find($request->id);
                $aboutme->my_name = $request->my_name;
                $aboutme->title = $request->title;
                $aboutme->dob = $request->dob;
                $aboutme->website = $request->website;
                $aboutme->phone = $request->phone;
                $aboutme->address = $request->address;
                $aboutme->degree = $request->degree;
                $aboutme->contact_email = $request->contact_email;
                $aboutme->twitter = $request->twitter;
                $aboutme->facebook = $request->facebook;
                $aboutme->insta = $request->insta;
                $aboutme->skype = $request->skype;
                $aboutme->likedin = $request->likedin;
                $aboutme->shortdescription = $request->shortdescription;
                $aboutme->longdescription = $request->longdescription;
                $aboutme->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'MyImage' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('aboutme');
                    $image->move($result, $name);
                    $aboutme->image = $name;
                }

                if ($request->hasfile('bannerimage')) {
                    $image = $request->file('bannerimage');
                    $name = 'BannerImage' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('aboutme');
                    $image->move($result, $name);
                    $aboutme->bannerimage = $name;
                }
               
                $aboutme->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                $aboutme = new About();
                $aboutme->my_name = $request->my_name;
                $aboutme->title = $request->title;
                $aboutme->dob = $request->dob;
                $aboutme->website = $request->website;
                $aboutme->phone = $request->phone;
                $aboutme->address = $request->address;
                $aboutme->degree = $request->degree;
                $aboutme->contact_email = $request->contact_email;
                $aboutme->twitter = $request->twitter;
                $aboutme->facebook = $request->facebook;
                $aboutme->insta = $request->insta;
                $aboutme->skype = $request->skype;
                $aboutme->likedin = $request->likedin;
                $aboutme->shortdescription = $request->shortdescription;
                $aboutme->longdescription = $request->longdescription;
                $aboutme->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'MyImage' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('aboutme');
                    $image->move($result, $name);
                    $aboutme->image = $name;
                }

                if ($request->hasfile('bannerimage')) {
                    $image = $request->file('bannerimage');
                    $name = 'BannerImage' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('aboutme');
                    $image->move($result, $name);
                    $aboutme->bannerimage = $name;
                }
               
                $aboutme->save();
                toast('New About section is added!', 'success');
            }
            return redirect()->route('aboutMeList');
        }

        public function aboutMeDelete(Request $request){
            $package = About::find($request->id);
            $package->delete();
        }
    //====================== / About Me ===================================


    //====================== Services ===================================
        public function servicesList(){
            $services = Service::orderBy('id', 'desc')->paginate(10);
            return view('service/list',compact('services'));
        }

        public function servicesAdd(){
            return view('service/addedit');
        }

        public function servicesEdit($id){
            $services = Service::find($id);
            return view('service/addedit',compact('services'));
        }

        public function servicesSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $service = Service::find($request->id);
                $service->title = $request->title;
                $service->shortdescription = $request->shortdescription;
                $service->longdescription = $request->longdescription;
                $service->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Service' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('service');
                    $image->move($result, $name);
                    $service->icon = $name;
                }
               
                $service->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                $service = new Service();
                $service->title = $request->title;
                $service->shortdescription = $request->shortdescription;
                $service->longdescription = $request->longdescription;
                $service->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Service' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('service');
                    $image->move($result, $name);
                    $service->icon = $name;
                }
               
                $service->save();
                toast('New service is added!', 'success');
            }
            return redirect()->route('servicesList');
        }

        public function servicesDelete(Request $request){
            $package = Service::find($request->id);
            $package->delete();
        }
    //====================== / Services ===================================


    //======================= Contact =============================================
        public function contactList(){
            $contact = Contact::orderBy('id','desc')->paginate(10);
            return view('contact/list',compact('contact'));

        }
    //======================= / Contact =============================================


    //====================== Works ===================================
        public function worksList(){
            $allWorks = Works::orderBy('id', 'desc')->paginate(10);
            return view('works/list',compact('allWorks'));
        }

        public function worksAdd(){
            return view('works/addEdit');
        }

        public function worksEdit($id){
            $work = Works::find($id);
            return view('works/addEdit',compact('work'));
        }

        public function worksSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $work = Works::find($request->id);
                $work->title = $request->title;
                $work->category = $request->category;
                $work->description = $request->description;
                $work->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Works' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('worksImage');
                    $image->move($result, $name);
                    $work->image = $name;
                }
                $work->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $work = new Works();
                $work->title = $request->title;
                $work->category = $request->category;
                $work->description = $request->description;
                $work->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Works' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('worksImage');
                    $image->move($result, $name);
                    $work->image = $name;
                }
                $work->save();
                toast('New Work as been added!', 'success');
            }
            return redirect()->route('worksList');
        }

        public function worksDelete(Request $request){
            $package = Works::find($request->id);
            $package->delete();
        }
    //====================== / Works ===================================


    //====================== Blogs ===================================
        public function blogsList(){
            $allBlogs = Blog::orderBy('id', 'desc')->paginate(10);
            return view('blogs/list',compact('allBlogs'));
        }

        public function blogsAdd(){
            return view('blogs/addEdit');
        }

        public function blogsEdit($id){
            $blog = Blog::find($id);
            return view('blogs/addEdit',compact('blog'));
        }

        public function blogsSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $blog = Blog::find($request->id);
                $blog->title = $request->title;
                $blog->post_by = $request->post_by;
                $blog->small_description = $request->small_description;
                $blog->long_description = $request->long_description;
                $blog->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Blogs' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('blogsImage');
                    $image->move($result, $name);
                    $blog->image = $name;
                }
                $blog->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $blog = new Blog();
                $blog->title = $request->title;
                $blog->post_by = $request->post_by;
                $blog->small_description = $request->small_description;
                $blog->long_description = $request->long_description;
                $blog->status = $request->status;
                if ($request->hasfile('image')) {
                    $image = $request->file('image');
                    $name = 'Blogs' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('blogsImage');
                    $image->move($result, $name);
                    $blog->image = $name;
                }
                $blog->save();
                toast('New blogs has been added!', 'success');
            }
            return redirect()->route('blogsList');
        }

        public function blogsDelete(Request $request){
            $blogs = Blog::find($request->id);
            $blogs->delete();
        }
    //====================== / Blogs ===================================


    //====================== Skills ===================================
        public function skillsList(){
            $skills = Skill::orderBy('id', 'desc')->get();
            return view('skills/list',compact('skills'));
        }

        public function skillsAdd(){
            return view('skills/addEdit');
        }

        public function skillsEdit($id){
            $skill = Skill::find($id);
            return view('skills/addEdit',compact('skill'));
        }

        public function skillsSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $skill = Skill::find($request->id);
                $skill->skill_name = $request->skill_name;
                $skill->percentage = $request->percentage;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Skills' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('skillsImage');
                    $image->move($result, $name);
                    $skill->icons = $name;
                }
                $skill->status = $request->status;
                
                $skill->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $skill = new Skill();
                $skill->skill_name = $request->skill_name;
                $skill->percentage = $request->percentage;
                $skill->status = $request->status;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Skills' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('skillsImage');
                    $image->move($result, $name);
                    $skill->icons = $name;
                }
                $skill->save();
                toast('New skill has been added!', 'success');
            }
            return redirect()->route('skillsList');
        }

        public function skillsDelete(Request $request){
            $skill = Skill::find($request->id);
            $skill->delete();
        }
    //====================== / Skills ===================================


     //====================== Skills ===================================
        public function resumeList(){
            $resume = Resume::orderBy('id', 'desc')->get();
            return view('resume/list',compact('resume'));
        }

        public function resumeAdd(){
            return view('resume/addEdit');
        }

        public function resumeEdit($id){
            $resume = Resume::find($id);
            return view('resume/addEdit',compact('resume'));
        }

        public function resumeSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $resume = Resume::find($request->id);
                $resume->type = $request->type;
                $resume->main_title = $request->main_title;
                $resume->from_year = $request->from_year;
                $resume->to_year = $request->to_year;
                $resume->sub_title = $request->sub_title;
                $resume->description = $request->description;
                $resume->status = $request->status;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Resume' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('resumesImage');
                    $image->move($result, $name);
                    $resume->icons = $name;
                }
                
                $resume->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $resume = new Resume();
                $resume->type = $request->type;
                $resume->main_title = $request->main_title;
                $resume->from_year = $request->from_year;
                $resume->to_year = $request->to_year;
                $resume->sub_title = $request->sub_title;
                $resume->description = $request->description;
                $resume->status = $request->status;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Resume' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('resumesImage');
                    $image->move($result, $name);
                    $resume->icons = $name;
                }
                $resume->save();
                toast('New resume section has been added!', 'success');
            }
            return redirect()->route('resumeList');
        }

        public function resumeDelete(Request $request){
            $resume = Resume::find($request->id);
            $resume->delete();
        }
    //====================== / Skills ===================================

    //====================== Projects ===================================
        public function projectsList(){
            $allProjects = Projects::orderBy('id', 'desc')->paginate(10);
            return view('projects/list',compact('allProjects'));
        }

        public function projectsAdd(){
            return view('projects/addEdit');
        }

        public function projectsEdit($id){
            $project = Projects::find($id);
            return view('projects/addEdit',compact('project'));
        }

        public function projectsSave(Request $request){
            // dd($request->all());
            if (!empty($request->id)) {
                $project = Projects::find($request->id);
                $project->title = $request->main_title;
                $project->link = $request->link;
                $project->description = $request->description;
                $project->status = $request->status;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Project' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('projectsImage');
                    $image->move($result, $name);
                    $project->logo = $name;
                }
                $project->save();
                toast('Record has been updated!', 'success');
            
            } else {    
                // dd($request->all());
                $project = new Projects();
                $project->title = $request->main_title;
                $project->link = $request->link;
                $project->description = $request->description;
                $project->status = $request->status;
                if ($request->hasfile('icons')) {
                    $image = $request->file('icons');
                    $name = 'Project' . time() . '.' . $image->getClientOriginalExtension();
                    $result = public_path('projectsImage');
                    $image->move($result, $name);
                    $project->logo = $name;
                }
                $project->save();
                toast('New Project as been added!', 'success');
            }
            return redirect()->route('projectsList');
        }

        public function projectsDelete(Request $request){
            $project = Projects::find($request->id);
            $project->delete();
        }
    //====================== / Projects ===================================


}
