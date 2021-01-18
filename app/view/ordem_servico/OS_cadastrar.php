<?php include '../header/header_nav.php'; ?>

<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
  $_SESSION['msg'] = "Área restrita";
  header("../../../Location: login.php");
  exit;
}
include_once "../../../conexao.php";
require_once '../../../classes/usuarios.php';
include '../../../db.php';
$u = new Usuario;
// pegar da url valores
$id = (int)$_GET['cliente'];
$idsetor = (int)$_GET['setor'];
$idequipamento = (int)$_GET['equipamento'];
$Status = 'Em Analise';

$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');
// pegar nome cliente
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $id";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados['Nome'];
// pegar nome setor
$sql2 = "SELECT nomeSetor FROM setores WHERE id_setor = $idsetor";
$resultado2 = mysqli_query($connection, $sql2);
$dados2 = mysqli_fetch_assoc($resultado2);
$NomeSetor = $dados2['nomeSetor'];
// pegar nome equipamento
// $sql3 = "SELECT Nome FROM peca WHERE id_peca = $idequipamento";
// $resultado = mysqli_query($connection, $sql3);
// $dados = mysqli_fetch_assoc($resultado);
// $NomeEquipamento = $dados['Nome'];

// pegar nome equipamento tabela nova
$sql3 = "SELECT modelo FROM pecac WHERE id_peca = $idequipamento";
$resultado = mysqli_query($connection, $sql3);
$dados = mysqli_fetch_assoc($resultado);
$NomeEquipamento = $dados['modelo'];

$sqll = "SELECT * FROM pecac ORDER BY id_peca  ;";
$rows = $dbd->query($sqll);


//index.php

// $connect = new PDO("mysql:host=127.0.0.1:3306;dbname=u558134221_esterilavos", "u558134221_esterilavos", "Q*sçxyym34y5$");
// function fill_unit_select_box($connect)
// {
//   $output = '';
//   $query = "SELECT * FROM pecac ";
//   $statement = $connect->prepare($query);
//   $statement->execute();
//   $result = $statement->fetchAll();
//   foreach ($result as $row) {
//     $output .= '<option value="' . $row["Nome"] . '">' . $row["Nome"] . '</option>';
//   }
//   return $output;
// }


?>


<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center" style="margin-top: 80px;">
      <!-- <br> -->

      <!-- <input type=image src="imgs/a.png" width="240" height="120"> -->
      <h2>Ordem de Serviço</h2>

    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Qrcode</span>

        </h4>
        <ul class="list-group mb-3">
          <!-- cliente -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Cliente : <?php echo $NomeC ?></h6>
            </div>
            <span name="id_OsCliente" value="<?php echo $id; ?>" class="text-muted">ID:<?php echo $id; ?></span>
          </li>
          <!-- setor -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Setor : <?php echo $NomeSetor ?></h6>
            </div>
            <span name="idsetor" value="<?php echo $idsetor; ?>" class="text-muted">ID:<?php echo $idsetor; ?></span>
          </li>
          <!-- equipamento -->
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Equipamento : <?php echo $NomeEquipamento ?></h6>
            </div>
            <span name="idequipamento" value="<?php echo $idequipamento; ?>" class="text-muted">ID:<?php echo $idequipamento; ?></span>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <img class="d-block mx-auto mb-4" src="<?php echo $aux; ?>" alt="">
            </div>

          </li>
        </ul>


        <form class="card p-2">
          <div class="input-group">
            <input style="z-index: 0;" type="text" class="form-control" id="texto" value="ID:<?php echo $id; ?>" disabled="">
            <div class="input-group-append">
              <button style="z-index: 0;" type="submit" id="botao" class="btn btn-secondary">Gerar Qrcode</button>
            </div>
          </div>

        </form>
        <br>

        <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
          <!-- <div class="card p-2">
            <form method="post" id="insert_form">
              <div class="table-repsonsive">
                <span id="error"></span>
                <table class="table table-bordered" id="item_table">
                  <tr>
                    <th width="20%">QTD.</th>
                    <th width="45%">Peca</th>
                    <th width="20%"><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus">+</span></button></th>
                  </tr>
                </table>
                <div align="center">
                  <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                </div>
              </div>
            </form>

          </div> -->
      </div>


      <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script type="text/javascript">
        $('#botao').click(function(e) {
          e.preventDefault();
          var texto = $('#texto').val();
          var nivel = $('#nivel').val();
          var pixels = $('#pixels').val();
          var tipo = $('input[name="img"]:checked').val();
          if (texto.length == 0) {
            alert('Informe um texto');
            return (false);
          }

          $('img').attr('src', '../../../qr_img0.50j/php/qr_img.php?d=' + texto + '&e=' + nivel + '&s=' + pixels + '&t=' + tipo);
        });

        $(document).ready(function() {
          $('.mdb-select').materialSelect();
        });
      </script>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3"></h4>

        <div class="row">

          <div class="col-md-6 mb-3">
            <label for="exampleFormControlSelect1">Tipo OS</label>
            <select class="form-control" name="tipo">
              <option value="t01">Tipo 1</option>
              <option value="t02">Tipo 2</option>
              <option value="t03">Tipo 3</option>
            </select>
          </div>

          <div class="col-md-4 mb-3">

            <label for="exampleFormControlSelect1">MÊS</label>
            <select class="form-control" name="mes">
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
            <select class="form-control" name="ANO">
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
          </div>

        </div>

        <div class="mb-3">
          <label for="lastName">AUTOCLAVE Nº</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input style="z-index: 0;" type="text" name="Autocalve" class="form-control">
          </div>
        </div>

        <div class="mb-3">
          <label for="lastName">AUTOCLAVE NºSÉRIE</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input style="z-index: 0;" type="text" name="AutocalveNS" class="form-control">
          </div>
        </div>


        <div class="mb-3">
          <label for="username">Modelo</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input style="z-index: 0;" type="text" class="form-control" name="Modelo">
          </div>
        </div>

        <div class="mb-3">
          <label>Ano de fabrica <span class="text-muted"></span></label>
          <input class="form-control" maxlength="4" name="AnoFabrica">
        </div>

        <div class="mb-3">
          <label for="address">NºPART</label>
          <input type="text" class="form-control" name="Npt">
        </div>



        <div class="mb-3">
          <label for="address2">Observações<span class="text-muted"></span></label>
          <input type="text" class="form-control" id="address2" name="obs" placeholder="">
        </div>

        <!-- <div class="card p-2">
          <div class="mb-3">
            Adicionar fotos:
            <br>
            <input type="file" required name="arquivo">
          </div>
        </div> -->
        <hr>
        <input type="submit" value="Finalizar" style="float:right;" class="btn btn-success" class="entrar">


        <a href="OS_tipo.php?cliente=<?php echo $id; ?>&setor=<?php echo $idsetor; ?>&equipamento=<?php echo $idequipamento; ?>" style="float:left;" class="btn btn-info">Voltar</a>
      </div>
    </div>
    <hr class="mb-4">


    </form>
  </div>



  </div>



  <?php

  if (isset($_POST['Modelo'])) {

    // echo $Status;

    $ANO = addslashes($_POST['ANO']);
    $AnoFabrica = addslashes($_POST['AnoFabrica']);
    // $AutoCN = addslashes($_POST['AutoCN']);
    // $AutoCS = addslashes($_POST['AutoCS']);
    // $DATA = addslashes($_POST['DATA']);
    $id_OsCliente = (int)$_GET['cliente'];
    // $img = addslashes($_POST['img']);
    $MES = addslashes($_POST['mes']);
    $Modelo = addslashes($_POST['Modelo']);
    // $NPART = addslashes($_POST['NPART']);
    $obs = addslashes($_POST['obs']);
    $Status = addslashes($Status);
    $tipo = addslashes($_POST['tipo']);
    $fk_id_peca = (int)$_GET['equipamento'];



    //verificando se todos os campos nao estao vazios
    if (
      !empty($ANO) && !empty($AnoFabrica) && !empty($id_OsCliente) && !empty($MES) && !empty($Modelo)
      && !empty($obs) && !empty($Status) && !empty($tipo) && !empty($fk_id_peca)
    ) {
      $u->conectar("u558134221_esterilavos", "127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$"); //Conectando ao banco de dados 
      if ($u->msgErro == "") //conectado normalmente;
      {

        // if ($u->cadastrarOS($idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs, $novo_nome, $TOS, $mes, $anos)) {
        if ($u->cadastrarOS($ANO, $AnoFabrica, $id_OsCliente, $MES, $Modelo, $obs, $Status, $tipo, $fk_id_peca)) {

          // echo "aaaaaa";
        }
      } else {
        echo "Erro: " . $u->msgErro;
      }
    } else {
      echo "Preencha todos os campos!";
    }
  }

  ?>