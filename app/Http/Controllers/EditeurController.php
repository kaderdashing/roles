<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EditeurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:editeur');
    }



    public function index()
    {$editeurs = Editeur::all() ;
        return view('editeur/home')->with([
          
            'editeurs'=>$editeurs
        ]) ;




        return view('editeur/home') ;
    }


/*------------------------------------------------------------------------------------*/

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editeur/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
        public function store(Request $request)
        {   $this->validator($request->all())->validate();
            $editeur = Editeur::create([
            
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'email' => $request['email'],
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),

            ]);
    
            $input = $request->all();
           // dd($input) ;

            //Editeur::create($input);
            //dd($input) ;
    
            return redirect()->route('Editeur.index');
        }

            /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editeur = Editeur::findOrFail($id);
        return view('editeur/show', compact('editeur','editeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //   if( Gate::allows('destroye-edit') ) 
            // get the shark
            $editeur = editeur::find($id);
            
            // show the edit form and pass the editeur
            return view('editeur/edit')
                ->with('editeur', $editeur);
        //    else return Redirect::to('admin/dashbord/enseignant') ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { //dd($id) ;
            $validatedData = $request->validate([
                'name' => 'required',
                'password' => 'required',
                'email' => 'required|email',
                
            ]);
            Editeur::whereId($id)->update($validatedData);
    
            return redirect('/editeur/home')->with('info','  editeur a bien eté edité');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function destroy($id)
    {  // if( Gate::allows('destroye-edit') ) {
        // delete
        $editeur = editeur::find($id);
        $editeur->delete();

        // redirect
       // Session::flash('message', 'Successfully deleted the enseignant!');
        return Redirect::to('editeur/home')->with('info',' editeur a bien eté suprimé');
    }
 //   else return Redirect::to('admin/dashbord/enseignant') ;}







 /*-----------------------------------------------------------------------------------------------*/   
}