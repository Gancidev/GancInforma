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
$testo = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale-latest.json');
$dati = json_decode($testo, true);
$ricoverati_con_sintomi=$dati[0]['ricoverati_con_sintomi'];
$terapia_intensiva=$dati[0]['terapia_intensiva'];
$isolamento_domiciliare=$dati[0]['isolamento_domiciliare'];
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>GanciInforma</title>
    <meta content="Sito informativo sulla situazione pandemica italiana" name="description">
    <meta content="COVID, Informazione, Italia" name="keywords">
    <meta content="GanciDev" name="author">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
  <body>
    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
    <!-- ======= Header ======= -->
    <header id="header">
      <div class="d-flex flex-column">
        <div class="profile">
          <img src="assets/img/profile-img.png" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="index.html">GanciDev</a></h1>
          <div class="social-links mt-3 text-center">
            <a href="https://www.facebook.com/giusganci/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/giuseppe.ganci4/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.linkedin.com/in/giuseppe-g/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
        <nav id="navbar" class="nav-menu navbar">
          <ul>
            <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
            <li><a href="#numeri" class="nav-link scrollto"><i class="bx bxs-file"></i> <span>Numeri In Italia</span></a></li>
            <li><a href="#stato" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Stato Dei Positivi</span></a></li>
            <li><a href="#ripartizione" class="nav-link scrollto"><i class="bx bx-book-reader"></i> <span>Ripartizione per Regioni</span></a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
      <div class="hero-container" data-aos="fade-in">
        <h1>GancInforma</h1>
        <p>Noi Siamo <span class="typed" data-typed-items="Informazione"></span>
        <br>
        <font size="-0.5"> Aggiornamento Giornaliero intorno alle 18 </font>
        <br> 
        <font size="-0.5"> Fonte: Protezione Civile </font>
      </p>
      </div>
    </section><!-- End Hero -->
    <main id="main" style="min-height: 930px;background: lavender;">
      <!-- ======= Sezione Numeri Generali ======= -->
      <section id="numeri" class="facts">
        <div class="container">
          <div class="section-title">
            <h2>Numeri In Italia</h2>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
              <div class="count-box">
                <i class="bi bi-patch-plus"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $positivi;?>" data-purecounter-duration="1" class="purecounter"></span>
                <span style="font-size: 24px;"><?php echo $variazione[0];?> <font size="-1">(con riferimento a ieri)</font></span>
                <p><strong>Positivi</strong></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="count-box">
                <i class="bi bi-emoji-laughing"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $guariti;?>" data-purecounter-duration="1" class="purecounter"></span>
                <span style="font-size: 24px;"><?php echo $variazione[1];?> <font size="-1">(con riferimento a ieri)</font></span>
                <p><strong>Guariti</strong></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="count-box">
                <i class="bi bi-heart"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $deceduti;?>" data-purecounter-duration="1" class="purecounter"></span>
                <span style="font-size: 24px;"><?php echo $variazione[2];?> <font size="-1">(con riferimento a ieri)</font></span>
                <p><strong>Deceduti</strong></p>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Sezione Numeri Generali -->
      <!-- ======= Sezione Stato Casi ======= -->
      <section id="stato" class="facts">
        <div class="container">
          <div class="section-title">
            <h2>Stato dei Positivi</h2>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
              <div class="count-box">
                <i class="bi bi-house-door"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $isolamento_domiciliare;?>" data-purecounter-duration="1" class="purecounter"></span>
                <p style="padding: 15px 0 0 0;"><strong>In Isolamento Domestico</strong></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="count-box">
                <i class="bi bi-building"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $ricoverati_con_sintomi;?>" data-purecounter-duration="1" class="purecounter"></span>
                <p style="padding: 15px 0 0 0;"><strong>Ricoverati Con Sintomi</strong></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="count-box">
                <i class="bi bi-shield-fill-exclamation"></i>
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $terapia_intensiva;?>" data-purecounter-duration="1" class="purecounter"></span>
                <p style="padding: 15px 0 0 0;"><strong>In Terapia Intensiva</strong></p>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Sezione Stato Casi -->

      <?php
        $testo = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json');
        $dati = json_decode($testo, true);
        for($i=0;$i<count($dati);$i++){
            $citta[$i]=$dati[$i]['denominazione_regione'];
            $ca_to[$i]=$dati[$i]['totale_casi'];
            $pos[$i]=$dati[$i]['totale_positivi'];
            $var_pos[$i]=$dati[$i]['variazione_totale_positivi'];
            if($var_pos[$i]>0)
            $var_pos[$i]="+".$var_pos[$i];
            $guar[$i]=$dati[$i]['dimessi_guariti'];
            $dec[$i]=$dati[$i]['deceduti'];
            $rico_con_sin[$i]=$dati[$i]['ricoverati_con_sintomi'];
            $ter_inte[$i]=$dati[$i]['terapia_intensiva'];
            $isol_dom[$i]=$dati[$i]['isolamento_domiciliare'];
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
      ?>
      <!-- ======= Sezione Ripartizione Casi ======= -->
      <section id="ripartizione" class="facts">
        <div class="container">
          <div class="section-title">
            <h2>Ripartizione dei Casi per Regione <a href="<?php echo $url_regione;?>" target="_blank"><i class="bi bi-file-earmark-arrow-down-fill"></i></a></h2>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 d-md-flex align-items-md-stretch" data-aos="fade-up" style="padding-bottom: 15px;">
              <select id="citta" onchange="show_new(this.value)" class="selettore">
                  <option value="Nada">Seleziona una Regione</option>
                  <?php for($i=0;$i<count($citta);$i++){ ?>
                      <option value="<?php echo $i; ?>"><?php echo $citta[$i]; ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <?php for($i=0;$i<count($citta);$i++){ ?>
          <div id="tab<?php echo $i;?>" style="display:none;">
            <div class="row no-gutters">
              <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                <div class="count-box">
                  <i class="bi bi-patch-plus"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $pos[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <span style="font-size: 24px;"><?php echo $var_pos[$i];?> <font size="-1">(con riferimento a ieri)</font></span>
                  <p><strong>Positivi</strong></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="count-box">
                  <i class="bi bi-emoji-laughing"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $guar[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p style="padding: 15px 0 0 0;"><strong>Guariti</strong></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                  <i class="bi bi-heart"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $dec[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p style="padding: 15px 0 0 0;"><strong>Deceduti</strong></p>
                </div>
              </div>
            </div>
            <div class="row no-gutters">
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                <div class="count-box">
                  <i class="bi bi-house-door"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $isol_dom[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p style="padding: 15px 0 0 0;"><strong>In Isolamento Domestico</strong></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="count-box">
                  <i class="bi bi-building"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $rico_con_sin[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p style="padding: 15px 0 0 0;"><strong>Ricoverati Con Sintomi</strong></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="count-box">
                  <i class="bi bi-shield-fill-exclamation"></i>
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo $ter_inte[$i];?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p style="padding: 15px 0 0 0;"><strong>In Terapia Intensiva</strong></p>
                </div>
              </div>
          </div>
          </div>
          <?php } ?>
        </div>
      </section><!-- End Sezione Ripartizione Casi -->





    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>GanciDev</span></strong>
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End  Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>