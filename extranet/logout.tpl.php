<?php
$strPageTitle = QApplication::Translate('Salir: Extranet');
require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

<div class="formulario">
   <p style="margin-top: 15%; text-align: center; vertical-align: middle">
      <?php $this->btnLogout->Render(); ?> 
      <br><br>
      <?php $this->btnMenu->Render(); ?>     
   </p>
</div>

<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>
