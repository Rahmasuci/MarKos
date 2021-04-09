<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Indekos;
use Auth;
use App\Models\MAUT;
use Illuminate\Support\Arr;
use App\Models\Result;

class MAUTController extends Controller
{   
    public $kriteria = [];
    public $bobot_kriteria  = []; 
    public $daftarIndekos = [];

    public function bobot_kriteria(Request $request){
        $this->kriteria = [
            $request->harga,
            $request->jarak,
            $request->luas_kamar,
            $request->fasilitas,
            $request->kondisi
        ];
        
        $bk = [];
        foreach ($this->kriteria as $kri) {
            if ($kri == "Sangat Tidak Penting"){
                $bobot = 1;
            } elseif ($kri == "Tidak Penting") {
                $bobot = 2;
            } elseif ($kri == "Cukup Penting") {
                $bobot = 3;
            } elseif ($kri == "Penting") {
                $bobot = 4;
            } elseif ($kri == "Sangat Penting") {
                $bobot = 5;
            } else{
                $bobot = "error";
            }
            array_push($bk, $bobot);
        }

        $jumlah = collect($bk)->sum();   
        foreach($bk as $key){
            $nilai_bobot = round(($key/$jumlah), 3);
            array_push($this->bobot_kriteria, $nilai_bobot);
        }

    }

    public function indekos ($indekos){
        // dd($indekos); 
        $kosan = [];
        foreach ($indekos as $kos) {
            $nama = $kos->name;
            $id = $kos->id;
            foreach($kos->kriteria as $kri){
                $harga = $kri->price;
                $jarak = $kri->distance;
                $luas_kamar = $kri->large;
                $fasilitas = count($kri->fasilitas);
                $kondisi = count($kri->kondisi);
                array_push($kosan, [$id, $nama, $harga, $jarak, $luas_kamar, $fasilitas, $kondisi]);
            }   
        }
        // dd($kosan);
        return $this->bobot_sub($kosan);
    }

    public function bobot_sub($kosan){
        foreach ($kosan as $key) {
            // PENENTUAN BOBOT SUB HARGA--------------------------
            if ($key[2] > 0 && $key[2] <= 300000) {
                $bobot_sub_harga = 5;
            } elseif ($key[2] > 300000 && $key[2] <= 400000 ) {
                $bobot_sub_harga = 4;
            } elseif ($key[2] > 400000 && $key[2] <= 500000 ) {
                $bobot_sub_harga = 3;
            } elseif ($key[2] > 500000 && $key[2] <= 600000 ) {
                $bobot_sub_harga = 2;
            } elseif ($key[2] > 600000 ) {
                $bobot_sub_harga = 1;
            } else{
                $bobot_sub_harga = "error";
            }
            // ----------------------------------------------------

            // PENENTUAN BOBOT SUB JARAK---------------------------
            if ($key[3] == "<1km") {
                $bobot_sub_jarak = 5;
            } elseif ($key[3] == "2km-5km" ) {
                $bobot_sub_jarak = 4;
            } elseif ($key[3] == "6km-10km" ) {
                $bobot_sub_jarak = 3;
            } elseif ($key[3] == "11km-15km" ) {
                $bobot_sub_jarak = 2;
            } elseif ($key[3] == ">15km" ) {
                $bobot_sub_jarak = 1;
            } else{
                $bobot_sub_jarak = "error";
            }
            // ----------------------------------------------------

            // PENENTUAN BOBOT SUB LUAS KAMAR----------------------
            if ($key[4] == "4x5") {
                $bobot_sub_luas_kamar = 5;
            } elseif ($key[4] == "4x4" ) {
                $bobot_sub_luas_kamar = 4;
            } elseif ($key[4] == "3x4" ) {
                $bobot_sub_luas_kamar = 3;
            } elseif ($key[4] == "3x3" ) {
                $bobot_sub_luas_kamar = 2;
            } elseif ($key[4] == "3x2") {
                $bobot_sub_luas_kamar = 1;
            } else{
                $bobot_sub_luas_kamar = "error";
            }
            // ----------------------------------------------------

            // PENENTUAN BOBOT FASILITAS---------------------------
            if ($key[5] >= 9) {
                $bobot_sub_fasilitas = 5;
            } elseif ($key[5] == 7 || $key[5] == 8 ) {
                $bobot_sub_fasilitas = 4;
            } elseif ($key[5] == 6 || $key[5] == 5  ) {
                $bobot_sub_fasilitas = 3;
            } elseif ($key[5] == 4 || $key[5] == 3 ) {
                $bobot_sub_fasilitas = 2;
            } elseif ($key[5] == 2 || $key[5] == 1 ) {
                $bobot_sub_fasilitas = 1;
            } else{
                $bobot_sub_fasilitas = "error";
            }
            // ----------------------------------------------------

            // PENENTUAN BOBOT KONDISI---------------------------
            if ($key[6] >= 5) {
                $bobot_sub_kondisi = 5;
            } elseif ($key[6] == 4 ) {
                $bobot_sub_kondisi = 4;
            } elseif ($key[6] == 3  ) {
                $bobot_sub_kondisi = 3;
            } elseif ($key[6] == 2 ) {
                $bobot_sub_kondisi = 2;
            } elseif ($key[6] == 1 ) {
                $bobot_sub_kondisi = 1;
            } else{
                $bobot_sub_kondisi = "error";
            }
            // ----------------------------------------------------

            $kos = new MAUT ($key[0], $key[1], $key[2], $key[3], $key[4], $key[5], $key[6], $bobot_sub_harga, $bobot_sub_jarak, $bobot_sub_luas_kamar, $bobot_sub_fasilitas, $bobot_sub_kondisi);
            array_push($this->daftarIndekos, $kos);
        }      
        return $this->normalisasi($this->daftarIndekos);  
    }

    public function normalisasi($daftarIndekos){
        // dd($daftarIndekos);
        $get_bobot_sub_harga = array_column($daftarIndekos, 'bobot_sub_harga');
        $max_bobot_sub_harga = max($get_bobot_sub_harga); 
        $min_bobot_sub_harga = min($get_bobot_sub_harga);
        $selisih_bobot_sub_harga = max($get_bobot_sub_harga)-min($get_bobot_sub_harga);;

        $get_bobot_sub_jarak = array_column($daftarIndekos, 'bobot_sub_jarak');
        $max_bobot_sub_jarak = max($get_bobot_sub_jarak); 
        $min_bobot_sub_jarak = min($get_bobot_sub_jarak);
        $selisih_bobot_sub_jarak = $max_bobot_sub_jarak-$min_bobot_sub_jarak;
        
        $get_bobot_sub_luas_kamar = array_column($daftarIndekos, 'bobot_sub_luas_kamar');
        $max_bobot_sub_luas_kamar = max($get_bobot_sub_luas_kamar); 
        $min_bobot_sub_luas_kamar = min($get_bobot_sub_luas_kamar);
        $selisih_bobot_sub_luas_kamar = $max_bobot_sub_luas_kamar-$min_bobot_sub_luas_kamar;
        
        $get_bobot_sub_fasilitas = array_column($daftarIndekos, 'bobot_sub_fasilitas');
        $max_bobot_sub_fasilitas = max($get_bobot_sub_fasilitas); 
        $min_bobot_sub_fasilitas = min($get_bobot_sub_fasilitas);
        $selisih_bobot_sub_fasilitas = $max_bobot_sub_fasilitas-$min_bobot_sub_fasilitas;
        
        $get_bobot_sub_kondisi = array_column($daftarIndekos, 'bobot_sub_kondisi');
        $max_bobot_sub_kondisi = max($get_bobot_sub_kondisi); 
        $min_bobot_sub_kondisi = min($get_bobot_sub_kondisi);
        $selisih_bobot_sub_kondisi = $max_bobot_sub_kondisi-$min_bobot_sub_kondisi;
        
        foreach ($daftarIndekos as $key){
            // PERHITUNGAN NORMALISASI HARGA--------------------------------------------------
            if ($selisih_bobot_sub_harga != 0) {                
                $key->normalisasi_sub_harga = ($key->bobot_sub_harga - $min_bobot_sub_harga) / $selisih_bobot_sub_harga;
            }else{
                $key->normalisasi_sub_harga = 0;
            }
            //--------------------------------------------------------------------------------- 

            // PERHITUNGAN NORMALISASI JARAK---------------------------------------------------
             if ($selisih_bobot_sub_jarak != 0) {                
                $key->normalisasi_sub_jarak = ($key->bobot_sub_jarak - $min_bobot_sub_jarak) / $selisih_bobot_sub_jarak;
            }else{
                $key->normalisasi_sub_jarak = 0;
            }
            // --------------------------------------------------------------------------------

            // PERHITUNGAN NORMALISASI LUAS KAMAR------------------------------------------------------------
            if ($selisih_bobot_sub_luas_kamar != 0) {                
                $key->normalisasi_sub_luas_kamar = ($key->bobot_sub_luas_kamar - $min_bobot_sub_luas_kamar) / $selisih_bobot_sub_luas_kamar;
            }else{
                $key->normalisasi_sub_luas_kamar = 0;
            }
            //------------------------------------------------------------------ 

            // PERHITUNGAN NORMALISASI FASILITAS-------------------------------------------------------------
             if ($selisih_bobot_sub_fasilitas != 0) {                
                $key->normalisasi_sub_fasilitas = ($key->bobot_sub_fasilitas - $min_bobot_sub_fasilitas) / $selisih_bobot_sub_fasilitas;
            }else{
                $key->normalisasi_sub_fasilitas = 0;
            }
            // -----------------------------------------------------------------------------------------

            // PERHITUNGAN NORMALISASI KONDISI-------------------------------------------------------
             if ($selisih_bobot_sub_kondisi != 0) {                
                $key->normalisasi_sub_kondisi = ($key->bobot_sub_kondisi - $min_bobot_sub_kondisi) / $selisih_bobot_sub_kondisi;
            }else{
                $key->normalisasi_sub_kondisi = 0;
            }
            // -------------------------------------------------------------------------------------
            // dd($daftarIndekos);
        }     
    }

    public function nilai_akhir(){
        foreach ($this->daftarIndekos as $key) {
            $key->nilai_akhir_harga         = ($this->bobot_kriteria[0] * $key->normalisasi_sub_harga); 
            $key->nilai_akhir_jarak         = ($this->bobot_kriteria[1] * $key->normalisasi_sub_jarak); 
            $key->nilai_akhir_luas_kamar    = ($this->bobot_kriteria[2] * $key->normalisasi_sub_luas_kamar); 
            $key->nilai_akhir_fasilitas     = ($this->bobot_kriteria[3] * $key->normalisasi_sub_fasilitas);
            $key->nilai_akhir_kondisi       = ($this->bobot_kriteria[4] * $key->normalisasi_sub_kondisi);
            $total = $key->nilai_akhir_harga + $key->nilai_akhir_jarak + $key->nilai_akhir_luas_kamar + $key->nilai_akhir_fasilitas + $key->nilai_akhir_kondisi ;
            $key->total = round($total, 3);
        }
    }

    public function rangking(){
        usort($this->daftarIndekos, function($a, $b){
            return ($a->total < $b->total);
        });

        // dd($this->daftarIndekos);
    }

    public function storeResult(){
        $length=count($this->daftarIndekos);
        $user_id = Auth::id();
        $result_code = date('dmyHis');
        // dd($this->daftarIndekos[0]->id);
        for ($i = 0; $i < $length; $i++) {  
            $rank = $i+1;
            Result::create([
                'user_id'                       => $user_id,
                'boarding_house_id'             => $this->daftarIndekos[$i]->id,
                'price_criteria'                => $this->kriteria[0],
                'distance_criteria'             => $this->kriteria[1],
                'large_criteria'                => $this->kriteria[2],
                'facility_criteria'             => $this->kriteria[3],
                'condition_criteria'            => $this->kriteria[4],
                'result'                        => $this->daftarIndekos[$i]->total,
                'rank'                          => $rank,
                'result_code'                   => $result_code,
            ]);
        }
    }

    public function maut(Request $request){
        // UNTUK MENDAPATKAN FAVORITE INDEKOS SESUAI DENGAN ID USER
        $user_id = Auth::id();
        $favorit = Favorite::all()->where('user_id', $user_id);
        // ---------------------------------------------------------

        // UNTUK MENDAPATKAN ID INDEKOS-----------------------------
        $id_indekos =[];
        foreach ($favorit as $fav) {
            array_push($id_indekos, $fav->boarding_house_id);
        }
        // ----------------------------------------------------------

        // UNTUK MENDAPATKAN BOBOT KRITERIA
        $this->bobot_kriteria($request);
        // --------------------------------------------------------------

        // UNTUK MENDAPATKAN DATA INDEKOS, KRITERIA, FASILITAS, & KONDISI
        $indekos = Indekos::whereIn('id', $id_indekos)->get();
        $this->indekos($indekos);
        // --------------------------------------------------------------

        // UNTIK MENDAPATKAN NILAI AKHIR----------------------------
        $this->nilai_akhir();
        // ---------------------------------------------------------

        // UNTIK MENENTUKAN RANKING--------------------------------
        $this->rangking();
        // ---------------------------------------------------------

         // UNTIK MENYIMPAN DI DATABSE------------------------------
        $this->storeResult();
        // ---------------------------------------------------------

        // UNTIK MENAMPILKAN HASIL--------------------------------
        $result_code = Result::where('user_id',$user_id)->orderByDesc('result_code')->first();
        $results =  Result::where('user_id',$user_id)->where('result_code', $result_code->result_code)->get();
        $criteria = collect($this->kriteria);
        // dd($criteria);
        return view('pencari.favorite.result', [
            'results' => $results,  
            'criteria' => $criteria  
        ]);
        
        // ---------------------------------------------------------

    }
}