<?php 

 include 'db.php'; 
$idc = (int)$_GET['idc'];
$id = (int)$_GET['id'];

$sql = "delete from os where idOS = '$idc'";

$val = $dbd->query($sql);


if($val){

header("location: ListarOS.php?id=$id");

};


 ?>