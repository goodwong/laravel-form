<?php

Route::group([
    'namespace' => 'Goodwong\LaravelForm\Http\Controllers',
], function () {
    Route::resource('forms', 'FormController');
});
