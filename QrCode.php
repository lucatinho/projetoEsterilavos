
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
	<head>
		<title>Criando QrCode no PHP by Thiengo [Calopsita]</title>
	</head>
	
	
	
	<body>
		<h1>Criando QrCode no PHP</h1>
		
		<form>
			<fieldset>
		<?php
		$id = (int)$_GET['id'];

		  ?>
		<input type="text" id="texto" value="<?php echo $id; ?>"/>		
		<button type="button" id="botao">Os Cadastrar</button>
		</fieldset>
		</form>
		<div style="float: left; border: 1px solid #000;">
		<img src="<?php echo $aux; ?>" />
		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
			$('#botao').click(function(e){
				e.preventDefault();
				var texto = $('#texto').val();
				var nivel = $('#nivel').val();
				var pixels = $('#pixels').val();
				var tipo = $('input[name="img"]:checked').val();
				if(texto.length == 0){
					alert('Informe um texto');
					return(false);
				}
			
				$('img').attr('src', 'qr_img0.50j/php/qr_img.php?d='+texto+'&e='+nivel+'&s='+pixels+'&t='+tipo);
			});
		</script>
	</body>
