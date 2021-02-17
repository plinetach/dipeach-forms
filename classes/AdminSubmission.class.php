<?php
class AdminSubmission{
    protected $_db;
    protected $_startDate;
    protected $_endDate;
    protected $_json;
    protected $_parsed= false;

    public function __construct(){
        echo '<strong>Initializing...</strong><br><br>';
		$this->_db = Dbh::getInstance();
	}
    
    public function parseAdminPost(){
        echo '<strong>Parsing post...</strong><br><br>';
        $data=array();
        $dataArr=array();
        $i = -1;

        $startsWith=function( $haystack, $needle ){
            $length = strlen( $needle );
            return substr( $haystack, 0, $length ) === $needle;
       };
        foreach($_POST as $key => $value){
            if($key!='startDate' && $key!='endDate'){                
                if($startsWith($key, 's')){
                    //echo $key.'<br>';
                    $i++;
                }
                $data[$i].= $value.'*';
            }
        }
        
        $i=0;        
        foreach($data as $element){
            $dataArr[$i]=explode('*',$element,-1);
            if(sizeof($dataArr[$i])==2){
                array_push($dataArr[$i], 'off');
            }
            $i++;
        }

        $this->_startDate = Input::get('startDate');
        $this->_endDate = Input::get('endDate');
        $this->_json = json_encode($dataArr);
        // $this->_json = json_encode($dataArr, JSON_UNESCAPED_UNICODE);
        $this->_parsed=true;
    }

    public function getStartDate(){
        if(!$this->_parsed){
            $this->parseAdminPost();
        }
        return $this->_startDate;
    }

    public function getEndDate(){
        if(!$this->_parsed){
            $this->parseAdminPost();
        }
        return $this->_endDate;
    }

    public function getJson(){
        if(!$this->_parsed){
            $this->parseAdminPost();
        }
        return $this->_json;
    }

    public function isParsed(){
        return $this->_parsed;
    }

    public function getDb(){
        return $this->_db;
    }
}