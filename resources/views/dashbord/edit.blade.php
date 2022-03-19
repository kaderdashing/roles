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
      Edit Game Data
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
        <form method="post" action="{{ route('admin.membre.update', $user->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="country_name">user Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
            </div>
            <div class="form-group">
                <label for="cases">user role :</label>
                <input type="text" class="form-control" name="role" value="{{ $user->role }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
  </div>









@endsection