<?php
include 'core/init.php';

$user = "admin1";
if(!Input::exists()){
    $page = new UiController();
    $page->showAdminHeader("Διαχειριστής:Δημιουργία Φόρμας από $user", "createDynaForm.css");
    $page->showAdminSubmissionDynaForm();
    $page->showAdminFooter("createDynaForm.js");
}
else{
    $adminSub = new AdminSubmission();
    $formFields = $adminSub->getJson();
    $startDate = date('Y-m-d', strtotime(str_replace('-', '/', $adminSub->getStartDate())));
    $endDate = date('Y-m-d', strtotime(str_replace('-', '/', $adminSub->getEndDate())));
    $toDb = array(
        "user"=> $user,
        "formFields"=>$formFields,
        "startDate"=>$startDate,
        "endDate"=>$endDate
    );
    
    echo "<strong>Saving to admin_db...</strong><br><br>";    
    $adminSub->getDb()->insert('forms', $toDb);
    
    //retrieving last insert
    $pk = getLastId($adminSub, $user, $formFields, $startDate, $endDate);
        
    //create submission table to db
    $tableName = 'sUs'.$pk;
    $columns = getColumns($formFields);
    $adminSub->getDb()->create($tableName, $columns);
}

function getLastId($obj, $u, $ff, $sd, $ed){
    $where = array(
        array("endDate", "=", $ed),
        array("startDate", "=", $sd),
        array("user", "=", $u)
    );

    $obj->getDb()->get('forms', $where);
    $results = $obj->getDb()->results();

    if(count($results)>1){
        foreach ($results as $result){
            if(json_decode($result->formFields) == json_decode($ff)){
                return $result->pk_forms;
            }
        }
    }else{
        return $results[0]->pk_forms;
    }
}

function getColumns($jsonObj){
    $columns = array();
    $finalString='';
    foreach(json_decode($jsonObj) as $column){
        $nullString='';
        if($column[2]=="on"){
            $nullString = "NOT NULL";
        }
        $columnName = $column[1];    
        $columnType = getColType($column[0]);
        $line = $columnName.' '.$columnType.' '.$nullString;
        array_push($columns, $line);
    }
    foreach($columns as $subString){
        $finalString.=$subString.',';
    }
    return substr_replace($finalString ,"",-1); //removes last comma
}

function getColType($data){
    if($data=="1"){
        return "VARCHAR(30)";
    }else if($data=="2"){
        return "BOOLEAN";
    }
}