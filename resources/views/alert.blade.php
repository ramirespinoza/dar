<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector AntiRobo</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        .logos{

            width: 250px;
            height: 250px;
            position: fixed;
            left: 10px;

        }

        .tabla{
            margin: 150px auto;
            width: 1200px;


    </style>
</head>

<body>


<div>
    <img class="logos" src="{{ asset('img/logo.jpg') }}" alt="" class="imgPerfil">
</div>

<center><h1>Detector AntiRobo</h1></center>


                <div class="row">
                    <div class="col-6 offset-3">
                    <label>Ingresar Token:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingrese su Token" aria-label="Ingrese su Token" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary"
                                    type="button"
                                    id="alert"
                                    >
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            Buscar</button>
                        </div>
                    </div>
                </div>



<table class="tabla">

  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Mensaje</th>
      <th scope="col">Usuario</th>
        <th scope="col">Creado</th>
    </tr>
  </thead>
  <tbody>
  @foreach($alerts as $alert )
      <tr>
          <td>{{$alert->id}}</td>
          <td>{{$alert->message_id}}</td>
          <td>{{$alert->user_chat_id}}</td>
          <td>{{$alert->created_at}}</td>
      </tr>
  @endforeach


  </tbody>
</table>



</body>
</html>
