<?php
    include 'core/init.php';
    
    $page = new UiController();
    $page->showLoginForm();
    $user= new User;
    if($user->login($_POST['username'], $_POST['password'])){

        $submission = new Submission();
        $page->showSubmissionForm();
        
        
        $submission->parsePost();


        $page->showReport();
    }
?>