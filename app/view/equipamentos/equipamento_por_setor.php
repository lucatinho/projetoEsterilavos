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
$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$idsetor = (int)$_GET['setor'];
$idCliente = (int)$_GET['cliente'];

$sql = "SELECT * FROM peca WHERE fk_setor = $idsetor ORDER BY id_peca DESC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from peca")->num_rows;
$pages = ceil($total / $perPage);
$rows = $dbd->query($sql);
// pegar nome setor
$sql2 = "select * from setores where id_setor = $idsetor ";
$sqlSetor = $dbd->query($sql2);

?>

</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">
                <table class="table">

                    <center>
                        <?php while ($row = $sqlSetor->fetch_assoc()) : ?>
                            <h1>Equipamentos do setor <?= $row['nomeSetor'] ?></h1>
                        <?php endwhile; ?>
                    </center>

                    <div class="col-md-12 text-center">
                        <?php
                        $png = 1;
                        ?>
                        <form action="equipamento_por_setor_search.php?cliente=<?php echo $idCliente ?>&setor=<?php echo $idsetor ?>" method="post" class="form-group">
                            <input type="text" placeholder="Buscar" name="search" class="form-control">
                        </form>
                    </div>

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                                <th>ID.</th>
                                <th>Nome</th>
                                <th>Numero Serie</th>
                                <th>Tamanho</th>
                                <th>Cor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $rows->fetch_assoc()) : ?>
                                <!-- clicar em cliente  -->
                                <script>
                                    function executaAcao(idCliente) {
                                        window.location = "http://localhost/projetoEsterilavos/app/view/ordem_servico/OS_tipo.php?cliente=" + idCliente;
                                    }
                                </script>

                                <tr onclick="executaAcao(<?php echo $idCliente; ?> + '&setor=' + <?php echo $idsetor; ?> + '&equipamento=' + <?= $row['id_peca'] ?>)">

                                    <td><input type="checkbox" value="<?php echo $row['id_peca'] ?>" class="marcar" name="ids_peca[]"></td>
                                    <th><?php echo $row['id_peca'] ?></th>
                                    <td class="col-md-10"><?php echo $row['Nome'] ?> </td>
                                    <td class="col-md-10"><?php echo $row['NumeroS'] ?> </td>
                                    <td class="col-md-10"><?php echo $row['Tamanho'] ?> </td>
                                    <td class="col-md-10"><?php echo $row['Cor'] ?> </td>


                                    <td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='equipamento_deletar.php?id=" . $row['id_peca'] . "&idsetor=" . $idsetor . "&idcliente=" . $idCliente . "' class='btn btn-danger'>Apagar</a>"; ?></td>

                                    <td><a href="equipamento_editar.php?idequipamento=<?= $row['id_peca']; ?>&idsetor=<?php echo $idsetor; ?>&idcliente=<?php echo $idCliente; ?>" class="btn btn-info">Editar</a></td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>

                    <center>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>


                                <li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>&cliente=<?php echo $idCliente; ?>&setor=<?php echo $idsetor; ?>"><?php echo $i; ?></a></li>

                            <?php endfor; ?>
                        </ul>
                    </center>
            </div>

        </div>
        <a href="../setores/lista_setores.php?id=<?= $idCliente ?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>

</body>



<?php include '../footer/footer.php'; ?>