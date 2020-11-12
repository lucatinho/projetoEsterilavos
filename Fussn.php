<?php
session_start();
ob_start();
	 include 'db.php'; 
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "'
					)";

	$val = $dbd->query($result_usuario);
	if(mysqli_insert_id($val)){
		$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Celke - Cadastrar</title>
	</head>
  <body>
  <h2>Cadastro</h2>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="">
			<label>Nome</label>
			<input type="text" name="nome" placeholder="Digite o nome e o sobrenome"><br><br>
			
			<label>E-mail</label>
			<input type="text" name="email" placeholder="Digite o seu e-mail"><br><br>
			
			<label>Usuário</label>
			<input type="text" name="usuario" placeholder="Digite o usuário"><br><br>
			
			<label>Senha</label>
			<input type="password" name="senha" placeholder="Digite a senha"><br><br>
			
			<input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>
			
			Lembrou? <a href="login.php">Clique aqui</a> para logar
		
		</form>
	</body>
	
<div class="mt-5 pt-2 pb-1 footer">
    <div class="about-company">
      <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
            52.119.963/0001-02 </p>
             <p style="text-align:center; font-size:12px;" class="text-white-50"><small >Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
    </div>
        </div>
</html>