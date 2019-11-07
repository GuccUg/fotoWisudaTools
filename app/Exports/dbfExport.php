<?php

namespace App\Exports;

use App\Dbf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class dbfExport implements FromView
{
    public function __construct($npmArray)
    {
        $this->npmArray = $npmArray;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
      return view('result', [
          'data' => Dbf::whereIn('NPM', $this->npmArray)->get()
      ]);
    }
}
