<?php
    include 'Submission.class.php';
    include 'UiController.class.php';
    include 'DbController.class.php';
    
    $page = new UiController();
    $page->showLoginForm();

    $username=$_POST['username'];
    $password= $_POST['password'];
    $connectionToDb = new DbController();
    if($connectionToDb->checkCredentials($username,$password)){

        session_start();
               
        $submisssion = new Submission();
        $page->showSubmissionForm();
        
        
        $submission->parsePost();
        $page->showReport();
    }
?>