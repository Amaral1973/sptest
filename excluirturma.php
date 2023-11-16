<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql = mysqli_query($conn,"SELECT * FROM atividade WHERE id_turma=$id");
    $linhas=mysqli_num_rows($sql); 
    if( $linhas > 0 )
    {
        echo "<script language='javascript' type='text/javascript'>
                alert('Não é possível excluir a turma, pois possui atividade!');
                window.location.href='professor.php';
             </script>";
    } 
    else 
    {
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
    }
?>