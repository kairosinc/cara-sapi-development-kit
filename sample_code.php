<?php

require_once 'vendor/autoload.php';

use ImmersiveLabs\CaraAPI\Service\APIServiceFactory as APIServiceFactory;

$clientId = "YOUR_APP_ID";
$clientSecret = "YOUR_APP_SECRET";
$username = "YOUR_USERNAME";
$password = "YOUR_PASSWORD";
$scopes = array('analytic');
$cameraKey = "YOUR_CAMERA_KEY";

$authAPIService = APIServiceFactory::getAuthAPIService();
$analyticsAPIService = APIServiceFactory::getAnalyticsAPIService();

$accessToken = $authAPIService->getAccessToken($clientId, $clientSecret, $username, $password, $scopes);
$rawData = $analyticsAPIService->getRaw($accessToken, $cameraKey);

$ages  = array(
    $unknown = 0,
    $child = 0,
    $youngAdult = 0,
    $adult = 0,
    $senior = 0
);

foreach ($rawData as $data) {
    $ages[$data['age']]++;
}

?>

<html>
<head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Unknown', <?php echo $ages[0] ?>],
                ['Child', <?php echo $ages[1] ?>],
                ['Young adult', <?php echo $ages[2] ?>],
                ['Adult', <?php echo $ages[3] ?>],
                ['Senior', <?php echo $ages[4] ?>]
            ]);

            // Set chart options
            var options = {'title':'Impressions detailed by age',
                'width':400,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
<!--Div that will hold the pie chart-->
<div id="chart_div"></div>
</body>
</html>