
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
$idc = (int)$_GET['idc'];
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'qrcode');
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $id";
$resultado=mysqli_query($connection,$sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados ['Nome'];



$sqll = "select * from os where idOS = $idc ";
$rows = $dbd->query($sqll);

?>
   
<!doctype html>
<html>
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
    <h2>Ordem de Serviço</h2>
   
  </div>
  <?php $row = $rows->fetch_assoc() ?>
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Qrcode</span>

      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Cliente : <?php echo $NomeC?></h6>
            <h6 class="my-0">Tecnico :</h6>
            <h6 class="my-0">Data:  <?php echo $row['DATA'] ?> </h6>
            <small class="text-muted"></small>
          </div>
          <span class="text-muted">ID: <?php echo $id; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <img class="d-block mx-auto mb-4" src="<?php echo $aux; ?>" alt="" >  </div>
        

        </li>
      </ul>

      <form class="card p-2">
      <div class="input-group">
      <input type="text" class="form-control" id="texto" value="ID:<?php echo $id; ?>"disabled="">
      <div class="input-group-append">
      <button style="z-index: 0;" type="submit" id="botao" class="btn btn-secondary">Gerar Qrcode</button>
      </div>
      </div>
      </form>
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
 


    <div class="col-md-8 order-md-1">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate method="POST" >
    <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">AUTOCLAVE Nº</label>
            <input type="text" name="Autocalve"class="form-control" value="<?php echo $row['AutoCN'] ?>">
          </div>

          <div class="col-md-6 mb-3">
            <label for="lastName">AUTOCLAVE NºSÉRIE</label>
            <input type="text" name="AutocalveNS"class="form-control" value="<?php echo $row['AutoCS'] ?>" >
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Modelo</label>
          <div class="input-group">
          <div class="input-group-prepend">
          </div>
            <input type="text" class="form-control" name="Modelo" value="<?php echo $row['Modelo'] ?>"   >
            </div>
        </div>

        <div class="mb-3">
          <label for="email">Ano de fabrica <span class="text-muted"></span></label>
          <input type="email" class="form-control" name="AnoFabrica" value="<?php echo $row['AnoFabrica'] ?>">
        </div>

        <div class="mb-3">
          <label for="address">NºPART</label>
          <input type="text" class="form-control" name="Npt" value="<?php echo $row['NPART'] ?>" >
      
        </div>

        <div class="mb-3">
          <label for="address2">Observações<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="obs" value="<?php echo $row['Obs'] ?>">
        </div>    

          <div class="card p-2">
       <div class="mb-3">
  
 
       <input disabled="" type=image src="fotos/<?= $row['img'];?>" width="50%" height="80%"> 
           
          </div>
      </div>
      <hr>    
  <input type="submit" value= "Salvar" style="float:right;" class="btn btn-success" class="entrar">

<a href="javascript:history.back()" class="btn btn-info">Voltar</a>

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
if(isset($_POST['Autocalve']))
{
  $Autocalve = addslashes($_POST['Autocalve']);
  $AutocalveNS = addslashes($_POST['AutocalveNS']);
  $Modelo = addslashes($_POST['Modelo']);
  $AnoFabrica = addslashes($_POST['AnoFabrica']);
  $Npt = addslashes($_POST['Npt']);
  $obs = addslashes($_POST['obs']);
  $idos = (int)$_GET['id'];
  $idc = (int)$_GET['idc'];


  
  //verificando se todos os campos nao estao vazios
  if( !empty($Autocalve) && !empty($AutocalveNS) && !empty($Modelo) && !empty($AnoFabrica) 
    && !empty($Npt) && !empty($obs) && !empty($idos) && !empty($idc)) 
  {
 $u->conectar("u558134221_esterilavos","127.0.0.1:3306","u558134221_esterilavos","Q*sçxyym34y5$");   //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {
      
        if ($u->updateOS($idc, $idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs)) 
        {

        }

        }
      
      
    }
    else 
    {
    echo "Erro: ".$u->msgErro;
    }
  }
  else
    {


    }


?>
