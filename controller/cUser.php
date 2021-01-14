<?php

require 'model/mUsers.php';
class Controller_usuario
{
    
    private $mUser;
    
     public function getUsers($login,$passwd,$retField){
        $this->mUser = new Model_Usuario();
        return $this->mUser->getUsers($login,$passwd,$retField);
     }
    
}
