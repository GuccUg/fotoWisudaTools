<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dbf extends Model
{
  protected $table = 'dbf';
  protected $fillable = [
    'NPM',
    'NAMA1',
    'NAMA2',
    'UJIAN1',
    'UJIAN2',
    'UJIAN3',
    'PENGUJI1',
    'PENGUJI2',
    'PENGUJI3',
    'PENGUJI0',
    'SKRIPSI1',
    'SKRIPSI2',
    'SKRIPSI3',
    'SKRIPSI4',
    'SKS',
    'IPK',
    'SIDANG_KE',
    'JALUR',
    'FAKULTAS',
    'NUJIAN1',
    'NUJIAN2',
    'NUJIAN3',
    'NP1',
    'NP2',
    'NP3',
    'HASIL',
    'USYARAT',
    'DSYARAT',
    'NSKRIPSI',
    'TGL_SIDANG',
    'TGL_LULUS',
    'TGLUMUM',
    'TSIDANG1',
    'TSIDANG2',
    'TSIDANG3',
    'NAMA',
    'TMP_LAHIR',
    'TGL_LAHIR',
    'ALAMAT1',
    'ALAMAT2',
    'NOMOR',
    'RT',
    'RW',
    'KOTA',
    'KODE_POS',
    'TELEPON',
    'KODE',
    'JALAN',
    'NO_RUMAH',
    'KODEPOS',
    'TELP',
    'EMAIL'
  ];
  public $timestamps = false;
}
