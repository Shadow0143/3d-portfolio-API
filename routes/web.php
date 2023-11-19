<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\welcomeController::class, 'welcome'])->name('welcome');
Route::post('/submit-contact', [App\Http\Controllers\welcomeController::class, 'submitContact'])->name('submitContact');
Route::get('/footer-details', [App\Http\Controllers\welcomeController::class, 'footerDetails'])->name('footerDetails');





Route::prefix('admin')->group(function () {

    // ======================== Admin =======================================
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    // =========================== Auth =====================================
        Route::get('/profile/{id}', [App\Http\Controllers\MainController::class, 'profile'])->name('profile');
        Route::post('/submit-profile', [App\Http\Controllers\MainController::class, 'submitProfile'])->name('submitProfile');
        Route::get('/change-password', [App\Http\Controllers\MainController::class, 'changePassword'])->name('changePassword');
        Route::post('/submit-password', [App\Http\Controllers\MainController::class, 'submitPassword'])->name('submitPassword');
    // ========================= / Auth ======================================


    //========================= About Me ==================================
        Route::get('/aboutme-list', [App\Http\Controllers\HomeController::class, 'aboutMeList'])->name('aboutMeList');
        Route::get('/aboutme-add', [App\Http\Controllers\HomeController::class, 'aboutMeAdd'])->name('aboutMeAdd');
        Route::get('/aboutme-edit/{id}', [App\Http\Controllers\HomeController::class, 'aboutMeEdit'])->name('aboutMeEdit');
        Route::post('/aboutme-save', [App\Http\Controllers\HomeController::class, 'aboutMeSave'])->name('aboutMeSave');
        Route::get('/aboutme-delete', [App\Http\Controllers\HomeController::class, 'aboutMeDelete'])->name('aboutMeDelete'); 

    //========================= / About Me ================================


    //========================= Testimonial ================================

        Route::get('/testimonial-list', [App\Http\Controllers\HomeController::class, 'testimonialList'])->name('testimonialList');
        Route::get('/testimonial-add', [App\Http\Controllers\HomeController::class, 'testimonialAdd'])->name('testimonialAdd');
        Route::get('/testimonial-edit/{id}', [App\Http\Controllers\HomeController::class, 'testimonialEdit'])->name('testimonialEdit');
        Route::post('/testimonial-save', [App\Http\Controllers\HomeController::class, 'testimonialSave'])->name('testimonialSave');
        Route::get('/testimonial-delete', [App\Http\Controllers\HomeController::class, 'testimonialDelete'])->name('testimonialDelete'); 

    //========================= / Testimonial ================================


    //========================= Service ================================

        Route::get('/service-list', [App\Http\Controllers\HomeController::class, 'servicesList'])->name('servicesList');
        Route::get('/service-add', [App\Http\Controllers\HomeController::class, 'servicesAdd'])->name('servicesAdd');
        Route::get('/service-edit/{id}', [App\Http\Controllers\HomeController::class, 'servicesEdit'])->name('servicesEdit');
        Route::post('/service-save', [App\Http\Controllers\HomeController::class, 'servicesSave'])->name('servicesSave');
        Route::get('/service-delete', [App\Http\Controllers\HomeController::class, 'servicesDelete'])->name('servicesDelete'); 

    //========================= / Service ================================


    //========================= Contact ================================

        Route::get('/contact-list', [App\Http\Controllers\HomeController::class, 'contactList'])->name('contactList');
   
    //========================= / Contact ================================


    //========================= Works ================================

        Route::get('/works-list', [App\Http\Controllers\HomeController::class, 'worksList'])->name('worksList');
        Route::get('/works-add', [App\Http\Controllers\HomeController::class, 'worksAdd'])->name('worksAdd');
        Route::get('/works-edit/{id}', [App\Http\Controllers\HomeController::class, 'worksEdit'])->name('worksEdit');
        Route::post('/works-save', [App\Http\Controllers\HomeController::class, 'worksSave'])->name('worksSave');
        Route::get('/works-delete', [App\Http\Controllers\HomeController::class, 'worksDelete'])->name('worksDelete'); 

    //========================= / Works ================================


    //========================= Blogs ================================

        Route::get('/blogs-list', [App\Http\Controllers\HomeController::class, 'blogsList'])->name('blogsList');
        Route::get('/blogs-add', [App\Http\Controllers\HomeController::class, 'blogsAdd'])->name('blogsAdd');
        Route::get('/blogs-edit/{id}', [App\Http\Controllers\HomeController::class, 'blogsEdit'])->name('blogsEdit');
        Route::post('/blogs-save', [App\Http\Controllers\HomeController::class, 'blogsSave'])->name('blogsSave');
        Route::get('/blogs-delete', [App\Http\Controllers\HomeController::class, 'blogsDelete'])->name('blogsDelete'); 

    //========================= / Blogs ================================

    //========================= Blogs ================================

        Route::get('/skills-list', [App\Http\Controllers\HomeController::class, 'skillsList'])->name('skillsList');
        Route::get('/skills-add', [App\Http\Controllers\HomeController::class, 'skillsAdd'])->name('skillsAdd');
        Route::get('/skills-edit/{id}', [App\Http\Controllers\HomeController::class, 'skillsEdit'])->name('skillsEdit');
        Route::post('/skills-save', [App\Http\Controllers\HomeController::class, 'skillsSave'])->name('skillsSave');
        Route::get('/skills-delete', [App\Http\Controllers\HomeController::class, 'skillsDelete'])->name('skillsDelete'); 

    //========================= / Blogs ================================


    //========================= Blogs ================================

        Route::get('/resume-list', [App\Http\Controllers\HomeController::class, 'resumeList'])->name('resumeList');
        Route::get('/resume-add', [App\Http\Controllers\HomeController::class, 'resumeAdd'])->name('resumeAdd');
        Route::get('/resume-edit/{id}', [App\Http\Controllers\HomeController::class, 'resumeEdit'])->name('resumeEdit');
        Route::post('/resume-save', [App\Http\Controllers\HomeController::class, 'resumeSave'])->name('resumeSave');
        Route::get('/resume-delete', [App\Http\Controllers\HomeController::class, 'resumeDelete'])->name('resumeDelete'); 

    //========================= / Blogs ================================


     //========================= Works ================================

        Route::get('/projects-list', [App\Http\Controllers\HomeController::class, 'projectsList'])->name('projectsList');
        Route::get('/projects-add', [App\Http\Controllers\HomeController::class, 'projectsAdd'])->name('projectsAdd');
        Route::get('/projects-edit/{id}', [App\Http\Controllers\HomeController::class, 'projectsEdit'])->name('projectsEdit');
        Route::post('/projects-save', [App\Http\Controllers\HomeController::class, 'projectsSave'])->name('projectsSave');
        Route::get('/projects-delete', [App\Http\Controllers\HomeController::class, 'projectsDelete'])->name('projectsDelete'); 

    //========================= / Works ================================



});