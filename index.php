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

</head>

<body>
<nav class="navbar navbar-default" id="navbar1">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bran David</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"> <a href="index.php"> Pagina de start</a></li>
      <li ><a href="topLocuri.php">Top Locuri</a></li>
      <li><a href="login.php">Admin</a></li>
    </ul>
      <form method="POST" class="navbar-form navbar-left" action="cauta.php" >
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cauta" name="Cauta">
      </div>
      <button type="submit" class="btn btn-default" name="submitCauta">Submit</button>
    </form>
  </div>
</nav>

        <div class="container">
            <button id="button1" onclick="buttonShow()" value="true">Ascunde meniu</button>    
        <h1>Romania frumoasa</h1>
        
        <p>
        Despre abundența resurselor turistice care sălășluiește pe întinderea frumoasei noastre patrii știm încă de la primele ore de Geografia României.
        Nu lipsiți de mândrie patriotică în fragedele noastre minți am învățat că avem munți cu duiumul, plaje, istorie și tradiții cât să umplem biblioteci întregi, ape termale, castele și cetăți de faimă internațională, floră luxuriantă, faună pe cât cuprinde… 
        Ni s-a mai spus, cu gravitate în glas, asa cum tema o impunea, că indolența face ca toată această îndestulare turistică să fie lăsată în paragină. Prea tineri fiind, nu ne era chiar la îndemână să urcăm în primul tren pentru a ne convinge de acuratețea spuselor dascălilor noștri, dar, pe măsura trecerii anilor și a înaintării în vârstă, am început să bifăm tot mai multe dintre aceste locuri.
        </p>    
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="imagini/defileulDunarii.jpg" alt="Defileul Dunarii" style="width:auto;margin-left: 15%;">
      </div>

      <div class="item">
        <img src="imagini/Castelul Peles.jpg" alt="Castelul Peles" style="width:auto;margin-left: 15%;">
      </div>
    
      <div class="item">
        <img src="imagini/transalpina.jpg" alt="Transalpina" style="width:auto;margin-left: 15%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>  

    </div>
      
</body>

</html>
