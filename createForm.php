<?php
include 'core/init.php';
// include 'classes/AdminSubmission.class.php';
// include 'classes/UiController.class.php';
// include 'classes/Input.class.php';
// include 'classes/Config.class.php';
$admin = "admin1";
if(!Input::exists()){
    $page = new UiController();
    $page->showFormCreationPage($admin);
}
else{
    $adminSub = new AdminSubmission($admin,'forms');
}