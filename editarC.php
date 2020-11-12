
<?php
session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include_once "conexao.php";
require_once 'classes/usuarios.php';
include 'db.php'; 
$u = new Usuario;
$id = (int)$_GET['id'];

$connection = mysqli_connect("127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");
$db = mysqli_select_db($connection,'u558134221_esterilavos');
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $id";
$resultado=mysqli_query($connection,$sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados ['Nome'];


$sqll = "select * from cliente where id_Cliente = $id ";
$rows = $dbd->query($sqll);

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
         <link href="css/menud.css?432" rel="stylesheet">

   <link href="css/rodape.css?7567" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Cliente</title>
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
 <input type=image src="imgs/a.png" width="240" height="120"> 
    <h2>Cadastrar Cliente</h2>
   
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
            <label for="lastName">Cidade</label>
            <input type="text" name="Cidade"class="form-control"  value="<?php echo $row['Cidade'] ?>"   >
          </div>
        </div>

     

        <div class="mb-3">
          <label for="email">Endereço<span class="text-muted"></span></label>
          <input type="email" class="form-control" name="Endereco" value="<?php echo $row['Endereco'] ?>" >
        </div>

        <div class="mb-3">
          <label for="address">UF</label>
          <input type="text" class="form-control" name="Uf"value="<?php echo $row['Uf'] ?>" >
      
        </div>

        <div class="mb-3">
          <label for="address2">Solicitante<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="Solicitante" value="<?php echo $row['Solicitante'] ?>" >
        </div>

             <div class="mb-3">
          <label for="address2">Setor<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="Setor" value="<?php echo $row['Setor'] ?>" >
        </div>



  <input type="submit" style="float:right;" value= "Cadastrar" class="btn btn-success" class="entrar">
  <a href="index.php" style="float:left;" class="btn btn-info">Voltar</a>
  <br>


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
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $Endereco = addslashes($_POST['Endereco']);
  $Cidade = addslashes($_POST['Cidade']);
  $Uf = addslashes($_POST['Uf']);
  $Solicitante = addslashes($_POST['Solicitante']);
  $Equipamento = addslashes($_POST['Equipamento']);
  $Setor = addslashes($_POST['Setor']);

  $id = (int)$_GET['id'];

  
  //verificando se todos os campos nao estao vazios
  if( !empty($nome) && !empty($Endereco) && !empty($Cidade) && !empty($Solicitante) 
  && !empty($Setor) && !empty($id)) 
  {
$u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");  //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {
      
        if ($u->updateC($id,$nome, $Endereco, $Cidade, $Uf, $Solicitante,  $Setor)) 


        {
        
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