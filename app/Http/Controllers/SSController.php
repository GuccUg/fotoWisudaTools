<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use phpseclib\Net\SSH2;
use phpseclib\Net\SCP;
use Excel;
use App\Dbf;
use Redirect;

class SSController extends Controller
{
    public function GetSSDownloader() {
      $pengaturan = DB::table('folder')->where('id','=','1')->get()->first();
      $password = $pengaturan->PasswordSCP;
      return view('SSDownloader', ['password'=>$password]);
    }

    public function ProsesDownload(Request $request) {
        $pengaturan = DB::table('folder')->where('id','=','1')->get()->first();
        $password = $pengaturan->PasswordSCP;
        if (!empty($password) && $password == "") {
          $password = $request->password;
        }
        $npmRequest = $request->npm;
        $npmArray = explode(",",$npmRequest);

        foreach ($npmArray as $npm) {
          $ssh = new SSH2('studentsite.gunadarma.ac.id',143);
          if (!$ssh->login('student', $password)) {
              exit('Password Salah!');
          }
          $scp = new SCP($ssh);
          $scp->get('/home/student/foto/'.$npm.'.jpg', public_path($pengaturan->FolderDownload.'/'.$npm.'.jpg'));
        }
        return redirect('ssdownloader')->with('status', 'Foto Berhasil Di Download, Jika ada....');
    }

    public function getCsv() {
      return view('csv');
    }

    public function import(Request $request) {
      if($request->file('imported-file'))
      {
          $path = $request->file('imported-file')->getRealPath();
          $data = Excel::load($path, function($reader) {
      })->get();
      if(!empty($data) && $data->count())
      {
        $data = $data->toArray();
        // for($i=0;$i<count($data);$i++)
        // dd(array_chunk($data,1000));
        $datachunk = array_chunk($data,1000);
        foreach ($datachunk as $datanya) {
          for($i=0;$i<count($datanya);$i++)
          {
            $dataImported[] = $datanya[$i];
          }
        }
      }
      // dd($dataImported);
      try {
          $dataImported2 = array_chunk($dataImported,1000);
          foreach ($dataImported2 as $datakecil) {
            Dbf::insert($datakecil);
          }
          return back()->with('status', 'Berhasil dimasukan Ke Database');
      } catch(\Exception $e){
          return Redirect::back()->withErrors([$e.' terdapat kesalahan format file, pastikan format file sudah benar!']);
      }
      }
      return Redirect::back()->withErrors(['terdapat kesalahan, pastikan format file sudah benar!']);
    }

    //tanpa nge cek npm, langsung hitamkan foto yg di folder
    public function resize() {
    $pengaturan = DB::table('folder')->where('id','=','1')->get()->first();
    $dirfotonya = public_path('png');
    $fotoArray = scandir($dirfotonya,1);
    $dirResult = public_path($pengaturan->FolderHasil);
    foreach ($fotoArray as $foto) {
        if ($foto == '..' || $foto == '.') {
          break;
        }
        $npmfoto = str_replace(".jpg","",$foto);
        $npm = $npmfoto;
        if ($npmfoto === $npm) {
          // echo "Ketemu ". $npm."<br>";
          $fotoKetemu = $dirfotonya . "/" . $foto;
          $fotoBaru = $dirResult ."/" . $foto;
          $dirError = public_path($pengaturan->FolderGagal);
          $fotoError = $dirError . "/" .$foto;
          //fungsi copy image yg ditemukan ke folder result
          if(copy($fotoKetemu, $fotoBaru)){
            echo "foto ".$npm." telah di copy ";

            //fungsi biar image nya ga kebolak gapake $im = imagecreatefrompng($fotoBaru);
            try {
              $img = imagecreatefrompng($fotoBaru);
              $exif = exif_read_data($fotoBaru);
              if ($img && $exif && isset($exif['Orientation']))
              {
                  $ort = $exif['Orientation'];
                  if ($ort == 6 || $ort == 5)
                      $img = imagerotate($img, 270, null);
                  if ($ort == 3 || $ort == 4)
                      $img = imagerotate($img, 180, null);
                  if ($ort == 8 || $ort == 7)
                      $img = imagerotate($img, 90, null);
                  if ($ort == 5 || $ort == 4 || $ort == 7)
                      imageflip($img, IMG_FLIP_HORIZONTAL);
              }
            } catch (Exception $e) {
              $errornya = true;
            }
            $errornya = false;

            if ($errornya == true) {
              $img = imagecreatefrompng($fotoBaru);
              $fotoerror = $fotoerror.",".$npm;
              copy($fotoBaru, $fotoError);
            }
            //fungsi resize image menggunakan max width dan max height
            //agar image nya tidak jadi aneh ok oc :v
            //parameter nya : $namafile, $max_width, $max_height
            $max_width = 70;
            $max_height = 70;

            list($orig_width, $orig_height) = getimagesize($fotoBaru);
             $width = $orig_width;
             $height = $orig_height;
             # ketinggian
             if ($height > $max_height) {
                 $width = ($max_height / $height) * $width;
                 $height = $max_height;
             }
             # kelebaran
             if ($width > $max_width) {
                 $height = ($max_width / $width) * $height;
                 $width = $max_width;
             }
             $image_p = imagecreatetruecolor($width, $height);
             $image = imagecreatefrompng($fotoBaru);
             imagecopyresampled($image_p, $image, 0, 0, 0, 0,
                                              $width, $height, $orig_width, $orig_height);


          } else {
            echo "masalah dalam copy";
          }

        }

      //tutup foreach 1
      }
      //tutup fungsi proses
    }

    public function export(Request $request){
      $npmRequest = $request->npm;
      $npmArray = explode(",",$npmRequest);
      Excel::loadView('result', array('npmArray' => $npmArray))->export('xls');
    }
}
