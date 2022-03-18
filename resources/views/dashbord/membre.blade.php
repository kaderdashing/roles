@extends('layouts.app1')
@section('content')


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        liste des utilisateur
    </h2>
</x-slot>

<div class="container">
  @if(Session::has('info'))
    <div class="alert alert-danger">
      {{Session::get('info')}}
    </div>
    @endif

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
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody> 
                 
                      
                @foreach ($users as $user)
                    <tr>
                    <td>  
                     @if (($user->role))
                        @if (($user->role)==1)
                        <p>doyen</p>
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
                        <a href="{{route('admin.membre.edit',$user->id) }}" > <button class="btn btn-primary"> editer</button></a>
                        <form action="{{route('admin.membre.destroy',$user->id) }}" method="post" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-warning ">suprimer</button>
                        
                        </form>


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