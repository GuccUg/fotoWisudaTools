<?php use Carbon\Carbon; ?>
<?php
function replacealamat($string) {
  $arr = array();

  $arr = explode(" ",$string);
  $tea = '';
  $teb = '';
  $final2 = '';
  $final = '';

  foreach($arr as $ar) {
    $tea .= $ar." ";
    if(strlen($tea) > 30)
    {
        $final = str_replace($ar,null,$tea);
      break;
    }
  }

  foreach($arr as $ar) {
    $teb .= $ar." ";
    if(strlen($teb) > 30)
    {
      $final2 .= $ar." ";
    }
  }
  $final = rtrim($final," ");
  $final2 = rtrim($final2," ");

  $hasil = array('a' => $final, 'b' => $final2);

  return $hasil;
}
 ?>
    <table>
      <tr>
        <td>NPM</td>
        <td>NAMA</td>
        <td>TGL_LULUS</td>
        <td>TGL_LAHIR</td>
        <td>TMP_LAHIR</td>
        <td>ALAMAT1</td>
        <td>ALAMAT2</td>
        <td>RT</td>
        <td>RW</td>
        <td>KOTA</td>
        <td>KODE_POS</td>
        <td>TELEPON</td>
        <td>EMAIL</td>
      </tr>

      @foreach ($data as $dt)
        <tr>
          <td>{{$dt->NPM}}</td>
          <td>{{ucwords(strtolower($dt->NAMA))}}</td>
          <td>{{Carbon::parse($dt->TGL_LULUS)->format('d/m/Y')}}</td>
          <td>{{Carbon::parse($dt->TGL_LAHIR)->format('d/m/Y')}}</td>
          <td>{{ucfirst(strtolower($dt->TEMPAT_LAHIR))}}</td>

          <?php
          $jalan = strtolower($dt->JALAN);
          if (strlen($jalan)>30) {
            $jalan = replacealamat(strtolower($dt->JALAN));
          }
           ?>

          @if (is_array($jalan))
            <td>{{$jalan['a']}}</td>
            <td>{{$jalan['b']}}</td>
          @else
            <td>{{$jalan}}</td>
            <td></td>
          @endif

          <td>{{$dt->RT}}</td>
          <td>{{$dt->RW}}</td>
          <td>{{ucfirst(strtolower($dt->KOTA))}}</td>
          <td>{{$dt->KODEPOS}}</td>
          <td>{{$dt->HP}}</td>
          @if ($dt->EMAIL != '')
            <td>{{$dt->EMAIL}}</td>
          @else
            <td></td>
          @endif
        </tr>
      @endforeach
    </table>
