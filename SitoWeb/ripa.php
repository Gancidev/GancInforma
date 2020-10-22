<?php
$testo = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json');
$dati = json_decode($testo, true);
for($i=0;$i<count($dati);$i++){
    $citta[$i]=$dati[$i]['denominazione_regione'];
    $casi_totali[$i]=$dati[$i]['totale_casi'];
    $positivi[$i]=$dati[$i]['totale_positivi'];
    $variazione_positivi[$i]=$dati[$i]['variazione_totale_positivi'];
    $guariti[$i]=$dati[$i]['dimessi_guariti'];
    $deceduti[$i]=$dati[$i]['deceduti'];
    $ricoverati_con_sintomi[$i]=$dati[$i]['ricoverati_con_sintomi'];
    $terapia_intensiva[$i]=$dati[$i]['terapia_intensiva'];
    $isolamento_domiciliare[$i]=$dati[$i]['isolamento_domiciliare'];
}
$data_url = date("Ymd");
$d=strtotime("Yesterday");
$data_url_ieri=date("Ymd", $d);
$url_oggi="dpc-covid19-ita-scheda-regioni-$data_url.pdf";
$url_ieri="dpc-covid19-ita-scheda-regioni-$data_url_ieri.pdf";
$headers = @get_headers("https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/regioni/$url_oggi");
if(strpos($headers[0],'404') === false){
    $url_regione="https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/regioni/$url_oggi";
}
else{
    $url_regione="https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/regioni/$url_ieri";
}
$url_oggi="dpc-covid19-ita-scheda-province-$data_url.pdf";
$url_ieri="dpc-covid19-ita-scheda-province-$data_url_ieri.pdf";
$headers = @get_headers("https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/province/$url_oggi");
if(strpos($headers[0],'404') === false){
    $url_province="https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/province/$url_oggi";
}
else{
    $url_province="https://github.com/pcm-dpc/COVID-19/raw/master/schede-riepilogative/province/$url_ieri";
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
    <script>
        function show_new() {
            for(var i=0;i<21;i++){
                var x = document.getElementById("tab"+i);
                x.style.display = "none";
            }
            var x = document.getElementById("tab"+arguments[0]);
              if (x.style.display === "none") {
                x.style.display = "block";
              } else {
                x.style.display = "none";
              }
        }
    </script>
</head>
<body class="dark-edition">
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">PDF Riepilogativi</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-title">I dati saranno aggiornati ogni giorno intorno alle 18</h6>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="<?php echo $url_regione; ?>">
                                <input type="button" value="PDF suddivisione per Regione" class="btn btn-facebook">
                            </a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              </div>
          </div> 
        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Dati Dettagliati sulle Regioni</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-title">I dati saranno aggiornati ogni giorno intorno alle 18</h6>
                    <div class="row">
                    <div class="col-md-auto">
                        <div class="form-group">
                            <select id="citta" class="btn btn-facebook" onchange="show_new(this.value)">
                                <option value="Nada">Seleziona una Regione</option>
                                <?php for($i=0;$i<count($citta);$i++){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $citta[$i]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                     <?php for($i=0;$i<count($citta);$i++){ ?>
                        <div id="tab<?php echo $i;?>" style="display:none;">
                            <h4 class="card-title"><b>Positivi e Variazione ad Oggi</b></h4>
                            <div class="row">
                            <div class="col-md-auto">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Positivi</label>
                                  <input type="text" name="username" value="<?php echo $positivi[$i];?>" class="form-control" disabled>
                                </div>
                              </div>
                                <div class="col-md-auto">
                                <div class="form-group">
                                      <label class="bmd-label-floating">Variazione</label>
                                      <input type="text" name="username" value="<?php echo $variazione_positivi[$i];?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-bottom:4px solid #3C4858;">
                            <h4 class="card-title"><b>Guariti e Deceduti ad Oggi</b></h4>
                            <div class="row">
                            <div class="col-md-auto">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Guariti</label>
                                  <input type="text" name="username" value="<?php echo $guariti[$i];?>" class="form-control" disabled>
                                </div>
                              </div>
                                <div class="col-md-auto">
                                <div class="form-group">
                                      <label class="bmd-label-floating">Deceduti</label>
                                      <input type="text" name="username" value="<?php echo $deceduti[$i];?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-bottom:4px solid #3C4858;">
                            <h4 class="card-title"><b>Ripartizione Contagi per Tipologia ad Oggi</b></h4>
                            <div class="row">
                            <div class="col-md-auto">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Ricoverati con Sintomi</label>
                                  <input type="text" name="username" value="<?php echo $ricoverati_con_sintomi[$i];?>" class="form-control" disabled>
                                </div>
                              </div>
                                <div class="col-md-auto">
                                <div class="form-group">
                                      <label class="bmd-label-floating">Terapia Intensiva</label>
                                      <input type="text" name="username" value="<?php echo $terapia_intensiva[$i];?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                <div class="form-group">
                                      <label class="bmd-label-floating">Isolamento Domiciliare</label>
                                      <input type="text" name="username" value="<?php echo $isolamento_domiciliare[$i];?>" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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