<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::prefix('v1')->group(function () {
    Route::get('/about', [App\Http\Controllers\ApiController::class, 'about'])->name('about');
    Route::get('/skills', [App\Http\Controllers\ApiController::class, 'skills'])->name('skills');
    Route::get('/works-details', [App\Http\Controllers\ApiController::class, 'worksDetails'])->name('worksDetails');
    Route::get('/projects', [App\Http\Controllers\ApiController::class, 'projects'])->name('projects');
    Route::post('/submit-contact-query', [App\Http\Controllers\ApiController::class, 'submitContactQuery'])->name('submitContactQuery');
  
});