<?php

Route::group([
    'namespace' => 'Goodwong\Form\Http\Controllers',
], function () {
    Route::resource('forms', 'FormController');
    Route::resource('forms/{form}/submissions', 'FormSubmissionController');
    Route::post('forms/{form}/images', 'FormImageController@store');
});
