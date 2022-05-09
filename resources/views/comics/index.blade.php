@extends('template.base')

@section('title', 'Comics')

@section('content')
    <div class="container">
        @foreach ($comics as $comic)
            <div class="card">
                <a href="{{ route('comics.show', $comic->id) }}">
                    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                    <h2> {{ $comic->title }}</h2>
                    <h3>{{ $comic->series }}</h3>
                </a>
            </div>
        @endforeach
    </div>

    <div class="container-link">
        {{ $comics->links() }}
    </div>

@endsection
