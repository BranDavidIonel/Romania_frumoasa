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
     function __construct(){
        $this->host="localhost";
        ////000webhost
        //$this->usernameDB="id1766347_david96";
        $this->usernameDB="root";
        //000webhost
        //$this->passwordDB="brandavid12";
        $this->passwordDB=""; 
        $this->nameDb="romania_frumoasa";
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
     $sql = "INSERT INTO `$table` (`nume`, `descriere`, `imagine`) VALUES('$nume','$descriere',  '$imagine')";
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
