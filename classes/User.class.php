<?php
class User{
    protected $_db;
    function __construct(){
        $this->_db = Dbh::getInstance();
    }

    function login($username, $password){

    }
}