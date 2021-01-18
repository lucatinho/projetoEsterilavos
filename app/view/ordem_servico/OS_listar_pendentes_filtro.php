
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
$sql3 = "select * from pecac where id_peca = $idequipamento ";
$sqlEquipamento = $dbd->query($sql3);
?>



<title>Relatório</title>

</head>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">

                <center>
                    <h1>OS Pendentes</h1>
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
               
                <table class="table">
               

                    <div class="col-md-2 mb-3">
                            <label for="exampleFormControlSelect1">Tipo</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="01">Avaliação</option>
                                <option value="02">Corretiva</option>
                                <option value="03">Preventiva</option>
                            </select>

                        </div>
                        <!-- <div class="row"> -->

                        <div class="col-md-4 mb-3">

                            <label for="exampleFormControlSelect1">MÊS</label>
                            <select class="form-control" name="mes" id="mes">
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro </option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro </option>
                                <option value="10">Outubro </option>
                                <option value="11">Novembro </option>
                                <option value="12">Dezembro </option>

                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="exampleFormControlSelect1">Ano</label>
                            <select class="form-control" name="ano" id="ano">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>

                        </div>
                        <br>
                        <!-- </div> -->
                        <button type="button" class="btn btn-primary" onclick="pegarValores()">pesquisar</button>
                    </form>

                </table>
            </div>
        </div>
        <a href="OS_tipo.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>

    <script type="text/javascript">
        function pegarValores() {
            $ano = $('#ano').val();
            $mes = $('#mes').val();
            $tipo = $('#tipo').val();
            // alert(texto);
            // alert($ano + $mes);
            window.location.href = "OS_listar_pendentes.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>&ano=" + $ano + "&mes=" + $mes + "&tipo=" + $tipo;
        }
    </script>
</body>


<?php include '../footer/footer.php'; ?>