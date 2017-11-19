// JavaScript File
function init (){
    //Simple Search
    var visible = document.getElementById("main");
    var sear = document.getElementById("search");
    
    //Generates Tooltip
    sear.addEventListener("mouseover", function(){

            document.querySelector(".tooltip").classList.add("show");
            
        });  
         sear.addEventListener("mouseout", function(){

            document.querySelector(".tooltip").classList.remove("show");
            
        }); 
    //Simple Search
    visible.addEventListener("click",generateSearch);
    
    
    function generateSearch(){
   
        var searchbar = document.getElementById("searchbar");
        searchbar.setAttribute("id","reveal");
        
        var search = document.querySelector("#reveal button");

        visible.addEventListener("click",submit);
        sear.addEventListener("keypress",submit);
       
        function submit(e){
       
            if(e.keyCode==13||e.type=="click"){
            var text = document.querySelector("#search").value;
            var query= [text.substr(0,text.indexOf(' ')),text.substr(text.indexOf(' ')+1)];
            
            //Checks if query is for a city or a LastName
            if(text.search("-")!=-1){
                query[1] = text.substr(text.indexOf('-')+1);
                
                query[0] ="";
            }else if(text.search(" ")==-1){
                
                var q = query[1];
                query[0] = q.concat(" ");
                query[1] ="";
            }

            //Sets the appropriate query to a blank string depending on the type of search
             if(query[0]==null){
                query[0]= "";
            }
            if(query[1]==null){

                query[1]="";
            }
            
           

            //redirects the page to browse emplyees with the respective search strings as a query
        if(!query[0]==null&&!query[1]==null ||query[0]=="" &&query[1]=="" ){
              window.location.href = "../browse-employees.php";
        }else{
          window.location.href = "../browse-employees.php?filter_city="+query[1]+"&filter_lastname="+query[0];
        }
        }
        }

      
    }
    
    //Employee Filter 
    var filter = document.getElementById("filter");
    var count = 0;
    
    filter.addEventListener("click",function(){
        
        
       if(count ==0){
           //If count is 0, then the drop down will appear and reveal filters.
           document.getElementById("tt1").innerHTML = "chevron_right";
           document.getElementById("filtercard").id = "none";
           document.getElementById("box").id = "none";
           count = 1;
       }else{
            //If count is not 0, then the drop down will be hidden.
            document.getElementById("tt1").innerHTML = "arrow_drop_down";
           document.getElementById("none").id = "filtercard";
           document.getElementById("none").id = "box";
           count = 0;
       }
       
       
        
    });
    
    
    

    
}
addEventListener("load",init);