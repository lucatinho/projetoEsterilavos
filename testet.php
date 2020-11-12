<!DOCTYPE html>


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


<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css?1456523">

	 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css?1456523">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css?1456523">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css?1456523">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css?1456523">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/sutil.css">
	<link rel="stylesheet" type="text/css" href="css/smain.css?1456523">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
     			<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Id</th>
									<th class="cell100 column2">Nome</th>
									<th class="cell100 column3">Endereço</th>
									<th class="cell100 column4">Cidade</th>
									<th class="cell100 column5">Uf</th>
								    <th class="cell100 column6"></th>
								     <th class="cell100 column7"></th>
								      <th class="cell100 column8"></th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							   	<?php while($row = $rows->fetch_assoc()): ?>
								<tr class="row100 body"> 
								
							     	<td class="cell100 column1"><?php echo $row['id_Cliente'] ?></td>
									<td class="cell100 column2"><?php echo $row['Nome'] ?></td>
									<td class="cell100 column3"><?php echo $row['Endereco'] ?></td>
									<td class="cell100 column4"><?php echo $row['Cidade'] ?> </td>
									<td class="cell100 column5"><?php echo $row['Uf'] ?></td>
								
									
			<td class="cell100 column6" ><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='delete.php?id=".$row['id_Cliente']."' class='btn btn-danger'>Deletar</a>"; ?></td>
         <td class="cell100 column7" ><a href="editarC.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Editar</a></td>	
	     <td class="cell100 column8"><a href="ListarOS.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-success">Ver OS</a></td>
								</tr>
					<?php endwhile; ?>
							</tbody>
						</table>
					</div>
			<p>
	<ul class="pagination">
				<?php for($i = 1 ; $i <= $pages; $i++): ?>
				
				
				<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

			<?php endfor; ?>
				</ul>
				</div>
				
		    </div>
		    
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>