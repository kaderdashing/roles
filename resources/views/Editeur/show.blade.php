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

<h1 class="display-6">editeur Details</h1>

    <hr/>

    <dl>
        <dt>First Name</dt>
        <dd>{{$editeur->name}}</dd>

        <dt>password</dt>
        <dd>{{$editeur->password}}</dd>

        <dt>Email</dt>
        <dd>{{$editeur->email}}</dd>
    </dl>

    <div class="d-flex">
        <a href="{{route('Editeur.edit', $editeur->id)}}" class="btn btn-primary m-1">Edit</a>

        <form action="{{ route('Editeur.destroy', $editeur->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger m-1">Delete Editeur</button>
        </form>
    </div>
    @endsection