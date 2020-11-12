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


$sql = "select * from peca ORDER BY id_peca DESC limit ".$start." , ".$perPage." ;";
$total = $dbd->query("select * from peca")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);

?>
<html>

	  <head>
<link href="css/menud.css?2" rel="stylesheet">

<link href="css/rodape.css?2" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Peça</title>
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
          <label for="btn-3" class="show">Funcionário</label>
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css?3" >
<title>Peças</title>

 <script type="text/javascript">
    function marcarTodos(marcardesmarcar){
        $('.marcar').each(function () {
            this.checked = marcardesmarcar;
        });
    }
    
    
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
     if (resposta == true) {
          window.location.href = "delete.php?id=<?php echo $row['id_peca'];?>";
     }
}
    
    
    
    
    
    
    
</script>
</head>
  <body>
      <div class="container">
<center><h1>Peças</h1></center>

<div class="row" style="margin-top: 10px;">
	<div class="col-md-10 col-md-offset-1" >
		<table class="table">
	 <a style="float:left; margin-top:20px;" class="btn btn-info" href="Cpeca.php">Cadastrar Peças</a>
		<br><br><hr>
	
			
			
		
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">

				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Task</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="add.php">
								<div class="form-group">
									<label>Task Name</label>
									<input type="text" required name="task" class="form-control">
								</div>
								<input type="submit" name="send" value="Add Task" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			
		<div class="col-md-12 text-center">
			<form action="PcBuscar.php" method="post" class="form-group">
				
				<input type="text" placeholder="Buscar"
				 name="search" class="form-control">
			</form>
				<br>
			
								</div>

		<form action= "deleteSelecionadosPeca.php" method="POST">
		    
<input type = "submit" name="btnPeca"  class="btn btn-danger" value ="Deletar Selecionados"></a>
</tr>
			<table class="table table-hover">
			    
				<thead>
				    
					<tr>
<th ><input  type="checkbox"  name="sn" onclick="marcarTodos(this.checked);"></th>						
                        <th>ID.</th>
						<th>Nome</th>
						<th>Numero Serie</th>
						<th>Tamanho</th>
						<th>Cor</th>
						
					

						
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>
					
 <td><input type="checkbox" value ="<?php echo $row['id_peca'] ?>" class="marcar" name="ids_peca[]"></td>

						<th><?php echo $row['id_peca'] ?></th>
						<td class="col-md-10"><?php echo $row['Nome'] ?> </td>
						<td class="col-md-10"><?php echo $row['NumeroS'] ?> </td>
						<td class="col-md-10"><?php echo $row['Tamanho'] ?> </td>
						<td class="col-md-10"><?php echo $row['Cor'] ?> </td>
					
				
	<td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='PCdelete.php?id=". $row['id_peca']."' class='btn btn-danger'>Deletar</a>"; ?></td>
						
         <td><a href="Peditar.php?id=<?= $row['id_peca']; ?>" class="btn btn-info">Editar</a></td>	
	   
	     
		

					</tr>
						<?php endwhile; ?>
					
				</tbody>
			</table>
			</form>

			<center>
				<ul class="pagination">
				<?php for($i = 1 ; $i <= $pages; $i++): ?>
				<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

			<?php endfor; ?>
				</ul>
			</center>
		
		<center>
		
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