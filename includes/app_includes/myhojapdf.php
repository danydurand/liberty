<?php
require_once('/appl/lib/fpdf153/fpdf.php');

define('FPDF_FONTPATH','font/');
class PDF extends FPDF
{
	protected $widths;
	protected $aligns;
	protected $enca;
	protected $just;
	protected $anch;
	protected $vert;
	protected $imag;
	protected $titulo;
	protected $fecha;
	protected $empresa;
	protected $direccion;
	protected $ruta;
	protected $codiruta;


	function setVariables($enca,$just,$anch,$vert,$imag='',$ruta='',$codiruta)
	{
		$this->enca = $enca;
		$this->just = $just;
		$this->anch = $anch;
		$this->vert = $vert;
		$this->imag = $imag;
		$this->SetWidths($anch);
		$this->SetAligns($just);
		$this->fecha = date('Y-m-d');
		$this->ruta = $ruta;
		$this->codiruta = $codiruta;
	}

	function SetEmpresa($emp='',$dir='',$titu='')
	{
		//Set datos de la empresa
		$this->empresa=$emp;
		$this->direccion=$dir;
		$this->titulo=$titu;
	}

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	function Header()
	{
		if ($this->DefOrientation == 'P')
		{
			$posi_imag = 165;
			$long_oriz = 210;
		}
		else
		{
			$posi_imag = 225;
			$long_oriz = 275;
		}
		//Logo
		if (strlen($this->imag) > 0)
		{
			$this->Image($this->imag,$posi_imag,4,40,15);
			$this->Cell(1);
			// $this->Ln(10);
		}
		$this->titulo = strtoupper($this->titulo);
		$this->SetFont('Arial','B',12);
		$this->Cell(3,1,$this->empresa,0,1);
		$this->Cell(1);
		$this->Cell(6,9,$this->direccion);
		$this->SetX($posi_imag+16);
		$this->Cell(6,20,$this->fecha,0,0);
		$this->ln(10);
		$longi=$this->GetStringWidth($this->titulo);
		$this->SetX(($long_oriz-$longi)/2);
		$this->Cell($longi,4,$this->titulo,'B',1,'C');

		$this->ln(10);
		$this->ruta = 'RUTA : '.$this->codiruta.' - '.$this->ruta;
		$longi=$this->GetStringWidth($this->ruta);

		$this->SetX(20);
		$this->Cell($longi,4,$this->ruta,'B',1,'C');
	//	$this->Code39($longi+30,30,$this->codiruta);
		//        $this->Cell(1);
		$this->ln(5);
		//Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(0,0,255);
		$this->SetTextColor(255);
		$this->SetDrawColor(0,0,255);
		$this->SetLineWidth(.3);
		//$this->SetFont('','B');
		$this->SetFont('Times','',9);
		$this->Cell($this->vert);

		$w=$this->anch;
		for($i=0;$i<count($this->enca);$i++)
		{
			$this->Cell($w[$i],7,$this->enca[$i],1,0,$this->just[$i],1);
		}
		//Salto de línea
		$this->Ln(7);
	}

	//Pie de página
	function Footer()
	{
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function Row($data)
	{
		// Calculo el alto de la Fila
		$nb=0;
		for($i=0;$i<count($data);$i++)
		{
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		}
		$h=6*$nb;
		// Primer salto de pagina si es necesario
		$this->CheckPageBreak($h);
		// Dibujo la celda de la fila
		$this->Cell($this->vert);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			// Salvo la posicion actual
			$x=$this->GetX();
			$y=$this->GetY();
			// Dibujo del borde
			$this->Rect($x,$y,$w,$h);
			// Imprimo el texto de la celda
			$this->MultiCell($w,6,$data[$i],0,$a);
			// Me posiciono a la derecha de la celda
			$this->SetXY($x+$w,$y);
		}
		// Voy a la siguiente linea
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
			$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
					$i++;
				}
				else
				$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
			$i++;
		}
		return $nl;
	}

	//Tabla coloreada
	function FancyTable($header,$data,$ancho,$just)
	{
		//Colores, ancho de línea y fuente en negrita
		$this->SetDrawColor(0,0,255);
		//Cabecera
		$w=$ancho;
		//Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('Times','',9);
		//Datos
		$fill=0;

		foreach($data as $row)
		{
			$this->Row($row);
		}
		$intNumerodeItems = count($data);
		$strTotal = 'Total Items : '.$intNumerodeItems;
		$this->ln(3);
		$x=$this->GetX();
		$y=$this->GetY();
      $this->Cell(10,10,$strTotal);

	}
	//}


	// Funciones para la generacion de codigos de barra
	function Code39($xpos, $ypos, $code, $baseline=0.5, $height=5)
	{

		$wide = $baseline;
		$narrow = $baseline / 3 ;
		$gap = $narrow;

		$barChar['0'] = 'nnnwwnwnn';
		$barChar['1'] = 'wnnwnnnnw';
		$barChar['2'] = 'nnwwnnnnw';
		$barChar['3'] = 'wnwwnnnnn';
		$barChar['4'] = 'nnnwwnnnw';
		$barChar['5'] = 'wnnwwnnnn';
		$barChar['6'] = 'nnwwwnnnn';
		$barChar['7'] = 'nnnwnnwnw';
		$barChar['8'] = 'wnnwnnwnn';
		$barChar['9'] = 'nnwwnnwnn';
		$barChar['A'] = 'wnnnnwnnw';
		$barChar['B'] = 'nnwnnwnnw';
		$barChar['C'] = 'wnwnnwnnn';
		$barChar['D'] = 'nnnnwwnnw';
		$barChar['E'] = 'wnnnwwnnn';
		$barChar['F'] = 'nnwnwwnnn';
		$barChar['G'] = 'nnnnnwwnw';
		$barChar['H'] = 'wnnnnwwnn';
		$barChar['I'] = 'nnwnnwwnn';
		$barChar['J'] = 'nnnnwwwnn';
		$barChar['K'] = 'wnnnnnnww';
		$barChar['L'] = 'nnwnnnnww';
		$barChar['M'] = 'wnwnnnnwn';
		$barChar['N'] = 'nnnnwnnww';
		$barChar['O'] = 'wnnnwnnwn';
		$barChar['P'] = 'nnwnwnnwn';
		$barChar['Q'] = 'nnnnnnwww';
		$barChar['R'] = 'wnnnnnwwn';
		$barChar['S'] = 'nnwnnnwwn';
		$barChar['T'] = 'nnnnwnwwn';
		$barChar['U'] = 'wwnnnnnnw';
		$barChar['V'] = 'nwwnnnnnw';
		$barChar['W'] = 'wwwnnnnnn';
		$barChar['X'] = 'nwnnwnnnw';
		$barChar['Y'] = 'wwnnwnnnn';
		$barChar['Z'] = 'nwwnwnnnn';
		$barChar['-'] = 'nwnnnnwnw';
		$barChar['.'] = 'wwnnnnwnn';
		$barChar[' '] = 'nwwnnnwnn';
		$barChar['*'] = 'nwnnwnwnn';
		$barChar['$'] = 'nwnwnwnnn';
		$barChar['/'] = 'nwnwnnnwn';
		$barChar['+'] = 'nwnnnwnwn';
		$barChar['%'] = 'nnnwnwnwn';

		$this->SetFont('Arial','',10);
		$this->Text($xpos, $ypos + $height + 4, $code);
		$this->SetFillColor(0);

		$code = '*'.strtoupper($code).'*';
		for($i=0; $i<strlen($code); $i++){
			$char = $code{$i};
			if(!isset($barChar[$char])){
				$this->Error('Invalid character in barcode: '.$char);
			}
			$seq = $barChar[$char];
			for($bar=0; $bar<9; $bar++){
				if($seq{$bar} == 'n'){
					$lineWidth = $narrow;
				}else{
					$lineWidth = $wide;
				}
				if($bar % 2 == 0){
					$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
				}
				$xpos += $lineWidth;
			}
			$xpos += $gap;
		}
	}
	// Fin de la definicion de codigos de barra
}
?>
