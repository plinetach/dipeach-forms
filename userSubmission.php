<?php
include 'core/init.php';
$user = "065105785";
// $user = "029762769";
// $user = "111111111";
// $user = "222222222"; 
$formPk = "1613724118admin1"; //THE PRIMARY KEY OF THE FORM THAT THE USER REQUESTED
// $formPk = "1613724559admin1";


$userSub = new UserSubmission($formPk, $user);
if(!Input::exists()){
    $page = new UiController;
	$page->showUserSubmissionPage($user, $userSub->getFormFields());
}else{
    $userSub->parseUserPost();

    print_r($_SESSION['keys']);
    print_r($_SESSION['values']);
    
    //CODE TO SAVE TO DB GOES HERE
    //............................

}