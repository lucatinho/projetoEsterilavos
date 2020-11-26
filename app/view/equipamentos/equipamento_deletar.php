<?php 

 include '../../../db.php'; 

$id = (int)$_GET['id'];

$sql = "delete from peca where id_peca = '$id'";

$val = $dbd->query($sql);

if($val){

header('location: ../../../index.php');

};

 ?>