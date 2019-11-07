<?php

namespace App\Imports;

use App\Dbf;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class dbfImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dbf([
            'N'           => $row[0],
            'NPM'         => $row[1],
            'NAMA'        => $row[2],
            'TEMPAT_LAHIR'=> $row[3],
            'TGL_LAHIR'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'JALAN'       => $row[5],
            'NO'          => $row[6],
            'RT'          => $row[7],
            'RW'          => $row[8],
            'KOTA'        => $row[9],
            'KODEPOS'     => $row[10],
            'HP'          => $row[11],
            'EMAIL'       => $row[12],
            'TGL_LULUS'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13]),
            'JURUSAN'     => $row[14],
            'FOTO'        => $row[15],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
