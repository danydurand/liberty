<?php
	// This is the HTML template include file (.tpl.php) for the mis_guias.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of this directory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = 'Seleccionar Guias';
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

	<!--
    <div class="col-md-6" style="text-align: left">
        <a href="mis_guias.php?s=t" class="btn btn-primary btn-lista"><i class="fa fa-plane fa-lg"></i> <?php _t('En Transito'); ?></a>
        <a href="mis_guias.php?s=e" class="btn btn-success btn-lista"><i class="fa fa-thumbs-o-up fa-lg"></i> <?php _t('Entregadas'); ?></a>
        <a href="mis_guias.php?s=p" class="btn btn-warning btn-lista"><i class="fa fa-asterisk fa-lg"></i> <?php _t('Por Retirar'); ?></a>
        <a href="mis_guias.php" class="btn btn-info btn-lista"><i class="fa fa-bullseye fa-lg"></i> <?php _t('Todas'); ?></a>	<br>
    </div>
    <div class="col-md-6" style="text-align: right">
        Tracking o Nro de Guía:
        <?php //$this->txtBuscGuia->Render(); ?>
    </div>
    -->
    <div class="texto">
        <div class="espacio"></div>
        <?php $this->btnContPago->Render(); ?>
        <span class="alert alert-success">Seleccione las Guias cuyo Pago desea registrar y luego presione el boton Continuar</span>
        <br>
    </div>
    <?php $this->dtgGuias->Render(); ?>
    <style>
        .texto {
            /*text-align: center;*/
            color: blue;
            font-size: 1.1em;
        }
    </style>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>