<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// StudentController

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', function (Request $request) {
//     // Only authenticated users may enter...
//     return $request->user();
// })->middleware('basicauth');


Route::group(['middleware' => ['basicauth']], function () {
    // Route::get('/user', function (Request $request) {
    //     // Only authenticated users may enter...
    //     return $request->user();
    // });


});
Route::post('/search_student', 'StudentController@getStudent');
// Route::post('/search_student', function (Request $request) {
//     // Only authenticated users may enter...
//     return $request->user();
// });
