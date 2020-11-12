<?php 

 include 'db.php'; 

$id = (int)$_GET['id'];

$sql = "delete from tecnico where id = '$id'";

$val = $dbd->query($sql);

if($val){

header('location: Lfun.php');

};



 ?>