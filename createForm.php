<?php
include 'core/init.php';

$user = "admin1";
if(!Input::exists()){
    $page = new UiController();
    $page->showFormCreationPage($user);
}
else{
    $adminSub = new AdminSubmission($user,'forms');
}