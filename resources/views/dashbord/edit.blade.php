@extends('layouts.app1')
@section('content')


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        liste des utilisateur
    </h2>
</x-slot> 




<div class="container">
<h1>Edit {{ $user->name }}</h1>

<!-- if there are creation errors, they will show here -->

</div>













@endsection