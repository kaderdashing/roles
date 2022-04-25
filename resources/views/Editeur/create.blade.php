<!DOCTYPE html>
@extends('layouts.app1')

@section('content')

<div class="container">
    <!-- if validation in the controller fails, show the errors -->
    @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
         </ul>
       </div>
    @endif
    
    <div>
    
    <form action="{{ route('Editeur.store') }}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
        <div class="form-group">
            <label>nom editeur</label>
            <input type="text"  class="form-control" name="name" required>
        </div> 
        <div class="form-group">
            <label>email editeur</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>password editeur</label>
            <input type="password" class="form-control" name="password" required>
        </div>
 
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


@endsection