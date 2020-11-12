
 <?php
	session_start();

	 include 'db.php'; 
	 include 'conexao.php'; 

$id = (int)$_GET['id'];
$idc = (int)$_GET['idc'];


$id_usuarioGD = $id;


$sql ="UPDATE os SET Status='Aprovado' WHERE idOS = '$idc'";
$val = $dbd->query($sql);

if($val){

header("location: ListarOS.php?id=$id");



};


?>

