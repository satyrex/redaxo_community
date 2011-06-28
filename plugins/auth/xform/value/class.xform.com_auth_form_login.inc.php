<?php

class rex_xform_com_auth_form_login extends rex_xform_abstract
{

	function enterObject(&$email_elements,&$sql_elements,&$warning,&$form_output,$send = 0)
	{
		global $REX;

		$l_label = $this->getElement(2);

		$login = rex_request($REX['ADDON']['community']['plugin_auth']['request']['name'],"string");

		$form_output[] .= '
		<p class="formtext form-com-auth-login formlabel-'.$this->getName().'" id="'.$this->getHTMLId().'">
			<label class="text" for="el_'.$this->getId().'" >'.$l_label.'</label>
			<input type="text" class="text" name="'.$REX['ADDON']['community']['plugin_auth']['request']['name'].'" id="el_'.$this->getId().'" value="'.htmlspecialchars(stripslashes($login)).'" />
		</p>
		';

		return;

	}

	function getDescription()
	{
		return "com_auth_form_login -> Beispiel: com_auth_form_login|label|Benutzername:";
	}

}

?>