<?php 

 include 'db.php'; 

$id = (int)$_GET['id'];

$sql = "delete from cliente where id_Cliente = '$id'";
$val = $dbd->query($sql);

if($val){

header('location: index.php');

};



 ?>