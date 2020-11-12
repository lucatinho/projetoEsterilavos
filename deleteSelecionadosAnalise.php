<?php 

 include 'db.php'; 

if(@$_POST['btna'])
{
    
    foreach($_POST['idsClientes'] as $id_OsCliente)
    {
        $sql = "delete from cliente where id_OsClientes = '$id_OsCliente'";
$val = $dbd->query($sql);
        

    }
}


        header('location: index.php');

 ?>