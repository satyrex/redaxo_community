<?php

class rex_xform_action_com_auth_db extends rex_xform_action_abstract
{
	
	function execute()
	{
		global $REX;
	
		if(!isset($REX["COM_USER"])) {

			echo "error - access denied - user not logged in";
			
		}else {

			if($this->getElement(2) == "logout") {
				$REX['COM_USER']->setLogout(true);
				echo $REX['COM_USER']->checkLogin();
				unset($REX["COM_USER"]);
				unset($_COOKIE['comrex_auth']);

			}elseif($this->getElement(2) == "delete") {

				while(@ob_end_clean()) {}
				rex_com_auth::deleteUser($REX["COM_USER"]->getValue("id"));
				unset($REX["COM_USER"]);
				header("Location:".rex_getUrl($REX['ADDON']['community']['plugin_auth']['article_logout'])); 
				exit;
			
			}else {

				$sql = rex_sql::factory();
				if ($this->params["debug"]) {
					$sql->debugsql = TRUE;
		    	}
		    
		    	$sql->setTable("rex_com_user");
				foreach($this->elements_sql as $key => $value) {
					$sql->setValue($key, $value);
				}
	
				$sql->setWhere('id='.$REX["COM_USER"]->getValue("id").'');
				$sql->update();

			}

		}

	}

	function getDescription()
	{
		return "action|com_auth_db|update(default)/delete/logout";
	}

}

?>