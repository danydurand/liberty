<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');

class Work extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $objUsuario;

    protected $txtClavActu;
    protected $txtClavNue1;
    protected $txtClavNue2;

    protected $btnCambClav;
    protected $btnCancel;
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
Work::Run('Work');
?>
