
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

<link rel="stylesheet" href="css/menud.css?2">
<link rel="stylesheet" href="css/rodape.css?2">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar OS</title>
    
 <nav>
      <div class="logo">Esterilav</div>
<label for="btn" class="icon">
        <span class="fa fa-bars" aria-hidden="true"></span>
      </label>
      <input type="checkbox" id="btn">
      <ul>
<li><a href="Dashboard.php">Home</a></li>
<li>
          <label for="btn-1" class="show">Cliente</label>
          <a href="#">Cliente</a>
          <input type="checkbox" id="btn-1">
          <ul>
<li><a href="cadastrar.php">Cadastrar</a></li>
<li><a href="index.php">Cadastrados</a></li>
</ul>
</li>

<li>
          <label for="btn-2" class="show">Peças</label>
          <a href="#">Peças</a>
          <input type="checkbox" id="btn-2">
          <ul>
<li><a href="Cpeca.php">Cadastrar</a></li>
<li><a href="Lpeca.php">Cadastrados</a></li>

</ul>
</li>


<li>
          <label for="btn-3" class="show">Funcionario</label>
          <a href="#">Funcionario</a>
          <input type="checkbox" id="btn-3">
          <ul>
<li><a href="Fun.php">Cadastrar</a></li>
<li><a href="Lfun.php">Cadastrados</a></li>
</ul>
</li>

<li><a href="#">Sair</a></li>
</ul>
</nav>
<script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
    </script>

<iframe width="100%" height="450" src="https://datastudio.google.com/embed/reporting/49933f89-a968-4ef9-8c4a-b9bf6b70f777/page/okReB" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>
</body>
 <div class="mt-5 pt-2 pb-1 footer">
    <div class="about-company">
      <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
            52.119.963/0001-02 </p>
             <p style="text-align:center; font-size:12px;" class="text-white-50"><small >Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
    </div>
        </div>

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