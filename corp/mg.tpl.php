<?php
$strPageTitle = QApplication::Translate($_SESSION['NombSist']);
require(__YAMAGUCHI__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="formulario_consulta">
    <div class="row">
        <div class="col-md-12">
            <div class="hidden-xs hidden-sm hidden-md">
                <h2 class="page-header">Bienvenid@ al Sistema <strong>CORP</strong>orativo
                    <small style="font-size: .5em">By Lufeman Software, C.A.</small></h2>
            </div>
            <div class="visible-xs visible-sm visible-md">
                <h2 class="page-header">Bienvenid@ al Sistema <strong>CORP</strong>orativo
                    <small style="font-size: .5em">By Lufeman Software, C.A.</small></h2>
            </div>
            <p class="lead">
                Ultimo Acceso: <small style="font-size: .7em"><?= $objUsuaCone->FechaAcceso->__toString("YYYY-MM-DD") ?></small><br>
            </p>
            <!-------------------------------------------------------------------->
            <!-- Se muestra(n) el(los) mensaje(s) disponible(s) para el usuario -->
            <!-------------------------------------------------------------------->
            <?php
            /**
             * @var $objMensYama MensajeYamaguchi;
             */
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::MensajeYamaguchi()->Orden);
            $arrMensCorp   = MensajeYamaguchi::LoadArrayByCodigoTODOS($objClieUsua->CodigoInterno,$objClauOrde);
            $dttFechDhoy   = new QDateTime(QDateTime::Now);
            foreach ($arrMensCorp as $objMensCorp) {
                //---------------------------------------------------------
                // Si el mensaje esta Vigente o es por tiempo indefinido
                //---------------------------------------------------------
                if (($objMensCorp->__vigente())) {
                    echo $objMensCorp->__toCliente();
                }
            }
            ?>
        </div>
    </div>
</div>
<style>
    .navbar-default {
        background: #A52422;
    }

    .form-name {
        width: 30%;
    }

</style>

<?php require(__APP_INCLUDES__.'/footer.inc.php'); ?>

