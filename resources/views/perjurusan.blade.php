<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foto Wisuda Tools by c3budiman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="/js/jquery.min.js">

    </script>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <a style="" href="/" class="btn btn-info">Home</a>
        <a class="btn btn-primary" href="/fotograyscale">Checker and Grayscale</a>
        <a style="" class="btn btn-warning" href="/matcher">Count And List Missing</a>
        <a style="" class="btn btn-primary" href="/perjurusan">Data Perjurusan</a>
        <a style="" class="btn btn-success" href="/datadbf">Data DBF Getter</a>
        <a class="btn btn-primary" href="/ssdownloader">Foto Downloader</a>
      </div>

      <div class="row">
        <h1 class="page-header">Download Data Per Jurusan <small>by c3budiman</small></h1>
        <br>
        @foreach ($data_jurusan as $jurusan)
          <form class="" action="/downloadjurusan" method="post">
            <div style="margin-top:20px;" class="col-md-4">
              {{ csrf_field() }}
              <input type="hidden" name="jurusan" value="{{$jurusan['JURUSAN']}}">
              <button type="submit" class="btn btn-success" name="button">Data {{$jurusan['JURUSAN']}}</button>
            </div>
          </form>

        @endforeach
      </div>

    </div>

  </body>
</html>
