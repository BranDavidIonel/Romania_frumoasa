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

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    /*
    function showDetails(button){
    var idParinte=button.name;
    $.ajax({
      url:"detailsRow.php",
      method:"GET",
      data:{"idParinte":idParinte},
      success:function(response){
        //alert(response);
        var details=JSON.parse(response);
        $("#detalii_nume").text(details.nume);
        $("#link_adresa").attr("href",details.link_adresa);
        $("#link_detalii1").attr("href",details.links_info);
        
        for(i=0;i<3;i++){
        $("#link_detalii"+i).attr("href",details.links_info);
        }
      }
     
    });
  }*/
</script>

</body>

</html>