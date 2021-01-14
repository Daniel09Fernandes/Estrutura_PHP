<?php

require 'conexao.php';
 class LGquery extends conexao 
{

    public function execute($sql, $params = [], $valor = [], $retField)
    { 
       try {
           $conn = $this->getInstance();

           if ($sql != '') {
               $query = $conn->prepare($sql);

               $i = 0;
               foreach ($params as $item) {
                   $query->bindParam($item, $valor[$i]);
                   $i++;
               }
               $query->execute();

               if ($query->rowCount() > 0) {
                   $return = $query->fetchAll(PDO::FETCH_ASSOC);

                   $arrField = explode(',', $retField);

                   foreach ($return as &$value) {
                       foreach ($arrField as $item) {
                           $return = $return.', '.$value[$item];
                       }
                   }
                   return  $return;
               }else{return '0';}
           } else {
               return 'SQL: sql sem valor informado';
           }
         }catch (Exception $e) {
            echo 'SQL: Exceção capturada: ',  $e->getMessage(), "\n";
        }
        

    }
}
