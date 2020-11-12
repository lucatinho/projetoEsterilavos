
 <?php
	session_start();
	include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php

		$arquivo = 'Respostas.pdf';
		

		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Usuario</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>E-mail</b></td>';
		$html .= '<td><b>Telefone</b></td>';
		$html .= '</tr>';
		
	
		$result_msg_contatos = "SELECT * FROM usuario";
		$resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["id_usuario"].'</td>';
			$html .= '<td>'.$row_msg_contatos["nome"].'</td>';
			$html .= '<td>'.$row_msg_contatos["email"].'</td>';
			$html .= '<td>'.$row_msg_contatos["telefone"].'</td>';
			
			$html .= '</tr>';
			;
		}
		
	
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
	
		echo $html;
		exit; ?>
	</body>
</html>