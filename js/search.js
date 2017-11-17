// JavaScript File
function init (){
    var visible = document.getElementById("main");
    var sear = document.getElementById("search");
    sear.addEventListener("mouseover", function(){

            document.querySelector(".tooltip").classList.add("show");
            
        });  
         sear.addEventListener("mouseout", function(){

            document.querySelector(".tooltip").classList.remove("show");
            
        }); 
    visible.addEventListener("click",generateSearch);
    
    
    function generateSearch(){
        
     

        
        var searchbar = document.getElementById("searchbar");
        searchbar.setAttribute("id","reveal");
        
        var search = document.querySelector("#reveal button");

        visible.addEventListener("click",submit);

       
        function submit(){
       
       
            var text = document.querySelector("#search").value;
            var query= [text.substr(0,text.indexOf(' ')),text.substr(text.indexOf(' ')+1)];
            
            
            
            if(text.search("-")!=-1){
                query[1] = text.substr(text.indexOf('-')+1);
                
                query[0] ="";
            }else if(text.search(" ")==-1){
                var q = query[1];
                query[0] = q.concat(" ");
                query[1] ="";
            }

            
             if(query[0]==null){
                query[0]= "";
            }
            if(query[1]==null){

                query[1]="";
            }
            

           

            
        if(!query[0]==null&&!query[1]==null ||query[0]=="" &&query[1]=="" ){
              window.location.href = "../browse-employees.php";
        }else{
          window.location.href = "../browse-employees.php?filter_city="+query[1]+"&filter_lastname="+query[0];
        }
        }
        
        
      
    }
    
    
    var filter = document.getElementById("filter");
    var count = 0;
    
    filter.addEventListener("click",function(){
        
        
       if(count ==0){
           document.getElementById("tt1").innerHTML = "chevron_right";
           document.getElementById("filtercard").id = "none";
           document.getElementById("box").id = "none";
           count = 1;
       }else{
            document.getElementById("tt1").innerHTML = "arrow_drop_down";
           document.getElementById("none").id = "filtercard";
           document.getElementById("none").id = "box";
           count = 0;
       }
       
       
        
    });
    
    
    
    
    
    
    
    
    
}
addEventListener("load",init);