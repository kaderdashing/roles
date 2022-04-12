<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return route('doyen.settings');
        } elseif (Auth()->user()->role == 2) {

            return route('admin.test');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);



        /* la fonction marche si le input est corecte elle va verifier juste le role */ 
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if(auth()->user()->role == 1) {
                return redirect()->route('doyen.settings') ; //home
            }

            elseif(auth()->user()->role == 2) {
                return redirect()->route('admin.test') ;
            }
           
           

        }
        // ici on va faire le redirectionement en cas de faux email ou faux password on va pas montrer l'erreure pour une personne mal intpntioné 
    //    return redirect()->route('login') ; la fonction simple fourni par laravel
    return back()->withErrors([
        'email' => 'email faux ',
        'password' => 'password faux ',

    ]);


    }
}
