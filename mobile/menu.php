<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "ServiExpress";

if (isset($_GET['m'])) {
   $_SESSION['menu'] = $_GET['m'];
} else {
   $_SESSION['menu'] = 'h';
}

$objDolaSica = BuscarParametro('TasaCamb','DolaSica','TODO',null);
$objDolaSima = BuscarParametro('TasaCamb','DolaSima','TODO',null);
$decPorcAran = BuscarParametro('PorcAran','AranPred','Value1',20);
$dteFechDhoy = date("Y-m-d");
$decIvaxDhoy = Impuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);

$_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
$_SESSION['DolaSica'] = serialize($objDolaSica);
$_SESSION['DolaSima'] = serialize($objDolaSima);
$_SESSION['PorcAran'] = serialize($decPorcAran);
?>

    <div data-role="page" id="inicio">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="text-align: center; min-height: 200px; padding-top: 10%">
            <img src="images/Logo_Servex.png" alt="" style="opacity:0.5;">
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
