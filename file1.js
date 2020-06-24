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

