<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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
        $user_id = Auth::id();    
        $favorite = Favorite::where('user_id', $user_id)->get();
            
        return view('pencari.indekos.index', [
            'indekos' => $indekos,          
            'favorite' => $favorite
        ]);
    }

     public function show($id)
    {   
        $indekos = Indekos::where('id',$id)->get();
        $user_id = Auth::id();
        $favorite = Favorite::where('boarding_house_id', $id)->where('user_id', $user_id)->get();
        // dd($user_id);
        return view('pencari.indekos.detail', [
            'indekos' => $indekos,  
            'favorite' => $favorite 
        ]);
    }
}
