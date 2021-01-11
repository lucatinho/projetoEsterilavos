<?php 

 include '../../../db.php'; 

$id = (int)$_GET['id'];
$idsetor = (int)$_GET['setor'];
$idCliente = (int)$_GET['cliente'];

// deleta cliente
// $sql = "delete from cliente where id_Cliente = '$id'";

// altera para desativado o cliente
$sql = "update peca set desativado = 1 where id_peca = '$id'";
$val = $dbd->query($sql);


if($val){

    
// header("location: ../../view/equipamentos/equipamento_por_setor.php?idsetor=" . $idsetor . "&idcliente=" . $idCliente);
header("location: ../../../index.php");

};



 ?>