@extends('layouts.app')

@section('title', 'Create Sales')

@section('content')
<div class="container">
    <div class="card-deck text-center">
    @foreach($products as $prod)
        <a class="btn btn-outline-success btn-lg m-2"  href="/ventas/kiloForLine/{{$prod->id}} " role="button">{{$prod->name}}</a>		
    @endforeach
    </div>
</div>
@endsection
