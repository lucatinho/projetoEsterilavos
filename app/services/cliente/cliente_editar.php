<?php include '../../view/header/header_nav.php'; ?>

<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../../login.php");
    exit;
}
include_once "../../../conexao.php";
require_once '../../../classes/usuarios.php';
include '../../../db.php';
$u = new Usuario;
$id = (int)$_GET['id'];

$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $id";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados['Nome'];


$sqll = "select * from cliente where id_Cliente = $id ";
$rows = $dbd->query($sqll);

?>



<body class="bg-light">
    <div class="container">

        <div class="py-5 text-center">
            <div class="row" style="margin-top: 70px;">
                <div class="col-md-10 col-md-offset-1">
                    <!-- <img src="../../../imgs/a.png" alt="some text" width=240 height=120> -->
                    <h2>Editar Cliente</h2>

                </div>
            </div>
        </div>


        <?php $row = $rows->fetch_assoc() ?>


        <div class="col-md-8 order-md-1">
            <h4 class="mb-3"></h4>
            <form class="needs-validation" novalidate method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nome</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $row['Nome'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lastName">Cidade</label>
                        <input type="text" name="Cidade" class="form-control" value="<?php echo $row['Cidade'] ?>">
                    </div>
                </div>



                <div class="mb-3">
                    <label for="email">Endereço<span class="text-muted"></span></label>
                    <input type="email" class="form-control" name="Endereco" value="<?php echo $row['Endereco'] ?>">
                </div>

                <div class="mb-3">
                    <label for="address">UF</label>
                    <input type="text" class="form-control" name="Uf" value="<?php echo $row['Uf'] ?>">

                </div>

                <div class="mb-3">
                    <label for="address2">Solicitante<span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="address2" name="Solicitante" value="<?php echo $row['Solicitante'] ?>">
                </div>




                <a href="../../../index.php">
                    <input type="submit" style="float:right;" value="Confirmar" class="btn btn-success" class="entrar">
                </a>

                <a href="../../../index.php" style="float:left;" class="btn btn-info">Voltar</a>

                <br>
            </form>
            </h4>
        </div>

    </div>


</body>
<!-- rodape -->
<?php include '../../view/footer/footer.php'; ?>


<?php
if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $Endereco = addslashes($_POST['Endereco']);
    $Cidade = addslashes($_POST['Cidade']);
    $Uf = addslashes($_POST['Uf']);
    $Solicitante = addslashes($_POST['Solicitante']);
    // $Equipamento = addslashes($_POST['Equipamento']);
    // $Setor = addslashes($_POST['Setor']);

    $id = (int)$_GET['id'];


    //verificando se todos os campos nao estao vazios
    if (
        !empty($nome) && !empty($Endereco) && !empty($Cidade) && !empty($Solicitante)
        && !empty($id)
    ) {
        $u->conectar("u558134221_esterilavos", "127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");  //Conectando ao banco de dados 
                            if ($u->msgErro == "") //conectado normalmente;
                            {

                                                if ($u->updateC($id, $nome, $Endereco, $Cidade, $Uf, $Solicitante)) {
                                                } else {
                                                    echo "Email já cadastrado";}
                            } else {
                                echo "Erro: " . $u->msgErro;}
    } else {
        echo "Preencha todos os campos!";
    }
    
}
?>
