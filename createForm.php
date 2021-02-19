<?php
include 'core/init.php';

$admin = "admin1";
if(!Input::exists()){
    $page = new UiController();
    $page->showFormCreationPage($admin);
}
else{
    $adminSub = new AdminSubmission($admin,'forms');
}