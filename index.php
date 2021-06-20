<?php 
include 'includes/db.php';
include 'includes/config.php';
$api_url = 'https://coronavirus-19-api.herokuapp.com/countries/Pakistan';
// Read JSON file
$json_data = file_get_contents($api_url);
// Decode JSON data into PHP array
$response_data = json_decode($json_data);

$sqlg="SELECT * FROM geomap";

$resultg = mysqli_query($conn, $sqlg);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Covid-19 Surveillance Dashboard | FAST NUCES Peshawar</title>
    <link rel="icon" type="image/png" href="assets/img/newlog.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src='https://cdn.plot.ly/plotly-2.0.0.min.js'></script>
    <!-- CHART.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js" integrity="sha256-qoN08nWXsFH+S9CtIq99e5yzYHioRHtNB9t2qy1MSmc=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <div class="app-overlay"></div>

        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
            <div class="container">
                <!-- Brand -->
                <div class="navbar-brand">
                    <!-- Mobile menu toggler icon -->
                    <div class="brand-start">
                        <div class="navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a class="navbar-item is-brand" href="index-2.html">
                        <img class="light-image" src="assets/img/newlog.svg" alt="">
                        <img class="dark-image" src="assets/img/newlog.svg" alt="">
                    </a>

                 

                </div>
            </div>
        </nav>
        <div class="mobile-main-sidebar">
            <div class="inner">
                <ul class="icon-side-menu">
                    <li>
                        <a href="admin-dashboards-personal-1.html" id="home-sidebar-menu-mobile">
                            <i data-feather="activity"></i>
                        </a>
                    </li>
                    <li>
                        <a href="admin-grid-users-1.html" id="layouts-sidebar-menu-mobile">
                            <i data-feather="grid"></i>
                        </a>
                    </li>
                    <li>
                        <a href="elements-hub.html" id="elements-sidebar-menu-mobile">
                            <i data-feather="box"></i>
                        </a>
                    </li>
                    <li>
                        <a href="components-hub.html" id="components-sidebar-menu-mobile">
                            <i data-feather="cpu"></i>
                        </a>
                    </li>
                    <li>
                        <a href="messaging-chat.html" id="open-messages-mobile">
                            <i data-feather="message-circle"></i>
                        </a>
                    </li>
                </ul>

                <ul class="bottom-icon-side-menu">
                    <li>
                        <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                            <i data-feather="search"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="webapp-navbar">
            <div class="webapp-navbar-inner">
                <div class="left">
                    <a href="" class="brand">
                        <img class="light-image" src="assets/img/newlog.png" alt="" />
                        <img class="dark-image" src="assets/img/newlog.png" alt="" />
                    </a>
                    <div class="separator"></div>
             
                    <h1 id="webapp-page-title" class="title is-5">The Covid</h1>
                </div>
                <div class="center">
                    <div id="webapp-navbar-menu" class="centered-links">
                        <a id="dashboards-navbar-menu" class="centered-link centered-link-toggle" data-menu-id="dashboards-webapp-menu">
                            <i data-feather="activity"></i>
                            <span>Dashboard</span>
                        </a>
                
                        <a id="components-navbar-menu" class="centered-link centered-link-toggle" data-menu-id="components-webapp-menu">
                            <i data-feather="cpu"></i>
                            <span>Components</span>
                        </a>
                        <a href="webapp-messaging-chat.html" class="centered-link">
                            <i data-feather="message-circle"></i>
                            <span>Contact Us</span>
                        </a>
                     
                    </div>
                    <div id="webapp-navbar-search" class="centered-search is-hidden">
                        <div class="field">
                            <div class="control has-icon">
                                <input type="text" class="input is-rounded search-input" placeholder="Search records...">
                                <div class="form-icon">
                                    <i data-feather="search"></i>
                                </div>
                                <div id="webapp-navbar-search-close" class="form-icon is-right">
                                    <i data-feather="x"></i>
                                </div>
                                <div class="search-results has-slimscroll"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="toolbar ml-auto">

                        <div class="toolbar-link">
                            <label class="dark-mode ml-auto">
                                <input type="checkbox" checked>
                                <span></span>
                            </label>
                        </div>

                        <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                            <img src="assets/img/icons/flags/pakistan.svg" alt="">
                        </a>

                    </div>
                   
                </div>
            </div>
        </div>

        <div id="languages-panel" class="right-panel-wrapper is-languages">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Select Language</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="languages-boxes">
                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" onclick="window.location='?country=PK';">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/pakistan.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" onclick="window.location='?country=US';" >
                                <div class="language-option-inner">
                                   
                                    <img src="assets/img/icons/flags/france.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" onclick="window.location='?country=IN';">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/spain.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" onclick="window.location='?country=AU';">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/germany.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="img-wrap has-text-centered">
                        <img class="light-image" src="assets/img/illustrations/right-panel/languages.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/right-panel/languages-dark.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    

     
        <!-- Content Wrapper -->
        <div class="view-wrapper is-webapp" data-page-title="Dashboard" data-naver-offset="150" data-menu-item="#dashboards-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered is-webapp">

                        <div class="title-wrap">
                            <h1 class="title is-4">Covid-19 Twitter Surveillance</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                                <img src="assets/img/icons/flags/pakistan.svg" alt="">
                            </a>



                            <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                                <i data-feather="grid"></i>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Ecommerce Dashboard V1-->
                        <div class="ecommerce-dashboard ecommerce-dashboard-v1">

                            <!--Header-->
                            <div class="dashboard-header">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="assets/img/twitter2.png"  alt="">
                                </div>
                                <div class="start">
                                    <h3 class="dark-inverted">Covid-19 Twitter Surveillance</h3>
                                    <p>Get the insights about Covid-19 Pandemic and monitor Twitter's behaviour.</p>
                                </div>
                                <div class="end">
                                    
                                    <button class="button h-button is-primary is-elevated">Follow to get updates on Twitter!</button>
                                </div>
                            </div>

                            <div class="columns is-multiline">

                                <!--Dashboard tile-->
                                <div class="column is-3">
                                    <div class="dashboard-tile">
                                        <div class="tile-head">
                                            <h3>New Cases Today</h3>
                                            <div class="h-icon is-info is-rounded">
                                               
                                            </div>
                                        </div>
                                        <div class="dashboard-tile-inner">
                                            <div class="left">
                                                <span class="dark-inverted"><?php echo $response_data->todayCases ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!--Dashboard tile-->
                                <div class="column is-3">
                                    <div class="dashboard-tile">
                                        <div class="tile-head">
                                            <h3>New Deaths Today</h3>
                                            <div class="h-icon is-red is-rounded">
                                               
                                            </div>
                                        </div>
                                        <div class="dashboard-tile-inner">
                                            <div class="left">
                                                <span class="dark-inverted"><?php echo $response_data->todayDeaths ?></span>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>

                                <!--Dashboard tile-->
                                <div class="column is-3">
                                    <div class="dashboard-tile">
                                        <div class="tile-head">
                                            <h3>Active Cases</h3>
                                            <div class="h-icon is-green is-rounded">
                                               
                                            </div>
                                        </div>
                                        <div class="dashboard-tile-inner">
                                            <div class="left">
                                                <span class="dark-inverted"><?php echo $response_data->active ?></span>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>

                                <!--Dashboard tile-->
                                <div class="column is-3">
                                    <div class="dashboard-tile">
                                        <div class="tile-head">
                                            <h3>Critical Cases</h3>
                                            <div class="h-icon is-orange is-rounded">
                                                
                                            </div>
                                        </div>
                                        <div class="dashboard-tile-inner">
                                            <div class="left">
                                                <span class="dark-inverted"><?php echo $response_data->critical ?></span>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>

                                <!--Line Stats Widget-->
                                <div class="column is-12">
                                    <div class="stat-widget line-stats-widget is-straight">
                                   
                                                                         
                                        <div id="chart" style="width: 100%; height: 65vh; background: rgb(255, 255, 255); margin-top: 10px;"></div>
                                        <script>
                                            var trace1 = {
                                        x: [<?php echo $data1 ?>],
                                        y: [<?php echo $data2 ?>],
                                        fill: 'tozeroy',
                                        type: 'scatter',
                                        name: 'Tweets Observed'
                                        };

                                        var trace2 = {
                                        x: [<?php echo $data3 ?>],
                                        y: [<?php echo $data4 ?>],
                                        fill: 'tozeroy',
                                        type: 'scatter',
                                        name: 'Tweets Predicted'
                                        };

                                        var data = [trace1, trace2];
                                        var layout = {
                                            title:'Tweets Observed & Predicted',
                                            xaxis: {
                                                title: 'Date'
                                            },
                                            yaxis: {
                                                title: 'Tweets'
                                            }
                                            };
                                        Plotly.newPlot('chart', data,layout);

                                            </script>


                                    </div>
                                </div>
        <!-- Line Chart TS -->
         <!--Line Stats Widget-->
                                <div class="column is-12">
                                    <div class="stat-widget area-stats-widget is-straight">
                                        <div class="widget-head">
                                            <h3 class="dark-inverted">Geo-Located Tweets</h3>
                                            <!--Dropdown-->
                                           
                                        </div>
                                        
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

                                    </div>
                                </div>



                                <!--Flex Stat Widget-->
                                <div class="column is-6">
                                    <div class="stat-widget flex-stat-widget is-straight">
                                        <div class="chart-media">
                                            <div class="meta">
                                                <h4 class="dark-inverted">Product Returns</h4>
                                                <span class="is-dark-primary">Avg. 642</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bonum integritas
                                                    corporis: misera debilitas. Ita ne hoc quidem modo paria.</p>
                                            </div>
                                            <div class="chart-container">
                                                <div id="flex-stat-circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Flex Stat Widget-->
                                <div class="column is-6">
                                    <div class="stat-widget flex-stat-widget is-straight has-fullheight">
                                        <div class="chart-media">
                                            <div class="meta">
                                                <h4 class="dark-inverted">Customer Engagement</h4>
                                                <span class="is-dark-primary">+34.2%</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bonum integritas
                                                    corporis: misera debilitas. Ita ne hoc quidem modo paria.</p>
                                            </div>
                                            <div class="chart-container">
                                                <div id="flex-stat-radial"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Grouped Stat Widget-->
                                <div class="column is-6">
                                    <div class="stat-widget grouped-stat-widget is-straight">
                                        <div class="widget-head">
                                            <h3 class="dark-inverted">Shipping Stats</h3>
                                        </div>
                                        <div class="chart-group">
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container">
                                                        <div id="widget-group-radial-1"></div>
                                                    </div>
                                                    <span class="dark-inverted">36.8K</span>
                                                    <p>Free Shipping</p>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container">
                                                        <div id="widget-group-radial-2"></div>
                                                    </div>
                                                    <span class="dark-inverted">292.3K</span>
                                                    <p>Ground Shipping</p>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container">
                                                        <div id="widget-group-radial-3"></div>
                                                    </div>
                                                    <span class="dark-inverted">108.2K</span>
                                                    <p>Next Day Air</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Grouped Stat Widget-->
                                <div class="column is-6">
                                    <div class="stat-widget grouped-stat-widget is-straight">
                                        <div class="widget-head">
                                            <h3 class="dark-inverted">Customer Support</h3>
                                        </div>
                                        <div class="chart-group">
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container is-gauge">
                                                        <div id="widget-group-radial-4"></div>
                                                    </div>
                                                    <span class="dark-inverted">641</span>
                                                    <p>Active Tickets</p>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container is-gauge">
                                                        <div id="widget-group-radial-5"></div>
                                                    </div>
                                                    <span class="dark-inverted">84</span>
                                                    <p>Escalated</p>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="group-content">
                                                    <div class="chart-container is-gauge">
                                                        <div id="widget-group-radial-6"></div>
                                                    </div>
                                                    <span class="dark-inverted">1,749</span>
                                                    <p>Closed Tickets</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/components.js"></script>
        <script src="assets/js/popover.js"></script>
        <script src="assets/js/widgets.js"></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js"></script>

        <!-- Landing page js -->

        <!-- Dashboards js -->
















        <script src="assets/js/ecommerce-1.js"></script>

        <!-- Charts js -->
        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->


        <script src="assets/js/syntax.js"></script>
    </div>
</body>


</html>
