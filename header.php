<!DOCTYPE html>
<html lang="en">

<head>
<title>Romania frumoasa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="file1.js"></script>
  <script>
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
        $("#link_detalii").attr("href",details.links_info);
      }
     
    });
  }
  function addVot(button){
    var idParinte=button.name;
                
    $.ajax({
      url:"addVoturi.php",
      method:"GET",
      data:{"idParinte":idParinte,"vot":1},
      success:function(response){
        //alert(response);
        /*
        var voturi=JSON.parse(response);
        $("#voturi").text(voturi.voturi);
        */
      }
     
    });
  }
  </script>
 
  <link rel="stylesheet" href="styleCenter.css">  
 
</head>

<body>
<nav class="navbar navbar-default" id="navbar1">

  <div class="container-fluid" >
  
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="glyphicon glyphicon-menu-hamburger"></span>
    </button>
  </nav>
 
  <div class="collapse" id="navbarToggleExternalContent">
     
 
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Romania frumoasa <span><img alt="Bran David" src="imagini\natureLogo.jpg"  width="30" height="30"/> </span> </a>
      
    </div>
    <ul class="nav navbar-nav  ">
      <li> <a href="index.php" > Pagina de start</a></li>
      <li><a href="topLocuri.php?p=1" >Top Locuri</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Admin</a></li>
     </ul>
    
      <form method="POST" class="navbar-form navbar-left" action="cauta.php" >
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cauta" name="Cauta">
      </div>
      <button type="submit" class="btn btn-default" name="submitCauta">Cauta</button>
    </form>
  </div>
  </div>

</nav>

<div class="container-fluid text-center">
  

    
    <div class="row content">
    <div class="col-sm-2 sidenav">
    
    <div class="panel panel-default">
    <div class="panel-heading">
    <button class="btn btn-primary" id="button1" onclick="buttonShow()" value="true">Ascunde meniu</button>  
    </div>
    <div class="panel-heading">Alte detalii</div>
    <div class="panel-body"><h3><p id="detalii_nume"> </p></h3></div>
    <div class="panel-body"><a id="link_adresa"> Locatie</a></div>
    <div class="panel-body"><a id="link_detalii">Alte legaturi </a></div>
    </div>
    
    </div>
    <div class="col-sm-8 text-left bodyCentral" bg="#0CB742"> 