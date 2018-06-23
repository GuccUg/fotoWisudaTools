<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foto Wisuda Tools by c3budiman</title>
  </head>
  <body>

    <table>
      <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Tanggal Sidang</th>
        <th>Tanggal Lulus</th>
      </tr>
      <?php
      foreach ($npmArray as $npmDicari) {
        if ($npmDicari == "") {
          continue;
        }
        $nama = DB::table('dbf')->where('NPM','=',$npmDicari)->get()->first()->NAMA;
        $fakultas = DB::table('dbf')->where('NPM','=',$npmDicari)->get()->first()->FAKULTAS;
        $tgl_sidang = DB::table('dbf')->where('NPM','=',$npmDicari)->get()->first()->TGL_SIDANG;
        $tgl_lulus = DB::table('dbf')->where('NPM','=',$npmDicari)->get()->first()->TGL_LULUS;
        ?>
        <tr>
          <td>{{$npmDicari}}</td>
          <td>{{$nama}}</td>
          <td>{{$fakultas}}</td>
          <td>{{$tgl_sidang}}</td>
          <td>{{$tgl_lulus}}</td>
        </tr>
        <?php
      }
       ?>
    </table>

  </body>
</html>
