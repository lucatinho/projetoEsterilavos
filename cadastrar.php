
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

<link rel="stylesheet" href="css/menud.css?45">
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
<script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
    </script>

<link href="css/bootstrap.css?2" rel="stylesheet">

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
    <link href="form-validation.css?2" rel="stylesheet">
  </head>

  
<body  class="bg-light">    
<div class="container">

  <div class="py-5 text-center">
    <br>
 <input type=image src="imgs/a.png" width="240" height="120"> 
    <h2>Cadastrar Cliente</h2>
   
  </div>

  <div class="row">

      <h4 class="d-flex justify-content-between align-items-center mb-3">
      

  
        

   
      </div>


 
</h4>
    <form class="needs-validation"  novalidate method="POST" >
          <div class="mb-3">
            <label for="lastName">Nome</label>
            <input type="text" name="nome"class="form-control" >
          </div>
        
    <div class="row">
        

          <div class="col-md-8 mb-4">
            <label for="lastName">Cidade</label>
            <input type="text" name="Cidade"class="form-control" >
          </div>
           <div class="col-md-4 mb-2">
          <label for="address" >UF</label>
      <select class="form-control" name="Uf">
      <option value="AC">AC - ACRE</option>
      <option value="AL">AL - ALAGOA</option>
      <option value="AM">AM - AMAZONAS</option>
      <option value="AP">AP - AMAPÁ</option>
      <option value="BA">BA - BAHIA</option>
      <option value="CE">CE - CEARÁ</option>
      <option value="DF">DF - DISTRITO FEDERAL</option>
      <option value="ES">ES - ESPÍRITO SANTO</option>
      <option value="GO">GO - GOIÁS</option>
      <option value="MA">MA - MARANHÃO</option>
      <option value="MT">MT - MATO GROSSO</option>
      <option value="MS">MS - MATO GROSSO DO SUL</option>
      <option value="MG">MG - MINAS GERAIS</option>
      <option value="PA">PA - PARÁ</option>
      <option value="PB">PB - PARAÍBA</option>
      <option value="PR">PR - PARANÁ</option>
      <option value="PE">PE - PERNAMBUCO</option>
      <option value="PI">PI - PIAUÍ</option>
      <option value="RJ">RJ - RIO DE JANEIRO</option>
      <option value="RN">RN - RIO GRANDE DO NORTE</option>
      <option value="RS">RS - RIO GRANDE DO SUL</option>
      <option value="RO">RO - RONDÔNIA</option>
      <option value="RR">RR - RORAIMA</option>
      <option value="SC">SC - SANTA CATARINA</option>
      <option value="SP">SP - SÃO PAULO</option>
      <option value="SE">SE - SERGIPE</option>
      <option value="TO">TO - TOCANTINS</option>

    </select>
        </div>

        </div>
        
        
<div class="mb-3">
          <label for="email">Endereço<span class="text-muted"></span></label>
          <input type="email" class="form-control" name="Endereco">
        </div>
        
        <div class="mb-3">
          <label for="address2">Solicitante<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="Solicitante" placeholder="">
        </div>


             <div class="mb-3">
          <label for="address2">Setor<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="Setor" placeholder="">
        </div>



  <input type="submit" value= "Cadastrar" style="float:right;" class="btn btn-success" class="entrar">

  <a href="index.php" class="btn btn-info">Voltar</a>

          </div>
          </div>

        </div>
        <hr class="mb-4">
    
        
      </form>
    </div>
  </div>


 <style type="text/css">

        #rodape /*rodapé do sistema */

        {

float:center;
            text-align: center;
            font-size:12px;
            font-weight:bold; width:100%;height:100%;
            background: #1b1b1b;
            color:#8e8e8e;
            position:relative; 
            bottom:0px;
            left:0px; 
            font-family: 'Poppins', sans-serif;
        }
    </style>



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