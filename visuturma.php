<?php
  session_start();
  if(!isset($_SESSION["user"]))
  {
    echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
    exit();
  }
  $id = $_GET['id'];
  $_SESSION["turma"] = $id;
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
    .letra {
      font-size: small;
    }
</style>
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-fluid">
      <?php
      echo "<div class='header'>";
      if (empty($_SESSION["user"])){
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-person-square' viewBox='0 0 16 16'>
        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
        <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z'/>
      </svg> <a href='log.php' style='color: black; text-decoration: none; font-weight: bold;'>Login | </a>";
        echo "<a href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair</a>";
      }
      else {
        $usuario = $_SESSION["user"];
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='black' class='bi bi-person-square' viewBox='0 0 16 16'>
        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
        <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z'/>
      </svg><b><font color='black'> ".$usuario." | </font></b>";
        echo "<a href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair</a>";
      }
      echo "</div>";
      ?>
      <br/>
      <hr>
      <br/>
      <div class="row row-cols-2 row-cols-md-1 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-2">
            <?php
                include 'conecta.php';
                $sql = "SELECT * FROM turma WHERE id=$id";
                $query = $conn->query($sql);
                while ($dados = $query->fetch_array()) {
                    $nome = $dados['nome'];
                }
            ?>
            <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
            <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362.798-.799.96-1.932.362-2.531-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532Z"/>
            <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9.42 9.42 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a9.556 9.556 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093.067.017.12.033.16.045.184.06.279.13.351.295l.029.073a3.475 3.475 0 0 1 .157.721c.055.485.051 1.178-.159 2.065Zm-4.828 7.475.04-.04-.107 1.081a1.536 1.536 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a8.548 8.548 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006ZM5.205 5c-.625.626-.94 1.351-1.004 2.09a8.497 8.497 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107-.04.039Zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a2.835 2.835 0 0 0-.045-.283 3.078 3.078 0 0 0-.3-.041Z"/>
            <path d="M7.009 12.139a7.632 7.632 0 0 1-1.804-1.352A7.568 7.568 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
            </svg>&nbsp;&nbsp;<?php echo $nome; ?></b></h4><br/>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Atividade</button>
          </div>
          <div class="card-body">
            <table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Número</th>
                <th scope="col">Nome</th>
            </tr>
            </thead>
            <tbody>
            <?php
              include 'conecta.php';
              $pesquisa = mysqli_query($conn, "SELECT * FROM atividade WHERE id_turma=".$id."");
              $row = mysqli_num_rows($pesquisa);
              if ($row > 0) {
                while ($registro = $pesquisa -> fetch_array()) {
                  $id = $registro['id'];
                  echo '<tr>';
                  echo '<td>'.$registro['id'].'</td>';
                  echo '<td>'.$registro['atividade'].'</td>';
                  echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
              } else {
                echo "Não há atividades cadastradas!";
                echo '</tbody>';
                echo '</table>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cadatividade.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira o nome da atividade" required/>
                <br/>
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  </body>
</html>