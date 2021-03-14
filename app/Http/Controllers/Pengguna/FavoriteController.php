<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Indekos;
use Auth;
use Session;   
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id =  Auth::user()->id;

        $indekos = Indekos::leftJoin('favorite', 'boarding_houses.id', '=', 'favorite.boarding_house_id')
            ->where('favorite.user_id', '=', $user_id)
            ->leftJoin('users', 'favorite.user_id', '=', 'users.id')
            ->select('boarding_houses.*')
            ->get();

        // dd($indekos);
        return view('pencari.favorite.index', [
            'indekos' => $indekos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->boarding_house_id);
        $user_id =  Auth::user()->id;
        $user = User::find($user_id);
        $indekos = Indekos::find($request->boarding_house_id);

        $user->favorit()->attach($indekos);

        return response()->json([
            'success' => 'Indekos telah ditambahkan ke Favoritmu'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indekos = Indekos::where('id',$id)->get();
        return view('pencari.favorite.detail', [
            'indekos' => $indekos,  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $user_id =  Auth::user()->id;
        $user = User::find($user_id);
        $indekos = Indekos::find($id);

        $user->favorit()->detach($indekos);

        Session::flash('success', 'Indekos Dihapus dari Favorit');
 
        return redirect()->route('user.favorite.index');
    }
}
