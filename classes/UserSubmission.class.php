<?php
class UserSubmission{
	private $_db;
	public $_submission_control_data;
				
	public function __construct(){
		$this->_db = Dbh::getInstance();
	}
	
	public function find($id){
			
		$get_data = $this->_db->get('submissions_control', array('id', '=', $id));
			
		if($get_data->count()) {
			$this->_submission_control_data = $get_data->results();		
			return true;
		}
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
	  
}

