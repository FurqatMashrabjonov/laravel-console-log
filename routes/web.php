<?php


use Illuminate\Support\Facades\Route;

Route::get('/laravel-console-log-stream', function (){
    return view('laravel-console-log::stream');
});
