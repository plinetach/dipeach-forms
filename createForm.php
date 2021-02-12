<?php
include 'core/init.php';
if(!Input::exists()){
    $page = new UiController();
    $page->showHeader("Διαχειριστής:Δημιουργία Φόρμας", "createDynaForm.css");
    $page->showAdminSubmissionDynaForm();
    $page->showFooter("createDynaForm.js");
}
else{
    $adminSub = new AdminSubmission();
    $adminSub->parseAdminPost();
    $toDb = array(
        "formFields"=> $adminSub->getJson(),
        "startDate"=>$adminSub->getStartDate(),
        "endDate"=>$adminSub->getEndDate());
    
    echo "<strong>Saving to admin_db...</strong><br><br>";
    foreach($toDb as $key=>$element){
        echo $key.' '.$element.'<br>';
    }
    
    $adminSub->getDb()->insert('forms', $toDb);
}