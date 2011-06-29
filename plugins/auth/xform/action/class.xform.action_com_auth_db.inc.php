<?php

class rex_xform_action_com_auth_db extends rex_xform_action_abstract
{
	
	function execute()
	{
		global $REX;
	
		if(!isset($REX["COM_USER"])) {

			echo "error - access denied - user not logged in";
			
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

	function getDescription()
	{
		return "action|com_auth_db|";
	}

}

?>