<?php
	// This is the HTML template include file (.tpl.php) for the provider_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Ver Guia';
	require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-5" style="text-align: left; margin-top: 0.1em">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-2">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-5" style="text-align: right; margin-top: 0.1em">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>

	<div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1" style="text-align: left; padding: 0px;">
                    <?php $this->btnPrimRegi->Render(); ?>
                    <?php $this->btnRegiAnte->Render(); ?>
                </div>
                <div class="col-md-9" style="font-weight:bold; border-radius: 3px; padding: 0.2em">
                    <div class="titulo">Información de la Guía</div>
                </div>
                <div class="col-md-1" style="text-align: center; padding: 0px;">
                    <?php //echo $this->strActiWhrx; ?>
                </div>
                <div class="col-md-1" style="text-align: right; padding: 0px">
                    <?php $this->btnProxRegi->Render(); ?>
                    <?php $this->btnUltiRegi->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="border-radius: 3px; background-color: #b0bed9 ; padding: 0; margin-top: 0.1em; ">
                    <div class="row">
                        <div class="col-md-4">
                            <?php $this->lblGuiaIdxx->RenderWithName() ?>
                            <?php $this->lblNumeTrac->RenderWithName() ?>
                            <?php $this->lblNombRemi->RenderWithName() ?>
                            <?php $this->lblNombProv->RenderWithName() ?>
                            <?php $this->lblDescCont->RenderWithName() ?>
                        </div>
                        <div class="col-md-4">
                            <?php $this->lblNombClie->RenderWithName() ?>
                            <?php $this->lblMediGuia->RenderWithName() ?>
                            <?php $this->lblVoluGuia->RenderWithName() ?>
                            <?php $this->lblLibrGuia->RenderWithName() ?>
                            <?php $this->lblValoDecl->RenderWithName() ?>
                        </div>
                        <div class="col-md-4">
                            <?php $this->lblFechGuia->RenderWithName() ?>
                            <?php $this->lblCantPiez->RenderWithName() ?>
                            <?php $this->lblSucuDest->RenderWithName() ?>
                            <?php $this->lblKiloGuia->RenderWithName() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: .1em">
                <div class="col-md-6" style="font-weight:bold; border-radius: 3px; padding: 0.2em">
                    <div class="titulo">Piezas</div>
                </div>
                <div class="col-md-6" style="font-weight:bold; border-radius: 3px; padding: 0.2em">
                    <div class="titulo">Checkpoints</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="border-radius: 3px; padding: 0; margin-top: 0.1em  ">
                    <?php $this->dtgPiecGuia->Render() ?>
                </div>
                <div class="col-md-6" style="border-radius: 3px; padding: 0; margin-top: 0.1em">
                    <?php $this->dtgGuiaCkpt->Render() ?>
                </div>
            </div>
        </div>
	</div>

    <style>
        body {
            line-height: 1.2;
        }
        .titulo {
            font-weight: bold;
            margin-left: 1em;
        }
        .renderWithName {
            padding: 0.5px 0px;
        }
        .campo {
            text-align: right;
        }
        .btn-nav-left {
            padding: 0px;
            text-align: left;
            width: 9%;
        }
        .btn-nav-right {
            padding: 0px;
            text-align: right;
            width: 9%;
        }
        .tit-whr {
            background-color: #b0bed9;
            border-radius: 3px;
            padding: 0px;
            text-align: left;
            width: 49.3%;
        }
        .form-name {
            width: 31%;
        }
    </style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>