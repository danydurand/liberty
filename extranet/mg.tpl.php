<?php
$strPageTitle = QApplication::Translate($_SESSION['NombSist']);
require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

<div class="formulario_consulta">
   <div class="row">
      <div class="col-md-12">
         <div class="hidden-xs hidden-sm hidden-md">
            <h2 class="page-header">Bienvenido a la Extranet de ServiExpress <small style="font-size: .5em">By Kaizen Software</small></h2>
         </div>
         <div class="visible-xs visible-sm visible-md">
            <h3 class="page-header">Bienvenido a la Extranet de ServiExpress <small style="font-size: .5em">By Kaizen Software</small></h3>
         </div>
         <p class="lead">
            Usuario/Cliente: <small style="font-size: .7em"><?= $strNombUsua ?></small><br>
            Ultimo Acceso Web: <small style="font-size: .7em"><?= $objUsuaCone->__fechaHoraAccesoWeb() ?></small><br>
            Ultimo Acceso Mobile: <small style="font-size: .7em"><?= $objUsuaCone->__fechaHoraAccesoMobile() ?></small><br>
         </p>
      </div>
   </div>
</div>

<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>

