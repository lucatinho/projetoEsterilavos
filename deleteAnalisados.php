<?php 

 include 'db.php'; 
$id = (int)$_GET['id'];
$idc = (int)$_GET['idc'];


$sql = "delete from os where idOS = '$idc'";


$val = $dbd->query($sql);

if($val){

header("location: ListarAnalisados.php?id=$id");

};


 ?>