<?php

/**
 * XO-Form
 * @author jan.kristinus[at]redaxo[dot]de Jan Kristinus
 * @author <a href="http://www.yakamara.de">www.yakamara.de</a>
 */



/*

// Art der Gruppenrechte
$a = new rex_sql;
$a->setTable("rex_62_params");
$a->setValue("title","translate:com_grouptyp_perm");
$a->setValue("name","art_com_grouptype");
$a->setValue("prior","10");
$a->setValue("type","3");
$a->setValue("params","0:Für alle, egal welche Gruppe|1:Muss in jeder Gruppe sein|2:Muss in einer Gruppe sein|3:Hat keine Gruppen");
$a->setValue("validate",NULL);
$a->addGlobalCreateFields();
$g = new rex_sql;
$g->setQuery('select * from rex_62_params where name="art_com_grouptype"');
if ($g->getRows()==1) {
	$a->setWhere('name="art_com_grouptype"');
	$a->update();

}else {
	$a->insert();
}
$g = new rex_sql;
$g->setQuery('show columns from rex_article Like "art_com_grouptype"');
if ($g->getRows()==0) 
{
	$a->setQuery("ALTER TABLE `rex_article` ADD `art_com_grouptype` VARCHAR( 255 ) NOT NULL"); 
}



// Gruppen
$a = new rex_sql;
$a->setTable("rex_62_params");
$a->setValue("title","translate:com_groups");
$a->setValue("name","art_com_groups");
$a->setValue("prior","12");
$a->setValue("type","3");
$a->setValue("attributes","multiple=multiple");
$a->setValue("params","select name as label,id from rex_com_group order by label");
$a->setValue("validate",NULL);
$a->addGlobalCreateFields();
$g = new rex_sql;
$g->setQuery('select * from rex_62_params where name="art_com_groups"');
if ($g->getRows()==1) {
	$a->setWhere('name="art_com_groups"');
	$a->update();
}else {
	$a->insert();
}
$g = new rex_sql;
$g->setQuery('show columns from rex_article Like "art_com_groups"');
if ($g->getRows()==0) {
	$a->setQuery("ALTER TABLE `rex_article` ADD `art_com_groups` VARCHAR( 255 ) NOT NULL"); 
}




<h4 class="rex-hl3">1) MetaInfo: Art der Gruppenrechte<br /> Nur für Gruppen, Für alle etc. [art_com_grouptype]</h4>
<h4 class="rex-hl3">3) MetaInfo: Gruppen<br />
welche gruppen sind betroffen. [art_com_groups]</h4>

*/




echo "noch nicht fertig";





exit;

$fields_user = array();
	$fields_user[1] = array();
	$fields_user[1]['table_name'] = 'rex_com_user';
	$fields_user[1]['prio'] = 300; 
	$fields_user[1]['type_id'] = 'value'; 
	$fields_user[1]['type_name'] = 'be_manager_relation'; 
	$fields_user[1]['f1'] = 'group'; 
	$fields_user[1]['f2'] = 'Gruppen';
	$fields_user[1]['f3'] = 'rex_com_group';
	$fields_user[1]['f4'] = 'name'; 
	$fields_user[1]['f5'] = 1; 
	$fields_user[1]['f6'] = 1; 
	$fields_user[1]['list_hidden'] = 0; 

$fields_group = array();
	$fields_group[1] = array();
	$fields_group[1]['table_name'] = 'rex_com_group';
	$fields_group[1]['prio'] = 110; 
	$fields_group[1]['type_id'] = 'validate'; 
	$fields_group[1]['type_name'] = 'notEmpty'; 
	$fields_group[1]['f1'] = 'name'; 
	$fields_group[1]['f2'] = 'Bitte geben Sie den Gruppennamen ein';
	$fields_group[1]['list_hidden'] = 1; 
	$fields_group[2] = array();
	$fields_group[2]['table_name'] = 'rex_com_group';
	$fields_group[2]['prio'] = 100; 
	$fields_group[2]['type_id'] = 'value'; 
	$fields_group[2]['type_name'] = 'text'; 
	$fields_group[2]['list_hidden'] = 0; 
	$fields_group[2]['f1'] = 'name'; 
	$fields_group[2]['f2'] = 'Gruppenname';

// Version 4.3.1 .. REX Array wird bei PlugIns überschrieben.. deswegen
$REXADDON = $REX['ADDON'];
$REX['ADDON'] = $ADDONSsic; // Kommt aus class.rex_manager.inc.php unter plugin_manager::addon2plugin

$installed = 0;
$message = '';

if(!rex_xform_manager::createTable('com',"rex_com_group",array()))
{
	$message = 'Der XForm Manager konnte die Tabelle und Zuweisungen zu "rex_com_group" nicht anlegen.';
	
}elseif(!rex_xform_manager::addDataFields('com','rex_com_user',$fields_user))
{
	$message = 'Der XForm Manager hat die User-Tabellen-Felder nicht anlegen können.';
}elseif(!rex_xform_manager::addDataFields('com','rex_com_group',$fields_group))
{
	$message = 'Der XForm Manager hat die Gruppen-Tabellen-Felder nicht anlegen können.';
}else
{
	$installed = 1;
}

$REX['ADDON'] = $REXADDON;
$REX['ADDON']['install']['group'] = $installed;
$REX['ADDON']['installmsg']['group'] = $message;
















?>