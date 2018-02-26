<?php
$strPageTitle = QApplication::Translate('Recepción de Carga');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-xs-4 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>&nbsp;&nbsp;<?php $this->objDefaultWaitIcon->Render(); ?>
        </div>
        <div class="hidden-xs hidden-sm col-md-6 col-lg-5" style="text-align: center; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
            <?php $this->btnSave->Render(); ?>
            <?php $this->btnErroProc->Render(); ?>
        </div>
    <div class="hidden-sm col-md-3 col-lg-4"></div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 1em;">
                    <?php $this->lstOperAbie->renderWithName(); ?>
                    <?php $this->lstNumeCont->renderWithName(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Estilos de la Página -->
    <style>
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .renderWithName {
            padding: 0px 0;
            width: 100%;
        }
    </style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>