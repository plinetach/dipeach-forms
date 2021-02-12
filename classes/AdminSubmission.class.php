<?php
class AdminSubmission{
    protected $_db;
    protected $_startDate;
    protected $_endDate;
    protected $_json;

    public function __construct(){
        echo 'Initializing...<br>';
		// $this->_db = Dbh::getInstance();
	}
    
    public function parseAdminPost(){
        echo 'Parsing post...<br>';
        $data = array();
        foreach($_POST as $key => $value){            
            if($key!='startDate' && $key!='endDate'){
                if($value!='0'){
                    $data["$key"] = $value; 
                }       
            }
        }
        $this->_startDate = Input::get('startDate');
        $this->_endDate = Input::get('endDate');
        $this->_json = json_encode($data);
    }

    public function getStartDate(){
        return $this->_startDate;
    }

    public function getEndDate(){
        return $this->_endDate;
    }

    public function getJson(){
        return $this->_json;
    }

    public function getDb(){
        return $this->_db;
    }
}