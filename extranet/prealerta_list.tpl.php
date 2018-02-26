<?php
	// This is the HTML template include file (.tpl.php) for the prealerta_list.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Lista de Pre-Alertas';
	require(__APP_INCLUDES__ . '/header_extranet.inc.php');
?>

	<div class="titulo-formulario">
		<div class="col-md-4 col-md-5" style="text-align:left">
			<?php $this->lblNotiUsua->Render(); ?>
		</div>
		<div class="col-md-4 col-md-5" style="text-align:center">
			<?php $this->lblTituForm->Render(); ?>
		</div>
		<div class="col-md-4 col-md-5" style="text-align:right">
			<?php $this->lblMensUsua->Render(); ?>
		</div>
	</div>
	<a href="prealerta_edit.php" class="btn btn-primary btn-lista"><i class="fa fa-plus-circle fa-lg"></i> <?php _t('Pre-Alertar un Envío'); ?></a>
	<br>
	<?php $this->dtgPrealertas->Render(); ?>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>