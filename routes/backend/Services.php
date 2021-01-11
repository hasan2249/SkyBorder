<?php

// Pages Management
Route::group(['namespace' => 'Services'], function () {
    Route::resource('services', 'ServicesController', ['except' => ['show']]);

    //For DataTables
    Route::post('services/get', 'ServicesTableController')->name('services.get');

});
