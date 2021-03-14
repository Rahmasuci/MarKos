<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indekos;

class IndekosController extends Controller
{   
    public function __invoke(Request $request)
    {   
    }

    public function index()
    {   
        $indekos = Indekos::all();
            
        return view('pencari.indekos.index', [
                'indekos' => $indekos
            ]);
    }

     public function show($id)
    {   
        $indekos = Indekos::where('id',$id)->get();
        return view('pencari.indekos.detail', [
            'indekos' => $indekos,  
        ]);
    }
}
