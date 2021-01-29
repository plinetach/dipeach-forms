<?php
class User{
    private $_db;
    function __construct(){
        $this->_db = Dbh::getInstance();
    }

    function login($username, $password){

    }
}