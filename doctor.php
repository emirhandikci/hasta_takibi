<?php 
    session_start();
    if($_SESSION['username'] != 0 ){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo @$_SESSION['role'] == 0 ? "Doctor's Panel":"Nurse's Panel";?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="doctor.css">
    <link href='https://fonts.googleapis.com/css?family=Quantico' rel='stylesheet' type='text/css'>
    <script src="\node_modules\plotly.js-dist\plotly.js"></script>
    <script src="./graphs.js"></script>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">

    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>

<body>

    <div class="main-graph">
        <div id="chartContainer" style="height: 450px; width:450px;"></div>
        <div id="chartContainer2" style="height: 450px; width:450px;"></div>
        <div id="chartContainer3" style="height: 450px; width:450px;"></div>
        <!-- <canvas class="graph" id="myChart2"></canvas>
        <canvas class="graph" id="myChart3"></canvas> -->
    </div>

    <div class="controls">

        <div class="fever-controls">
            <h4>Ateş Alarmı</h4>
            <input data-role="doubleslider" data-value-min="20" data-value-max="80" data-hint-always="true"
                data-hint-position-min="bottom" data-hint-position-max="top" data-show-min-max="false"
                data-cls-backside="bg-dark" data-cls-marker="bg-blue border-50 custom-marker"
                data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-red" data-cls-min-max="text-bold">
        </div>

        <div class="room-temperature">
            <h4>Ateş Alarmı</h4>
            <input id="room-data" data-role="doubleslider" data-value-min="20" data-value-max="80"
                data-hint-always="true" data-hint-position-min="bottom" data-hint-position-max="top"
                data-show-min-max="false" data-cls-backside="bg-dark" data-cls-marker="bg-blue border-50 custom-marker"
                data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-red" data-cls-min-max="text-bold">
        </div>

        <div class="pulse-controls">
            <h4>Ateş Alarmı</h4>
            <input data-role="doubleslider" data-value-min="20" data-value-max="80" data-hint-always="true"
                data-hint-position-min="bottom" data-hint-position-max="top" data-show-min-max="false"
                data-cls-backside="bg-dark" data-cls-marker="bg-blue border-50 custom-marker"
                data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-red" data-cls-min-max="text-bold">
        </div>
    </div>

    <script>
    const labels = [
        '01:00',
        '02:00',
        '03:00',
        '05:00',
        '06:00',
        '07:00',
        '08:00',
        '09:00',
        '10:00',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Fever',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45, 1, 100],
        }]
    };
    const data2 = {
        labels: labels,
        datasets: [{
            label: 'Room Temperature',
            backgroundColor: 'rgb(16, 58, 202)',
            borderColor: 'rgb(16, 58, 202)',
            data: [30, 35, 25, 28, 29, 31, 38],
        }]
    }
    const data3 = {
        labels: labels,
        datasets: [{
            label: 'Pulse',
            backgroundColor: 'rgb(36, 161, 156)',
            borderColor: 'rgb(36, 161, 156)',
            data: [40, 10, 85, 155, 47, 80, 75],
        }]
    }
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const config2 = {
        type: 'line',
        data: data2,
        options: {}
    };
    const config3 = {
        type: 'line',
        data: data3,
        options: {}
    };
    </script>

    <script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );
    </script>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    <script src="./main.js"></script>
</body>

</html>