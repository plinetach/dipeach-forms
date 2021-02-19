<?php
class UserSubmission{
	private $_db,
			$_user,
			$_formFields,
			$_pk;
				
	public function __construct($formPk, $user){
		$this->_db = Dbh::getInstance();
		$this->_user = $user;	
		$this->_pk = $formPk;
		$this->_formFields = $this->getForm();
	}
	
	function parseUserPost(){
        $keys=array();
        $values=array();
        foreach($_POST as $key => $value){
            array_push($keys, $key);
            array_push($values, $value);
        }
        $_SESSION['keys'] = $keys;
        $_SESSION['values'] = $values;
    }

	private function getForm(){
		$criteria=array("formPk", "=", $this->_pk);
    	$this->_db->get("forms", $criteria);

    	return json_decode($this->_db->results()[0]->formFields); 
	}

	public function getFormFields(){
		return $this->_formFields;
	}

	public function getAdmin(){
		return $this->_admin;
	}

	public function getUser(){
		return $this->_user;
	}
	  
}

