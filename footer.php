<!-- for <div class="col-sm-8 text-left"> (central part) -->
</div>
<div class="col-sm-2 sidenav">
<?php
$select=new QuiresSQL();        
         	$result=$select->selectTop5zone("top_zone");
 		// se selecteaza fiecare linie din tabel
                    echo'<div class="list-group">';
                    $select=new QuiresSQL();        
                    $result=$select->selectTop5zone("top_zone");
              // se selecteaza fiecare linie din tabel
                             echo'<ul class="list-group">';
                               $nr=1;
                             while($row = mysqli_fetch_array( $result)){
                              
                                 $id=$row['idparinte'];
                                 $nume=$row['nume'];
                                 $descriere=$row['descriere'];
                                 if(strlen($descriere)>200){
                                 $trimStr=substr($descriere,0,200)."...";
                                 }else{
                                   $trimStr=$descriere;
                                 }
                                 echo'<a class="list-group-item active"> <span class="badge">'.$nr.'</span>'.$nume.'</a>
                                      <a class="list-group-item">'.$trimStr.'</a>
                                      ';
                                
                             $nr++;
                            }
                             echo '</div>';
  ?>
</div> 
</div>
 <footer class="container-fluid text-center">
  <p>Made by Bran David</p>
</footer>
</body>

</html>