@extends('layouts.app1')
@section('content')


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        liste des utilisateur
    </h2>
</x-slot> 




<style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Edit editeur
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('Editeur.update', $editeur->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="country_name">editeur Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $editeur->name }}"/>
            </div>
            <div class="form-group">
                <label for="cases">editeur email :</label>
                <input type="text" class="form-control" name="email" value="{{ $editeur->email }}"/>
            </div>
            <div class="form-group">
                <label for="cases">editeur role :</label>
                <input type="text" class="form-control" name="password" value="{{ $editeur->password }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
  </div>









@endsection