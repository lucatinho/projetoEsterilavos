<?php 

 include 'db.php'; 

if($_POST['btnPeca'])
{
    
    foreach($_POST['ids_peca'] as $id_peca)
    {
        $sql = "delete from peca where id_peca = '$id_peca'";
$val = $dbd->query($sql);

    }
}


        header('location: Lpeca.php');

 ?>