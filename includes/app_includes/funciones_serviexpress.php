<?php
//------------------------------------------------------------------------------------
// Programa    : funciones_serviexpress.php
// Fecha Elab. : 07/10/2015
// Descripcion : Aqui se registran funciones de uso general del Sistema ServiExpress
//------------------------------------------------------------------------------------

function SetupValoresDeCalculo() {
    $strMailSopo   = BuscarParametro('CtasMail','MailSopo','Txt1','sopokaizen@gmail.com');
    $objDolaSica   = BuscarParametro('TasaCamb','DolaSica','TODO',null);
    $objDolaSima   = BuscarParametro('TasaCamb','DolaSima','TODO',null);
    $decPorcAran   = BuscarParametro('PorcAran','AranPred','Value1',20);
    $dteFechDhoy   = date("Y-m-d");
    $decIvaxDhoy   = Impuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
    //---------------------------------------------------------------------
    // Aqui se identifica la Sucursal de Miami, la cual se usa durante el
    // proceso de "importacion de guias" desde OEG Internacional
    //---------------------------------------------------------------------
    $objClauWher   = QQ::Clause();
    $objClauWher[] = QQ::Equal(QQN::Sucursal()->Nombre,'MIAMI');
    $objSucuMiam   = Sucursal::QuerySingle(QQ::AndCondition($objClauWher));
    //-----------------------------------------------------------------------
    // Durante el proceso de "importacion de guias" desde OEG Internacional
    // se utiliza la equivalencia de checkpoints reflejada en este arreglo
    //-----------------------------------------------------------------------
    $objClauWher   = QQ::Clause();
    $objClauWher[] = QQ::IsNotNull(QQN::Checkpoint()->EquivalenteOeg);
    $arrCkptMiam   = Checkpoint::QueryArray(QQ::AndCondition($objClauWher));
    $arrCkptEqui   = array();
    foreach ($arrCkptMiam as $objCkptMiam) {
        $arrCkptEqui[$objCkptMiam->EquivalenteOeg] = $objCkptMiam->Id;
    }
    //------------------------------------------------------------------------
    // El Usuario Interfaz API (iapi) se utiliza durante la "importacion de
    // guias" desde OEG Internacional
    //------------------------------------------------------------------------
    $objUsuaIapi = Usuario::LoadByLogin('iapi');
    if ($objUsuaIapi) {
        $_SESSION['UsuaIapi'] = serialize($objUsuaIapi);
    }

    $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
    $_SESSION['DolaSica'] = serialize($objDolaSica);
    $_SESSION['DolaSima'] = serialize($objDolaSima);
    $_SESSION['EmaiSopo'] = serialize($strMailSopo);
    $_SESSION['PorcAran'] = serialize($decPorcAran);
    if ($objSucuMiam) {
        $_SESSION['SucuMiam'] = serialize($objSucuMiam);
    }
    $_SESSION['CkptEqui'] = serialize($arrCkptEqui);
}

function enviarCorreoAlCliente($strTipoCorr, $objCliente) {
    //-----------------------------
    // Email de Soporte Tecnico
    //-----------------------------
    if (isset($_SESSION['EmaiSopo'])) {
        $strEmaiSopo = unserialize($_SESSION['EmaiSopo']);
    } else {
        $strEmaiSopo = '';
    }
    //---------------------------------------------------------------------
    // En la tabla parametro se especifica si el Sistema debe enviar el
    // correo de Bienvenida o no
    //---------------------------------------------------------------------
    $objCorrBien = BuscarParametro('ConfSist','CorrBien','TODO',null);
    if ($objCorrBien) {
        $blnCorrBien = $objCorrBien->Valor1;
    } else {
        $blnCorrBien = false;
    }
    $objUsuario  = unserialize($_SESSION['User']);
    // Titulo y texto del email
    $arrSubjText = TextoDelCorreo($strTipoCorr, $objCliente);
    $strSubjCorr = $arrSubjText[0];
    $strTextCorr = $arrSubjText[1];
    // Se arma el correo
    $objMessage           = new QEmailMessage();
    $objMessage->From     = 'ServiExpress <locahost@serviexpress.com>';
    $objMessage->To       = $objCliente->__nombreYCorreo();
    $objMessage->Cc       = $objUsuario->__nombreYCorreo();
    $objMessage->Bcc      = $strEmaiSopo;

    $objMessage->Subject  = $strSubjCorr . QDateTime::NowToString(QDateTime::FormatDisplayDate);

    $objMessage->HtmlBody = $strTextCorr;

    $objMessage->SetHeader('x-application', 'Okinawa System');

    // Send the Message (Commented out for obvious reasons)
    QEmailServer::Send($objMessage);
}

function TextoDelCorreo($strTipoCorr, $objCliente) {
    $strSubjCorr = '';
    $strTextCorr = '';
    switch ($strTipoCorr) {
        case 'Test':
            $strSubjCorr = 'Correo de Prueba ';
            $strTextCorr = '
            Estimado Cliente,<br><br>
            Reciba un cordial saludo del Equipo de ServiExpress. Este es un correo de prueba
            generado por nuestro Sistema.<br><br>
            Por favor no lo responda, puesto que fue emitido desde una cuenta no monitorizada.<br><br>
            Gracias por su colaboración!!!';
            break;
        case 'Conf':
            $strSubjCorr = 'Correo de Confirmación ';
            $strTextCorr = redactarEmailConfirmacion($objCliente);
            break;
        case 'Well':
            $strSubjCorr = 'Correo de Bienvenida ';
            $strTextCorr = redactarEmailBienvenida($objCliente);
            // $strTextCorr = redactarEmailConfirmacion($this->mctCliente->Cliente);
            break;
        case 'Con2':
            $strSubjCorr = 'Correo de Confirmación';
            $strTextCorr = redactarEmailConfirmacionE2($objCliente);
            break;
        case 'Wel2':
            $strSubjCorr = 'Correo de Bienvenida';
            $strTextCorr = redactarEmailBienvenidaE2($objCliente);
            // $strTextCorr = redactarEmailConfirmacion($this->mctCliente->Cliente);
            break;
        default:
            # code...
            break;
    }
    return array($strSubjCorr,$strTextCorr);
}

function calcularTarifa($arrDatoTari) {
    $objProdCalc = $arrDatoTari['objProdCalc'];
    $dttFechVige = $arrDatoTari['dttFechVige'];
    $decValoMerc = $arrDatoTari['decValoMerc'];
    $decPesoLibr = $arrDatoTari['decPesoLibr'];
    $decPesoVolu = $arrDatoTari['decPesoVolu'];
    $decPorcAran = $arrDatoTari['decPorcAran'];

    // Dolar oficial, para calculos de Aduana
    // $decTasaDola = unserialize($_SESSION['TasaDola']);
    $objDolaSica = unserialize($_SESSION['DolaSica']);
    $objDolaSima = unserialize($_SESSION['DolaSima']);
    
    // Se determina el mayor de los pesos 
    $decPesoCalc = $decPesoVolu >= $decPesoLibr ? $decPesoVolu : $decPesoLibr;

    // Se inicializa el vector de resultados
    $arrResuCalc['blnTodoOkey'] = true;
    $arrResuCalc['decPesoCalc'] = $decPesoCalc;
    $arrResuCalc['decCostLibr'] = 0;
    $arrResuCalc['decMontBase'] = 0;
    $arrResuCalc['decGastMane'] = 0;
    $arrResuCalc['decMontAran'] = 0;
    $arrResuCalc['decTasaAdua'] = 0;
    $arrResuCalc['decIvaxImpo'] = 0;
    $arrResuCalc['decImpuImpo'] = 0;
    $arrResuCalc['decMontTari'] = 0;

    if ($objProdCalc) {
        // Se ubica la tarifa vigente del producto 
        $objTariProd = $objProdCalc->GetTarifaVigente($dttFechVige);
        if ($objTariProd) {
            // Monto Base de la Tarifa
            $decMontBase = $decPesoCalc * $objTariProd->CostoLibra;
            // Gastos de Manejo
            $decGastMane = $decValoMerc <= $objTariProd->LimiteLv 
                ? $objTariProd->CostoManejoLw 
                : $objTariProd->CostoManejoHv;
            // Monto Total de la Tarifa
            $decMontTari = $decMontBase + $decGastMane;
            //-----------------------------------------------------
            // El valor de la mercancia determina la tasa de dolar
            //-----------------------------------------------------
            $decTasaDola = 0;
            if ($decValoMerc >= $objDolaSica->Valor1 && $decValoMerc <= $objDolaSica->Valor2) {
                $decTasaDola = $objDolaSica->Valor3;
                $strTipoDola = $objDolaSica->Texto1;
            }
            if ($decValoMerc >= $objDolaSima->Valor1 && $decValoMerc <= $objDolaSima->Valor2) {
                $decTasaDola = $objDolaSima->Valor3;
                $strTipoDola = $objDolaSima->Texto1;
            }
            if ($decValoMerc <= 100) {
                // Mercancia de Bajo Valor - No paga Impuestos de Importacion
                $decValoBoli = $decValoMerc * $decTasaDola; 
                $decMontAran = 0;
                $decTasaAdua = 0;
                $decIvaxImpo = 0;
            } else {
                // Mercancia de Alto Valor 
                $decValoBoli = $decValoMerc * $decTasaDola; 
                $decMontAran = $decValoBoli * $decPorcAran / 100;
                $decTasaAdua = $decValoBoli * 1 / 100;
                // $decIvaxImpo = ($decValoBoli + $decTasaAdua + $decMontAran) * 12 / 100;
                $decIvaxImpo = $decValoBoli * 12 / 100;
            }

            $decImpuImpo = $decMontAran + $decTasaAdua + $decIvaxImpo;
            
            $decMontTari += $decImpuImpo;

            $arrResuCalc['decCostLibr'] = $objTariProd->CostoLibra;
            $arrResuCalc['decMontBase'] = $decMontBase;
            $arrResuCalc['decGastMane'] = $decGastMane;
            $arrResuCalc['decMontAran'] = $decMontAran;
            $arrResuCalc['decTasaAdua'] = $decTasaAdua;
            $arrResuCalc['decIvaxImpo'] = $decIvaxImpo;
            $arrResuCalc['decImpuImpo'] = $decImpuImpo;
            $arrResuCalc['decMontTari'] = $decMontTari;
            $arrResuCalc['decTasaDola'] = $decTasaDola;
            $arrResuCalc['strTipoDola'] = $strTipoDola;
            $arrResuCalc['decValoBoli'] = $decValoBoli;
            $arrResuCalc['decTasaIvax'] = 12;
        } else {
            $arrResuCalc['blnTodoOkey'] = false;
        }
    } else {
        $arrResuCalc['blnTodoOkey'] = false;    
    }

    return $arrResuCalc;
}

function redactarEmailConfirmacion($objCliente) {
    $strDireSist = BuscarParametro('ConfServ', 'DatoServ', 'Txt1', 'http://200.74.196.6/servex/web/');
    $strDireConf = $strDireSist."pages/preconf.php";
    $strCodiClie = $objCliente->Id;
    $strCodiConf = md5($objCliente->CodigoConfirmacion);
    $strLinkBoto = $strDireConf."/".$strCodiClie."/".$strCodiConf;
    $strMensCorr = sprintf('
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>ServiExpress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
    </head>
    <body style="color:#828282; background-color:#eee;">
        <a href=""><img src="%simg/header.png" alt="ServiExpress"></a>
        <blockquote style="background-color:#fff;"><br>
            <blockquote>
                <h3 style="color:#98978b;">Por Favor Confirme su Registro!</h3>
                <a href="%s"><img src="%simg/boton.png" alt="BotonConfirmar"></a><br><br>
                <p>Si usted ha recibido este correo por error, simplemente eliminelo.<br>
                No se registrará si no hace click en el link de confirmación.<br><br>
                Si tiene alguna duda acerca de este proceso, por favor contacte a:
                </p>
                <a href="mailto:info@serviexpress.com">info@serviexpress.com</a><br><br>
            </blockquote>
        </blockquote>
        <table style="background-color:#eee;">
            <tr style="background-color:#eee;">
                <td style="background-color:#eee;"></td>
            </tr>
        </table>
    </body>
    </html>',$strDireSist,$strLinkBoto,$strDireSist);
    return utf8_decode($strMensCorr);
}

function redactarEmailBienvenida($objCliente) {
    $objDatoEmpr = BuscarParametro('DatoEmpr', 'DatoMiam', 'TODO', -1);
    $strDireSist = BuscarParametro('ConfServ', 'DatoServ', 'Txt1', 'http://200.74.196.6/servex/web/');
    $objProducto = Producto::Load(1);
    $objTariProd = $objProducto->GetTarifaVigente(date('Y-m-d'));
    // $strDireSist = 'http://200.74.196.6/servex/web/';
    $strMensBien = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>ServiExpress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
    </head>
    <body style="color:#828282; background-color:#eee;">
        <table border="0px">
            <tr>
                <td>
                    <img src="'.$strDireSist.'img/header.png" alt="ServiExpress">
                </td>
            </tr>
            <tr>
                <td style="background-color:#fff;">
                    <blockquote>
                        <h3>'.$objCliente->Nombre.', Bienvenido a ServiExpress!!!</h3>
                        <p>Su cuenta ha sido confirmada. Información de su interés: <br><br>
                            <p style="color: #ec7124; font-weight: bold">Datos Personales</p>
                            <table border="0px">
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Codigo de Cuenta:</td>
                                    <td> '.$objCliente->Id.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Cédula:</td>
                                    <td> '.$objCliente->CedulaRif.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Contraseña:</td>
                                    <td> '.$objCliente->ClaveAcceso.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Correo Electrónico:</td>
                                    <td> '.$objCliente->Email.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Teléfono Móvil:</td>
                                    <td> '.$objCliente->TelefonoMovil.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Teléfono Fijo:</td>
                                    <td> '.$objCliente->TelefonoFijo.'</td>
                                </tr>
                                <tr colspan="2">
                                    <p style="color: #ec7124; font-weight: bold">Datos de su Residencia</p>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Estado:</td>
                                    <td> '.$objCliente->Estado->Nombre.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Ciudad:</td>
                                    <td> '.$objCliente->Ciudad->Nombre.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Dirección de Entrega:</td>
                                    <td> '.$objCliente->Direccion.'</td>
                                </tr>
                            </table>
                        </p>
                    </blockquote>
                </td>
            </tr>
            <tr style="background-color:#fff;">
                <td>
                    <blockquote>
                        <h3 style="color: #ec7124;">Tarifas</h3>
                        <p>Le recordamos que nuestras tarifas son las siguientes, tengalas en cuenta a la hora de realizar sus pre-alertas:</p>
                        <p>Para enviar sus compras a Venezuela existen dos tipos de tarifas dependiendo del valor de la factura.</p>
                        
                        <table border="0px" style="width:100%">
                            <tr style="color:#fff;">
                                <th></th>
                                <th style="background-color:#337ab7;">Bajo Valor<br><small>Compras hasta $100</small></th>
                                <th style="background-color:#337ab7;">Alto Valor<br><small>Compras de mas de $100</small></th>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#337ab7;"><b>Flete Internacional</b><br><small>Mayor entre Peso y Volumen</small></td>
                                <td style="text-align: center; background-color:#f5f5f5;">Bs. '.$objTariProd->CostoLibra.' x libra</td>
                                <td style="text-align: center; background-color:#f5f5f5;">Bs. '.$objTariProd->CostoLibra.' x libra</td>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#337ab7;"><b>Manejo</b><br><small>Por guía</small></td>
                                <td style="text-align: center;">Bs. '.$objTariProd->CostoManejoLw.'</td>
                                <td style="text-align: center;">Bs. '.$objTariProd->CostoManejoHv.'</td>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#337ab7;"><b>Impuestos Aduanales</b><br><small>Sujetos a Cambio</small></td>
                                <td style="text-align: center; background-color:#f5f5f5;">No Paga</td>
                                <td style="text-align: center; background-color:#f5f5f5;">Paga<br><small><i>De acuerdo al tipo de artículo</i></small></td>
                            </tr>
                        </table>
                        <br>
                        <span style="color: #ec7124">IMPUESTOS ADUANALES</span>
                        <p>El valor de los artículos para aplicar los impuestos aduanales se calcula a tasa de SIMADI para las compras mayores de $300.00 hasta $2,000.00
                        Para ver la tasa de impuestos que se le aplica a cada tipo de artículo,
                        por favor consulte la sección de Arancel o comuniquese con nosotros para evaluar las distintas opciones para transportar su carga.</p>
                        <p class="text-danger">*Las tarifas reflejadas arriba son hasta la sede principal en Caracas y no incluyen
                        el IVA.
                        </p>
                    </blockquote>
                </td>
            </tr>
            <tr style="background-color:#fff;">
                <td>
                    <blockquote>
                        <h3 style="color: #ec7124;">Como inscribirte en tu Tienda Online favorita</h3>
                        <p>Coordine que todas sus compras lleguen a nuestra instalación en USA para ser preparadas y enviadas
                        a Venezuela. Al momento de hacer una compra sea en <b><span style="color:#E53238;">e</span><span style="color:#0063D1;">b</span><span style="color:#F4AE02;">a</span><span style="color:#85B817;">y</span></b> o <b>Amaz<span style="color:#FF9900;">o</span>n</b> recuerde siempre 
                        colocar su número de cuenta.</p>

                        <h4>Utilize el siguiente formato</h4>
                        <table border="0px">
                            <tr>
                                <td>Nombre Completo: </td>
                                <td>'.$objCliente->Nombre.'</td>
                            </tr>
                            <tr>
                                <td>Dirección Línea 1: </td>
                                <td>'.$objDatoEmpr->Texto1.'  #VE'.$objCliente->Id.'</td>
                            </tr>
                            <tr>
                                <td>Dirección Línea 2: </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ciudad: </td>
                                <td>'.$objDatoEmpr->Texto2.'</td>
                            </tr>
                            <tr>
                                <td>Estado / Provincia / Región: </td>
                                <td>'.$objDatoEmpr->Texto4.'</td>
                            </tr>
                            <tr>
                                <td>Postal: </td>
                                <td>'.$objDatoEmpr->Texto5.'</td>
                            </tr>
                            <tr>
                                <td>Teléfono: </td>
                                <td>'.$objDatoEmpr->Texto3.'</td>
                            </tr>
                            <tr>
                                <td colspan="2" text-align="center">Complete el resto de los campos adecuadamente</td>
                                <td></td>
                            </tr>
                        </table>
                    </blockquote>
                </td>
            </tr>
        </table>
    </body>
    </html>';
    return utf8_decode($strMensBien);
}

function redactarEmailConfirmacionE2($objCliente) {
    $strDireSist = BuscarParametro('ConfServ', 'DatoSer2', 'Txt1', 'http://200.74.196.6/servex/web2/');
    $strDireConf = $strDireSist."pages/preconf.php";
    $strCodiClie = $objCliente->Id;
    $strCodiConf = md5($objCliente->CodigoConfirmacion);
    $strLinkBoto = $strDireConf."/".$strCodiClie."/".$strCodiConf;
    $strMensCorr = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>ServiExpress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
    </head>
    <body style="color:#828282; background-color:#eee;">
        <a href=""><img src="'.$strDireSist.'img/header2.png" alt="ServiExpress"></a>
        <blockquote style="background-color:#fff;"><br>
            <blockquote>
                <h3 style="color:#98978b;">Por Favor Confirme su Registro!</h3>
                <a href="'.$strLinkBoto.'"><img src="'.$strDireSist.'img/boton.png" alt="BotonConfirmar"></a><br><br>
                <p>Si usted ha recibido este correo por error, simplemente eliminelo.<br>
                No se registrará si no hace click en el link de confirmación.<br><br>
                Si tiene alguna duda acerca de este proceso, por favor contacte a:
                </p>
                <a href="mailto:info@serviexpress.com">info@serviexpress.com</a><br><br>
            </blockquote>
        </blockquote>
        <table style="background-color:#eee;">
            <tr style="background-color:#eee;">
                <td style="background-color:#eee;"></td>
            </tr>
        </table>
    </body>
    </html>';
    return utf8_decode($strMensCorr);
}

function redactarEmailBienvenidaE2($objCliente) {
    $objDatoEmpr = BuscarParametro('DatoEmpr', 'DatoMiam', 'TODO', -1);
    $strDireSist = BuscarParametro('ConfServ', 'DatoSer2', 'Txt1', 'http://200.74.196.6/servex/web2/');
    $objProducto = Producto::Load(1);
    $objTariProd = $objProducto->GetTarifaVigente(date('Y-m-d'));
    // $strDireSist = 'http://200.74.196.6/servex/web/';
    $strMensBien = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>ServiExpress</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user‐scalable=no">
    </head>
    <body style="color:#828282; background-color:#eee;">
        <table border="0px">
            <tr>
                <td>
                    <img src="'.$strDireSist.'img/header2.png" alt="ServiExpress"></a>
                </td>
            </tr>
            <tr>
                <td style="background-color:#fff;">
                    <blockquote>
                        <h3>'.$objCliente->Nombre.', Bienvenido a ServiExpress!!!</h3>
                        <p>Su cuenta ha sido confirmada. Información de su interés: <br><br>
                            <p style="color: #282a65; font-weight: bold">Datos Personales</p>
                            <table border="0px">
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Codigo de Cuenta:</td>
                                    <td> <span style="color:blue; font-weight:bold"> #VE'.$objCliente->Id.'</span></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Cédula:</td>
                                    <td> '.$objCliente->CedulaRif.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Contraseña:</td>
                                    <td> '.$objCliente->ClaveAcceso.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Correo Electrónico:</td>
                                    <td> '.$objCliente->Email.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Teléfono Móvil:</td>
                                    <td> '.$objCliente->TelefonoMovil.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Teléfono Fijo:</td>
                                    <td> '.$objCliente->TelefonoFijo.'</td>
                                </tr>
                                <tr colspan="2">
                                    <p style="color: #282a65; font-weight: bold">Datos de su Residencia</p>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Estado:</td>
                                    <td> '.$objCliente->Estado->Nombre.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Ciudad:</td>
                                    <td> '.$objCliente->Ciudad->Nombre.'</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; font-weight: bold">Dirección de Entrega:</td>
                                    <td> '.$objCliente->Direccion.'</td>
                                </tr>
                            </table>
                        </p>
                    </blockquote>
                </td>
            </tr>
            <tr style="background-color:#fff;">
                <td>
                    <blockquote>
                        <h3 style="color: #282a65;">Tarifas</h3>
                        <p>Le recordamos que nuestras tarifas son las siguientes, tengalas en cuenta a la hora de realizar sus pre-alertas:</p>
                        <p>Para enviar sus compras a Venezuela existen dos tipos de tarifas dependiendo del valor de la factura.</p>
                        
                        <table border="0px" style="width:100%">
                            <tr style="color:#fff;">
                                <th></th>
                                <th style="background-color:#f47c3c;">Bajo Valor<br><small>Compras hasta $100</small></th>
                                <th style="background-color:#f47c3c;">Alto Valor<br><small>Compras de mas de $100</small></th>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#f47c3c;"><b>Flete Internacional</b><br><small>Mayor entre Peso y Volumen</small></td>
                                <td style="text-align: center; background-color:#f5f5f5;">Bs. '.$objTariProd->CostoLibra.' x libra</td>
                                <td style="text-align: center; background-color:#f5f5f5;">Bs. '.$objTariProd->CostoLibra.' x libra</td>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#f47c3c;"><b>Manejo</b><br><small>Por guía</small></td>
                                <td style="text-align: center;">Bs. '.$objTariProd->CostoManejoLw.'</td>
                                <td style="text-align: center;">Bs. '.$objTariProd->CostoManejoHv.'</td>
                            </tr>
                            <tr>
                                <td style="color:#fff; background-color:#f47c3c;"><b>Impuestos Aduanales</b><br><small>Sujetos a Cambio</small></td>
                                <td style="text-align: center; background-color:#f5f5f5;">No Paga</td>
                                <td style="text-align: center; background-color:#f5f5f5;">Paga<br><small><i>De acuerdo al tipo de artículo</i></small></td>
                            </tr>
                        </table>
                        <br>
                        <span style="color: #282a65">IMPUESTOS ADUANALES</span>
                        <p>El valor de los artículos para aplicar los impuestos aduanales se calcula a tasa de SIMADI para las compras mayores de $300.00 hasta $2,000.00
                        Para ver la tasa de impuestos que se le aplica a cada tipo de artículo,
                        por favor consulte la sección de Arancel o comuniquese con nosotros para evaluar las distintas opciones para transportar su carga.</p>
                        <p class="text-danger">*Las tarifas reflejadas arriba son hasta la sede principal en Caracas y no incluyen
                        el IVA.
                        </p>
                    </blockquote>
                </td>
            </tr>
            <tr style="background-color:#fff;">
                <td>
                    <blockquote>
                        <h3 style="color: #282a65;">Como inscribirte en tu Tienda Online favorita</h3>
                        <p>Coordine que todas sus compras lleguen a nuestra instalación en USA para ser preparadas y enviadas
                        a Venezuela. Al momento de hacer una compra sea en <b><span style="color:#E53238;">e</span><span style="color:#0063D1;">b</span><span style="color:#F4AE02;">a</span><span style="color:#85B817;">y</span></b> o <b>Amaz<span style="color:#FF9900;">o</span>n</b> recuerde siempre 
                        colocar su número de cuenta.</p>

                        <h3 style="color: #282a65;">Utilice el siguiente formato:</h3>
                        <table cellspacing="0px">
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Nombre Completo: </td>
                                <td><table cellspacing="0px" border="0px" style="min-width:250px">'.$objCliente->Nombre.'</table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Dirección Línea 1: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px">'.$objDatoEmpr->Texto1.
                                ' <span style="color:blue; font-weight: bold"> #VE'.$objCliente->Id.'</span></table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Dirección Línea 2: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px"><br></table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Ciudad: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px">'.$objDatoEmpr->Texto2.'</table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Estado / Provincia / Región: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px">'.$objDatoEmpr->Texto4.'</table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Postal: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px">'.$objDatoEmpr->Texto5.'</table></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; font-weight: bold;">Teléfono: </td>
                                <td><table cellspacing="0px" border="1px" style="min-width:250px">'.$objDatoEmpr->Texto3.'</table></td>
                            </tr>
                            <tr>
                                <td colspan="2" text-align="center">Complete el resto de los campos adecuadamente</td>
                            </tr>
                        </table>
                    </blockquote>
                </td>
            </tr>
        </table>
    </body>
    </html>';
    return utf8_decode($strMensBien);
}
?>