<?php include_once 'header.php';?> 
<div class="alert alert-info">
<h1>Rezultatele cautate!</h1>
</div>
<?php
if(isset($_POST['submitCauta'])){
 $cauta=$_POST['Cauta'];
 require_once 'QuiresSQL.php';

                    $select=new QuiresSQL();
                    $result=$select->searchInTable("zone_turistice",$cauta);
                    // se selecteaza fiecare linie din tabel
                    while($row = mysqli_fetch_array( $result)){
                        echo'<table class="table table-bordered">';
                        $id=$row['id'];
                        $nume=$row['nume'];
                        $descriere=$row['descriere'];
                              
                        $img=$row['imagine'];
                        echo'<tr><td style="font-size: 20px;">'.$nume.'</td></tr>
                             <tr><td style="color: #21a51e;font-size: 15px;text-align: left;">'.$descriere.'</td></tr>
                             <tr><td><img src="./imagini/'.$img.'" width="200px"/></td></tr>
                                    '; 
                    }
                    echo '</table>';
                    echo '<br>';
    
    
}


?>
<?php include_once 'footer.php';?>
