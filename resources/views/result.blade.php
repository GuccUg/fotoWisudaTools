    <table>
      <tr>
        <td>NPM</td>
        <td>Nama</td>
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
      <?php
      foreach ($npmArray as $npmDicari) {
        if ($npmDicari == "") {
          continue;
        }
        $url = "http://".$npmDicari.".student.gunadarma.ac.id/tugas.html";
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		$response = curl_exec($ch);
    		if (curl_errno($ch)) die(curl_error($ch));
    		curl_close($ch);
    		$re = '/<tr><td><i><b>Email<\/b><\/td><td>:(.*)\[/m';
    		preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        ?>
        <tr>
          <td>{{$npmDicari}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->NAMA}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->TGL_LULUS}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->TGL_LAHIR}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->TEMPAT_LAHIR}}</td>
          <td>{{substr(DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->JALAN,0,30)}}</td>
          <td>{{substr(DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->JALAN,30)}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->RT}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->RW}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->KOTA}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->KODEPOS}}</td>
          <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->HP}}</td>
          @if (DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->EMAIL != '')
            <td>{{DB::table('dbf2')->where('NPM','=',$npmDicari)->get()->first()->EMAIL}}</td>
          @else
            <td>{{substr($matches[0][1],1,strlen($matches[0][1])-2)."@student.gunadarma.ac.id"}}</td>
          @endif

        </tr>
        <?php
      }
       ?>
    </table>
