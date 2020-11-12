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

<link rel="stylesheet" href="css/bootstrap.min.css?212312312" >
<link rel="stylesheet" href="css/table.css?66565" >
<html>
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
<script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
    </script>
      <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
    <form action="search.php?id=<?php echo $png?>" method="post" class="form-group">
	<input type="text" placeholder="Buscar" class="form-control mr-sm-2" name="search" class="form-control"></form></div>
	<form action= "deleteSelecionados.php" method="POST"><table class="table table-hover">
	<input type = "submit" name="btnapgselc"  class="btn btn-danger" value ="Deletar Selecionados"></a>
	</div>
		</div>
<div class="table-responsive text-nowrap">
        <!--Table-->
        <table class="table table-striped">
<div class="card">
  <div class="card-body">
      <div class="form-inline" >
 

</div>
<br>
<br>
          <!--Table head-->
          <thead>
            <tr>
             <th><input type="checkbox"  name="sn" onclick="marcarTodos(this.checked);"></th>
                    <th>ID.</th>
					<th>Nome</th>
					<th>Endereço</th>
					<th>Cidade</th>
					<th>Uf</th>
					<th></th>
					<th></th>
					<th></th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
            <tr>
<?php while($row = $rows->fetch_assoc()): ?>

            <td><input type="checkbox" value ="<?php echo $row['id_Cliente'] ?>" class="marcar" name="idsClientes[]"></td>
              <th scope="row"><?php echo $row['id_Cliente'] ?></th>
						<td><?php echo $row['Nome'] ?> </td>
						<td><?php echo $row['Endereco'] ?></td>
						<td><?php echo $row['Cidade'] ?></td>
						<td><?php echo $row['Uf'] ?></td>
		<td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='delete.php?id=".$row['id_Cliente']."' class='btn btn-danger'>Deletar</a>"; ?></td>
         <td><a href="editarC.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Editar</a></td>	
	     <td><a href="ListarOS.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-success">Ver OS</a></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
      </div>
</section>
<div class="mt-5 pt-2 pb-1 footer">
    <div class="about-company">
      <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
            52.119.963/0001-02 </p>
             <p style="text-align:center; font-size:12px;" class="text-white-50"><small >Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
    </div>
        </div>
</html>
