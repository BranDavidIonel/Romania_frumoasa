<?php
  require_once 'QuiresSQL.php';
  $select=new QuiresSQL();
  $idParinte=0;
  $idParinte=$_GET["idParinte"];
  echo "idparinte:".$idParinte;
 $nr=0;
 $nr=$select->selectNrVoturi("top_zone",$idParinte);
 if($nr==0){ 
  $rezult=$select->addVoturi("top_zone",1,$idParinte);
 }else{
  $rezult=$select->updateVot("top_zone",$idParinte);
 }
  echo json_encode($rezult);
  exit();

?>