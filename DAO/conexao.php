<?php
abstract class Conexao
{
  private static $conexao;

  
   private $servidor = "";
   private $porta = "5432";
   private $bancoDeDados = "";
   private $usuario = "";
   private $senha = "";

   protected function getInstance(){
       

    $conStr = "pgsql: host= $this->servidor; port=$this->porta; 
       dbname=$this->bancoDeDados;user=$this->usuario;password=$this->senha";

    $this->conexao =  new \PDO($conStr);
       
    $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return  $this->conexao;
   }

}
