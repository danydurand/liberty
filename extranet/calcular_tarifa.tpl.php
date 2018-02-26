<?php
	// This is the HTML template include file (.tpl.php) for the aliado_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Calcular Tarifa');
	require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-5" style="text-align:left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-2" style="text-align:center">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-5" style="text-align:right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>
	<div class="form-controls">
		<div class="container-fluid">
			<div class="espacio"></div>
			<div class="row">
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<br>
					<?php $this->txtValoMerc->RenderWithName(); ?>
					<?php $this->txtPesoLibr->RenderWithName(); ?>
					<div class="form-group form-inline">
						<span style="font-weight:bold;margin-left:6.8em;padding-right:0.5em;">Alto - Ancho - Largo</span>
						<?php $this->txtAltoEnvi->Render(); ?>
						<?php $this->txtAnchEnvi->Render(); ?>
						<?php $this->txtLargEnvi->Render(); ?> (Plgds)
						<hr>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div style="margin-left:2em;">
					<h4 style="color:#666;text-align:center;">Resultado</h4>
					<?php $this->txtValoBoli->RenderWithName(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="form-actions">
		<div class="form-save"><?php $this->btnCalcTari->Render(); ?></div>
		<div class="form-save"><?php $this->btnLimpiar->Render(); ?></div>
		<div class="form-cancel"><?php $this->btnCancel->Render(); ?></div>
	</div>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
