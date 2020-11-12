<?php 

 include 'db.php'; 

$id = (int)$_GET['id_peca'];

$sql = "delete from peca where id_peca = '$peca'";
$val = $dbd->query($sql);

if($val){

header('location: Lpeca.php');

};



 ?>