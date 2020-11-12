<?php 

 include 'db.php'; 

if(@$_POST['btnOS'])
{
    
    foreach($_POST['idsOS'] as $idOS)
    {
        $sql = "delete from os where id_OsCliente = '$idOS'";
$val = $dbd->query($sql);
        

    }
}


        header('location: ListarOS.php');

 ?>