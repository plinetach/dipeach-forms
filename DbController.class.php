<?php
class DbController{
    
    function __construct(){
    
        $dns = "mysql:host=$hostname;dbname=$dbName";
        $dbUsername = 'test';
        $dbPassword = 'test';
        try{

            $db = new PDO($dns, $dbUsername, $dbPassword);
          
        }catch(Exception $e)
        {
            $errorMessage = $e->getMessage();
            echo "<p>Error message: $errorMessage </p>";
        }
    }

    function checkCredentials($sessionUsername,$sessionPassword){
        
    }

}