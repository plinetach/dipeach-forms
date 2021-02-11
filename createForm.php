<?php
include 'core/init.php';
if(!Input::exists()){
    $page = new UiController();
    $page->showHeader("Δημιουργία Φόρμας Διαχειριστή", "createForm.css");
    $page->showAdminSubmissionForm();
    $page->showFooter("createForm.js");  
}else{
    $adminSub = new AdminSubmission();
    $adminSub->parseAdminPost();
    echo $adminSub->getStartDate().' '.$adminSub->getEndDate().'<br>';
}
