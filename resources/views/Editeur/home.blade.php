@extends('layouts.app1')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard editeur</div>

                    <div class="card-body">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <table class="table">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th scope="col">role</th>
                                                <th scope="col">NOM</th>
                                                <th scope="col">email</th>
                                               <th scope="col">grade</th> 
                                              </tr>
                                            </thead>
                                            <tbody> 
                                             
                                                  
                                            @foreach ($editeurs as $editeur)
                                                <tr>
                                                <td>  
                          
                            
                                                <p>editeur</p>
                                               
                                                
                                                </td>
                                                  <td>  {{$editeur->name}} </td>
                                                  <td>  {{$editeur->email}} </td>
                                                   <td>
                                                    <div class="d-flex">
                                                        <a href="{{route('Editeur.show', $editeur->id)}}" class="btn btn-info m-1">Details</a>
                                                        <a href="{{route('Editeur.edit', $editeur->id)}}" class="btn btn-primary m-1">Edit</a>
                                
                                                        <form action="{{ route('Editeur.destroy', $editeur->id) }}" method="POST">
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
    @endsection