<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
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


// Route::get('/', function () {
//     return view('welcome');
// });

<<<<<<< HEAD
Route::group(['middleware' => 'auth'] , function (){
	Route::get('/projects', [ProjectsController::class, 'index']);
	Route::get('/projects/{project}', [ProjectsController::class, 'show']);
	Route::post('/projects', [ProjectsController::class, 'store']);

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();


=======
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{project}', [ProjectsController::class, 'show']);
Route::post('/projects', [ProjectsController::class, 'store']);
>>>>>>> 28c78127c2086fd60c006692250c29013194d3a3
