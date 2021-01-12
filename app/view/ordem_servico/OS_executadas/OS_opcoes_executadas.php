<?php include '../../header/header_navCopy.php'; ?>
<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include '../../../../db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$idcliente = (int)$_GET['cliente'];
$idsetor = (int)$_GET['setor'];
$idequipamento = (int)$_GET['equipamento'];

// $sql = "select * from os where id_OsCliente = $idcliente AND  Status = 'Em Analise' ORDER BY id_OsCliente DESC limit " . $start . " , " . $perPage . " ;";
$sql = "select * from os where id_OsCliente = $idcliente ORDER BY id_OsCliente DESC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from os")->num_rows;
$pages = ceil($total / $perPage);
$rows = $dbd->query($sql);

$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');
// // pegar nome cliente
// $sql = "SELECT Nome FROM cliente WHERE id_Cliente = $idcliente";
// $resultado = mysqli_query($connection, $sql);
// $dados = mysqli_fetch_assoc($resultado);
// $NomeC = $dados['Nome'];
// // pegar nome setor
// $sql2 = "SELECT nomeSetor FROM setores WHERE id_setor = $idsetor";
// $resultado = mysqli_query($connection, $sql2);
// $dados = mysqli_fetch_assoc($resultado);
// $nomeSetor = $dados['nomeSetor'];
// pegar nome cliente
$sql1 = "select * from cliente where id_Cliente = $idcliente ";
$sqlClientes = $dbd->query($sql1);
// pegar nome setor
$sql2 = "select * from setores where id_setor = $idsetor ";
$sqlSetor = $dbd->query($sql2);
// pegar nome equipamento
$sql3 = "select * from peca where id_peca = $idequipamento ";
$sqlEquipamento = $dbd->query($sql3);
?>



<title>Relatório</title>

</head>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">

                <center>
                    <h1>OS Executadas</h1>
                </center>

                <table class="table">
                    <?php while ($row = $sqlClientes->fetch_assoc()) : ?>
                        <th>Cliente: <?= $row['Nome'] ?></th>
                    <?php endwhile; ?>
                    <?php while ($row = $sqlSetor->fetch_assoc()) : ?>
                        <th>Setor: <?= $row['nomeSetor'] ?></th>
                    <?php endwhile; ?>
                    <?php while ($row = $sqlEquipamento->fetch_assoc()) : ?>
                        <th>Equipamento: <?= $row['Nome'] ?></th>
                    <?php endwhile; ?>
                    <form action=”#” method="POST">
                </table>
                <hr>

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                            <th>ID.</th>
                            <th>Nome</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                            <th>1</th>
                            <td class="col-md-10">Tipo de Ordem se Serviço</td>

                            <td><a href="OS_listar_executadas_filtro.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                            <th>2</th>
                            <td class="col-md-10">Uploud de imagem</td>

                            <td><a href="OS_cadastrar.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                        </tr>
                    

                    </tbody>

                </table>
            </div>
        </div>
        <a href="../OS_tipo.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>


</body>


<?php include '../../footer/footer.php'; ?>