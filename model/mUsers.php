<?php

require 'DAO/query.php';
class Model_Usuario
{
   
    private $sql =" select * from tb_user where login = :id and passwd = :pass ";   

    public function getUsers($idUser,$passUser,$retField)
    {
        $arrParam =[':id',':pass'];

        // $this->id_user  ='DANIEL.FERNANDES';
        // $this->pass_user ='54321';

        $value = [ $idUser,$passUser ];
       // var_dump($arrParam);
        
        $qry = new LGquery();
        $ret = explode(',', $qry->execute($this->sql, $arrParam, $value,$retField));
        
        if( $ret[1] == '' ){
          return('Erro ao logar.</br> Confira o usuario e senha digitados!');
        }else{
           return "Seja bem vindo". $ret[1] ;  
        }
    }
}

