<?php


session_start();

include 'db.php'; 
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		
$db = mysqli_select_db($connection,'u558134221_esterilavos');
$sqll = "SELECT id, nome, email, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
$resultado_usuario = $dbd->query($sqll);	


		

		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				header("Location: Dashboard.php");
					exit;
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: login.php");
					exit;
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: login.php");
			exit;
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login.php");
	exit;
}

?>