<?php 

 include '../../../db.php'; 

$id = (int)$_GET['id'];

// altera para ativado o cliente
$sql = "update cliente set desativado = 0 where id_Cliente = '$id'";
$val = $dbd->query($sql);

if($val){

header('location: ../../../index.php');

};



 ?>