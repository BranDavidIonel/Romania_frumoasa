<?php


class QuiresSQL {
    private $host="";
    private $usernameDB="";
    private $passwordDB="";
    private $nameDb="";
    private $con="";
    private $nume="";
    private $descriere="";
    private $imagine="";
    private  $rowsperpage=2;
    private $page=0;
     function __construct(){
        $this->host="localhost";
        ////000webhost
        //$this->usernameDB="id1766347_david96";
        $this->usernameDB="root";
        //000webhost
        //$this->passwordDB="brandavid12";
        $this->passwordDB=""; 
        $this->nameDb="romania_frumoasa";
        //$this->$rowsperpage=2;
    }
//    function __construct($host,$username,$password,$nameDb){
//        $this->host=$host;
//        $this->usernameDB=$username;
//        $this->passwordDB=$password; 
//        $this->nameDb=$nameDb;
//    }
    public function connect(){
        $this->con=mysqli_connect($this->host, $this->usernameDB, $this->passwordDB, $this->nameDb);
        return $this->con;
        
    } 
    public function insertSql($table,$nume,$descriere,$imagine){
     $this->connect();
     $sql = "INSERT INTO zone_turistice (`nume`, `descriere`, `imagine`) VALUES('$nume','$descriere',  '$imagine')";
    mysqli_query($this->con, $sql)  or die(mysqli_error("could not connect"));
    }
    public function deleteSQl($id){
    $this->connect();
    $sql="DELETE FROM zone_turistice WHERE id = $id";
    mysqli_query($this->con,$sql);
    }
    public function select_id_SQl($id){
        $this->connect();
        $sql="SELECT * FROM `zone_turistice` WHERE `id`=$id";
        $result = mysqli_query($this->con, $sql);
         $row= mysqli_fetch_array($result);
         return $row;
    }
    public function selectDetalii_id_SQl($idParinte){
        $this->connect();
        $sql="SELECT * FROM `detalii_zone_turistice` WHERE `idParinte`=$idParinte";
        $result = mysqli_query($this->con, $sql);
         $row= mysqli_fetch_object($result);
         return $row;
    }
    //pagination
    public function selectPage($page){
        $this->connect();
        $rows=2;
        $sql="SELECT * FROM `zone_turistice` limit ".$page.",".$rows;
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function count_Zone_Tutistice(){
        $nr=0;
        $this->connect();
        $sql="SELECT * FROM `zone_turistice`";
        $result = mysqli_query($this->con, $sql);
        $nr=mysqli_num_rows($result);
        return $nr;

    }
    public function updateSQL($nume,$descriere,$imagine,$id){
        $this->connect();
       $sql="UPDATE zone_turistice SET nume='$nume',descriere='$descriere',imagine='$imagine' WHERE id='$id'";
       $result = mysqli_query($this->con, $sql);
       return $result;
    }
    public function selectTable($table){
          $this->connect();
          $sql="SELECT * FROM `$table`";
          $result = mysqli_query($this->con, $sql) or die(mysqli_error("could not connect"));
          return $result;
        
    }
     public function searchInTable($table,$valSearch){
          $this->connect();
          $sql="SELECT * FROM `$table` where nume LIKE '%$valSearch%'";
          //echo $sql;
          $result = mysqli_query($this->con, $sql) or die("could not connect");
          return $result;
        
    }
}
