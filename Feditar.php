
<?php
session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}include_once "conexao.php";
require_once 'classes/usuarios.php';
include 'db.php'; 
$u = new Usuario;
$id = (int)$_GET['id'];

$connection = mysqli_connect("127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");
$db = mysqli_select_db($connection,'u558134221_esterilavos');
$sql = "SELECT Nome FROM tecnico WHERE id = $id";
$resultado=mysqli_query($connection,$sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados ['Nome'];


$sqll = "select * from tecnico where id = $id ";
$rows = $dbd->query($sqll);

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
   <head>
<link href="css/rodape.css?342" rel="stylesheet">

<link href="css/menud.css?3342" rel="stylesheet">
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
          <a href="#">Funcionário</a>
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
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
      

  
    
   
      </div>
    


  <?php $row = $rows->fetch_assoc() ?>

 
    <div class="col-md-8 order-md-1">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate method="POST" >
    <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">Nome</label>
            <input type="text" name="nome"class="form-control"value="<?php echo $row['Nome'] ?>" >
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">Senha</label>
            <input type="text" name="Senha"class="form-control"  value="<?php echo $row['Senha'] ?>"   >
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Endereço</label>
          <div class="input-group">
          <div class="input-group-prepend">
          </div>
          <input type="text" class="form-control" name="Endereco" value="<?php echo $row['Endereco'] ?>"  >
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Telefone<span class="text-muted"></span></label>
          <input type="email" class="form-control" name="Telefone" value="<?php echo $row['Telefone'] ?>" >
        </div>

        <div class="mb-3">
          <label for="address">Email</label>
          <input type="text" class="form-control" name="Email"value="<?php echo $row['email'] ?>" >
      
        </div>

      
   <div class="mb-3">
         
            <input type="submit" style="float:right;" value= "Cadastrar" class="btn btn-success" class="entrar">
  <a href="Lfun.php" style="float:left;" class="btn btn-info">Voltar</a>
        </div>
          </div>
          </div>

        </div>
    
    

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
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $Endereco = addslashes($_POST['Endereco']);
  $Email = addslashes($_POST['Email']);
  $Senha = addslashes($_POST['Senha']);
  $Telefone = addslashes($_POST['Telefone']);
  $id = (int)$_GET['id'];



  
  //verificando se todos os campos nao estao vazios
  if( !empty($nome) && !empty($Endereco) && !empty($Email) && !empty($Senha) 
    && !empty($Telefone)) 
  {
    $u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$"); //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {
      
        if ($u->upFU($nome, $Endereco, $Email, $Senha, $Telefone,$id)) 


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