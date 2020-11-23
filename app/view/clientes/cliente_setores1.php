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
$sql = "select * from setores ORDER BY idSetor ASC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from setores")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);
?>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <center>
                        <h1>Setores</h1>
                    </center>


                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                                <th>ID.</th>
                                <th>Nome</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $rows->fetch_assoc()) : ?>
                                <tr>
                                    <td><input type="checkbox" value="<?php echo $row['idSetor'] ?>" class="marcar" name="idsClientes[]"></td>

                                    <th><?php echo $row['idSetor'] ?></th>

                                    <td class="col-md-10"><?php echo $row['nomeSetor'] ?> </td>

                                    <td><a href="editarC.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Equipamentos</a></td>
                                    <td><a href="ListarOS.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-success">Ordem de Serviço</a></td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>


            </div>

        </div>
        <a href="../../../index.php" style="float:left;" class="btn btn-info">Voltar</a>
    </div>

</body>

<?php include '../footer/footer.php'; ?>