<?php 

 include 'db.php'; 

if(@$_POST['btnapgselc'])
{
    
    foreach($_POST['idsClientes'] as $idCliente)
    {
        $sql = "delete from cliente where id_Cliente = '$idCliente'";
$val = $dbd->query($sql);
        

    }
}


        header('location: index.php');

 ?>