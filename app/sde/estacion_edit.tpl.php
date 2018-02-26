<?php
// This is the HTML template include file (.tpl.php) for the estacion_edit.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = $this->mctEstacion->TitleVerb . ' Sucursal';
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
        <div class="row" style="margin-top: 1em;">
            <div class="" role="tabpanel">
                <ul class="nav nav-tabs tab-l nav-justified" role="tablist">
                    <li class="active" role="presentation">
                        <a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">
                            <i class="fa fa-user fa-lg"></i>
                            Datos Generales
                        </a>
                    </li>
                    <li class="tabs-guias" role="presentation">
                        <a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">
                            <i class="fa fa-commenting-o fa-lg"></i>
                            Receptorías (<?= $this->intCantRece; ?>)
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="seccion1">
                        <div class="media">
                            <div class="media-body"><br>
                                <div class="col-md-6">
                                    <?php $this->txtCodiEsta->RenderWithName(); ?>
                                    <?php $this->txtDescEsta->RenderWithName(); ?>
                                    <?php $this->lstCodiStatObject->RenderWithName(); ?>
                                    <?php $this->txtTextObse->RenderWithName(); ?>
                                    <?php $this->txtNombCont->RenderWithName(); ?>
                                    <?php $this->txtNumeTele->RenderWithName(); ?>
                                    <?php $this->txtNumeDias->RenderWithName(); ?>
                                    <?php $this->txtDireMail->RenderWithName(); ?>
                                    <?php $this->txtDireMailPrincipal->RenderWithName(); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php $this->lstRegion->RenderWithName(); ?>
                                    <?php $this->lstEsUnAlmacenObject->RenderWithName(); ?>
                                    <?php $this->lstOperacion->RenderWithName(); ?>
                                    <?php $this->lstZonaCodObject->RenderWithName(); ?>
                                    <?php $this->txtZonasNc->RenderWithName(); ?>
                                    <?php $this->lstNotificarRecolectaObject->RenderWithName(); ?>
                                    <?php $this->lstAreaMetropolitanaObject->RenderWithName(); ?>
                                    <?php $this->lstEstado->RenderWithName(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="seccion2">
                        <div class="media">
                            <div class="media-body"><br>
                                <div class="col-md-12">
                                    <?php $this->dtgReceSucu->Render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #a52422;
    }
    .nav-tabs > li > a {
        color: #A52422;
    }
</style>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>