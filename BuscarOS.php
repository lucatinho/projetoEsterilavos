<!DOCTYPE html
<?php
session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}

 include 'db.php'; 

$id = (int)$_GET['id'];
if(isset($_POST['search'])){

		$name = htmlspecialchars($_POST['search']);

		$sql = "select * from os where id_OsCliente ='$id' and idOS like '%$name%' or Obs like '%$name%' ";
		$rows = $dbd->query($sql);

}
?>
<html>
<head>
    <link href="css/rodape.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buscar OS</title>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" >

</head>
<body style="margin-bottom:90px;">
<div class="container">
<center><h1>Buscar Ordem de Serviço</h1></center>
<div class="row" style="margin-top: 10px;">
	<div class="col-md-10 col-md-offset-1" >
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
			<form action="BuscarOS.php" method="post" class="form-group">
				
				<input type="text" placeholder="Buscar"
				 name="search" class="form-control">
			</form>
		</div>
		<?php if(mysqli_num_rows($rows) < 1 ): ?>

    <h2 class="text-danger text-center">
Nada encontrado</h2>


	  <?php else: ?>		
	      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID.</th>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Aparelho</th>
            <th>Data</th>
          

            
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php while($row = $rows->fetch_assoc()): ?>
                       
            <th><?php echo $row['idOS'] ?></th>
            <td class="col-md-10"><?php echo $row['AutoCN'] ?> </td>
            <td class="col-md-10"><?php echo $row['AutoCS'] ?> </td>
            <td class="col-md-10"><?php echo $row['Modelo'] ?> </td>
            <td class="col-md-10"><?php echo $row['NPART'] ?> </td>
          
        
            
<td class="dropdown">
	<td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='deleteOS.php?id=".$row['idOS']."' class='btn btn-danger'>Deletar</a>"; ?></td>
         <td><a href="CadastrarOS.php?id=<?= $row['id_OsCliente']; ?>&idc=<?= $row['idOS']; ?>" class="btn btn-info">Ver Os</a></td>  
	    <td><a href="Analisar.php?id=<?= $row['id_OsCliente']; ?>&idc=<?= $row['idOS']; ?>" class="btn btn-success" >Aprovar</a></td>
</ul>
</td>

     

       
    

          </tr>
            <?php endwhile; ?>
          
        </tbody>
      </table>
<?php endif; ?>				
			
<a href="javascript:history.back()" class="btn btn-info">Voltar</a>
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