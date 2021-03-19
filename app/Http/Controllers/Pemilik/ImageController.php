<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Indekos;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Session;   

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        // dd($request->file('path_img'));
        // mendapatkan ekstensi
        $extension = $request->file('path_img')->extension();
        
        // validasi gambar dengan ukuran max 5mb
        $this->validate($request, ['path_img' => 'required|file|max:2000']);

        // membuat nama baru berdasarkan waktu sekarang
        $imgname = date('dmyHis').'.'.$extension;
        // membawa file ke storage
        $path = Storage::putFileAs('public/indekos', $request->file('path_img'), $imgname);

        Image::create([
            'path_img'    => $imgname,
            'boarding_house_id' => $request->boarding_house_id,
        ]);

        Session::flash('success', 'Foto Indekos Berhasil Ditambah');

        return redirect()->route('owner.foto-indekos.show', $request->boarding_house_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // dd($id);
        $indekos = Indekos::where('id', $id)->get();
        // dd($indekos);
        return view('pemilik.foto_indekos.index',[
            'indekos' => $indekos
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
        // dd($request->file('path_img'));
        $img = Image::find($id);
        
        // validasi gambar dengan ukuran max 5mb
        $this->validate($request, ['path_img' => 'required|file|max:2000']);
        
        $path_img = '/indekos/'.$img->path_img;

        if(Storage::disk('public')->exists($path_img)){
            // dd('yee ada');
            Storage::disk('public')->delete($path_img);
            // mendapatkan ekstensi
            $extension = $request->file('path_img')->extension();

            // membuat nama baru berdasarkan waktu sekarang
            $imgname = date('dmyHis').'.'.$extension;
            // membawa file ke storage
            $path = Storage::putFileAs('public/indekos', $request->file('path_img'), $imgname);

            $img->update([
                'path_img'    => $imgname,
                'updated_at'    => Carbon::now()->toDateTimeString(), 
            ]);

            Session::flash('success', 'Foto Indekos Berhasil Diubah');

        }else{
            dd('File does not exists.');
        }           

        return redirect()->route('owner.foto-indekos.show', $img->boarding_house_id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Image::find($id);

        $path_img = '/indekos/'.$img->path_img;

        if(Storage::disk('public')->exists($path_img)){
            // dd('yee ada');
            Storage::disk('public')->delete($path_img);          

            $img->delete();

        }else{
            dd('File does not exists.');
        }

        Session::flash('success', 'Foto Indekos Berhasil Dihapus');

        return redirect()->route('owner.foto-indekos.show', $img->boarding_house_id );
    }
}
