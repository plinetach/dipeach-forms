<?php
class AdminSubmission{
    protected $startDate;
    protected $endDate;
    protected $json;

    public function __construct(){
        echo 'Initializing...<br>';
		//$this->_db = Dbh::getInstance();
	}
    
    public function parseAdminPost(){
        echo 'Parsing post...<br>';
        $data = array();
        foreach($_POST as $key => $value){            
            if($key!='startDate' && $key!='endDate'){
                if($value!='0'){
                    //echo 'from post: '.$key.' '.$value.'<br>';
                    $data["$key"] = $value; 
                }       
            }
        }
        $this->startDate = $_POST['startDate'];
        $this->endDate = $_POST['endDate'];
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