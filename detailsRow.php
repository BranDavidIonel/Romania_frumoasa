<?php
    require_once 'QuiresSQL.php';
   $select=new QuiresSQL();
   $idParinte=$_GET["idParinte"];
   $rezult=$select->selectDetalii_id_SQl($idParinte);
  
   echo json_encode($rezult);



?>