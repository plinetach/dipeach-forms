<?php
include 'core/init.php';

$pk = 36; //THE PRIMARY KEY OF THE FORM THAT THE USER REQUESTED
if(!Input::exists()){
    $results = getForm($pk);
    if($results){
        $file = "userSubmission.php";
        $elements= json_decode($results[0]->formFields);
        $page = new UiController;
        $page->showHeader("Υποβολή Χρήστη");
        $page->startSubmissionForm($file);
        $i=0;
        foreach($elements as $element){
            $type = $element[0];
            $title = $element[1];
            $required= $element[2];
            
            

            if($type=='1'){
                $type = 'text';
            }else if($type=='2'){
                $type = "checkbox";
            }
            if($required="on"){
                $required="required";
            }else{
                $required='';
            }
            $id="el".$i;

            $page->showElement($id, $type, $required, $title);
            $i++;
        }
        $page->endSubmissionForm();
        $page->showFooter();
    }
}else{
    $userSub = new UserSubmission;
    $userSub->parseUserPost();

    //CODE TO SAVE TO DB GOES HERE
    //............................

}

function getForm($primaryKey){
    $criteria=array("pk_forms", "=", $primaryKey);
    $linkDb = Dbh::getInstance();
    $linkDb->get("forms", $criteria);

    return $linkDb->results();    
}
