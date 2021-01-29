<?php
    include 'core/init.php';
    if(!Input::exists()) {
        $page = new UiController();
        $page->showLoginForm();
    } else {
        $user= new User;
       
        ////next line just for testing
        echo "Πάτησες ".Input::get('numberofkids'); exit;
        
        if($user->login(Input::get('username'), Input::get('password'))){

            $submission = new Submission();
            $page->showSubmissionForm();
            
            
            $submission->parsePost();


            $page->showReport();
        }
    }
    
    
?>