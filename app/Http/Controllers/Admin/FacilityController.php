<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Carbon;
use Session;   

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $facilities = Facilities::all();
        return view('admin.fasilitas.index', [
            'facilities' => $facilities
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
        $this->validate($request,[
            'facility'          => 'required|string',
        ]);

        Facilities::create([
            'facility'     => $request->facility,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);
 
        Session::flash('success', 'Fasilitas Berhasil Ditambah');
 
        return redirect()->route('admin.facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $facility = Facilities::find($id);

        $this->validate($request,[
            'facility'          => 'required|string',
        ]);

        $facility->update([
            'facility'     => $request->facility,
            'updated_at'    => Carbon::now()->toDateTimeString(), 
        ]);
 
        Session::flash('success', 'Fasilitas Berhasil Diubah');
 
        return redirect()->route('admin.facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facilities::find($id);
        // dd($condition);
        $facility->delete();

        Session::flash('success', 'Fasilitas  Indekos Berhasil Dihapus');
 
        return redirect()->route('admin.facility.index');
    }
}
