<?php

// our Works Management
Route::group(['namespace' => 'Our_works'], function () {
    Route::resource('our_works', 'Our_worksController', ['except' => ['show']]);

    //For DataTables
    Route::post('our_works/get', 'Our_worksTableController')->name('our_works.get');

});
