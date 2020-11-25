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

// pegar id do cliente da url
$id = (int)$_GET['id'];
$sqll = "select * from cliente where id_Cliente = $id ";

$sqlClientes = $dbd->query($sqll);

// pegar setores 
$sql = "select * from setores ORDER BY id_setor ASC limit " . $start . " , " . $perPage . " ;";
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
                        <?php $sqlCliente = $sqlClientes->fetch_assoc() ?>
                            <?php while ($row = $rows->fetch_assoc()) : ?>
                                <tr>
                                    <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>

                                    <th><?php echo $row['id_setor'] ?></th>

                                    <td class="col-md-10"><?php echo $row['nomeSetor'] ?> </td>

                                    <td><a href="../equipamentos/equipamento_por_setor.php?cliente=<?= $sqlCliente['id_Cliente']; ?>&setor=<?= $row['id_setor']; ?>" class="btn btn-info">Equipamentos</a></td>
                                    
                                    <td><a href="../../../CadastrarNOS.php?cliente=<?= $sqlCliente['id_Cliente']; ?>&setor=<?= $row['id_setor']; ?>" 
                                    class="btn btn-success">Enviar OS</a></td>
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