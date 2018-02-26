<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Buscar Guías";
?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="lista_de_guias.php?o=bg" method="post">
                <div class="ui-field-contain">
                    <label for="tracking">Buscar por Tracking:</label>
                    <input type="text" name="tracking" id="tracking" placeholder="Nro de Tracking">
                </div>                
                <div class="ui-field-contain">
                    <label for="guia">Buscar por Guia:</label>
                    <input type="number" name="guia" id="guia" placeholder="Nro de Guia">
                </div>                
                <div class="ui-field-contain">
                    <label for="codigo">Buscar por Código:</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo de cliente">
                </div>                
                <div class="ui-field-contain">
                    <input class="ui-nodisc-icon" type="submit" value="<i class='fa fa-search pull-left'></i>Buscar" data-theme="b">
                    <input class="ui-nodisc-icon" type="reset" value="<i class='fa fa-eraser pull-left'></i>Limpiar" data-theme="b">
                </div>                
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
