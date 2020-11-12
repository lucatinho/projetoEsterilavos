<!DOCTYPE html>
<?php include 'db.php'; 

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from cliente ORDER BY id_Cliente DESC limit ".$start." , ".$perPage." ;";
$total = $dbd->query("select * from cliente")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);


?>
<html>
<head>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<title>Relatório</title>
</head>
<body>
<div class="container">
<center><h1>Relatório</h1></center>

<div class="row" style="margin-top: 10px;">

	<div class="col-md-10 col-md-offset-1" >
	 <td><a style="float:center; color: #fff;background-color: #384bb2;border-color: #244d5a";href="grafico.php" class="btn btn-info">Ordem De Serviço</a></td>
			 <td><a style="color: #fff;background-color: #384bb2;border-color: #244d5a";href="grafico.php" class="btn btn-info">Cadastrar</a></td>

			 <td><a style="color: #fff;background-color: #384bb2;border-color: #244d5a";href="grafico.php" class="btn btn-info">Peças</a></td>
	
			 <td><a style="float:center; color: #fff;background-color: #384bb2;border-color: #244d5a";href="grafico.php" class="btn btn-info">Gráfico</a></td>
		
			
			</table>
		
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
			<p>Buscar</p>
			<form action="search.php" method="post" class="form-group">
				
				<input type="text" placeholder="Buscar"
				 name="search" class="form-control">
			</form>
		</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID.</th>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Uf</th>
					

						
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>
                       
						<th><?php echo $row['id_Cliente'] ?></th>
						<td class="col-md-10"><?php echo $row['Nome'] ?> </td>
						<td class="col-md-10"><?php echo $row['Endereco'] ?> </td>
						<td class="col-md-10"><?php echo $row['Cidade'] ?> </td>
						<td class="col-md-10"><?php echo $row['Uf'] ?> </td>
					
				
						
						
         <td><a href="delete.php?id=<?php echo $row['id_Cliente'];?>" class="btn btn-danger">Apagar</a></td>
         <td><a href="QrCode.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Editar</a></td>	
	     <td><a href="QrCode.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-success">OS</a></td>
	     
		

					</tr>
						<?php endwhile; ?>
					
				</tbody>
			</table>
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
</html>