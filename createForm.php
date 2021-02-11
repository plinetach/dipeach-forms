<?php
include 'core/init.php';
if(!Input::exists()){
    $page = new UiController();
    $page->showHeader("Διαχειριστής: Δημιουργία Φόρμας", "createForm.css");
    $page->showAdminSubmissionForm();
    $page->showFooter("createForm.js");  
}
else{
    $adminSub = new AdminSubmission();
    $adminSub->parseAdminPost();
    $toDb = array("formFields"=> $adminSub->getJson(), "dateStart"=>$adminSub->getStartDate(), "dateStop"=>$adminSub->getEndDate());
    // foreach($toDb as $element){
    //     echo $element.'<br>';
    // }
    $adminSub->_db->insert('forms', $toDb);
}