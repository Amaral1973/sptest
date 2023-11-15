<?php
    session_start();
    include 'conecta.php';
    $login= $_POST['usuario'];
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT * FROM usuario WHERE email='$login' AND senha='$senha'") or die("Erro ao selecionar");
        if (mysqli_num_rows($logar)> 0){
            $dados = mysqli_fetch_assoc($logar);
            $_SESSION["user"] = $dados["nome"];
            $_SESSION["id"] = $dados["id"];
            echo ("<script>window.location.replace('professor.php');</script>");    
            }
        else {
            echo ("<script>alert('Login ou senha incorretos! Tente novamente.');</script>");
            echo ("<script>window.location.replace('index.php');</script>");
        }
    mysqli_close($conn);
?>