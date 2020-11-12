
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
<script src="https://code.jquery.com/jquery-3.5.0.js?123123"></script>
<script src="https://kit.fontawesome.com/a076d05399.js?123123"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar Peça</title>
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
          <a>Cliente</a>
          <input type="checkbox" id="btn-1">
          <ul>
<li><a href="cadastrar.php">Cadastrar</a></li>
<li><a href="index.php">Cadastrados</a></li>
</ul>
</li>

<li>
          <label for="btn-2" class="show">Peças</label>
          <a>Peças</a>
          <input type="checkbox" id="btn-2">
          <ul>
<li><a href="Cpeca.php">Cadastrar</a></li>
<li><a href="Lpeca.php">Cadastrados</a></li>

</ul>
</li>


<li>
          <label for="btn-3" class="show">Funcionário</label>
          <a>Funcionário</a>
          <input type="checkbox" id="btn-3">
          <ul>
<li><a href="Fun.php">Cadastrar</a></li>
<li><a href="Lfun.php">Cadastrados</a></li>
</ul>
</li>

<li><a href="sair.php">Sair</a></li>
</ul>
</nav>
<link href="css/bootstrap.css?2" rel="stylesheet">

       
    <link href="form-validation.css" rel="stylesheet">


<link href="css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="form-validation.css" rel="stylesheet">
  </head>

  
  <body class="bg-light"> 
  <div class="container">
  <div class="py-5 text-center">
    <br>
 <input type=image src="imgs/a.png" width="240" height="120"> 
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
            <label for="lastName">Número de Serie</label>
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
          </div>

        </div>
        <hr class="mb-4">
    
        
      </form>
    </div>
  </div>


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
if(isset($_POST['Nome']))
{
  $Nome = addslashes($_POST['Nome']);
  $NumeroS = addslashes($_POST['NumeroS']);
  $Tamanho = addslashes($_POST['Tamanho']);
  $Cor = addslashes($_POST['Cor']);
  $Marca = addslashes($_POST['Marca']);
  $Tipo = addslashes($_POST['Tipo']);

  


  
  //verificando se todos os campos nao estao vazios
  if( !empty($Nome) && !empty($NumeroS) && !empty($Tamanho) && !empty($Cor) 
    && !empty($Marca) && !empty($Tipo)) 
  {
    $u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");  //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {
     
	
        if ($u->CadastrarPC($Nome, $NumeroS, $Tamanho, $Cor, $Marca, $Tipo)) 


      {
          
          
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