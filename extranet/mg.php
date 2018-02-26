<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');

class MenuGrafico extends QForm {
   protected $lblTituForm;
   protected $lblMensUsua;
   protected $lblNotiUsua;
   protected $objUsuario;
   protected $strNombMenu;
   protected $intDependingOn;
   protected $objMenuOpci;

   protected $strNombProg;
   protected $dtrOpciUsua;

   protected function SetupValores() {
      $this->objUsuario = unserialize($_SESSION['User']);
      if (isset($_GET['m'])) {
         $this->strNombMenu = trim($_GET['m']);
      } else {
         $this->strNombMenu = 'main';
      }
      if (isset($_GET['p'])) {
         $this->strNombProg = trim($_GET['p']);
      } else {
         $this->strNombProg = '';
      }
      $objClauWher       = QQ::Clause();
      $objClauWher[]     = QQ::Equal(QQN::Opcion()->SistemaId,$_SESSION['Sistema']);
      $objClauWher[]     = QQ::Equal(QQN::Opcion()->Programa,$this->strNombMenu);
      $objClauWher[]     = QQ::Equal(QQN::Opcion()->TipoId,TipoOpciType::MENU);
      $this->objMenuOpci = Opcion::QuerySingle(QQ::AndCondition($objClauWher));
      if (!$this->objMenuOpci) {
         echo "No se ha definido el Menu Principal de la Aplicacion";
         exit(0);
      }
   }

   protected function Form_Create() {

      $this->SetupValores();

      $this->lblTituForm_Create();
      $this->lblMensUsua_Create();
      $this->lblNotiUsua_Create();

      $this->dtrOpciUsua_Create();

      if (strlen($this->strNombProg) > 0) {
         QApplication::Redirect($this->strNombProg);
      }

   }

   protected function lblTituForm_Create() {
      $this->lblTituForm = new QLabel($this);
      $this->lblTituForm->Text = trim($this->objMenuOpci->Nombre);
   }

   protected function lblMensUsua_Create() {
      $this->lblMensUsua = new QLabel($this);
   }

   protected function lblNotiUsua_Create() {
      $this->lblNotiUsua = new QLabel($this);
   }

   protected function dtrOpciUsua_Create() {

      $this->dtrOpciUsua = new QDataRepeater($this);

      $this->dtrOpciUsua->Paginator = new QPaginator($this);
      $this->dtrOpciUsua->ItemsPerPage = 9;

      $this->dtrOpciUsua->PaginatorAlternate = new QPaginator($this);

      $this->dtrOpciUsua->UseAjax = true;

      $this->dtrOpciUsua->Template = 'dtrOpciUsua.tpl.php';

      $this->dtrOpciUsua->SetDataBinder('dtrOpciUsua_Bind');

   }

   protected function dtrOpciUsua_Bind() {

      $objClauOrde   = QQ::Clause();
      $objClauOrde[] = QQ::OrderBy(QQN::Opcion()->Posicion);

      $objClauLimi   = QQ::Clause();
      $objClauLimi[] = QQ::LimitInfo(20);

      $objClauWher   = QQ::Clause();
      $objClauWher[] = QQ::Equal(QQN::Opcion()->SistemaId,$_SESSION['Sistema']); 
      $objClauWher[] = QQ::Equal(QQN::Opcion()->Dependencia,$this->objMenuOpci->Id); 
      $objClauWher[] = QQ::Equal(QQN::Opcion()->Activo,true); 
      if ($this->objUsuario->GrupoId != 1) {
         //---------------------------------------------------------
         // Aqui se identifican las Opciones del grupo del Usuario
         //---------------------------------------------------------
         $arrOpciGrup = $this->objUsuario->Grupo->GetPermisoArray();
         $arrGroupId = array();
         foreach ($arrOpciGrup as $objOpciGrup) {
            $arrGroupId[] = $objOpciGrup->OpcionId;
         }
         //---------------------------------------------------------------------
         // Si el Usuario no esta el grupo de los Super-Usuarios entonces
         // solo se deben cargar las Optiones correspondientes a su grupo.
         //---------------------------------------------------------------------
         $objClauWher[] = QQ::In(QQN::Opcion()->Id,$arrGroupId); 
      }
      $this->dtrOpciUsua->TotalItemCount = Opcion::QueryCount(QQ::AndCondition($objClauWher));
      $this->dtrOpciUsua->DataSource = Opcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);

   }

}

MenuGrafico::Run('MenuGrafico','mg.tpl.php');
?>



