<?php
    require_once 'backend/tuyaController.php'
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="public/img/sysmax_logo_transp.png" type="image/x-icon">
  <link rel="stylesheet" href="public/css/styles.css">
  <link href='public/boxicons-master/css/boxicons.min.css' rel='stylesheet'>
  <title>Sysmax Tecnología S.A. de C.V.</title>
</head>
  <body>    
    <div class="main-con">
      <header class="topbar">
        <div class="container">
          <div class="nav">
            <div class="logo-wrapper">
              <img src="public/img/sysmax_logo_transp.png" alt="" width="100" height="50" class="logo">
            </div>            
            <div class="client">
              <h3 class="clientname">NOMBRE DE LA EMPRESA</h3>
            </div>
          </div>
        </div>
      </header>
      <main class="sysmax-main">
        <div class="sysmax-con">
          <div class="sysmax-box">
            <div class="box-reading">
              <h3 class="reading-title">Consumo Actual</h3>
              <i class='bx bx-tachometer bx-lg' style='color:#3c3c3c'  ></i>
              <p class="reading-txt">
                    <?php echo number_format($kWh['value']/100,'2','.') . ' kWh' ?>
              </p>           
            </div>                                         
            <div class="box-reading">
              <h3 class="reading-title"> Estado On / Off</h3>
              <i class='bx bx-power-off bx-lg' style='color:#3c3c3c'  ></i>
              <p class="reading-txt">
                <?php echo $status['value'] == '1' ? 'Encendido' : 'Apagado' ?>
              </p>
            </div>                                 
            <div class="box-reading">
              <h3 class="reading-title">Temperatura</h3>
              <i class='bx bxs-thermometer bx-lg' style='color:#3c3c3c'  ></i>
              <p class="reading-txt">
                    <?php echo $tempCurrent['value'] . '°C' ?>
              </p>
            </div>                                
          </div>
        </div>
        <div class="report-con">
          <a href="#" class="btn-report">Descargar Reporte</a>          
        </div>                  
      </main>
      <footer class="sysmax-footer">
        <div class="footer-con">
          <div class="footer-box">
            <h3 class="sysmax-title bx-flashing">SYSMAX TECNOLOGIA SA DE CV</h3>
            <p class="sysmax-dir">Calle Laurel 506, Edificio A, Interior 3, Col. El Roble, Acapulco, Gro.
            C.P. 39640 
            <p class="sysmax-tel">Tel. 744 300 4823 / 744 300 3648</p>            
            <p class="sysmax-email"><a href="mailto:contacto@sysmax.mx" class="sysmax-link"> contacto@sysmax.mx</a></p>
          </div>
        </div>
      </footer>    
    </div>
        <script src="public/js/startSetUp.js"></script>
  </body>
</html>
