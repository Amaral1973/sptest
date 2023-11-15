<?php
    session_start();
    include 'conecta.php';
    $nome = $_POST['nome'];
    $query = $conn->query("SELECT * FROM turma WHERE nome='$nome'");
    if(mysqli_num_rows($query) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Turma já existe em nossa base de dados!');
        window.location.href='professor.php';
        </script>";
        exit();
    } else {
        $sql = "INSERT INTO turma(nome,id_professor) VALUES ('$nome','".$_SESSION["id"]."')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='professor.php';
            </script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar!');
            window.location.href='professor.php';
            </script>";
        }
    }
    mysqli_close($conn);
?>