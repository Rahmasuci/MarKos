<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class HomeController extends Controller
{
    public function index()
    {   
        $id         = Auth::user()->id;
        $users      = DB::table('users')->count();
        $indekos    = DB::table('boarding_houses')->where('owner', $id)->count();
        $kosan      = DB::table('boarding_houses')->count();
        $favorite   = DB::table('favorite')->where('user_id', $id)->count();
        $facilities = DB::table('facilities')->count();
        $conditions = DB::table('conditions')->count();

        if(Auth::user()->category == 'Admin'){
            $return = view('home', [
                'users'         => $users,
                'facilities'    => $facilities,
                'conditions'    => $conditions
            ]);
        }elseif(Auth::user()->category == 'Pemilik kos'){
            $return = view('home', [
                'indekos' => $indekos,
            ]);
        }else{
            $return = view('home', [
                'kosan' => $kosan,
                'favorite' => $favorite,
            ]);
        }
        return $return;   
    }
}
