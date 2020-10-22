<?php
$testo = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json');
$dati = json_decode($testo, true);
$indice=count($dati);
$indice--;
$indice_ieri=$indice-1;
$casi_totali=$dati[$indice]['totale_casi'];
$positivi=$dati[$indice]['totale_positivi'];
$guariti=$dati[$indice]['dimessi_guariti'];
$deceduti=$dati[$indice]['deceduti'];
$casi_totali_ieri=$dati[$indice_ieri]['totale_casi'];
$positivi_ieri=$dati[$indice_ieri]['totale_positivi'];
$guariti_ieri=$dati[$indice_ieri]['dimessi_guariti'];
$deceduti_ieri=$dati[$indice_ieri]['deceduti'];
$variazione[0]=$positivi-$positivi_ieri;
$variazione[1]=$guariti-$guariti_ieri;
$variazione[2]=$deceduti-$deceduti_ieri;
for($i=0;$i<3;$i++){
    if($variazione[$i]>0)
        $variazione[$i]="+".$variazione[$i];
}

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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Ripartizione dei <?php echo $casi_totali; ?> Casi Totali in Italia</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-title">I dati saranno aggiornati ogni giorno intorno alle 18</h6>
                    <div class="row">
                      <div class="col-md-auto">
                        <div class="form-group">
                              <label class="bmd-label-floating">Positivi Ieri</label>
                              <input type="text" name="username" value="<?php echo $positivi_ieri;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Positivi ad Oggi</label>
                              <input type="text" name="username" value="<?php echo $positivi;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Variazione Dei Positivi</label>
                              <input type="text" name="username" value="<?php echo $variazione[0];?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Deceduti Ieri</label>
                              <input type="text" name="username" value="<?php echo $deceduti_ieri;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Deceduti ad Oggi</label>
                              <input type="text" name="username" value="<?php echo $deceduti;?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Variazione Dei Deceduti</label>
                              <input type="text" name="username" value="<?php echo $variazione[2];?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Guariti Ieri</label>
                          <input type="text" name="username" value="<?php echo $guariti_ieri;?>" class="form-control" disabled>
                        </div>
                      </div>
                        <div class="col-md-auto">
                        <div class="form-group">
                          <label class="bmd-label-floating">Guariti ad Oggi</label>
                          <input type="text" name="username" value="<?php echo $guariti;?>" class="form-control" disabled>
                        </div>
                      </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                              <label class="bmd-label-floating">Variazione Dei Guariti</label>
                              <input type="text" name="username" value="<?php echo $variazione[1];?>" class="form-control" disabled>
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