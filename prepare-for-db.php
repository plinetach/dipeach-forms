<!DOCTYPE html>
<html>
    <head>
        <title>Preparing for Database</title>
    </head>
</html>
    
<?php
    session_start();
    $criteria=[];
    $values=[];
    foreach($_POST as $key => $value){
        $criteria[]=$key;
        $values[]=$value;
    }
    $_SESSION['criteria'] = $criteria;
    $_SESSION['values'] = $values;

    //Here goes code for sending saved data to db
    //...........................................
?>
    
