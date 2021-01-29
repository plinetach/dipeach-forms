<?php
class Submission{
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
	
	function parsePost(){
        $criteria=[];
        $values=[];
        foreach($_POST as $key => $value){
            $criteria[]=$key;
            $values[]=$value;
        }
        $_SESSION['criteria'] = $criteria;
        $_SESSION['values'] = $values;
    }
	  
}

