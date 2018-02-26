<?php
	// This is the HTML template include file (.tpl.php) for the pago_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Registrar/Editar un Pago';
	require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-4 col-lg-5" style="text-align:left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-4 col-lg-2" style="text-align:center">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-4 col-lg-5" style="text-align:right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>
	<div class="form-controls">
		<?php $this->lblId->RenderWithName(); ?>
		<?php $this->txtGuias->RenderWithName(); ?>
		<?php //$this->lstCliente->RenderWithName(); ?>
		<?php $this->txtDocumento->RenderWithName(); ?>
		<?php $this->lstBanco->RenderWithName(); ?>
		<?php $this->calFecha->RenderWithName(); ?>
		<?php $this->txtPagoEspe->RenderWithName(); ?>
		<?php $this->txtMonto->RenderWithName(); ?>
        <?php $this->calRegistradoEl->RenderWithName(); ?>
        <?php $this->chkConfirmado->RenderWithName(); ?>
	</div>

	<div class="form-actions">
		<div class="form-save"><?php $this->btnSave->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
		<div class="form-delete"><?php $this->btnDelete->Render(); ?></div>
	</div>
</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>