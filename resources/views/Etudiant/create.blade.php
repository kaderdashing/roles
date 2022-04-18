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
    
    <form action="{{ route('Etudiant.store') }}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
        <div class="form-group">
            <label>nom etudiant</label>
            <input type="text"  class="form-control" name="nom" required>
        </div> 
        <div class="form-group">
            <label>prenom etudiant</label>
            <input type="text" class="form-control" name="prenom" required>
        </div>

        <label for="start">date de naissance</label>

        <input type="date" id="start" class="form-control" name="date_naissance" value="2018-07-22" min="1960-01-01" max="2018-12-31">
        <div class="form-group mt-3">

            <SELECT name="promo" size="1" id="in" notrequired>
                <OPTION>lundi
                <OPTION>mardi
                <OPTION>mercredi
                <OPTION>jeudi
                <OPTION>vendredi
                </SELECT>
      
            <input type="file" class="mt-3" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


@endsection