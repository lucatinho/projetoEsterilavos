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

// pegar id do cliente da url
$idcliente = (int)$_GET['cliente'];
$idsetor = (int)$_GET['setor'];
$idequipamento = (int)$_GET['equipamento'];
// paginação
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
// pegar nome cliente
$sql1 = "select * from cliente where id_Cliente = $idcliente ";
$sqlClientes = $dbd->query($sql1);
// pegar nome setor
$sql2 = "select * from setores where id_setor = $idsetor ";
$sqlSetor = $dbd->query($sql2);
// pegar nome equipamento antigo
$sql3 = "select * from peca where id_peca = $idequipamento ";
$sqlEquipamento = $dbd->query($sql3);
// $sqll = "select * from cliente where id_Cliente = $idcliente ";
// $sqlEquipamento = $dbd->query($sqll);

// pegar setores 
$sql = "select * from setores ORDER BY id_setor ASC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from setores")->num_rows;
$pages = ceil($total / $perPage);
$rows = $dbd->query($sql);
?>
</head>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">
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

                    <center>
                        <h1>O que quer fazer ?</h1>
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

                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                                <th>1</th>
                                <td class="col-md-10">Dados do equipamento</td>

                                <td><a href="../equipamentos/equipamento_visualizar.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                                <th>2</th>
                                <td class="col-md-10">Gerar Nova Ordem de Serviço</td>

                                <td><a href="OS_cadastrar.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                                <th>3</th>
                                <td class="col-md-10">Ordem de Serviço Executadas</td>

                                <td><a href="OS_executadas/OS_opcoes_executadas.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" value="<?php echo $row['id_setor'] ?>" class="marcar" name="idsClientes[]"></td>
                                <th>4</th>
                                <td class="col-md-10">Ordem de Serviço Pendente</td>

                                <td><a href="OS_listar_pendentes_filtro.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" class="btn btn-success">Entrar</a></td>
                            </tr>

                        </tbody>

                    </table>


            </div>

        </div>
        <a href="../equipamentos/equipamento_por_setor.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>" style="float:left;" class="btn btn-info">Voltar</a>

    </div>

</body>

<?php include '../footer/footer.php'; ?>