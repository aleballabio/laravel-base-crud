@extends('template.base')

@section('title', 'Movies')

@section('content')
    <div class="container">
        @foreach ($trains as $train)
            <div class="card">
                <h2>Biglietto per {{ $train->stazione_di_arrivo }}</h2>
                <h3>Numero {{ $train->codice_treno }}</h3>
                <ul>
                    <li>Partenza: {{ $train->orario_di_partenza }} da {{ $train->stazione_di_partenza }} </li>
                    <li>Orario di arrivo: {{ $train->orario_di_arrivo }} a {{ $train->stazione_di_arrivo }}</li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="container-link">
        {{ $trains->links() }}
    </div>

@endsection
