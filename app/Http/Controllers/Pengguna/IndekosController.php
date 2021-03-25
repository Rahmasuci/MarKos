<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indekos;
use App\Models\Favorite;

class IndekosController extends Controller
{   
    public function __invoke(Request $request)
    {   
    }

    public function index()
    {   
        $indekos = Indekos::all();        
        $favorite = Favorite::all();
            
        return view('pencari.indekos.index', [
                'indekos' => $indekos,          
                'favorite' => $favorite
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
