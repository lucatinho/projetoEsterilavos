<!DOCTYPE html>
<?php
session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
} include 'db.php'; 

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from cliente ORDER BY id_Cliente DESC limit ".$start." , ".$perPage." ;";
$total = $dbd->query("select * from cliente")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);

?>





<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>Responsive Drop-down Menu Bar</title>
        <link rel="stylesheet" href="css/rodape.css?2">

    <link rel="stylesheet" href="css/menud.css?2">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
      
      
     <nav>
      <div class="logo">Esterilav</div>
<label for="btn" class="icon">
        <span class="fa fa-bars" aria-hidden="true"></span>
      </label>
      <input type="checkbox" id="btn">
      <ul>
<li><a href="#">Home</a></li>
<li>
          <label for="btn-1" class="show">Cliente +</label>
          <a href="#">Cliente</a>
          <input type="checkbox" id="btn-1">
          <ul>
<li><a href="#">Cadastrar</a></li>
<li><a href="#">Cadastrados</a></li>
</ul>
</li>

<li>
          <label for="btn-2" class="show">Peças +</label>
          <a href="#">Peças</a>
          <input type="checkbox" id="btn-2">
          <ul>
<li><a href="#">Cadastrar</a></li>
<li><a href="#">Cadastrados</a></li>

</ul>
</li>


<li>
          <label for="btn-3" class="show">Funcionario  +</label>
          <a href="#">Funcionario</a>
          <input type="checkbox" id="btn-3">
          <ul>
<li><a href="#">Cadastrar</a></li>
<li><a href="#">Cadastrados</a></li>
</ul>
</li>

<li><a href="#">Sair</a></li>
</ul>
</nav>
    <div class="content">
      <header>Responsive Drop-down Menu Bar</header>
      <p>
HTML and CSS (Media Query)</p>
</div>
<a href="gerapdf.php">GERAR</a>
<script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
    </script>

  </body>
  
</div>
   <div class="mt-5 pt-2 pb-1 footer">
    <div class="about-company">
      <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
            52.119.963/0001-02 </p>
             <p style="text-align:center; font-size:12px;" class="text-white-50"><small >Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
    </div>
   
   
  

     
  
 

</html>
