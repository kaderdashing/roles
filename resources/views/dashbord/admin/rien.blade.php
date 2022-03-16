@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p>hi {{Auth::user()->name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3"><h1>je suis "rien " de admin</h1></div>
<div class="container mt-3"><h1>j'ai le role {{Auth::user()->role}}</h1></div>

@endsection


