<?php
$strPageTitle = QApplication::Translate('Eliminar Checkpoint');
require(__APP_INCLUDES__ . '/header.inc.php');
?>

<div class="titulo-formulario">
    <div class="col-xs-4 col-md-4 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-5" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-9" style="margin-top: 1em;">
                <?php $this->txtNumeGuia->RenderWithName(); ?>
                <?php $this->lstChecBoxs->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>