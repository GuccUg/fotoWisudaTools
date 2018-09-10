<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foto Wisuda Tools by c3budiman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <a style="" href="/" class="btn btn-info">Home</a>
        <a class="btn btn-primary" href="/fotograyscale">Checker and Grayscale</a>
        <a style="" class="btn btn-warning" href="/matcher">Count And List Missing</a>
        <a style="" class="btn btn-success" href="/datadbf">Data DBF Getter</a>
        <a class="btn btn-primary" href="/ssdownloader">Foto Downloader</a>
      </div>
      <div class="row">
        <h1 class="page-header">Cari Mahasiswa Sudah Lulus <small>by c3budiman</small></h1>
        <div class="">
          Data Yang telah Disimpan :
        </div>
        <div class="row">
          <div class="col-md-3">
            Data D3-Manajemen Informatika :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Informatika')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Fakultas FTI :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Industri')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Elektro')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Mesin')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Informatika')->get()->count()
            }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data D3-Manajemen Pemasaran :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Pemasaran')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Fakultas FIKTI :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Sistem Komputer')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','S1-Sistem Informasi')->get()->count()
            }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data D3-Teknik Komputer :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','D3-Teknik Komputer')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Fakultas FTSP :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Arsitektur')->get()->count()}}
            @php
              //+ DB::table('dbf2')->where('JURUSAN','=','S1-Sistem Informasi')->get()->count() sipil ga ada... harusnya ada nanti
            @endphp
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data D3-Akuntansi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','D3-Akuntansi')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Fakultas Sastra :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Sastra Inggris')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data D3-Manajemen Keuangan :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Keuangan')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Fakultas FILKOM :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Ilmu Komunikasi')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Akuntansi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Akuntansi')->get()->count()}}
          </div>
          <div class="col-md-3">
            Data Fakultas Ekonomi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Akuntansi')->get()->count()
            + DB::table('dbf2')->where('JURUSAN','=','S1-Manajemen')->get()->count()
            }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Teknik Industri :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Industri')->get()->count()}}
          </div>
          <div class="col-md-3">
            Data Fakultas Psikologi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Psikologi')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Teknik Arsitektur :
          </div>
          <div class="col-md-6">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Arsitektur')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Teknik Elektro :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Elektro')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Semua Mahasiswa :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Teknik Mesin :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Mesin')->get()->count()}}
          </div>
          <div class="col-md-3">
            Data D3 :
          </div>
          <div class="col-md-1">
            {{
              DB::table('dbf2')->where('JURUSAN','=','D3-Akuntansi')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Informatika')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Pemasaran')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','D3-Teknik Komputer')->get()->count()
              + DB::table('dbf2')->where('JURUSAN','=','D3-Manajemen Keuangan')->get()->count()
            }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Manajemen :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Manajemen')->get()->count()}}
          </div>

          <div class="col-md-3">
            Jumlah Foto :
          </div>
          <div class="col-md-1">
            @php
            $pengaturan = DB::table('folder')->where('id','=','1')->get()->first();
            $dirfotonya = public_path($pengaturan->FolderAsal);
            $scanned_directory = array_diff(scandir($dirfotonya), array('..', '.'));//to remove dots
            $x = count($scanned_directory);
            $jumlah = DB::table('dbf2')->get()->count()
            @endphp
            {{
              $x
            }}
          </div>

        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Psikologi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Psikologi')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data Ga Ada Foto :
          </div>
          <div class="col-md-1">
            @php
            $pengaturan = DB::table('folder')->where('id','=','1')->get()->first();
            $dirfotonya = public_path($pengaturan->FolderAsal);
            $scanned_directory = array_diff(scandir($dirfotonya), array('..', '.'));//to remove dots
            $x = count($scanned_directory);
            $jumlah = DB::table('dbf2')->get()->count()
            @endphp
            {{
              $jumlah - $x
            }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Sistem Informasi :
          </div>
          <div class="col-md-1">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Sistem Informasi')->get()->count()}}
          </div>

          <div class="col-md-3">
            Data yang fotonya ga ada :
          </div>
          <div class="col-md-1">
            <a href="/downloadcsvygkurang" class="btn btn-success">Download</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Sastra Inggris :
          </div>
          <div class="col-md-6">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Sastra Inggris')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Teknik Informatika :
          </div>
          <div class="col-md-6">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Teknik Informatika')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Sistem Komputer :
          </div>
          <div class="col-md-6">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Sistem Komputer')->get()->count()}}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            Data S1-Ilmu Komunikasi :
          </div>
          <div class="col-md-6">
            {{DB::table('dbf2')->where('JURUSAN','=','S1-Ilmu Komunikasi')->get()->count()}}
          </div>
        </div>




      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{url(action("DBFController@Cari"))}}" method="post">
            {{ csrf_field() }}
            <label class="" for="">Masukkan list npm yg ingin di cari. pisahkan dengan koma ex : (111,222)</label>
            <br>
            <textarea class="form-control" name="npm" rows="8" cols="80"></textarea>
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="submit">
          </form>
        </div>
      </div>
    </div>


  </body>
</html>
