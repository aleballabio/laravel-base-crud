@extends('template.base')

@section('title', 'Comics - {{ $comic->title }}')

@section('content')
    <div class="card-single">
        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        <h2> {{ $comic->title }}</h2>
        <h3>{{ $comic->series }}</h3>
        <h4>{{ $comic->type }}</h4>
        <p>{{ $comic->description }}</p>
        <button>${{ $comic->price }}</button>
    </div>
@endsection
