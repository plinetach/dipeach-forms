<?php
class User{
    private $_db,
            $_avForms=array(),
            $_username;

    function __construct($user){
        //session_start();
        $this->_db = Dbh::getInstance();
        $this->_username = $user;
        $this->getAvailableForms();
    }

    private function getAvailableForms(){
        $where = array("afm","=","$this->_username");
        $this->_db->get('usersforms',$where);

        foreach($this->_db->results() as $form){

            array_push($this->_avForms, $form->formPk);
        }
    }

    public function getAvForms(){
        return $this->_avForms;
    }

    function login($username, $password){

    }
}