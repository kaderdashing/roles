@extends('layouts.app1')
@section('content')


<x-slot name="header">
    
</x-slot>

<div class="container">
  @if(Session::has('info'))
    <div class="alert alert-danger">
      {{Session::get('info')}}
    </div>
    @endif 
    <div class="container mt-3">
    <a href="{{route('Enseignant.create') }}" > <button class="btn btn-primary"> cree enseignant</button></a>
    </div>
    <h1>liste des enseignant</h1>






<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">role</th>
                      <th scope="col">NOM</th>
                      <th scope="col">prenom</th>
                     <th scope="col">grade</th> 
                    </tr>
                  </thead>
                  <tbody> 
                   
                        
                  @foreach ($enseignants as $enseignant)
                      <tr>
                      <td>  

  
                      <p>enseignant</p>
                     
                      
                      </td>
                        <td>  {{$enseignant->nom}} </td>
                        <td>  {{$enseignant->prenom}} </td>
                         
                        <td>  {{$enseignant->grade}} </td>
                          
                          </form>
                          
  
                        </td>

                        <td>
                            @can('destroye-edit')
                            <a href="{{route('admin.enseignant.edit',$enseignant->id) }}" > <button class="btn btn-primary"> editer</button></a>
                           @endcan
                           @can('destroye-edit')
                            <form action="{{route('admin.enseignant.destroy',$enseignant->id) }}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-warning ">suprimer</button>
                            
                            </form>
                            @endcan
    
                          </td>




                      </tr>
                  @endforeach
                      
          
                  </tbody> </table> 
          </div>
      </div>
  </div>
  </div>











</div>

@endsection