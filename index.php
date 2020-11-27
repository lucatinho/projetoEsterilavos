<!DOCTYPE html>

<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include 'db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// filtro para pegar so ativos 
$sql = "select * from cliente where desativado = 0 ORDER BY id_Cliente DESC limit " . $start . " , " . $perPage . " ;";
$total = $dbd->query("select * from cliente")->num_rows;
$pages = ceil($total / $perPage);

$rows = $dbd->query($sql);

?>


<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=6, shrink-to-fit=no">
    <link rel="stylesheet" href="css/menud.css?2">

    <link rel="stylesheet" href="css/rodape.css?2">

    <script src="https://code.jquery.com/jquery-3.5.0.js?12312"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js?12312"></script>


    <meta charset="utf-8">

    <title>Cadastrar Cliente</title>
    <nav>
        <div class="logo">Esterilav</div>
        <label for="btn" class="icon">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </label>
        <input type="checkbox" id="btn">
        <ul>
            <li><a href="Dashboard.php">Home</a></li>
            <li>
                <label for="btn-1" class="show">Cliente</label>
                <a href="#" class="class">Cliente</a>
                <input type="checkbox" id="btn-1">
                <ul>
                    <li><a href="cadastrar.php">Cadastrar</a></li>
                    <li><a href="index.php">Cadastrados</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="show">Peças</label>
                <a href="#">Peças</a>
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="Cpeca.php">Cadastrar</a></li>
                    <li><a href="Lpeca.php">Cadastrados</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="show">Funcionário</label>
                <a href="#">Funcionário</a>
                <input type="checkbox" id="btn-3">
                <ul>
                    <li><a href="Fun.php">Cadastrar</a></li>
                    <li><a href="Lfun.php">Cadastrados</a></li>
                </ul>
            </li>
            <li><a href="#">Sair</a></li>
        </ul>
    </nav>

    <link href="css/bootstrap.css?2" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- <link href="form-validation.css?2" rel="stylesheet"> -->

    <title>ESTERILAV OS</title>
</head>
<!-- <link href="form-validation.css?2" rel="stylesheet"> -->
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css?2">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row" style="margin-top: 80px;">
            <div class="col-md-10 col-md-offset-1">

                <center>
                    <h1>Clientes</h1>
                </center>


                <table class="table">
                    <a style="float:left; margin-top:20px;" class="btn btn-info" href="cadastrar.php"> Cadastrar Cliente</a>
                    <br><br>
                    <hr>

                    <!-- Modal -->
                    <div class="col-md-12 text-center">

                        <?php
                        $png = 1;
                        ?>

                        <script type="text/javascript">
                            function marcarTodos(marcardesmarcar) {
                                $('.marcar').each(function() {
                                    this.checked = marcardesmarcar;
                                });
                            }

                            function confirmacao(id) {
                                var resposta = confirm("Deseja remover esse registro?");
                                if (resposta == true) {
                                    window.location.href = "app/services/desativa_cliente.php?id=<?php echo $row['id_cliente']; ?>";
                                }
                            }
                        </script>

                        <form action="search.php?id=<?php echo $png ?>" method="post" class="form-group">
                            <input type="text" placeholder="Buscar" name="search" class="form-control">
                        </form>
                    </div>

                    <form action="deleteSelecionados.php" method="POST">
                        <table class="table table-hover">
                            <!-- <input type="submit" name="btnapgselc" class="btn btn-danger" value="Deletar Selecionados"></a> -->
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
                                    <!-- clicar em cliente  -->
                                    <script>
                                        function executaAcao(idCliente) {
                                            window.location = "http://localhost/projetoEsterilavos/app/view/setores/lista_setores.php?id="+idCliente;
                                        }
                                    </script>

                                    <tr onclick="executaAcao(<?= $row['id_Cliente']; ?>)">

                                        <td><input type="checkbox" value="<?php echo $row['id_Cliente'] ?>" class="marcar" name="idsClientes[]"></td>

                                        <th><?php echo $row['id_Cliente'] ?></th>

                                        <td class="col-md-10"><?php echo $row['Nome'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Endereco'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Cidade'] ?> </td>
                                        <td class="col-md-10"><?php echo $row['Uf'] ?> </td>

                                        <td><?php echo "<a onClick=\"javascript: return confirm('Deseja realmente Deletar');\" href='delete.php?id=" . $row['id_Cliente'] . "' class='btn btn-danger'>Apagar</a>"; ?></td>
                                        <td><a href="editarC.php?id=<?= $row['id_Cliente']; ?>" class="btn btn-info">Editar</a></td>

                                    </tr>
                                <?php endwhile; ?>

                            </tbody>
                        </table>
                    </form>

                    <!-- css trash -->
                    <style type="text/css">
                        #trash {
                            float: right;
                        }
                    </style>

                    <!-- img trash -->
                    <a href="app\view\clientes\clientes_desativados.php">
                        <img src="imgs/trash.png" width=40 height=40 id="trash">
                    </a>

                    <center>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>


                                <li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>

                            <?php endfor; ?>
                        </ul>
                    </center>

            </div>
        </div>
    </div>

</body>


<div class="mt-5 pt-2 pb-1 footer" style="position:absolute;">
    <div class="about-company">
        <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
            52.119.963/0001-02 </p>
        <p style="text-align:center; font-size:12px;" class="text-white-50"><small>Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
    </div>
</div>


</html>