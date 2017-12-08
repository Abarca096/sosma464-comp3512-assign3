
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisits);


        function drawVisits() {
            
            $.get("service-chartMonth.php").done(function(info){
                //create visualization object
                var data = new google.visualization.DataTable();
                data.addColumn("number","Day");
                data.addColumn("number","Visits");
                //populate data for the area chart
               for (i = 0; i < info.length; i++){
                    
                    var num = parseInt(info[i].Visits);
                    //console.log(num);
                    data.addRow([info[i].Day,num]);
                    
                }
              
                //additional chart generation options
                 var options = {
                 chartArea: {width:"60%"},
                 title: 'Visits Per Day in June',
                 hAxis: {baseline: 1,ticks: [1, 5, 10, 15, 20, 25],title: 'Day',  titleTextStyle: {color: '#333'} },
                 vAxis: {baseline: 0, minValue: 200},
                
                
        };
                
                
                //generate chart
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                 chart.draw(data, options);
            }).fail(function(){
                alert("$.get failed");
            });
            
            
        }
        
     