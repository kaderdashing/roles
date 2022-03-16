<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController ;
use App\Http\Controllers\doyenController ;
use App\Http\Controllers\enseignantController ;
use App\Http\Controllers\etudiantController ;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth ;

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
    return view('welcome');
});


Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();

//Auth::routes();








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'doyen','Middleware'=>['isdoyen','preventBackHistory']],function(){
Route::get('settings', [doyenController::class,'settings'])->name('doyen.settings') ;
Route::get('creer', [doyenController::class,'creer'])->name('doyen.creer') ;
});

Route::group(['prefix'=>'admin','Middleware'=>['isadmin','preventBackHistory']],function(){
    Route::get('test', [adminController::class,'test'])->name('admin.test') ;
    Route::get('rien', [adminController::class,'rien'])->name('admin.rien') ;
    });
    
});
    //->middleware(['auth', 'isadmin']) ;
/*
Route::group(['prefix'=>'enseignant','Middleware'=>'auth'],function(){
        Route::get('note', [enseignantController::class,'note'])->name('enseignant.note') ;
        Route::get('module', [enseignantController::class,'module'])->name('enseignant.module') ;
        }) ;

Route::group(['prefix'=>'etudiant','Middleware'=>'auth'],function(){
        Route::get('contacter', [etudiantController::class,'contacter'])->name('etudiant.contacter') ;
        Route::get('voire', [etudiantController::class,'voire'])->name('etudiant.voire') ;
        }) ; */
        /*
Route::middleware(['auth', 'isdoyen'])->group(function () {
    Route::get('doyen/settings', function () {
        return view('dashbord.doyen.settings') ;
    });
    Route::get('doyen/creer', function () {
        return view('dashbord.doyen.creer') ;
    });
  
   
}); */