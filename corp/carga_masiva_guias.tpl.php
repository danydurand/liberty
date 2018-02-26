<?php
//----------------------------------------------------------
// Programa       : carga_masiva_guias.tpl.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/11/2017
// Proyecto       : newliberty
// Descripcion    :
//----------------------------------------------------------
$strPageTitle = QApplication::Translate('Carga Masiva de Guías');
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-12 col-md-3 col-lg-3" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php $this->btnImpoGuia->Render(); ?>
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnAjusGuia->Render(); ?>
        <?php $this->btnErroProc->Render(); ?>
        <?php $this->btnMostSucu->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.4em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.8em">
            <div class="col-xs-12 col-md-offset-1 col-md-10">
                <?php $this->txtCargArch->RenderWithName(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-offset-1 col-md-5">
                <?php $this->lblNumeCarg->RenderWithName(); ?>
                <?php $this->lblNumePend->RenderWithName(); ?>
                <?php $this->lblNumeAjus->RenderWithName(); ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php $this->lblNumeProc->RenderWithName(); ?>
                <?php $this->lblNumeErro->RenderWithName(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5em;">
            <div class="col-xs-12 col-md-offset-1 col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="text-align: left">
                        Estructura del Archivo y sus Datos
                    </div>
                    <div class="panel-body" style="text-align: left; padding-left: 0px">
                        <ul>
                            <li class="text-info">
                                Si no desea agregar datos en las columnas marcadas como <strong>(Opcional)</strong>, deje la columna en blanco. Salvo que
                                Usted posea un número propio que identifique su paquete o a través del cual quiera hacer el rastreo de su envío, la primera
                                columna del archivo debe ir en blanco.
                            </li>
                            <li class="text-info">
                                Se espera un archivo plano con extensión ".csv", ".txt" o ".dat", con 11 columnas
                                separadas por punto y coma (";"), con cabecera y con la siguiente estructura:
                            </li>
                        </ul>
                        <ol>
                            <div class="col-xs-12 col-md-offset-1 col-md-5">
                                <li class="text-info">Numero de Guía/Tracking <strong>(Opcional)</strong></li>
                                <li class="text-info">Cédula del Destinatario <span class="req">(R)</span></li>
                                <li class="text-info">Nombre del Destinatario <span class="req">(R)</span></li>
                                <li class="text-info">Apellido del Destinatario <span class="req">(R)</span></li>
                                <li class="text-info">Direcc. del Destinatario <span class="req">(R)</span></li>
                                <li class="text-info">Teléfono del Destinatario <span class="req">(R)</span></li>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <li class="text-info">Otro Teléfono del Destinatario <strong>(Opcional)</strong></li>
                                <li class="text-info">Descripción del Contenido <span class="req">(R)</span></li>
                                <li class="text-info">Cantidad de Piezas  <span class="req">(R) (Entero mayor a cero)</span></li>
                                <li class="text-info">Sucursal Dest. <span class="req">(R) (Presione el botón "Sucu" p/más información)</span></li>
                                <li class="text-info">Ciudad</li>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .req {
        font-weight: bold;
        color: red;
    }
</style>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
