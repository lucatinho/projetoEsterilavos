
   <?php  
require_once 'classes/usuarios.php';
$u = new Usuario;
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <link href="css/menud.css?2" rel="stylesheet">

<link href="css/rodape.css?2" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">$("#telefone").mask("(00) 00000-0009");</script>
<meta charset="utf-8">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar Funcionário</title>
    
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

<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/mask.js"></script>

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
<img src="imgs/a.png" alt="some text" width=250 height=120>
    <h2>Cadastrar Funcionário </h2>
   
  </div>

  <div class="row">
    <div class="col-md-4 order-md-5 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
     
      </div>


 
    <div class="col-md-12 order-md-2">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate method="POST" >
    <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">Nome</label>
            <input type="text" name="nome"class="form-control" >
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Senha</label>
            <input type="password" name="Senha"class="form-control" >
          </div>
        </div>

        <div class="mb-3">
          <label for="username">E-mail</label>
          <div class="input-group">
          <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" name="Email" >
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Endereço<span class="text-muted"></span></label>
          <input type="email" class="form-control" name="Endereco">
        </div>

        <div class="mb-3">
          <label for="address">Telefone</label>
          <input type="tel" class="form-control" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" name="Telefone">
      
        </div>

       

 <input type="submit" style="float:right;" value= "Cadastrar" class="btn btn-success" class="entrar">
  <a href="Lfun.php" style="float:left;" class="btn btn-info">Voltar</a>

          </div>

          </div>

        </div>
                <hr>

      
    


</div>
</div>
</body>
<div class="mt-3 pt-2 pb-1 footer">
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
  $Email = addslashes($_POST['Email']);
  $Senha = addslashes($_POST['Senha']);
  $Telefone = addslashes($_POST['Telefone']);


  
  //verificando se todos os campos nao estao vazios
  if( !empty($nome) && !empty($Endereco) && !empty($Email) && !empty($Senha) 
    && !empty($Telefone)) 
  {
 $u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$"); //Conectando ao banco de dados
    if ($u->msgErro == "") //conectado normalmente;
    {
      
        if ($u->cadastrarFU($nome, $Endereco, $Email, $Senha, $Telefone)) 


        {
          if ($u->logar($nome, $Endereco))
        {
          header("location: Lfun.php"); //encaminhado para proxima area apos verificar usuario e senha
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