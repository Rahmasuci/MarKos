<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Session;   

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::all();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profil.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users =  User::where('id', $id)->get();

        return view('admin.user.detail', [
            'users' => $users,  
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
        $user =  User::find($id);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:11,15'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'updated_at'    => Carbon::now()->toDateTimeString(), 
        ]);

        Session::flash('success', 'Profil Berhasil Diubah');

        return redirect()->route('home');
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

    public function updatePhoto(Request $request, $id)
    {
        $user = User::find($id);
        // dd($user);
        // dd($request->file('path_photo'));

        // validasi gambar dengan ukuran max 5mb
        $this->validate($request, ['path_photo' => 'file|max:2000']);

        // mendapatkan ekstensi
        $extension = $request->file('path_photo')->extension();

        // membuat nama baru berdasarkan waktu sekarang
        $imgname = date('dmyHis').'.'.$extension;
        // membawa file ke storage
        $path = Storage::putFileAs('public/photo_profile', $request->file('path_photo'), $imgname);

        $user->update([
            'path_photo'    => $imgname,
            'updated_at'    => Carbon::now()->toDateTimeString(), 
        ]);
 
        Session::flash('success', 'Foto Profil Berhasil Diubah');
 
        return redirect()->route('home');
    }

    public function destroyPhoto($id)
    {   
        $user = User::find($id);
        $path_photo = '/photo_profile/'.$user->path_photo;
        // dd($path_photo);

        if(Storage::disk('public')->exists($path_photo)){
            // dd('yee ada');
            Storage::disk('public')->delete($path_photo);
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }else{
            dd('File does not exists.');
        }

        $user->update([
            'path_photo'    => null,
            'updated_at'    => Carbon::now()->toDateTimeString(), 
        ]);

        Session::flash('success', 'Foto Profil Berhasil Dihapus');

        return redirect()->route('home');
    }

    
}
