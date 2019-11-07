<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Exports\dbfExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Dbf;
use App\Exports\JurusanExport;

class DBFController extends Controller
{
  public function getIndex() {
    return view('dbfDataIndex');
  }

  public function Cari(Request $request){
    $npmRequest = $request->npm;
    $npmArray = explode(",",$npmRequest);

    return Excel::download(new dbfExport($npmArray), 'datawisuda.xlsx');
  }

  public function getperjurusan() {
    $data_jurusan = Dbf::select('JURUSAN')->distinct()->get();
    return view('perjurusan',['data_jurusan' => $data_jurusan]);
  }

  public function DownloadDataJurusan(Request $request) {
    return Excel::download(new JurusanExport($request->jurusan), $request->jurusan.'.xlsx');
  }

  public function GetTranspose() {
    return view('transpose');
  }
}
