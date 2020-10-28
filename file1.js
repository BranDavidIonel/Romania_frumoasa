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
 


 //$(document).ready(function() { showNavBar=new Boolean(true);})
function buttonShow(){
    if(document.getElementById("button1").value==="true"){
        
    
        $("#navbar1").hide();
         document.getElementById("button1").value="false";
         document.getElementById("button1").innerHTML="Arata meniu";
   
    
    showNavBar=false;
   
}else{
    
      //$("#button1").click(function(){}
          document.getElementById("button1").value="true";
          document.getElementById("button1").innerHTML="Ascunde meniu";
        $("#navbar1").show();
       
   
    //document.getElementById("button1").value="Ascunde meniu";
    
     showNavBar=true;
     
    
}
}

