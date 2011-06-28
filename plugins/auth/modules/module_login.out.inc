<?php

// module:com_auth_login

if(isset($REX["COM_USER"]) && is_object($REX["COM_USER"])) {

	echo '<p class="com_auth_userinfo">'.$REX["COM_USER"]->getValue("firstname").' '.$REX["COM_USER"]->getValue("name").', ###logouttext### <a href="'.rex_getUrl($REX['START_ARTICLE_ID'],'',array("rex_com_auth_logout"=>1)).'" class="lk1">###logout###</a></p>';

}else {
	$xform = new rex_xform;
	$xform->setValueField("com_auth_form_info",array("message","REX_VALUE[1]","REX_VALUE[2]","REX_VALUE[3]","REX_VALUE[4]"));
	$xform->setValueField("com_auth_form_login",array("login","REX_VALUE[6]"));
	$xform->setValueField("com_auth_form_password",array("passwort","REX_VALUE[7]"));
	$xform->setValueField("com_auth_form_stayactive",array("auth","REX_VALUE[8]"));

	$form = $xform->getForm();

	echo $form;

}

?>