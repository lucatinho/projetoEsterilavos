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

$idcliente = (int)$_GET['cliente'];
$idsetor = (int)$_GET['setor'];
$idequipamento = (int)$_GET['equipamento'];
$ano = (int)$_GET['ano'];
$mes = (int)$_GET['mes'];
$tipo = (int)$_GET['tipo'];
$tipoformatado = "t0{$tipo}";

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// filtro para pegar so desativados 
// $sql = "select * from cliente where desativado = 1 ORDER BY id_Cliente DESC limit " . $start . " , " . $perPage . " ;";
// $total = $dbd->query("select * from cliente")->num_rows;
// $pages = ceil($total / $perPage);

$sql = "select * from os where Status = 'Em Analise' && id_OsCliente = $idcliente && ANO = $ano && MES = $mes && tipo= '$tipoformatado' && fk_id_peca = $idequipamento ORDER BY idOS DESC ;";
$total = $dbd->query("select * from os")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);

$sql1 = "select * from cliente where id_Cliente = $idcliente ";
$sqlClientes = $dbd->query($sql1);
// pegar nome setor
$sql2 = "select * from setores where id_setor = $idsetor ";
$sqlSetor = $dbd->query($sql2);
// pegar nome equipamento
$sql3 = "select * from pecac where id_peca = $idequipamento ";
$sqlEquipamento = $dbd->query($sql3);
?>


<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">

            <div class="col-md-10 col-md-offset-1">
                <table class="table">
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
                    <br>
                    <th>Ano: <?=  $ano ?></th>
                    <th>Mês: <?=  $mes ?></th>
                    </table>

                    <div class="col-md-12 text-center">
                        <?php
                        $png = 1;
                        ?>
                        <!-- <form action="clientes_desativados_search.php?id=<?php echo $png ?>" method="post" class="form-group">
                            <input type="text" placeholder="Buscar" name="search" class="form-control">
                        </form> -->
                    </div>

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th><input type="checkbox" name="sn" onclick="marcarTodos(this.checked);"></th>
                                <th>ID.</th>
                                <!-- <th>Nome</th> -->
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Mes</th>
                                <th>Ano</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $rows->fetch_assoc()) : ?>

                                    <tr>

                                        <td><input type="checkbox" value="<?php echo $row['idOS'] ?>" class="marcar" name="idsClientes[]"></td>

                                        <th><?php echo $row['idOS'] ?></th>

                                        <!-- <td class="col-md-10"><?php echo $row['id_OsCliente'] ?> </td> -->
                                        <td class="col-md-10"><?php echo $row['Status'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['tipo'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['MES'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['ANO'] ?> </td>

                                        <td><a href="OS_editar.php?idos=<?= $row['idOS']; ?>&setor=<?php echo $idsetor; ?>&cliente=<?php echo $idcliente; ?>&equipamento=<?php echo $idequipamento; ?>&ano=<?php echo $ano; ?>&mes=<?php echo $mes; ?>&tipo=<?php echo $tipo; ?>" class="btn btn-info">Editar</a></td>

                                    </tr>

                            <?php endwhile; ?>

                        </tbody>
                        
                    </table>

                  
            </div>
            
        </div>
        <a href="OS_listar_pendentes_filtro.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>
</body>

<?php include '../footer/footer.php'; ?>