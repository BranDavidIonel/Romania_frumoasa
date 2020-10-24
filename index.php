<?php 
include_once 'header.php';
require_once 'QuiresSQL.php';
?>
<?php
$select=new QuiresSQL();
echo '<div >';
echo ' <p>
          Despre abundența resurselor turistice care sălășluiește pe întinderea frumoasei noastre patrii știm încă de la primele ore de Geografia României.
        Nu lipsiți de mândrie patriotică în fragedele noastre minți am învățat că avem munți cu duiumul, plaje, istorie și tradiții cât să umplem biblioteci întregi, ape termale, castele și cetăți de faimă internațională, floră luxuriantă, faună pe cât cuprinde… 
        Ni s-a mai spus, cu gravitate în glas, asa cum tema o impunea, că indolența face ca toată această îndestulare turistică să fie lăsată în paragină. Prea tineri fiind, nu ne era chiar la îndemână să urcăm în primul tren pentru a ne convinge de acuratețea 
        spuselor dascălilor noștri, dar, pe măsura trecerii anilor și a înaintării în vârstă, am început să bifăm tot mai multe dintre aceste locuri.
        </p>';
$result=$select->selectAllImages();
//vreau sa pun toate pozele din toate locurile
$image_all='';
while ($row=mysqli_fetch_array($result)) {
  $images=$row['imagine'];
  $image_all=$image_all.$images.',';
}
$image_all=mb_substr($image_all,0,-1);
if ($image_all!='') {
  $id='AllImages';
 // $images=$row['imagine'];
  $imagesSplit= explode(',', $image_all);
  echo '<div id="myCarousel'.$id.'" class="carousel slide" data-ride="carousel" >';
  echo '<ol class="carousel-indicators">';
$bool_first=true;
foreach ($imagesSplit as $image) {
     if($bool_first){
     echo '<li data-target="#myCarousel'.$id.'" data-slide-to="'.$image.'" class="active"></li>';
     $bool_first=false;
     }else{
          echo '<li data-target="#myCarousel'.$id.'" data-slide-to="'.$image.'"></li>';
         
     } 

  }
  echo '</ol>';

  echo '<div class="carousel-inner">';
       
  $bool_first=true;
  foreach ($imagesSplit as $image) {
       if($bool_first){
       echo ' <div class="item active" align="center">';
       $bool_first=false;
       }else{
            echo ' <div class="item" align="center">';
       } 
       echo '<img src="./imagini/'.$image.'" width="500px"/>';
       echo '</div>';
  }
  echo '</div>';    
  echo '<a class="left carousel-control" href="#myCarousel'.$id.'" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel'.$id.'" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';
}
 echo '</div>';       
      
?> 
<?php  include_once 'footer.php'; ?>
   
      

