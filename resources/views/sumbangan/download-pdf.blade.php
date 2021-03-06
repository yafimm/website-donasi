<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-md-12">
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Penerima</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sumbangan as $key => $row)
          <tr>
            <th scope="row">{{$key + 1}}</th>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->pengirim->username}}</td>
            <td scope="row">{{ ($row->penerima) ? $row->penerima->username : '-' }}</td>
            <td>{{$row->created_at->format('H.i d M Y')}}</td>
            <td>{{$row->status}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </body>
</html>
