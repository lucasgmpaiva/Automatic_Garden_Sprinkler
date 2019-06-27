<!DOCTYPE HTML>
<?php
include_once('connection.php');
$query="SELECT volumeAgua FROM Agua LIMIT 90";
$result=mysqli_query($con,$query);
$queryUmidade="SELECT porcentagemSolo FROM Umidade LIMIT 60";
$resultUmidade=mysqli_query($con,$queryUmidade);
if($result === FALSE || $resultUmidade === FALSE) { 
   die(mysqli_error());
}
?>

<?php
    $arr = array();
    while ($rows=mysqli_fetch_assoc($result)) {
            $arr[] = $rows;
            $res = array();
            foreach($arr as $res[]) {
            }
    }
    $arrUmidade = array();
    while ($rows=mysqli_fetch_assoc($resultUmidade)) {
            $arrUmidade[] = $rows;
            $resUmidade = array();
            foreach($arrUmidade as $resUmidade[]) {
            }
    }
?>
<script>
    var array = [];
    var arrayUmidade = [];
    array = <?php echo json_encode($res)?>;
    arrayUmidade = <?php echo json_encode($resUmidade)?>;

</script>

<html lang="pt-br"><head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Highcharts Example</title>

        <style type="text/css">
    #container {
      min-width: auto;
      max-width: auto;
      height: auto;
      margin: 0 auto
    }
    #containerSolo {
    min-width: auto;
    max-width: auto;
    height: auto;
    margin: 0 auto
    }
        </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Página Web para exibir gráficos dos níveis calculados pelo Raspberry Pi">
  <meta name="author" content="Lucas e Marco">

  <title>Automatic Garden Sprinkler</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <link href="css/dashboard.css" rel="stylesheet">

<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body id="page-top">
  <script src="../../code/highcharts.js"></script>
  <script src="../../code/modules/series-label.js"></script>
  <script src="../../code/modules/exporting.js"></script>
  <script src="../../code/modules/export-data.js"></script>
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Automatic Garden Sprinkler</a>
    <img src="img/logo.png" alt="Smiley face" height="42" width="42"> 
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
        </ol>

        <!-- Água -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Consumo de Água</div>
          <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <div id="container"></div>
              <script type="text/javascript">
                      Highcharts.chart('container', {

                      title: {
                          text: 'Water Consumption'
                      },

                      yAxis: {
                          title: {
                              text: 'Number of Employees'
                          }
                      },
                      legend: {
                          layout: 'vertical',
                          align: 'right',
                          verticalAlign: 'middle'
                      },

                      plotOptions: {
                          series: {
                              label: {
                                  connectorAllowed: false
                              },
                              pointStart: 2010
                          }
                      },

                      series: [{
                          name: 'Installation',
                          data: [0, parseInt(array[0]['volumeAgua']), parseInt(array[1]['volumeAgua']), parseInt(array[2]['volumeAgua'])]
                      }],

                      responsive: {
                          rules: [{
                              condition: {
                                  maxWidth: 500
                              },
                              chartOptions: {
                                  legend: {
                                      layout: 'horizontal',
                                      align: 'center',
                                      verticalAlign: 'bottom'
                                  }
                              }
                          }]
                      }

                  });
              </script>
          </div>
        </div>

        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Nível de Atividade</div>
          <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
           <div id="containerSolo"></div>
        <script type="text/javascript">
            Highcharts.chart('containerSolo', {

            title: {
                text: 'Soil humidity'
            },

            yAxis: {
                title: {
                    text: '%'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Installation',
                data: [0, parseInt(arrayUmidade[0]['porcentagemSolo']), parseInt(arrayUmidade[1]['porcentagemSolo']), parseInt(arrayUmidade[2]['porcentagemSolo'])]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

            });
        </script>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

</body></html>