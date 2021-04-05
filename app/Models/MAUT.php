<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAUT extends Model
{
    use HasFactory;

    // DATA INDEKOS--------
    public $id;
    public $nama;
    public $harga;
    public $jarak;
    public $luas_kamar;
    public $fasilitas;
    public $kondisi;
    // -------------------

    // DATA BOBOT SUB KRITERIA--------
    public $bobot_sub_harga;
    public $bobot_sub_jarak;
    public $bobot_sub_luas_kamar;
    public $bobot_sub_fasilitas;
    public $bobot_sub_kondisi;
    // ---------------------------

    // DATA NORMALISASI SUB KRITERIA--------
    public $normalisasi_sub_harga;
    public $normalisasi_sub_jarak;
    public $normalisasi_sub_luas_kamar;
    public $normalisasi_sub_fasilitas;
    public $normalisasi_sub_kondisi;
    // ---------------------------

    // DATA NILAI AKHIR--------
    public $nilai_akhir_harga;
    public $nilai_akhir_jarak;
    public $nilai_akhir_luas_kamar;
    public $nilai_akhir_fasilitas;
    public $nilai_akhir_kondisi;
    public $total;
    // ---------------------------

    function __construct($id, $nama, $harga, $jarak, $luas_kamar, $fasilitas, $kondisi, $bobot_sub_harga, $bobot_sub_jarak, $bobot_sub_luas_kamar, $bobot_sub_fasilitas, $bobot_sub_kondisi)
    {           
        $this->id 			= $id;
		$this->nama 		= $nama;
        $this->harga 		= $harga;
		$this->jarak		= $jarak;
        $this->luas_kamar 	= $luas_kamar;
		$this->fasilitas	= $fasilitas;
        $this->kondisi      = $kondisi;

        $this->bobot_sub_harga 		= $bobot_sub_harga;
		$this->bobot_sub_jarak		= $bobot_sub_jarak;
        $this->bobot_sub_luas_kamar = $bobot_sub_luas_kamar;
		$this->bobot_sub_fasilitas	= $bobot_sub_fasilitas;
        $this->bobot_sub_kondisi    = $bobot_sub_kondisi;
    }
}
