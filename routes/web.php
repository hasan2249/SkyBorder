<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\Services\ServicesController;
use App\Http\Controllers\Backend\Our_works\Our_worksController;

/*
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

//For desc
// Route::get('services/{id}/desc', 'ServicesController@showDescription')->name('service.desc');
Route::get('services/{id}/desc', [ServicesController::class, 'showServiceDescription'])->name('service.desc');

Route::get('our_works/{id}/desc', [Our_worksController::class, 'showOur_worksDescription'])->name('our_work.desc');

Route::get('plans/{id}/desc', [ServicesController::class, 'showPlanDescription'])->name('plan.desc');

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });
