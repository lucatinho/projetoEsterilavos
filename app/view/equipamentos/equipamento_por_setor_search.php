<!DOCTYPE html>
<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include '../../../db.php';

if (isset($_POST['search'])) {

    $name = htmlspecialchars($_POST['search']);

    $sql = "select * from peca where Nome like '%$name%' ";
    $rows = $dbd->query($sql);
}
$id = (int)$_GET['setor'];
$idCliente = (int)$_GET['cliente'];
?>
<?php include '../header/header_nav.php'; ?>

<title>Buscar Peça</title>

<script type="text/javascript">
    function marcarTodos(marcardesmarcar) {
        $('.marcar').each(function() {
            this.checked = marcardesmarcar;
        });
    }


    function confirmacao(id) {
        var resposta = confirm("Deseja remover esse registro?");
        if (resposta == true) {
            window.location.href = "delete.php?id=<?php echo $row['id_peca']; ?>";
        }
    }
</script>

<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>Buscar</title>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 80px;">
            <div class="col-md-10 col-md-offset-1">
                <center>
                    <h1>Buscar</h1>
                </center>

                <table class="table">

                    <hr><br>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
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
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <form action="equipamento_por_setor_search.php" method="post" class="form-group">

                            <input type="text" placeholder="Buscar" name="search" class="form-control">
                        </form>
                    </div>
                    <?php if (mysqli_num_rows($rows) < 1) : ?>

                        <h2 class="text-danger text-center">
                            Nada encontrado</h2>
                        <a href="equipamento_por_setor.php?id=<?= $idCliente ?>" style="float:left;" class="btn btn-info">Voltar</a>


                    <?php else : ?>
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

                                    <tr>

                                        <td><input type="checkbox" value="<?php echo $row['id_peca'] ?>" class="marcar" name="ids_peca[]"></td>

                                        <th><?php echo $row['id_peca'] ?></th>
                                        <td class="col-md-10"><?php echo $row['Nome'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['NumeroS'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Tamanho'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Cor'] ?> </td>


                                        <td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='equipamento_deletar.php?id=" . $row['id_peca'] . "&idsetor=". $id . "&idcliente=" . $idCliente . "' class='btn btn-danger'>Apagar</a>"; ?></td>

<td><a href="equipamento_editar.php?idequipamento=<?= $row['id_peca']; ?>&idsetor=<?php echo $id; ?>&idcliente=<?php echo $idCliente; ?>" class="btn btn-info">Editar</a></td>
                                    </tr>

                                <?php endwhile; ?>

                            </tbody>

                        </table>
                    <?php endif; ?>

            </div>
        </div>
        <a href="equipamento_por_setor.php?cliente=<?= $idCliente ?>&setor=<?= $id?>" style="float:left;" class="btn btn-info">Voltar</a>
    </div>
</body>
<?php include '../footer/footer.php'; ?>