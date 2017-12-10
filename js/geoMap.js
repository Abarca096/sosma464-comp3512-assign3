  google.charts.load('current', {
        'packages':['geochart'],'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawGeoMap);

      function drawGeoMap(){
            $.get("service-chartCountryVisits.php").done(function(info){
                //Hide Loader
                $(".loader").hide();
                //create visualization object
                var data = new google.visualization.DataTable();
                data.addColumn("string", "Country");
                data.addColumn("number", "Visits");
                //populate data for geo map
               for (i = 0; i < info.length; i++){
                    
                  data.addRow([info[i].Country,info[i].Count]);
                    
                }
                //additional map generation options
                      var options = {
                    
                    colorAxis: {values:[0,50,5000],colors: ['green', "yellow", 'red']},
                    backgroundColor: '#81d4fa',
                    datalessRegionColor: '#grey',

        };
        //generate geo map
        var chart = new google.visualization.GeoChart(document.getElementById('geoMap'));

        chart.draw(data, options);
            }).fail(function(){
                alert("$.get failed");
            });
            
        }