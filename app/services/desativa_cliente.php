<?php 

 include '../../db.php'; 

$id = (int)$_GET['id'];

// deleta cliente
// $sql = "delete from cliente where id_Cliente = '$id'";

// altera para desativado o cliente
$sql = "update cliente set desativado = 1 where id_Cliente = '$id'";
$val = $dbd->query($sql);

if($val){

header('location: index.php');

};



 ?>