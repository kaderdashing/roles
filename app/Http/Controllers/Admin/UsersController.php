<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $users = User::all() ; //->paginate(10)
       // dd($enseignants) ;
        return view('dashbord.membre')->with([
            'users'=>$users,
            
        ]) ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if( Gate::allows('destroye-edit') ) {
        // get the shark
        $user = user::find($id);
        
        // show the edit form and pass the user
        return view('dashbord.edit')
            ->with('user', $user);}
        else return Redirect::to('admin/dashbord/membre') ;
    }



/*

    public function edit(User $user)
    {  
        dd($user) ;
        return view('dashbord.edit', [
            'user' =>$user
        ]
        
        ) ;
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    } 
    
    public function update(Request $request, $id)
{ //dd($id) ;
        $validatedData = $request->validate([
            'role' => 'required' ,
            'name' => 'required|max:255',
            
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/admin/dashbord/membre')->with('info',' utilisateur a bien eté edité');;
}







    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if( Gate::allows('destroye-edit') ) {
        // delete
        $user = user::find($id);
        $user->delete();

        // redirect
       // Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('admin/dashbord/membre')->with('info','l utilisateur a bien eté suprimé');
      }
    else return Redirect::to('admin/dashbord/membre') ;}

}
