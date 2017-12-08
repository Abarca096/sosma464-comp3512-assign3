function init(){
    function statistics(){
        alert("hello");
        //gets the totals from the service-totals web service
        $.get("service-totals.php").done(function(info){
             $("#cont1 b").text(info[0].Visits);
             $("#sup1 p").text("There were " + info[0].Visits + " visits in June");
             
             $("#cont2 b").text(info[0].Countries);
              $("#sup2 p").text("There were " + info[0].Countries + " unique countries");
             
             
             $("#cont3 b").text(info[0].ToDos);
             $("#sup3 p").text("There were " + info[0].ToDos + " employee tasks");
              
             $("#cont4 b").text(info[0].Messages);
              $("#sup4 p").text("There were " + info[0].Messages + " messages exchanged");
         
         
         
         
        }).fail(function(){
                   alert("$.get failed");
               });
               
               
        //generates the values for the top visitor countries table
        countries();
        function countries(){
              //gets the top vistor countries from the topCountries web service
            $.get("service-topCountries.php").done(function(info){

               for(var i =0; i<info.length; i++){
                   
                  var markup = "<tr><td><img src = 'images/flags/"+info[i].Code.toLowerCase()+".svg' width = '35' height = '25'>"+info[i].Country+"</td><td>"+info[i].Count+"</td></tr>";
                   
                   $("#top15 table").append(markup);
               }
              
                
                
            }).fail(function(){
                   alert("$.get failed");
               });
        }
        //populates the Top Adopted books table
        adoptions();
        
        function adoptions(){
            //gets the top adopted books from the topAdoptedBooks web service
            $.get("service-topAdoptedBooks.php").done(function(info){
      
            for(var i =0; i<info.length; i++){

                var markup = "<tr><td><img src ='book-images/thumb/"+info[i].ISBN10+".jpg'></td>"+ "<td><a href ='single-book.php?ISBN10="+info[i].ISBN10+"'>"+info[i].Title+"</a></td><td>"+info[i].Adoptions+"</td></tr>";
                $("#top10 table").append(markup);
            }
        
        
        
            }).fail(function(){
                   alert("$.get failed");
               });
        
        }
  
    }
    
    
    
    //sets the infomration for the analytics page
    statistics();
}
addEventListener("load",init);