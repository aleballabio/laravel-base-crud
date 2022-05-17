@extends('template.base')

@section('title', 'Comics - Edit' . ' ' . $comic['title'])

@section('content')

    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('comics.update', $comic->id) }}">
                        @csrf
                        @method('PUT')
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" id="title" name="title" value="{{ $comic->title }}">

                        <label for=" series" class="form-label">Series:</label>
                        <input type="text" id="series" name="series" value="{{ $comic->series }}">

                        <label for="description" class="form-label">Description:</label>
                        <input type="text" id="description" name="description" value="{{ $comic->description }}">

                        <label for="thumb" class="form-label">Url Image:</label>
                        <input type="text" id="thumb" name="thumb" value="{{ $comic->thumb }}">

                        <label for="price" class="form-label">Price:</label>
                        <input type="number" id="price" step="0.01" min="0.00" name="price"
                            value="{{ $comic->price / 100 }}">

                        <label for="date" class="form-label">Available From:</label>
                        <input type="date" id="date" name="date" value="{{ $comic->date }}">

                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" value="{{ $comic->type }}">
                            <option value="graphic novel">graphic novel</option>
                            <option value="comic book">comic book</option>
                        </select>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
        <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
@endsection
