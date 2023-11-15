<?php
    session_start();
    $id_turma = $_SESSION["turma"];
    include 'conecta.php';
    $nome = $_POST['nome'];
    $query = $conn->query("SELECT * FROM turma WHERE nome='$nome'");
    if(mysqli_num_rows($query) > 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Atividade já existe em nossa base de dados!');
        window.location.href='visuturma.php?id=$id_turma';
        </script>";
        exit();
    } else {
        $sql = "INSERT INTO atividade(atividade,id_turma) VALUES ('$nome','$id_turma')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='visuturma.php?id=$id_turma';
            </script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar!');
            window.location.href='visuturma.php?id=$id_turma';
            </script>";
        }
    }
    mysqli_close($conn);
?>