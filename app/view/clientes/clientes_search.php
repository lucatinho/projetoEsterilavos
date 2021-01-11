<?php include '../header/header_nav.php'; ?>
<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
	$_SESSION['msg'] = "Área restrita";
	header("Location: ../../../login.php");
	exit;
}
include '../../../db.php';

if (isset($_POST['search'])) {

	$name = htmlspecialchars($_POST['search']);

	$sql = "select * from cliente where Nome like '%$name%' ";
	$rows = $dbd->query($sql);
}
?>
<html>

<head>
	<link href="css/rodape.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Buscar Cliente</title>
</head>

<body>

	<div class="container">

		<div class="row" style="margin-top: 80px;">
			<div class="col-md-10 col-md-offset-1">
				<center>
					<h1>Buscar Cliente: <?php echo $name ?></h1>
				</center>
				<table class="table">

					<hr><br>
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
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center">
						<form action="clientes_search.php" method="post" class="form-group">

							<input type="text" placeholder="Buscar" name="search" class="form-control">
						</form>
					</div>
					<?php if (mysqli_num_rows($rows) < 1) : ?>

						<h2 class="text-danger text-center">
							Nada encontrado</h2>
						<a href="index.php" class="btn btn-info">Voltar</a>

					<?php else : ?>
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
								<?php while ($row = $rows->fetch_assoc()) : ?>
									<!-- clicar em cliente  -->
									<script>
										function executaAcao(idCliente) {
											window.location = "http://localhost/projetoEsterilavos/app/view/setores/lista_setores.php?id=" + idCliente;
										}
									</script>
									<tr>
										<th><?php echo $row['id_Cliente'] ?></th>
										<td class="col-md-10"><?php echo $row['Nome'] ?> </td>
										<td class="col-md-10"><?php echo $row['Endereco'] ?> </td>
										<td class="col-md-10"><?php echo $row['Cidade'] ?> </td>
										<td class="col-md-10"><?php echo $row['Uf'] ?> </td>




										<td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='../../../delete.php?id=" . $row['id_Cliente'] . "' class='btn btn-danger'>Apagar</a>"; ?></td>
										<td><a href="../../../editarC.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Editar</a></td>



									</tr>
								<?php endwhile; ?>

							</tbody>
						</table>
						<a href="../../../index.php" class="btn btn-warning">Voltar</a>

					<?php endif; ?>


					<center>

			</div>
		</div>
	</div>
</body>



<?php include '../footer/footer.php'; ?>