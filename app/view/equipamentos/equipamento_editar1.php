<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
    exit;
}
include_once "../../../conexao.php";
require_once '../../../classes/usuarios.php';
include '../../../db.php';
$u = new Usuario;
$id = (int)$_GET['idequipamento'];
$idsetor = (int)$_GET['idsetor'];
$idcliente = (int)$_GET['idcliente'];
$sqll = "select * from peca where id_peca = $id ";
$rows = $dbd->query($sqll);
?>

<?php include '../header/header_nav.php'; ?>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center" style="margin-top: 80px;">
            <!-- <div class="row" style="margin-top: 80px;"> -->
            <!-- <div class="col-md-10 col-md-offset-1"> -->

            <!-- <img src="../../../imgs/a.png" alt="some text" width=250 height=120> -->
            <h2>Editar Peça</h2>

        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">

            </div>


            <!-- tamanho dos campos -->
            <div class="col-md-10 order-md-1">


                <?php $row = $rows->fetch_assoc() ?>
                <form class="needs-validation" novalidate method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Nome</label>
                            <input type="text" name="Nome" class="form-control" value="<?php echo $row['Nome'] ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="lastName">Numero Serie</label>
                            <input type="text" name="NumeroS" class="form-control" value="<?php echo $row['NumeroS'] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Tamanho</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" name="Tamanho" value="<?php echo $row['Tamanho'] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Cor</label>
                        <input type="text" class="form-control" name="Cor" value="<?php echo $row['Cor'] ?>">

                    </div>

                    <div class="mb-3">
                        <label for="email">Marca<span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="Marca" value="<?php echo $row['Marca'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email">Tipo<span class="text-muted"></span></label>
                        <input type="email" class="form-control" name="Tipo" value="<?php echo $row['Tipo'] ?>">
                    </div>

                    <div class="mb-3" >

                        <input type="submit" style="float:right;" value="Cadastrar" class="btn btn-success" class="entrar">

                        <a href="equipamento_por_setor.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>" style="float:left;" class="btn btn-info">Voltar</a>
                    </div>
                    
                </form>
                <!-- </div> -->
            </div>

        </div>

    </div>


</body>

</html>

<?php include '../footer/footer.php'; ?>

<?php
if (isset($_POST['Nome'])) {

    $Nome = addslashes($_POST['Nome']);
    $NumeroS = addslashes($_POST['NumeroS']);
    $Tamanho = addslashes($_POST['Tamanho']);
    $Cor = addslashes($_POST['Cor']);
    $Marca = addslashes($_POST['Marca']);
    $Tipo = addslashes($_POST['Tipo']);
    $id = (int)$_GET['idequipamento'];



    //verificando se todos os campos nao estao vazios
    if (!empty($Nome) && !empty($NumeroS) && !empty($Tamanho) && !empty($Cor)
        && !empty($Marca) && !empty($Tipo) && !empty($id)) {

        $u->conectar("u558134221_esterilavos", "127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");  //Conectando ao banco de dados
        if ($u->msgErro == "") //conectado normalmente;
        {

            if ($u->upPC($id, $Nome, $NumeroS, $Tamanho, $Cor, $Marca, $Tipo)) {
               
            }
        } else {
            echo "Erro: " . $u->msgErro;
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>