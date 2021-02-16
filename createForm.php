<?php
include 'core/init.php';
if(!Input::exists()){
    $page = new UiController();
    $page->showAdminHeader("Διαχειριστής:Δημιουργία Φόρμας", "createDynaForm.css");
    $page->showAdminSubmissionDynaForm();
    $page->showAdminFooter("createDynaForm.js");
}
else{
    $adminSub = new AdminSubmission();
    $startDate = date('Y-m-d', strtotime(str_replace('-', '/', $adminSub->getStartDate())));
    $endDate = date('Y-m-d', strtotime(str_replace('-', '/', $adminSub->getEndDate())));
    $toDb = array(
        "formFields"=> $adminSub->getJson(),
        "startDate"=>$startDate,
        "endDate"=>$endDate
    );
    // $toDb = array(
    //     "formFields"=> $adminSub->getJson(),
    //     "startDate"=>$adminSub->getStartDate(),
    //     "endDate"=>$adminSub->getEndDate()
    // );
    
    echo "<strong>Saving to admin_db...</strong><br><br>";    
    $adminSub->getDb()->insert('forms', $toDb);

    //create submission table to db

}