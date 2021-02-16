<?php
include 'core/init.php';

$pk = 12; //THE PRIMARY KEY OF THE FORM THAT THE USER REQUESTED
if(!Input::exists()){
    $results = getForm($pk);
    if($results){
        $file = "userSubmission.php";
        $elements= json_decode($results[0]->formFields);
        $page = new UiController;
        $page->showUserHeader("Υποβολή Χρήστη");
        $page->openSubmissionForm($file);
        $i=0;
        foreach($elements as $element){            
            $title = $element[1];            
            $type = getTyp($element[0]); 
            $required= getReq($element[2]);           
            $id="el".$i;
            $page->showElement($id, $type, $required, $title);

            $i++;
        }
        $page->closeSubmissionForm();
        $page->showUserFooter();
    }
}else{
    $userSub = new UserSubmission;
    $userSub->parseUserPost();

    //CODE TO SAVE TO DB GOES HERE
    //............................

}
function getReq($cell){
    if($cell=="on"){
        return "required";
    }
    return null;
}
function getForm($primaryKey){
    $criteria=array("pk_forms", "=", $primaryKey);
    $linkDb = Dbh::getInstance();
    $linkDb->get("forms", $criteria);

    return $linkDb->results();    
}

function getTyp($cell){
    if($cell=='1'){
        return 'text';
    }else if($cell=='2'){
        return "checkbox";
    }
}