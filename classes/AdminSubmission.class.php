<?php
class AdminSubmission{
    public $_db;
    protected $startDate;
    protected $endDate;
    protected $json;

    public function __construct(){
        //echo 'Initializing...<br>';
		$this->_db = Dbh::getInstance();
	}
    
    public function parseAdminPost(){
        //echo 'Parsing post...<br>';
        $data = array();
        foreach($_POST as $key => $value){            
            if($key!='startDate' && $key!='endDate'){
                if($value!='0'){
                    $data["$key"] = $value; 
                }       
            }
        }
        $this->startDate = Input::get('startDate');
        $this->endDate = Input::get('endDate');
        $this->json = json_encode($data);
    }

    public function getStartDate(){
        return $this->startDate;
    }

    public function getEndDate(){
        return $this->endDate;
    }

    public function getJson(){
        return $this->json;
    }
}