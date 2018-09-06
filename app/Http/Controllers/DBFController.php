<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DB;
use Carbon\Carbon;

class DBFController extends Controller
{
  public function getIndex() {
    return view('dbfDataIndex');
  }

  public function Cari(Request $request){
    $npmRequest = $request->npm;
    $npmArray = explode(",",$npmRequest);

    Excel::create('Ganti Nama jadi Fakultas nya', function($excel) use ($npmArray) {
    $excel->sheet('Fakultas Here', function($sheet) use ($npmArray) {
        $sheet->loadView('result')->with('npmArray',$npmArray);
        });
    })->download('xls');;
  }

  public function GetTranspose() {
    return view('transpose');
  }
}
