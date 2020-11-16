<?php
session_start();
if (!empty($_SESSION['id'])) {
} else {
  $_SESSION['msg'] = "Área restrita";
  header("Location: login.php");
  exit;
}

include 'db.php';
require_once 'classes/usuarios.php';
$u = new Usuario;

include_once "conexao.php";

/*-------------------------------------------------------------------------------------------------------------------------------*/
/*-----------------------------CARDS DE INFORMÇOES-----------------------------------------*/

$connection = mysqli_connect("127.0.0.1:3306", "u558134221_esterilavos", "Q*sçxyym34y5$");
$db = mysqli_select_db($connection, 'u558134221_esterilavos');

$sql = "SELECT count(*) as total from os where status ='Aprovado'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$Osaprovadas = $dados['total'];


$sql = "SELECT count(*) as total from os where status ='Em Analise'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$Osanalise = $dados['total'];

$sql = "SELECT count(*) as total from os where status ='Reprovadas'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$Osreprovada = $dados['total'];

/*-------------------------------------------------------------------------------------------------------------------------------*/
/*-----------------------------GRAFICO PIZZA-----------------------------------------*/

$sql = "SELECT count(*) as total from os where tipo ='t01'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$T01 = $dados['total'];

$sql = "SELECT count(*) as total from os where tipo ='t02'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$T02 = $dados['total'];


$sql = "SELECT count(*) as total from os where tipo ='t02'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$T03 = $dados['total'];

$T04 = $T01 + $T02 + $T03;

/*-------------------------------------------------------------------------------------------------------------------------------*/
/*-----------------------------GRAFICO LINHA-----------------------------------------*/
$ano = date('Y');
$mes = date('m');


$sql = "SELECT count(*) as total from os where MES ='01' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m01 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='02' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m02 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='03' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m03 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='04' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m04 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='05' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m05 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='06' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m06 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='07' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m07 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='08' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m08 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='09' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m09 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='10' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m10 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='11' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m11 = $dados['total'];

$sql = "SELECT count(*) as total from os where MES ='12' and ANO = '$ano'";
$resultado = mysqli_query($connection, $sql);
$dados = mysqli_fetch_assoc($resultado);
$m12 = $dados['total'];




?>

<!doctype html>
<html>

<head>

  <meta charset="utf-8">
  <link href="css/dds.css" rel="stylesheet">
  <link rel="stylesheet" href="css/menud.css?2">
  <link rel="stylesheet" href="css/rodape.css?2">

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

<body style="margin-bottom:80px; " id="page-top">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <div id="wrapper">




    <div class="container-fluid">


      <div class="d-sm-flex align-items-center justify-content-between mb-4">

      </div>


      <div style="margin-top:110px;" class="row">



        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lucro Bruto</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $T04 ?>0,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ordem de serviços </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Aprovadas: <?php echo $Osaprovadas ?></div>
                    </div>
                    <div class="col">


                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ordem de serviços</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Em Analise: <?php echo $Osanalise ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ordem de serviços</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Reprovadas: <?php echo $Osreprovada ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>



      <div class="row">


        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Ordem de serviços Mensal </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tipos de Ordem de serviços </h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-success">Preventiva</i>
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-info">Reparativa</i>

                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-primary">Higienização</i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>



      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <script src="js/sb-admin-2.min.js"></script>

      <script src="vendor/chart.js/Chart.min.js"></script>



</body>

<div class="mt-5 pt-2 pb-1 footer" style="position:absolute;">
  <div class="about-company">
    <p style="text-align:center; font-size:12px;" class="text-white-50">ESTERILAV COM. E MANUT. DE EQUIP. HOSP. LTDA-EPP | CNPJ nº
      52.119.963/0001-02 </p>
    <p style="text-align:center; font-size:12px;" class="text-white-50"><small>Copyright © Esterilav. (Lei 9610 de 19/02/1998)</small></p>
  </div>
</div>


</html>

<script>
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'],


      datasets: [{
        label: "Ordem de serviços",
        lineTension: 0.5,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: ['<?php echo $m01 ?>', '<?php echo $m02 ?>', '<?php echo $m03 ?>', '<?php echo $m04 ?>', '<?php echo $m05 ?>', '<?php echo $m06 ?>', '<?php echo $m07 ?>', '<?php echo $m08 ?>', '<?php echo $m09 ?>', '<?php echo $m10 ?>', '<?php echo $m11 ?>', '<?php echo $m12 ?>'],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return 'OS:' + number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });


  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Higienização", "Preventiva ", "Reparativa"],
      datasets: [{
        data: [<?php echo "$T01" ?>, <?php echo "$T02" ?>, <?php echo "$T03" ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
</script>