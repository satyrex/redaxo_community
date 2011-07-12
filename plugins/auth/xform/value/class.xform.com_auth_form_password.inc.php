<?php

class rex_xform_com_auth_form_password extends rex_xform_abstract
{

	function enterObject()
	{
		global $REX;

		$l_label = $this->getElement(2);

		$this->params["form_output"][] .= '
		<p class="formpassword form-com-auth-password formlabel-'.$this->getName().'" id="'.$this->getHTMLId().'">
			<label class="password " for="el_'.$this->getId().'" >'.$l_label.'</label>
			<input type="password" class="password " name="'.$REX['ADDON']['community']['plugin_auth']['request']['psw'].'" id="el_'.$this->getId().'" value="" />
		</p>
		';

		return;

	}

	function getDescription()
	{
		return "com_auth_form_password -> Beispiel: com_auth_form_password|label|Passwort:";
	}

}

?>