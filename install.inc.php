<?php

/**
 * Community Install 
 * @author jan.kristinus[at]redaxo[dot]de Jan Kristinus
 * @author <a href="http://www.yakamara.de">www.yakamara.de</a>
 */

if (OOAddon::isAvailable('xform') != 1 || OOAddon::isAvailable('phpmailer') != 1) {
	$REX['ADDON']['install']['community'] = 0;
	$REX['ADDON']['installmsg']['community'] = $I18N->msg('community_install_xform_phpmailer_not_activated');

}elseif(OOAddon::getVersion('xform') < "2.6") {
	$REX['ADDON']['install']['community'] = 0;
	$REX['ADDON']['installmsg']['community'] = $I18N->msg('community_install_xform_version_problem','2.6');

}elseif(OOPlugin::getVersion("xform", "manager") < "2.6") {
	$REX['ADDON']['install']['community'] = 0;
	$REX['ADDON']['installmsg']['community'] = $I18N->msg('community_install_xform_manager_version_problem','2.6');

}elseif(OOPlugin::getVersion("xform", "email") < "2.6") {
	$REX['ADDON']['install']['community'] = 0;
	$REX['ADDON']['installmsg']['community'] = $I18N->msg('community_install_xform_email_version_problem','2.6');

}else
{
	$REX['ADDON']['install']['community'] = 1;

}

?>