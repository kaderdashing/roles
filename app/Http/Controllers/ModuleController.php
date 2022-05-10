<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all() ;
        return view('module/home')->with([
          
            'modules'=>$modules
        ]) ;




        return view('module/home') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'libelle' => 'required',
            'controlle' => 'required|boolean',
            'examen' => 'required|boolean',
            'tp' => 'required|boolean',
            'option' => 'required',
            'semestre' => 'required|number',
        ]);

        $input = $request->all();

        Module::create($input);
        Session::flash('message', 'Successfully created Module!');

        return redirect()->route('Module.index');
        
        
        
        // redirect
   //         return Redirect::to('sharks');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('module.show', compact('module','module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);
        
        return view('module.edit', compact('module','module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $this->validate($request, [
            'libelle' => 'required',
            'controlle' => 'required|boolean',
            'examen' => 'required|boolean',
            'tp' => 'required|boolean',
            'option' => 'required',
            'semestre' => 'required|number',
        ]);

        $input = $request->all();

        $module->fill($input)->save();

        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);

        $module->delete();
        
        return redirect()->route('module.index');
    }
}
