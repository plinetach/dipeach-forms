<?php
class Submission{

    function __construct(){
        session_start();        
    }

    function parsePost(){
        $criteria=[];
        $values=[];
        foreach($_POST as $key => $value){
            $criteria[]=$key;
            $values[]=$value;
        }
        $_SESSION['criteria'] = $criteria;
        $_SESSION['values'] = $values;
    }
}