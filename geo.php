<?php 
include 'includes/db.php';

$sql="SELECT * FROM geomap";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Google GEO</title>
</head>
<body>
<div id="regions_div" style="width: 100%; height: 500px;"></div>


<script type="text/javascript">
      
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyAT6uzNZXgQt5giSAfIry4j1TjBlbSmPYE'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Tweets'],
            <?php
                while($row = mysqli_fetch_array($result)){
                    echo "['".$row['Name']."', ".$row['count']."],";
                }
            ?>
        ]);

        var options = {
          title: 'Tweets of Country',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>