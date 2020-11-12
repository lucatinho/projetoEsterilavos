
   <?php
session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}

require_once 'classes/usuarios.php';
$u = new Usuario;
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <style>html, body, .wrap{
overflow-x: hidden;
height: 100%;
}

body > .wrap{
height: 100%;
min-height: 100%;
}

.wrap{
position: relative;
min-height: 100%;
height: auto !important;
height: 100%;
}

.header-container{
width: 978px;
height: 200px;
background: #123456;
}

.footer-container{
width: 100%;
height: auto !important;
position: fixed;
clear: both;
bottom: 0 !important;
padding-bottom: 5px;
background: #357531;
}</style>
<body>
    

    <div class="wrap">
        <div class="header-container">
<div class="container">
  <div class="py-5 text-center">
    <br>
 
    <h2>Cadastrar Peças</h2>
   
  </div>

  <div class="row">

      <h4 class="d-flex justify-content-between align-items-center mb-3">
      

  
        

   
      </div>


 
</h4>
  

    <form class="needs-validation"  novalidate method="POST" >
    <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">Nome</label>
            <input type="text" name="Nome"class="form-control" >
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Numero de Serie</label>
            <input type="text" name="NumeroS"class="form-control" >
          </div>
        </div>

        <div class="mb-3">
          <label >Tamanho</label>
          <div class="input-group">
          <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" name="Tamanho" >
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Cor<span class="text-muted"></span></label>
          <input type="email" class="form-control" name="Cor">
        </div>

        <div class="mb-3">
          <label for="address">Marca</label>
          <input type="text" class="form-control" name="Marca">
      
        </div>

        <div class="mb-3">
          <label for="address2">Tipo<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="Tipo" placeholder="">
        </div>
  


  <input type="submit" value= "Cadastrar" style="float:right;" class="btn btn-success" class="entrar">

  <a href="Lpeca.php" class="btn btn-info">Voltar</a>

          </div>
        </div><!-- .header-container -->

        <div class="footer-container">

<p>SSSSSSSSSSSSSSSSS</p>


        </div>
        
        
    </div>


</body>

</html>


<?php  
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $Endereco = addslashes($_POST['Endereco']);
  $Cidade = addslashes($_POST['Cidade']);
  $Uf = addslashes($_POST['Uf']);
  $Solicitante = addslashes($_POST['Solicitante']);
  $Setor = addslashes($_POST['Setor']);


  
  //verificando se todos os campos nao estao vazios
  if( !empty($nome) && !empty($Endereco) && !empty($Cidade) && !empty($Solicitante) 
  && !empty($Setor)) 
  {
    $u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");  //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {
     
	
        if ($u->cadastrar($nome, $Endereco, $Cidade, $Uf, $Solicitante,$Setor)) 


        {
          if ($u->logar($nome, $Endereco))
        {
          header("location: index.php"); //encaminhado para proxima area apos verificar usuario e senha
        }
        }
        else
        {
          echo "Email já cadastrado";
        }
      
      
    }
    else 
    {
    echo "Erro: ".$u->msgErro;
    }
  }
  else
    {
      echo "Preencha todos os campos!";
    }
}
?>