<?php
include 'core/init.php';

//-------------->TESTING DATA<--------------//
$user = "065105785";
// $user = "029762769";
// $user = "111111111";
// $user = "222222222"; 
//-------------->TESTING DATA<--------------//
$page = new UiController;
if(!Input::exists()){
    $userLoggedIn = new User($user); 
    $_SESSION['type']="justLoggedIn";
    $_SESSION['user'] = $user;
    $page->showAvailableForms($userLoggedIn->getAvForms(), $user);
}
else{
   
    $userSub = new UserSubmission($_SESSION['formToShow'], $user);
    if($_SESSION['type']=="justLoggedIn"){
        $_SESSION['formToShow'] = Input::get('avforms');
        $page->showUserSubmissionPage($user, $userSub->getFormFields());
        $_SESSION['type']="justChoseFormToSubmit";
    }
    else{
        $userSub->parseUserPost();
    }
}