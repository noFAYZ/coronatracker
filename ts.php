<?php 
include 'includes/db.php';
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js" integrity="sha256-qoN08nWXsFH+S9CtIq99e5yzYHioRHtNB9t2qy1MSmc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src='https://cdn.plot.ly/plotly-2.0.0.min.js'></script>
</head>
<body>
    <div id="chart" style="width: 100%; height: 65vh; background: rgb(255, 255, 255); margin-top: 10px;"></div>
    <script>
    var trace1 = {
  x: [<?php echo $data1 ?>],
  y: [<?php echo $data2 ?>],
  fill: 'tozeroy',
  type: 'scatter',
  label:'Tweets Observed'
};

var trace2 = {
  x: [<?php echo $data3 ?>],
  y: [<?php echo $data4 ?>],
  fill: 'tozeroy',
  type: 'scatter'
};

var data = [trace1, trace2];

Plotly.newPlot('chart', data);

    </script>

</body>
</html>