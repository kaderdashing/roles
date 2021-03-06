<?php

use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\adminController ;
use App\Http\Controllers\doyenController ;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\etudiantController ;
//use App\Http\Controllers\Editeur\LoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\enseignantController ;
use App\Http\Controllers\admin\UsersController ;
use App\Http\Controllers\Auth\RegisterController;

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
Route::resource('module', ModuleController::class);

Route::get('/', function () {
    return view('welcome');
});
/*--------------------------------------------------------------------------------------------*/
Route::controller(LoginController::class)->group(function () {
    Route::get('/login/writer', 'showLoginForm');
    Route::post('/login/writer', 'writerLogin');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register/writer', 'showWriterRegisterForm');
    Route::post('/register/writer', 'createWriter');
});
/*------------------------------------------------------------------------------------*/
Route::controller('App\Http\Controllers\Editeur\LoginController')->group(function () {
Route::get('editeur', 'showLoginForm')->name('editeur.login');
Route::post('editeur', 'login');
});
/* -------------------------------------------------------------------------------*/
Route::controller('App\Http\Controllers\EditeurController')->group(function () {
    Route::get('editeur/home', 'index') ;
});
Route::resource('Editeur', 'App\Http\Controllers\EditeurController');
/* -------------------------------------------------------------------------------*/
Route::resource('module', ModuleController::class);
Route::resource('note', NoteController::class);

Route::controller('App\Http\Controllers\ModuleController')->group(function () {
    Route::get('module/home', 'index') ;
});





Route::resource('Etudiant', 'App\Http\Controllers\EtudiantController');
Route::resource('Enseignant', 'App\Http\Controllers\EnseignantController');


Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    
    Route::namespace('')->prefix('admin')->name('admin.')->group(function(){
        Route::resource('/dashbord/membre', UsersController::class)  ;
        Route::resource('/dashbord/enseignant', EnseignantController::class)  ;

    
    }) ;

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
         

        Route::group(['prefix'=>'doyen','middleware'=>['isdoyen']],function(){
        Route::get('settings', [doyenController::class,'settings'])->name('doyen.settings') ;
        Route::get('creer', [doyenController::class,'creer'])->name('doyen.creer') ;
})  ; 
    Route::group(['prefix'=>'admin','Middleware'=>['isadmin']],function(){
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
