google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisits);


        function drawVisits() {
            $.get("service-chartMonth.php").done(function(info){
                //alert("$.get succeded");
                //console.log(info.length);
                var data = new google.visualization.DataTable();
                data.addColumn("string","Day");
                data.addColumn("number","Visits");
                
               for (i = 0; i < info.length; i++){
                    
                    var num = parseInt(info[i].Visits);
                    //console.log(num);
                    data.addRow([info[i].Day,num]);
                    
                }
              
                
                 var options = {
                 chartArea:{left:50},
                 title: 'Visits Per Day in June',
                 hAxis: {title: 'Day',  titleTextStyle: {color: '#333'}},
                 vAxis: {baseline: 0, minValue: 200}
               
                
        };
                
                
                
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                 chart.draw(data, options);
            }).fail(function(){
                alert("$.get failed");
            });
            
            
        }
        
        