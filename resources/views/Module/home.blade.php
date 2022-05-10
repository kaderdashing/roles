@extends('layouts.app1')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">INDEX MODULE</div>

                    <div class="card-body">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <table class="table">
                                            <thead class="">
                                              <tr>
                                                <th scope="col">LIBELLE</th>
                                                <th scope="col">CONTROLLE</th>
                                                <th scope="col">EXAMEN</th>
                                               <th scope="col">TP</th> 
                                               <th scope="col">option</th>
                                               <th scope="col">semestre</th> 
 

                                            </tr>
                                            </thead>
                                            <tbody> 
                                             
                                                  
                                            @foreach ($modules as $module)
                                                <tr>
                                              
                                                  <td>  {{$module->libelle}} </td>
                                                  <td>  {{$module->controle}} </td>
                                                  <td>  {{$module->examen}} </td>
                                                  <td>  {{$module->tp}} </td>
                                                  <td>  {{$module->option}} </td>
                                                    <td>  {{$module->semestre}} </td>
                                                </tr>


                                                    <div class="kader">
                                                        <a href="{{route('module.show', $module->id)}}" class="btn btn-info m-1">Details</a>
                                                        <a href="{{route('module.edit', $module->id)}}" class="btn btn-primary m-1">Edit</a>
                                
                                                        <form action="{{ route('module.destroy', $module->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn btn-danger m-1">Delete User</button>
                                                        </form>
                                                    </div>
                                                   </td>
                                                </tr>
                                                    
                                                    
                            
                                            @endforeach
                          
                          
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container mt-3 aligne-center">     <a href="{{route('module.create') }}" > <button class="btn btn-primary"> cree module</button></a>
    </div>
     <style>
         .kader{
            display: inline;
         }
     </style>
    @endsection