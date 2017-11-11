// JavaScript File
function init (){
    var visible = document.getElementById("main");
    visible.addEventListener("click",generateSearch);
    
    function generateSearch(){
        
         document.getElementById("main").innerHTML="";
       

        
        var searchbar = document.getElementById("searchbar");
        searchbar.setAttribute("id","reveal");
        
        var search = document.querySelector("#reveal button");
       
        search.addEventListener("click",submit);

       
        function submit(){
            var text = document.querySelector("#search").value;
            var query = text.split("-");

            if(query[0]==null || query[0]=="Enter as 'City"){
                query[0]= "";
            }else if(query[1]==null || query[1]=="LastName'" ){
                query[1]="";
            }
            

            
        if(!query[0]==null&&!query[1]==null ||query[0]=="" &&query[1]=="" ){
              window.location.href = "../browse-employees.php";
        }else{
          window.location.href = "../browse-employees.php?filter_city="+query[0]+"&filter_lastname="+query[1];
        }
        }
        
        
       
    }
}
addEventListener("load",init);