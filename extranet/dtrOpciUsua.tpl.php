<?php 
	if ($_ITEM->TipoId == TipoOpciType::MENU) {
		$strTextOpci = 'mg.php?m='.trim($_ITEM->Programa); 
	} else {
		$strTextOpci = trim($_ITEM->Directorio).'/'.trim($_ITEM->Programa);
	}
?>
<div class="data_repeater_opci">
	<a href="<?php echo $strTextOpci; ?>">
		<img src="<?php _p(__APP_IMAGE_ASSETS__); echo '/'; strlen(trim($_ITEM->Imagen)) > 0 ? _p($_ITEM->Imagen) : _p('happy_face.png') ; ?>"><br />
   	<?php _p($_ITEM->Nombre); ?>
   </a>
</div>

<?php
    if ((($_CONTROL->CurrentItemIndex % 1) != 0) ||
        ($_CONTROL->CurrentItemIndex == count($_CONTROL->DataSource) - 1)){
            _p('<br style="clear:both;"/>', false);
        }
?>