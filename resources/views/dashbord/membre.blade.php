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

<div class="py-12">
  <h1>liste des admin</h1>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">role</th>
                    <th scope="col">NOM</th>
                    <th scope="col">email</th>
                    @can('destroye-edit')  <th scope="col">action</th> @endcan
                  </tr>
                </thead>
                <tbody> 
                 
                      
                @foreach ($users as $user)
                    <tr>
                    <td>  
                     @if (($user->role))
                        @if (($user->role)==1)
                        <p>admin</p>
                        @endif
                        
                        @if (($user->role)==2)
                        <p>admin</p>
                        @endif
                    @else 

                    <p>neutre</p>
                    @endif
                    
                    </td>
                      <td>  {{$user->name}} </td>
                      <td>  {{$user->email}} </td>
                       
                      <td>
                        @can('destroye-edit')
                        <a href="{{route('admin.membre.edit',$user->id) }}" > <button class="btn btn-primary"> editer</button></a>
                       @endcan
                       @can('destroye-edit')
                        <form action="{{route('admin.membre.destroy',$user->id) }}" method="post" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-warning ">suprimer</button>
                        
                        </form>
                        @endcan

                      </td>
                    </tr>
                @endforeach
                    
        
                </tbody> </table> 
                <a href="{{route('Enseignant.create') }}" > <button class="btn btn-primary"> enseignant controller</button></a>
        </div>
    </div>
</div>
</div>

















</div>

@endsection