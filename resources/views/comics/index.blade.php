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
                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
            </div>
        @endforeach
    </div>

    <div class="container-link">
        {{ $comics->links() }}
    </div>

@endsection
