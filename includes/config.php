<?php
include 'db.php';

$ccode='PK';
    // if ($_GET['country'])
    //     {
    //         $ccode=$_GET['country'];
           
    //     }
    // else{
    // $ccode='PK';
  
    // }

$sql="SELECT date,count(date)AS tweets FROM ts_data WHERE country_code='$ccode' GROUP BY date";

$data1 = '';
$data2 = '';
$result = mysqli_query($conn, $sql);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['date'].'",';
        $data2 = $data2 . '"'. $row['tweets'] .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");


$sql2="SELECT Date, Predicted_Mean AS tweets FROM forecast_ts";

$data3 = '';
$data4 = '';
$result = mysqli_query($conn, $sql2);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $data3 = $data3 . '"'. $row['0'].'",';
        $data4 = $data4 . '"'. $row['1'] .'",';
    }

    $data3 = trim($data3,",");
    $data4 = trim($data4,",");

$ts_dates=$data1.",".$data3;
$ts_tweets=$data2.",".$data4;
?>