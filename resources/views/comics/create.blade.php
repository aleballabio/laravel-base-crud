@extends('template.base')

@section('title', 'Comics - New Comic')

@section('content')
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
            </div>
        </div>
    </div>
    <div class="form">
        <div class="form">
            <form method="POST" action="{{ route('comics.store') }}">
                @csrf
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title">

                <label for="series" class="form-label">Series:</label>
                <input type="text" id="series" name="series">

                <label for="description" class="form-label">Description:</label>
                <input type="text" id="description" name="description">

                <label for="thumb" class="form-label">Url Image:</label>
                <input type="text" id="thumb" name="thumb">

                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" step="0.01" min="0.00" name="price">

                <label for="date" class="form-label">Available From:</label>
                <input type="date" id="date" name="date">

                <label for="type" class="form-label">Type</label>
                <select name="type" id="type">
                    <option value="graphic novel">graphic novel</option>
                    <option value="comic book">comic book</option>
                </select>
                <input type="submit">
            </form>
            <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Go Back</a>
        </div>
    @endsection
