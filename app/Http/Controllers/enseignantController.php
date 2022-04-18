<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isdoyen');

        
    } 
    public function index()
    {
       
            
    
            $enseignants = Enseignant::all() ; //->paginate(10)
            return view('dashbord.enseignant')->with([
              
                'enseignants'=>$enseignants
            ]) ;
    
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Enseignant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            
            'date_naissance' => 'required',
            'grade' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /etudiant
            $request->file->store('enseignant', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $enseignant = new Enseignant([
                "nom" => $request->get('nom'),
                "prenom" => $request->get('prenom'),
                "date_naissance" => $request->get('date_naissance'),
                "grade" => $request->get('grade'),
                
                "file_path" => $request->file->hashName()
            ]);
           
            $enseignant->save(); // Finally, save the record.
        }

        return view('Enseignant.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( Gate::allows('destroye-edit') ) {
            // get the shark
            $enseignant = enseignant::find($id);
            
            // show the edit form and pass the enseignant
            return view('enseignant.edit')
                ->with('enseignant', $enseignant);}
            else return Redirect::to('admin/dashbord/enseignant') ;
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
                'nom' => 'required' ,
                'prenom' => 'required|max:255',
                'date_naissance' => 'required',
                'grade' => 'required|max:255',
                'file_path' => 'required|max:255',
                
            ]);
            Enseignant::whereId($id)->update($validatedData);
    
            return redirect('/admin/dashbord/enseignant')->with('info','  Enseignant a bien eté edité');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function destroy($id)
    {   if( Gate::allows('destroye-edit') ) {
        // delete
        $enseignant = enseignant::find($id);
        $enseignant->delete();

        // redirect
       // Session::flash('message', 'Successfully deleted the enseignant!');
        return Redirect::to('admin/dashbord/enseignant')->with('info',' enseignant a bien eté suprimé');
      }
    else return Redirect::to('admin/dashbord/enseignant') ;}

}



