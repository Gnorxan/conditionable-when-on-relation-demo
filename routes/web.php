<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $someCondition = true;

    $coursesQuery = User::first()->courses();

    dump("coursesQuery of type: " . get_class($coursesQuery));

    $users = $coursesQuery->when($someCondition, function ($query) {
        dump("Query of type: " . get_class($query));
        // $query->wherePivot('status', 1); //Throws Exception
    })->get();

    dd($users);
});
