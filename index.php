<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPTEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
         .header {
      float: right;
    }
</style>
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
      <center>
      <h1><p class="text-white">Login</p></h1>
      </center>
      <br>
      <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal"><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='black' class='bi bi-person-square' viewBox='0 0 16 16'>
        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
        <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z'/>
      </svg><b>&nbsp;&nbsp;Login</b></h4>
          </div>
          <div class="card-body">
            <form name="login" action="login.php" method="POST">
            <label class='form-label'>Usuário</label>
            <input class='form-control' type='text' name='usuario' required placeholder="Digite seu e-mail"/>
            <br/>
            <label class='form-label'>Senha</label>
            <input class='form-control' type='password' name='senha' placeholder='Digite a sua senha' required/>
            <br/>
            <input type="submit" class="w-100 btn btn-lg btn-outline-secondary" value="ENTRAR"/>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>