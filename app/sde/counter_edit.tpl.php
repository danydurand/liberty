<?php
	// This is the HTML template include file (.tpl.php) for the counter_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Counter' . ' - ' . $this->mctCounter->TitleVerb;
	require(__APP_INCLUDES__ . '/header.inc.php');
	require(__APP_INCLUDES__ . '/botonera_edit.inc.php');
?>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <div class="col-md-6">
                <?php $this->lblId->RenderWithName(); ?>
                <?php $this->txtDescripcion->RenderWithName(); ?>
                <?php $this->txtSiglas->RenderWithName(); ?>
                <?php $this->lstSucursal->RenderWithName(); ?>
                <?php $this->lstRuta->RenderWithName(); ?>
                <?php //$this->lstEntregaInmediataObject->RenderWithName(); ?>
                <?php //$this->txtLimiteDePaquetes->RenderWithName(); ?>
                <?php //$this->txtCantidadDePaquetes->RenderWithName(); ?>
                <?php //$this->txtCkptRecepcion->RenderWithName(); ?>
                <?php //$this->txtCkptConfirmacion->RenderWithName(); ?>
                <?php //$this->txtCkptAlmacen->RenderWithName(); ?>
                <?php //$this->txtPaisId->RenderWithName(); ?>
                <?php $this->txtStatusId->RenderWithName(); ?>
                <?php $this->txtDireccion->RenderWithName(); ?>
            </div>
            <div class="col-md-6">
				<?php //$this->lstElegirServicioObject->RenderWithName(); ?>
				<?php $this->lstEsRutaObject->RenderWithName(); ?>
				<?php //$this->lstSeFacturaObject->RenderWithName(); ?>
				<?php //$this->lstPermitePagoObject->RenderWithName(); ?>
				<?php $this->txtEmailJefeAlmacen->RenderWithName(); ?>
				<?php //$this->txtCkptAntiguedad1->RenderWithName(); ?>
				<?php //$this->txtCkptAntiguedad2->RenderWithName(); ?>
				<?php //$this->txtCkptAntiguedad0->RenderWithName(); ?>
				<?php $this->lstAliadoComercial->RenderWithName(); ?>
				<?php $this->txtLimiteKilos->RenderWithName(); ?>
				<?php //$this->txtDependeDe->RenderWithName(); ?>
				<?php $this->chkDomOrigen->RenderWithName(); ?>
				<?php $this->chkDomDestino->RenderWithName(); ?>
	        </div>
        </div>
    </div>
</div>
<style>
    .form-name {
        width: 30%;
    }
</style>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>