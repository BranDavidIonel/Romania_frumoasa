<?php
session_start(); 
include_once 'header.php';
?>
<?php
       // require_once 'QuiresSQL.php';
        
        //am o problema cu session
        if(isset($_SESSION['admin'])){
            echo 'LOGAT';
            
            echo '<br>';
            echo '<ul class="nav nav-pills nav-stacked">';
            echo '<li role="presentation"> <a  class="btn-sm btn-success " href="logout.php"><span class="glyphicon glyphicon-off"> <span>Logout</a> </li>';
            echo '<li role="presentation"> <a  class="btn-sm btn-success " href="admin.php"><span class="glyphicon glyphicon-menu-left"> </span> Back</a> </li>';
            echo '</ul>';
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $editeaza=new QuiresSQL();
//                $con=mysqli_connect('localhost','root','','david_bran');
//                $sql="SELECT * FROM `zone_turistice` WHERE `id`=$id";
//                $result = mysqli_query($con, $sql);  <div class="form-group">
                $row= $editeaza->select_id_zona($id);
                
            
            echo '
                <form action="editeaza.php?id='.$id.'" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="usr">  Nume: </label>
                    <input type="text" class="form-control" name="nume" value= "'.$row['nume'].'" />
               
                <label for="usr">  Descriere: </label>
                   <textarea class="form-control" rows="5"  name="descriere" value="'.$row['descriere'].'" >
                   '.$row['descriere'].'
                   </textarea>
                <label for="usr">  Alte link-uri cu alte detalii: </label>
                   <textarea class="form-control" rows="2"  name="links_info" value="'.$row['links_info'].'" >
                   '.$row['links_info'].'
                   </textarea>
                <label for="usr">  Link locatie: </label>
                   <textarea class="form-control" rows="2"  name="link_locatie" value="'.$row['link_adresa'].'" >
                   '.$row['link_adresa'].'
                   </textarea> 
                    <input type="file" name="poze[]"  class="form-control"  multiple />
                    <!-- <img src="./imagini/'.$row['imagine'].'" width="250px"/><br /> -->
                    
                    <input type="hidden" name="pozaveche" value="'.$row['imagine'].'"/>
                    <input  type="submit" name="submit" value="Editeaza" class="btn btn-primary"  />
                  </div>
                </form><br /><br />
                ';
                $imagesSplit= explode(',', $row['imagine']);
                echo '<table class="table" >';
                foreach ($imagesSplit as $image) { 
                     echo '<tr> <td><img src="./imagini/'.$image.'" width="400px" class="img-thumbnail"/></td></tr>';
                }
                echo '</table>';
            if(isset($_POST['submit'])){
                $bazePath = "imagini/";
                $id = $_GET['id'];
                $nume = $_POST['nume'];
                $descriere = $_POST['descriere'];
                $link_locatie=$_POST['link_locatie'];
                $links_info=$_POST['links_info'];
                //$poza = $_FILES['poza'];
                $images=$_FILES['poze'];
                $oldImage=$_POST['pozaveche'];
              
                
                $nrImg=count($_FILES['poze']['name']);
                //concatenez intr-o varibila str toate imaginile separate prin virgula
                $strImages='';
                
                echo "images: ".$nrImg.$images["name"][0];
                print_r($images);
               // exit();
                
                if($images["name"][0]!=""){

                     //first I delete old images
                    $images_split=explode(',', $oldImage);
                    foreach($images_split as $image){
                        if($image){
                        unlink($bazePath.$image);
                        }
                    }
                    for($i=0;$i<$nrImg;$i++){
                    $path = $bazePath.basename($_FILES['poze']['name'][$i]);
                    move_uploaded_file($_FILES['poze']['tmp_name'][$i], $path);
                    //concat
                    $strImages=$strImages.$_FILES['poze']['name'][$i].',';
                    }
                    //sterg ultimul caracter adica ','
                    $strImages=mb_substr($strImages, 0, -1);
                    //echo $strImages." == ".$oldImage;
                   // exit();
                }else{
                    $strImages=$oldImage;
                  
                }

                /*
                //pt o singura imagine
                if(!empty($poza['name'])){
                    $path = "imagini/".basename($poza['name']);
                    move_uploaded_file($path,$poza['tmp_name']);
                    $pozan=$poza['name'];
                }
                else{
                    $pozan=$pozaveche;
                }*/
                
//                $con=mysqli_connect('localhost','root','','david_bran');
//                $sql="UPDATE zone_turistice SET nume='$nume',descriere='$descriere',imagine='$pozan' WHERE id='$id'";
              
                $result = $editeaza->updateZona($id,$nume, $descriere, $strImages,$link_locatie,$links_info);
               // exit();
                // header("Location: http://localhost/Romania_Frumoasa2/admin.php");
            }
        }
        
    }
        else{
            
            echo '<script type="text/javascript">
                    window.location = "login.php"
               </script>';
                
        }
         
        
?>
<?php include_once 'footer.php';?>