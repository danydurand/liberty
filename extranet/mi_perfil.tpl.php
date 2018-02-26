<?php
   // This is the HTML template include file (.tpl.php) for the aliado_edit.php
   // form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

   // Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
   // code re-generations do not overwrite your changes.

   $strPageTitle = QApplication::Translate('Mi Perfil');
   require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

   <div class="titulo-formulario">
      <div class="col-md-5" style="text-align: left">
         <?php $this->lblNotiUsua->Render(); ?>
      </div>
      <div class="col-md-2" style="text-align: center">
         <?php $this->lblTituForm->Render(); ?>
      </div>         
      <div class="col-md-5" style="text-align: right">
         <?php $this->lblMensUsua->Render(); ?>
      </div>
   </div>
   <div class="form-controls" style="padding-top: 2em;">
      <div class="col-md-6">
         <?php $this->txtNombClie->RenderWithName(); ?>
         <?php $this->txtCeduClie->RenderWithName(); ?>
         <?php $this->txtCorrClie->RenderWithName(); ?>
         <?php $this->calFechNaci->RenderWithName(); ?>
         <?php //$this->txtClavAcce->RenderWithName(); ?>
         <?php //$this->rdbSexoClie->RenderWithName(); ?>
      </div>
      <div class="col-md-6">
         <?php $this->txtTeleMovi->RenderWithName(); ?>
         <?php $this->txtTeleFijo->RenderWithName(); ?>
         <?php $this->lstEstaClie->RenderWithName(); ?>
         <?php $this->lstCiudClie->RenderWithName(); ?>
         <?php $this->txtDireEntr->RenderWithName(); ?>

         <?php //$this->lstMediPubl->RenderWithName(); ?>
         <?php //$this->txtRecoPorx->RenderWithName(); ?>
         <?php //$this->txtNombAmig->RenderWithName(); ?>
         <?php //$this->lblRecoPorx->RenderWithName(); ?>
      </div>
      <div class="col-md-12">
         <?php //d($_SESSION['User']); ?>
      </div>
   </div>

   <div class="form-actions">
      <div class="form-save"><?php $this->btnRegiCamb->Render(); ?></div>
      <div class="form-cancel"><?php $this->btnCancelar->Render(); ?></div>
   </div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
