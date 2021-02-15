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
    $toDb = array(
        "formFields"=> $adminSub->getJson(),
        "startDate"=>$adminSub->getStartDate(),
        "endDate"=>$adminSub->getEndDate()
    );
    
    echo "<strong>Saving to admin_db...</strong><br><br>";    
    $adminSub->getDb()->insert('forms', $toDb);

    //create submission table to db

}