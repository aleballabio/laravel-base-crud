<?php

/*

namespace App\Http\Controllers\Pages; // aggiunto \Pages al namespace per far corrispondere la struttura delle cartelle con quella del namespace

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // in alternativa potremmo scrivere Controller con il percorso completo come sotto:

 notare il backslash iniziale nell'alternativa per la definizione della classe indicata sotto, senza quello l'intera stringa verrebbe aggiunta al namespace della pagina e verrebbe fuori questo: App\Http\Controllers\Pages\App\Http\Controllers\Controller, il backslash iniziale rende il percorso del namespace assoluto, senza backslash il percorso è relativo e se c'è un namespace definito prima (come in questo caso) si concatena dopo di quello.

 class About extends \App\Http\Controllers\Controller // scrivendo così non c'è bisogno di: use App\Http\Controllers\Controller;
class About extends Controller
{
    public function about() {
    }
}

*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;
use Carbon\Carbon;


class TrainsController extends Controller
{
    public function trains()
    {
        /*
        $date = Carbon::now()->format('Y-m-d');
        $trains = Train::where('orario_di_partenza', 'like',  "%$date%")
            ->where('cancellato', '=', 0)
            ->get();

        */

        $trains = Train::paginate(30);

        $data = [
            'trains' => $trains,
        ];

        // logica + chiamate al database

        return view('trains', $data);
    }
}