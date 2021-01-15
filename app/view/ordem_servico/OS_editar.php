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
$id = (int)$_GET['idos'];
$idequipamento = (int)$_GET['equipamento'];
$idsetor = (int)$_GET['setor'];
$idcliente = (int)$_GET['cliente'];
$sqll = "select * from os where idOS = $id ";
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
            <h2>Editar OS</h2>

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
                            <label for="lastName">Numero</label>
                            <input type="text" name="idOS" class="form-control" disabled value="<?php echo $row['idOS'] ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="lastName">NPART</label>
                            <input type="text" name="NPART" class="form-control" value="<?php echo $row['NPART'] ?>">
                        </div>
                        
                        <!-- <div class="col-md-6 mb-3">
                            <label for="lastName">Obs</label>
                            <input type="text" name="Obs" class="form-control" value="<?php echo $row['Obs'] ?>">
                        </div> -->
                        <!-- <div class="col-md-6 mb-3" >
                            <label for="exampleFormControlSelect1" >Status</label>
                            <select class="form-control" name="Status">
                                <option value="Aprovado">Aprovado</option>
                                <option value="Em Analise">Em Analise</option>
                                <option value="Reprovado">Reprovado</option>
                            </select>
                        </div> -->

                        

                        <div class="col-md-6 mb-3">
                            <label for="lastName">Modelo</label>
                            <input type="text" name="Modelo" class="form-control" value="<?php echo $row['Modelo'] ?>">
                        </div>

                    </div>

                    <div class="mb-3">

                        <input type="submit" style="float:right;" value="Cadastrar" class="btn btn-success" class="entrar" >

                        <a href="OS_listar_pendentes_filtro.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" style="float:left;" class="btn btn-info">Voltar</a>
                    </div> 





                    <!-- <div class="mb-3">
                        <label for="username">Ano</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input type="text" class="form-control" name="Tamanho" value="<?php echo $row['Ano'] ?>">
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

                    <div class="mb-3">

                        <input type="submit" style="float:right;" value="Cadastrar" class="btn btn-success" class="entrar">

                        <a href="equipamento_por_setor.php?cliente=<?php echo $idcliente; ?>&setor=<?php echo $idsetor; ?>" style="float:left;" class="btn btn-info">Voltar</a>
                    </div> -->

                </form>
                <!-- </div> -->
            </div>

        </div>

    </div>


</body>

</html>

<?php include '../footer/footer.php'; ?>

<?php
if (isset($_POST['NPART'])) {



    $idOS = (int)$_GET['idos'];
    $NPART = addslashes($_POST['NPART']);
    $Modelo = addslashes($_POST['Modelo']);
    // $Obs = addslashes($_POST['Obs']);


    //verificando se todos os campos nao estao vazios
    if (
        !empty($idOS) && !empty($NPART) && !empty($Modelo)
    ) {

        $u->conectar("u558134221_esterilavos", "127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");  //Conectando ao banco de dados
        if ($u->msgErro == "") //conectado normalmente;
        {

            if ($u->updateOS($idOS, $NPART, $Modelo)) {
            }
        } else {
            echo "Erro: " . $u->msgErro;
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>