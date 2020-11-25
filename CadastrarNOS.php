<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
  $_SESSION['msg'] = "Área restrita";
  header("Location: login.php");
  exit;
}
include_once "conexao.php";
require_once 'classes/usuarios.php';
include 'db.php';
$u = new Usuario;
$id = (int)$_GET['cliente'];
$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');
$sql = "SELECT Nome FROM cliente WHERE id_Cliente = $id";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$NomeC = $dados['Nome'];

$sqll = "select * from peca ORDER BY id_peca  ;";
$rows = $dbd->query($sqll);


//index.php

$connect = new PDO("mysql:host=127.0.0.1:3306;dbname=u558134221_esterilavos", "u558134221_esterilavos", "Q*sçxyym34y5$");
function fill_unit_select_box($connect)
{
  $output = '';
  $query = "SELECT * FROM peca ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option value="' . $row["Nome"] . '">' . $row["Nome"] . '</option>';
  }
  return $output;
}


?>

<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="css/menud.css?2">
  <link rel="stylesheet" href="css/rodape.css?2">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cadastrar nova OS</title>
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
        <a>Cliente</a>
        <input type="checkbox" id="btn-1">
        <ul>
          <li><a href="cadastrar.php">Cadastrar</a></li>
          <li><a href="index.php">Cadastrados</a></li>
        </ul>
      </li>

      <li>
        <label for="btn-2" class="show">Peças</label>
        <a>Peças</a>
        <input type="checkbox" id="btn-2">
        <ul>
          <li><a href="Cpeca.php">Cadastrar</a></li>
          <li><a href="Lpeca.php">Cadastrados</a></li>

        </ul>
      </li>


      <li>
        <label for="btn-3" class="show">Funcionário</label>
        <a>Funcionário</a>
        <input type="checkbox" id="btn-3">
        <ul>
          <li><a href="Fun.php">Cadastrar</a></li>
          <li><a href="Lfun.php">Cadastrados</a></li>
        </ul>
      </li>

      <li><a href="sair.php">Sair</a></li>
    </ul>
  </nav>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="/path/to/dist/js/multiple-select.js"></script>
  <link href="form-validation.css?2" rel="stylesheet">
  <meta charset="utf-8">



  <link href="css/bootstrap.css?22" rel="stylesheet">

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
  <link href="form-validation.css?2" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <br>

      <input type=image src="imgs/a.png" width="240" height="120">
      <h2>Ordem de Serviço</h2>

    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Qrcode</span>

        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Cliente : <?php echo $NomeC ?></h6>
            </div>
            <span class="text-muted">ID:<?php echo $id; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <img class="d-block mx-auto mb-4" src="<?php echo $aux; ?>" alt=""> </div>


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
          <div class="card p-2">
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

          </div>
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

          $('img').attr('src', 'qr_img0.50j/php/qr_img.php?d=' + texto + '&e=' + nivel + '&s=' + pixels + '&t=' + tipo);
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
            <select class="form-control" name="TOS">
              <option value="t01">1</option>
              <option value="t02">2</option>
              <option value="t03">3</option>
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
            <label for="exampleFormControlSelect1">ANO</label>
            <input type="text" maxlength="4" name="ano" class="form-control">

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

        <div class="card p-2">
          <div class="mb-3">
            Adicionar fotos:
            <br>
            <input type="file" required name="arquivo">
          </div>
        </div>
        <hr>
        <input type="submit" value="Salvar" style="float:right;" class="btn btn-success" class="entrar">

        <a href="ListarOS.php?id=<?echo $id?>" style="float:center;" class="btn btn-info">Voltar</a>

      </div>
    </div>
    <hr class="mb-4">


    </form>
  </div>
  </div>


  </div>

</body>

<script>
  $(document).ready(function() {

    $(document).on('click', '.add', function() {
      var html = '';
      html += '<tr>';
      html += '<td><input type="text" name="qtd[]" class="form-control item_quantity" /></td>';
      html += '<td><select name="Nome[]" class="form-control item_unit"><option value="">Peça</option><?php echo fill_unit_select_box($connect); ?></select></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus">-</span></button></td></tr>';
      $('#item_table').append(html);
    });

    $(document).on('click', '.remove', function() {
      $(this).closest('tr').remove();
    });

    $('#insert_form').on('submit', function(event) {
      event.preventDefault();
      var error = '';
      $('.Nome').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += "<p>Enter Item Name at " + count + " Row</p>";
          return false;
        }
        count = count + 1;
      });

      $('.qtd').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += "<p>Enter Item Quantity at " + count + " Row</p>";
          return false;
        }
        count = count + 1;
      });

      var form_data = $(this).serialize();
      if (error == '') {
        $.ajax({
          url: "insert.php",
          method: "POST",
          data: form_data,
          success: function(data) {
            if (data == 'ok') {
              $('#item_table').find("tr:gt(0)").remove();
              $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
            }
          }
        });
      } else {
        $('#error').html('<div class="alert alert-danger">' + error + '</div>');
      }
    });

  });
</script>

<?php

if (isset($_FILES['arquivo'])) {

  $TOS = addslashes($_POST['TOS']);
  $anos = addslashes($_POST['ano']);
  $mes = addslashes($_POST['mes']);
  $Autocalve = addslashes($_POST['Autocalve']);
  $AutocalveNS = addslashes($_POST['AutocalveNS']);
  $Modelo = addslashes($_POST['Modelo']);
  $AnoFabrica = addslashes($_POST['AnoFabrica']);
  $Npt = addslashes($_POST['Npt']);
  $obs = addslashes($_POST['obs']);
  $idos = (int)$_GET['id'];


  $msg = false;
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
  $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
  $diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); //efetua o upload








  //verificando se todos os campos nao estao vazios
  if (
    !empty($Autocalve) && !empty($AutocalveNS) && !empty($Modelo) && !empty($AnoFabrica)
    && !empty($Npt) && !empty($obs) && !empty($idos) && !empty($anos) && !empty($mes) && !empty($TOS)
  ) {
    $u->conectar("u558134221_esterilavos", "127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$"); //Conectando ao banco de dados 
    if ($u->msgErro == "") //conectado normalmente;
    {

      if ($u->cadastrarOS($idos, $Autocalve, $AutocalveNS, $Modelo, $AnoFabrica, $Npt, $obs, $novo_nome, $TOS, $mes, $anos)) {
      }
    }
  } else {
    echo "Erro: " . $u->msgErro;
  }
} else {
  echo "Preencha todos os campos!";
}


?>

<div class="mt-5 pt-2 pb-1 footer">
  <div class="about-company">
    <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
      52.119.963/0001-02 </p>
    <p style="text-align:center; font-size:12px;" class="text-white-50"><small>Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
  </div>
</div>

</html>