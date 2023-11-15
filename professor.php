<?php
  session_start();
  if(!isset($_SESSION["user"]))
  {
    echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
    exit();
  }
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
            <h4 class="my-0 fw-normal"><b><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
            </svg>&nbsp;&nbsp;TURMAS</b></h4><br/>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar turma</button>
          </div>
          <div class="card-body">
            <table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Número</th>
                <th scope="col">Nome</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
              include 'conecta.php';
              $pesquisa = mysqli_query($conn, "SELECT * FROM turma WHERE id_professor=".$_SESSION["id"]."");
              $row = mysqli_num_rows($pesquisa);
              if ($row > 0) {
                while ($registro = $pesquisa -> fetch_array()) {
                  $id = $registro['id'];
                  echo '<tr>';
                  echo '<td>'.$registro['id'].'</td>';
                  echo '<td>'.$registro['nome'].'</td>';
                  echo '<td><a href="excluirturma.php?id='.$id.'" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Excluir</a> | <a href="visuturma.php?id='.$id.'" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Visualizar</a></td>';
                  echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
              } else {
                echo "Não há turmas cadastradas!";
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
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Turma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cadturma.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira o nome da turma" required/>
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