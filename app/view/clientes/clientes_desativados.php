<?php include '../header/header_nav.php'; ?>

<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include '../../../db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// filtro para pegar so desativados 
$sql = "select * from cliente where desativado = 1 ORDER BY id_Cliente DESC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from cliente")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);
?>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <center>
                        <h1>Clientes Excluídos</h1>
                    </center>

                    <div class="col-md-12 text-center">
                        <?php
                        $png = 1;
                        ?>
                        <form action="clientes_desativados_search.php?id=<?php echo $png ?>" method="post" class="form-group">
                            <input type="text" placeholder="Buscar" name="search" class="form-control">
                        </form>
                    </div>

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                                <th>ID.</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Cidade</th>
                                <th>Uf</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $rows->fetch_assoc()) : ?>

                                    <tr>

                                        <td><input type="checkbox" value="<?php echo $row['id_Cliente'] ?>" class="marcar" name="idsClientes[]"></td>

                                        <th><?php echo $row['id_Cliente'] ?></th>

                                        <td class="col-md-10"><?php echo $row['Nome'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Endereco'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Cidade'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Uf'] ?> </td>

                                        <td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente restaurar');\" href='../../services/restaurar_cliente.php?id=" . $row['id_Cliente'] . "' class='btn btn-danger'>Restaurar</a>"; ?></td>


                                    </tr>

                            <?php endwhile; ?>

                        </tbody>
                        
                    </table>

                    <center>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>


                                <li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>

                            <?php endfor; ?>
                        </ul>
                    </center>
            </div>
            
        </div>
        <a href="../../../index.php" style="float:left;" class="btn btn-info">Voltar</a>
    </div>

</body>



<?php include '../footer/footer.php'; ?>