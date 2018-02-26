<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/barcodelib.php');
//require_once('/appl/lib/fpdf153/fpdf.php');

$blnTodoOkey = true;
if (isset($_GET['strNumeGuia'])) {
	$strNumeGuia = $_GET['strNumeGuia'];
} else {
	$blnTodoOkey = false;
	echo "No se especifico la Guia<br>\n";
}

if ($blnTodoOkey) {

	function Bloque($pdf,$intX,$intY,$objGuia,$objCliente,$objUsuario) {

		$pdf->Image(__DOCROOT__.__IMAGE_ASSETS__."/LogoEmpresa.jpg",$intX,$intY,40,22);

		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($intX+90,$intY+7);
		$pdf->Cell(30,5,'Documento OFICIAL',0);

		$pdf->SetFont('Times','B',16);
		$pdf->SetXY($intX+90,$intY+13);
		$pdf->Cell(30,5,'N A C I O N A L',0);

		$intY += 26;
		$pdf->SetFont('Times','',10);
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Remitente: '.$objGuia->NombRemi,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		//		$pdf->Cell(30,5,'CI/RIF: '.$objCliente->NumeDrif,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Direccion: '.substr($objGuia->DireRemi,0,20),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,substr($objGuia->DireRemi,20,30),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,substr($objGuia->DireRemi,50,30),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Telefonos: '.$objGuia->TeleRemi,0);

		$intX += 90;
		$intY -= 20;

		$pdf->SetFont('Times','',10);
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Origen: '.$objGuia->EstaOrig.'  Destino: '.$objGuia->EstaDest,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Fecha: '.$objGuia->FechGuia->__toString("DD/MM/YYYY"),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Piezas: '.$objGuia->CantPiez,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Peso Kgs: '.$objGuia->PesoGuia,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		//		$pdf->Cell(30,5,'Volumen: '.$objGuia->PesoVolumetrico,0);

		$intX -= 90;
		$intY += 12;

		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Destinatario: ',0);

		$pdf->SetFont('Times','B',11);
		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,$objGuia->NombDest,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		//		$pdf->Cell(30,5,"CI/RIF: ".$objGuia->CodiClieObject->NumeDrif,0);

		$pdf->SetFont('Times','',10);
		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,substr($objGuia->DireDest,0,60),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,substr($objGuia->DireDest,66,120),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,substr($objGuia->DireDest,120,180),0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Telefonos: '.$objGuia->TeleDest,0);

		$pdf->SetFont('Times','B',10);
		$intY += 8;
		$pdf->SetXY($intX+45,$intY);
		$pdf->Cell(30,5,'Guia #'.$objGuia->NumeGuia.' '.$objGuia->EstaOrig.' - '.$objGuia->EstaDest,0);

		$pdf->SetFont('Times','',9);
		$intY += 4;
		$intTamaText = strlen($objGuia->DescCont);
		$intPosiCont = ((135 - $intTamaText)/2) - 5;
		$pdf->SetXY($intX+$intPosiCont,$intY);
		$pdf->Cell(30,5,$objGuia->DescCont,0);

		$pdf->SetFont('Times','',7);
		$intY += 4;
		$pdf->SetXY($intX+8,$intY);
		$pdf->Cell(30,5,'Documento generado por el agente autorizado LIBERTY EXPRESS. Impreso por '.$objUsuario->__toString().' ['.date("Y-m-d h:i:s").']',0);

		$pdf->SetFont('Times','',9);
		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Remitente',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Firma:',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Nombre:',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Fecha/Hora:',0);

		$intX += 75;
		$intY -= 24;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Destinatario',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Firma:',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Nombre:',0);

		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Fecha/Hora:',0);

		$intX -= 75;
		$intY += 8;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Servicio',0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Requiere envio de retorno:',0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Servicio Expreso:',0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Valor Declarado: '.$objGuia->ValorDeclarado,0);

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Precio del Servicio: ',0);

		$pdf->SetFont('Times','B',10);
		$intY += 4;
		$pdf->SetXY($intX,$intY);
		//		$pdf->Cell(30,5,'Aereo Importacion US',0);

		$pdf->SetFont('Times','',9);
		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Transporte Nacional',0);
		$pdf->SetXY($intX+50,$intY);
		$pdf->Cell(30,5,'BsF: ',0);
		$pdf->SetXY($intX+58,$intY);
		$pdf->Cell(12,5,$objGuia->MontoBase,0,0,'R');

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Monto del Seguro',0);
		$pdf->SetXY($intX+50,$intY);
		$pdf->Cell(30,5,'BsF: ',0);
		$pdf->SetXY($intX+58,$intY);
		$pdf->Cell(12,5,$objGuia->MontoSeguro,0,0,'R');

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Monto I.V.A.',0);
		$pdf->SetXY($intX+50,$intY);
		$pdf->Cell(30,5,'BsF: ',0);
		$pdf->SetXY($intX+58,$intY);
		$pdf->Cell(12,5,$objGuia->MontoIva,0,0,'R');

		$intY += 4;
		$pdf->SetXY($intX,$intY);
		$pdf->Cell(30,5,'Monto Total a Cancelar',0);
		$pdf->SetXY($intX+50,$intY);
		$pdf->Cell(30,5,'BsF: ',0);
		$pdf->SetXY($intX+58,$intY);
		$pdf->Cell(12,5,$objGuia->MontoTotal,0,0,'R');

		$intY += 20;
		
		$pdf->Codabar($intX+25,$intY+8,$objGuia->NumeGuia,'A','A',1,10);

		$pdf->SetFont('Times','B',38);
		$intY -= 40;
		$pdf->SetXY($intX+90,$intY);
		$pdf->Cell(30,5,TipoGuiaType::ToStringCorto($objGuia->TipoGuia),0);

		$pdf->SetFont('Times','B',42);
		$intY +=16;
		$pdf->SetXY($intX+90,$intY);
		$pdf->Cell(30,5,$objGuia->EstaDest,0);

		if ($objGuia->EsRetornoDeOtraGuia()) {
			$pdf->SetFont('Times','B',42);
			$intY +=16;
			$pdf->SetXY($intX+90,$intY);
			$pdf->Cell(30,5,"RTR",0);
		}
		

	}

	$objGuia = Guia::Load($strNumeGuia);
	$objCliente = MasterCliente::Load($objGuia->CodiClie);
	$objUsuario = unserialize($_SESSION['User']);

	$objLogoEmpr = BuscarParametro('88888','logos','TODO',-1);
	$objDatoEmpr = BuscarParametro('88888','datfisc','TODO',-1);
	$strLogoEmpr = $objLogoEmpr->ParaTxt1;
	$strNombEmpr = $objDatoEmpr->ParaTxt1;
	$strDireEmpr = $objDatoEmpr->ParaTxt2;
	$strTeleEmpr = $objDatoEmpr->ParaTxt4;
	$strHabiPost = $objLogoEmpr->ParaTxt5;

	$pdf = new PDF_Codabar('L','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//-------------------------------------------
	// Se imprimen los bloques de informacion
	//-------------------------------------------
	Bloque($pdf,5,4,$objGuia,$objCliente,$objUsuario);
	Bloque($pdf,142,4,$objGuia,$objCliente,$objUsuario);
	//------------------------------------------------
	// Se imprimen las lineas divisorias del formato
	//------------------------------------------------
	$pdf->Line(140,4,140,210);
	$pdf->Line(5,132,270,132);
	$pdf->Line(5,197,270,197);
	$pdf->Line(80,102,80,197);
	$pdf->Line(217,102,217,197);
	$pdf->Output();
}
?>
