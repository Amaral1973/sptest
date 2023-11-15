<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM turma WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script language='javascript' type='text/javascript'>
                window.location.href='professor.php';
             </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'>
                alert('Não foi possível excluir o usuário!');
                window.location.href='professor.php';
             </script>";
    }
?>