<!DOCTYPE html>

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
$ano = (int)$_GET['ano'];
$mes = (int)$_GET['mes'];

$sql = "select * from os where id_OsCliente = $idcliente AND ANO = $ano AND MES = $mes ORDER BY id_OsCliente DESC limit " . $start . " , " . $perPage . " ;";
// $sql = "select * from os where id_OsCliente = $idcliente AND ANO = $ano AND MES = $mes ORDER BY id_OsCliente DESC limit ";
$total = $dbd->query("select * from os")->num_rows;
$pages = ceil($total / $perPage);
$rows = $dbd->query($sql);

$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');
// pegar nome cliente
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $idcliente";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados['Nome'];
// pegar nome setor
$sql2 = "SELECT nomeSetor FROM setores WHERE id_setor = $idsetor";
$resultado = mysqli_query($connection, $sql2);
$dados = mysqli_fetch_assoc($resultado);
$nomeSetor = $dados['nomeSetor'];
?>

<?php include '../../header/header_navCopy.php'; ?>

<title>Relatório</title>

</head>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">

                <center>
                    <h1>Enviar OS</h1>
                </center>

                <center>
                    <h4>Cliente: <?php echo $NomeC ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Setor: <?php echo $nomeSetor ?>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ano: <?php echo $ano ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mês: <?php echo $mes ?></h4>
                </center>

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
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
                    <form action="BuscarOS.php?id=<?php echo $idcliente ?>" method="post" class="form-group">

                        <!-- <input type="text" placeholder="Buscar" name="search" class="form-control"> -->
                    </form>
                </div>
                <!-- <form action="deleteSelecionadosOS.php" method="POST"> -->
                <table class="table table-hover">
                    <thead>
                        <!-- <input type="submit" name="btnOS" class="btn btn-danger" value="Deletar Selecionados"></a> -->
                        <tr>
                            <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                            <th>ID.</th>
                            <th>Cliente</th>
                            <th>Tecnico</th>
                            <th>Aparelho</th>
                            <th>Data</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $rows->fetch_assoc()) : ?>
                            <tr>


                                <td><input type="checkbox" value="<?php echo $row['idOS'] ?>" class="marcar" name="idsOS[]"></td>

                                <th><?php echo $row['idOS'] ?></th>
                                <td class="col-md-10"><?php echo $row['AutoCN'] ?> </td>
                                <td class="col-md-10"><?php echo $row['AutoCS'] ?> </td>
                                <td class="col-md-10"><?php echo $row['Modelo'] ?> </td>
                                <td class="col-md-10"><?php echo $row['NPART'] ?> </td>

                                <td><a class="btn btn-success" onclick="enviar()">Enviar</a></td>

                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <a href="OS_data.php?cliente=<?php echo $idcliente ?>&setor=<?php echo $idsetor?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>
    <script type="text/javascript">
        function enviar(nome) {
            alert("email enviado!");
            // alert($ano + $mes);
           
        }
    </script>
</body>


<?php include '../../footer/footer.php'; ?>