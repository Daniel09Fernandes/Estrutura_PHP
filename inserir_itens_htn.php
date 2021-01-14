<?php 

header('Content-Type: text/html; charset=utf-8');

echo"

<style>
.collapsible {
   background-color: #383839;
   color: white;
   cursor: pointer;
   padding: 18px;
   width: 100%;
   border: none;
   text-align: left;
   outline: none;
   font-size: 16px;
 }
 
 .active, .collapsible:hover {
   background-color: #555;
 }
 
 .content {
   padding: 0 18px;
   display: none;
   overflow: hidden;
   background-color: #f1f1f1;
 }
 .grid-container {
   display: grid;
   grid-template-columns: auto auto auto auto auto;
   background-color: #576069;
   padding: 5px;
 }
 
 .grid-item {
   background-color: rgba(255, 255, 255, 0.8);
   border: 1px solid rgba(0, 0, 0, 0.8);
   padding: 5px;
   font-size: 15px;
   text-align: center;
 }
</style>";

 
 /**
  * CommonITILCost Class
  *
  * @since 0.85
 **/

 
//include ('CommonITILCost.class.php');
include ('../inc/includes.php');

Session::checkCentralAccess();

$cost = $_GET['id_cost']; 

class itens_htn  extends CommonDBChild  {
    public $dohistory        = true;
    

  
    public function deleteItem($items_id,$item_desc){

        $conn = new mysqli(  $this->servername, $this->username, $this->password, $this->dbname);
   
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else {
          $conn->query("SET NAMES 'utf8'");
          $conn->query('SET character_set_connection=utf8');
          $conn->query('SET character_set_client=utf8');
          $conn->query('SET character_set_results=utf8');

         }
   
        $sql = "DELETE FROM glpidb.glpi_ticketcosts_item_htn where id_cost=$items_id  and  item_desc= '$item_desc' "  ;
   
        if ($conn->query($sql) === true) {
            echo "<script> alert('Item removido')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        $this->getItemHtn($items_id);

    }

    public function postOrUpdate_itemHtn($items_id, $item_desc,$vl,$qtd)
    {
        if ($items_id != '-1') {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
   
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else {
              $conn->query("SET NAMES 'utf8'");
              $conn->query('SET character_set_connection=utf8');
              $conn->query('SET character_set_client=utf8');
              $conn->query('SET character_set_results=utf8');
    
             }
   
            $sql = "INSERT INTO glpidb.glpi_ticketcosts_item_htn (id_cost,item_desc,item_valor,item_qtd)
              VALUES (".$items_id.",'". $item_desc."',".$vl.",".$qtd."     )";
   
            if ($conn->query($sql) === true) {
                // echo "Novo item incluso!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }



            $conn->close();
        }else{ echo"<script>alert('você precisa salvar o orçamento antes de incluir os itens')</script>"; }
    }

     //Daniel
     function getItemHtn($items_id)
     {
          
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
         if ( $conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }else {
          $conn->query("SET NAMES 'utf8'");
          $conn->query('SET character_set_connection=utf8');
          $conn->query('SET character_set_client=utf8');
          $conn->query('SET character_set_results=utf8');

         }
        
         echo' 
            <script> 
                 
              try {
                   var node;
                   var aux ;

                   node = document.getElementById("grid");
                   aux =  node.parentNode;
                   if (aux.parentNode) {
                       aux.removeChild(node);
                     }
                  }
                  catch(err) {
                    
                  }
            
             </script> ';

         echo"<p id='it'></p>";
         $sql = "SELECT id_cost,item_desc,item_valor,item_qtd,item_vl_total FROM glpidb.glpi_ticketcosts_item_htn where id_cost=$items_id ";
         $result = $conn->query($sql);
         echo"<div id='grid' class='grid-container ' > ";
         echo'  <div style="background-color:#005161; color: #FFFF " class="grid-item">Descrição:</div>';
         echo'  <div style="background-color:#005161; color: #FFFF "  class="grid-item">Valor</div>';
         echo'  <div style="background-color:#005161; color: #FFFF "  class="grid-item">Quantidade</div>';
         echo'  <div style="background-color:#005161; color: #FFFF "  class="grid-item">Total</div>';
         echo'  <div style="background-color:#005161; color: #FFFF "  class="grid-item">Ação</div>';
         if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) {
               echo ' <div  id="desc_cost" name=' .$row["item_desc"]. '  class="grid-item"  >  ' . ( $row["item_desc"]). '</div>';
               echo ' <div  class="grid-item"  >  ' . Html::formatNumber( $row["item_valor"]). '</div>';
               echo ' <div  class="grid-item"  >  ' .$row["item_qtd"]. '</div>';
               echo ' <div  class="grid-item"  >  ' .Html::formatNumber ( $row["item_vl_total"]). '</div>';
             //  echo ' <div  style="cursor:pointer; color:red" class="grid-item"  id="id_cost"  name='. $row["id_cost"].' >   Remover </div>';
             echo ' <div class="grid-item" >  
                         <form method="GET" action="inserir_itens_htn.php" >
                            <input id="id_ct"   type="hidden" name="id_cost" value="'. $_GET['id_cost'] .'" >
                            <input id="id_cost_del"   type="hidden" name="id_cost_del" value="'. $_GET['id_cost'] .'" >
                            <input id="desc_cost_del"   type="hidden" name="desc_cost_del" value="'. $row["item_desc"] .'" >
                            <input class="submit" size="15" type="submit" value="Remover" > 
                         </form>
             
             </div>';
               // echo $row["item_desc"].'</br>';
             }
         } else {
            echo'';
         }
         echo"</div > ";  
         $conn->close();
     }


    function criaformitens(){
        echo' 
        <form method="GET" action="inserir_itens_htn.php" accept-charset="UTF-8" >
            <input id="id_ct"   type="hidden" name="id_cost" value="'. $_GET['id_cost'] .'" >
    
            <p style=" font-weight: bolder;font-size:12px;" > Descrição:       
            <input id="desc_item" type="text" name="desc_item"> 
            
            Quantidade:
            <input id="qtd" type="number" name="qtd">
               
            Valor:
            <input id="valor" type="number" step="any" name="valor">
            
            <input class="submit" size="15" type="submit" value="add" > </p>
    
        </form>';
        
  }
 

}

$obj_item =  new itens_htn();

$obj_item->criaformitens();

$obj_item->getItemHtn($cost);

    if ($_GET['qtd'] != '' && $_GET['desc_item'] != '' && $_GET['valor'] != ''  && $_GET['id_cost'] != '') {
        try {
           $obj_item->postOrUpdate_itemHtn($cost, $_GET['desc_item'], $_GET['valor'], $_GET['qtd']);
          $obj_item->getItemHtn($cost);
        }catch (Exception $e) {
            echo"erro ao incluir";
        }
                     
    }

    if($_GET['id_cost_del'] != '' && $_GET['desc_cost_del'] != ''){
        $obj_item->deleteItem($_GET['id_cost_del'],$_GET['desc_cost_del']);
    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      

