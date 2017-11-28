  google.charts.load('current', {
        'packages':['geochart'],'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawGeoMap);

      function drawGeoMap(){
            $.get("service-chartCountryVisits.php").done(function(info){
               // alert("$.get succeded");
                //console.log(info);
                


                var data = new google.visualization.DataTable();
                data.addColumn("string", "Country");
                data.addColumn("number", "Visits");
                
               for (i = 0; i < info.length; i++){
                    
                  data.addRow([info[i].Country,info[i].Count]);
                    
                }
              

                     var options = { };

        var chart = new google.visualization.GeoChart(document.getElementById('geoMap'));

        chart.draw(data, options);
            }).fail(function(){
                alert("$.get failed");
            });
            
        }