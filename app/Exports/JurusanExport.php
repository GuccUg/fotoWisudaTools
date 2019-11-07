<?php

namespace App\Exports;

use App\Dbf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JurusanExport implements FromView
{
    public function __construct($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function view(): View
    {
      return view('result', [
          'data' => Dbf::where('JURUSAN','=',$this->jurusan)->get()
      ]);
    }
}
