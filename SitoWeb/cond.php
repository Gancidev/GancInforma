<?php
$testo = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale-latest.json');
$dati = json_decode($testo, true);
$positivi=$dati[0]['totale_positivi'];
$ricoverati_con_sintomi=$dati[0]['ricoverati_con_sintomi'];
$terapia_intensiva=$dati[0]['terapia_intensiva'];
$isolamento_domiciliare=$dati[0]['isolamento_domiciliare'];
?>
<html lang="it">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ganci
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="material-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>
<body class="dark-edition">
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Condizioni Dei <b><?php echo $positivi;?></b> Positivi</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-title">I dati saranno aggiornati ogni giorno intorno alle 18</h6>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                              <label class="bmd-label-floating">Positivi in isolamento domestico</label>
                              <input type="text" name="username" value="<?php echo $isolamento_domiciliare;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Positivi Ricoverati con sintomi</label>
                              <input type="text" name="username" value="<?php echo $ricoverati_con_sintomi;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Positivi in terapia intensiva</label>
                          <input type="text" name="username" value="<?php echo $terapia_intensiva;?>" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
 </body>
</html>