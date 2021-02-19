<?php
include 'core/init.php';

//-------------->TESTING DATA<--------------//
// $user = "065105785";
// $user = "029762769";
// $user = "111111111";
$user = "222222222"; 
//-------------->TESTING DATA<--------------//
$page = new UiController;
if(!Input::exists()){
    $userLoggedIn = new User($user);   
    $_SESSION['flag']=1;
    $page->showAvailableForms($userLoggedIn->getAvForms(), $user);
}
else{
    $formToShow = INPUT::get('avforms');
    $userSub = new UserSubmission($formToShow, $user);
    if($_SESSION['flag']==1){
        $page->showUserSubmissionPage($user, $userSub->getFormFields());
        $_SESSION['flag']=2;
    }
    else{
        $userSub->parseUserPost();

        print_r($_SESSION['keys']);
        print_r($_SESSION['values']);    
    }
}