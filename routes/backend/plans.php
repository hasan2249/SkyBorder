<?php

// Pages Management
Route::group(['namespace' => 'Plans'], function () {
    Route::resource('plans', 'PlanController', ['except' => ['show']]);

    //For DataTables
    Route::post('plans/get', 'PlansTableController')->name('plans.get');

});
