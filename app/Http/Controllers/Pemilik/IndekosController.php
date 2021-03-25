<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;   
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Indekos;
use App\Models\Criteria;
use App\Models\Condition;
use App\Models\Facilities;
use App\Models\Image;


class IndekosController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // dd(Auth::user()->id);       
        $id = Auth::user()->id;
        $indekos = Indekos::where('owner', $id)->get();
        // dd($kosan);
        return view('pemilik.indekos.index', [
            'indekos' => $indekos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // dd(Auth::user()->id);
        $conditions = Condition::orderBy('condition')->get();
        $facilities = Facilities::orderBy('facility')->get();
        // dd($facilities);
        return view('pemilik.indekos.tambah', [
            'conditions' => $conditions,
            'facilities' => $facilities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->file('image'));
         $this->validate($request,[
            'name'          => 'required',
            'type'          => 'required|in:putra,putri',  
            'address'       => 'required',
            'description'   => 'nullable',
            'price'         => 'required|numeric',
            'distance'      => 'required',  
            'large'         => 'required',
            'condition'     => 'required',
            'facilities'    => 'required',
        ]);
 
        $indekos = Indekos::create([
            'name'          => $request->name,
            'type'          => $request->type,  
            'address'       => $request->address,
            'description'   => $request->description,
            'owner'         => Auth::user()->id,
        ]);

        $kriteria = Criteria::create([
            'price'             => $request->price,
            'distance'          => $request->distance,  
            'large'             => $request->large,
            'boarding_house_id' => $indekos->id
        ]);
        
        $criteria = Criteria::find($kriteria->id);
        $condtion = Condition::find($request->condition);
        $facility = Facilities::find($request->facilities);

        $criteria->kondisi()->attach($condtion);
        $criteria->fasilitas()->attach($facility);

        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                // mendapatkan ekstensi
                $extension = $file->extension();

                // membuat nama baru angka random dari 1-9999
                $imgname = rand(1,9999).'.'.$extension;

                // validasi gambar dengan ukuran max 5mb
                $this->validate($request, ['image' => 'required|max:2000']);

                // membawa file ke storage
                $path = Storage::putFileAs('public/indekos', $file, $imgname);

                Image::create([
                    'path_img'          => $imgname,
                    'boarding_house_id' => $indekos->id
                ]);
            }
        } else{
            return 'tidak ada gambar';
        }

        Session::flash('success', 'Indekos Berhasil Ditambah');
 
        return redirect()->route('owner.indekos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // dd(Indekos::find($id));
        $indekos = Indekos::where('id',$id)->get();
        // dd($indekos->gambar);
        return view('pemilik.indekos.detail', [
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
        $indekos = Indekos::where('id',$id)->get();
        // dd($indekos);
        $conditions = Condition::orderBy('condition')->get();
        $facilities = Facilities::orderBy('facility')->get();
        return view('pemilik.indekos.edit', [
            'conditions' => $conditions,
            'facilities' => $facilities,      
            'indekos' => $indekos,
        ]);
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
        // dd($request->price);
        $indekos = Indekos::where('id',$id)->first();
        $kriteria = Criteria::where('boarding_house_id', $id)->first();

        $price = $request->price;
        $number = str_replace(".", "", $price);
        // dd($number);    
        
        // dd($kriteria);
        $this->validate($request,[
            'name'          => 'required',
            'type'          => 'required|in:putra,putri',  
            'address'       => 'required',
            'description'   => 'nullable',
            'price'         => 'required|numeric',
            'distance'      => 'required',  
            'large'         => 'required',
            'condition'     => 'required',
            'facilities'    => 'required',
        ]);

         $indekos->update([
            'name'          => $request->name,
            'type'          => $request->type,  
            'address'       => $request->address,
            'description'   => $request->description,
        ]);
        
        $kriteria->update([
            'price'             => $number,
            'distance'          => $request->distance,  
            'large'             => $request->large,
        ]);
        
        $criteria = Criteria::find($kriteria->id);
        $condtion = Condition::find($request->condition);
        $facility = Facilities::find($request->facilities);

        $criteria->kondisi()->sync($condtion);
        $criteria->fasilitas()->sync($facility);

        Session::flash('success', 'Indekos Berhasil Diubah');
 
        return redirect()->route('owner.indekos.show', $indekos->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
