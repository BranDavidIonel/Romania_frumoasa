<?php include_once 'header.php';?> 
<div class="alert alert-info">
<h1>Rezultatele cautate!</h1>
</div>
<?php
if(isset($_POST['submitCauta'])){
 $cauta=$_POST['Cauta'];
 //require_once 'QuiresSQL.php';

                    $select=new QuiresSQL();
                    $result=$select->searchInZoneTuristice($cauta);
                    // se selecteaza fiecare linie din tabel
                    while($row = mysqli_fetch_array( $result)){
                        echo'<table class="table table-bordered">';
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];
                              
                        $imgs=$row['imagine'];
                        echo'<tr><td style="font-size: 20px;">'.$nume.'</td></tr>
                             <tr><td style="color: #21a51e;font-size: 15px;text-align: left;">'.$descriere.'</td></tr>';
                             $imagesSplit= explode(',', $imgs);
                             //echo '<tr>';   <tr><td><img src="./imagini/'.$img.'" width="200px"/></td></tr>
                             echo '<tr><td>
                             <div id="myCarousel'.$id.'" class="carousel slide" data-ride="carousel">';
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
                             echo '
                             <a class="left carousel-control" href="#myCarousel'.$id.'" data-slide="prev">
                               <span class="glyphicon glyphicon-chevron-left"></span>
                               <span class="sr-only">Previous</span>
                             </a>
                             <a class="right carousel-control" href="#myCarousel'.$id.'" data-slide="next">
                               <span class="glyphicon glyphicon-chevron-right"></span>
                               <span class="sr-only">Next</span>
                             </a>
                           </div>
                           </td></tr>';
                             echo '<tr><td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="'.$id.'" onclick="showDetails(this)"> Detalii</button></td></tr>'; 
                             echo '<tr><td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="'.$id.'" onclick="addVot(this)""><img src="imagini/ptSite/likeFB.png" width="30px"/></button></td></tr>';
                             
                    }
                    echo '</table>';
                    echo '<br>';
    
    
}


?>
<?php include_once 'footer.php';?>
