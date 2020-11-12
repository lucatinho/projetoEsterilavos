<?php
session_start();
if(!empty($_SESSION['id'])){


}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
	exit;
}

?>