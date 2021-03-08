<?php
class AdminSubmission{
    private $_db,
            $_startDate,
            $_endDate,
            $_json,
            $_admin,
            $_table,
            $_timestamp,
            $_title,
            $_pk;
     

    public function __construct($admin, $table){
        echo '<strong>Initializing...</strong><br><br>';
        $this->_admin = $admin;
        $this->_table = $table;
		$this->_db = Dbh::getInstance();
        $this->prepareForDb();
	}

    private function parseAdminPost(){
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

        $this->_startDate =  date('Y-m-d', strtotime(str_replace('-', '/', Input::get('startDate'))));
        $this->_endDate =  date('Y-m-d', strtotime(str_replace('-', '/', Input::get('endDate'))));
        $this->_title = Input::get('title');
        $this->_json = json_encode($dataArr);
        // $this->_json = json_encode($dataArr, JSON_UNESCAPED_UNICODE);
    }

    private function prepareForDb(){
        $this->parseAdminPost();
        $this->_timestamp = strval(mktime(date("h"),date("i"),date("s"),date("m"),date("d"),date("Y")));
        $this->_pk = $this->_timestamp.$this->_admin;
        $toDb = array(
            "formPk"=>$this->_pk,
            "admin"=> $this->_admin,
            "formFields"=>$this->_json,
            "startDate"=>$this->_startDate,
            "endDate"=>$this->_endDate,
            "title"=>$this->_title
        );
        $this->saveToDb($toDb);
    }

    private function saveToDb($anArray){
        echo "<strong>Saving to admin_db...</strong><br><br>";    
        $this->_db->insert($this->_table, $anArray);
        $this->createUserSubmissionsTable();
    }

    private function createUserSubmissionsTable(){
        $tableName = 'sUs'.$this->_pk;
        $columns = $this->getColumns();
        $this->_db->create($tableName, $columns);
    }

    private function getColumns(){
        $columns = array();
        $finalString='subId INT(4) AUTO_INCREMENT PRIMARY KEY, user VARCHAR(10), ';
        $i=0;
        foreach(json_decode($this->_json) as $column){
            $nullString='';
            if($column[2]=="on"){
                $nullString = "NOT NULL";
            }
            // $columnName = $column[1];    
            $columnName = 'el'.$i; 
            $columnType = $this->getColType($column[0]);
            $line = $columnName.' '.$columnType.' '.$nullString;
            array_push($columns, $line);
            $i++;
        }
        foreach($columns as $subString){
            $finalString.=$subString.',';
        }

        return substr_replace($finalString ,"",-1); //removes last comma
    }

    private function getColType($element){
            if($element=="1"){
                return "VARCHAR(30)";
            }else if($element=="2"){
                return "TINYINT(1)";
            }
    }

    public function getStartDate(){
        return $this->_startDate;
    }

    public function getEndDate(){
        return $this->_endDate;
    }

    public function getData(){
        return $this->_json;
    }

    public function getAdmin(){
        return $this->_admin;
    }

    // private function getLastId(){
    //     $where = array(
    //         array("endDate", "=", $this->_endDate),
    //         array("startDate", "=", $this->_startDate),
    //         array("user", "=", $this->_user)
    //     );
    
    //     $this->_db->get($this->_table, $where);
    //     $results = $this->_db->results();
    
    //     if(count($results)>1){
    //         foreach ($results as $result){
    //             if(json_decode($result->formFields) == json_decode($this->_json)){
    //                 return $result->pk_forms;
    //             }
    //         }
    //     }else{
    //         return $results[0]->pk_forms;
    //     }
    // }
}