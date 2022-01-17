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
    <script src='https://cdn.plot.ly/plotly-2.8.3.min.js'></script>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">

</head>

<body>
    <div class="main-graph">
        <canvas class="graph" id="myChart"></canvas>
        <canvas class="graph" id="myChart2"></canvas>
        <canvas class="graph" id="myChart3"></canvas>
    </div>

    <div class="controls">

        <div class="fever-controls">
            <form action="/action_page.php">
                <label for="vol">Ateş Uyarısı:</label>
                <div class="slider">
                    <input type="range" min="20" max="50" onchange="rangevalue.value=value" />
                    <output id="rangevalue">35</output>
                    <input type="range" min="20" max="50" onchange="rangevalue.value=value" />
                    <output id="rangevalue">35</output>
                </div>
                <input class="submit-type fever-color" type="submit">
            </form>
        </div>

        <div class="room-temperature">
            <form action="/action_page.php">
                <label for="vol">Oda Sıcaklıgı Uyarısı:</label>
                <div class="slider">
                    <input type="range" min="-25" max="50" onchange="rangevalue.value=value" />
                    <output id="rangevalue">12</output>
                    <input type="range" min="-25" max="50" onchange="rangevalue.value=value" />
                    <output id="rangevalue">12</output>
                </div>
                <input class="submit-type room-color" type="submit">
            </form>
        </div>

        <div class="pulse-controls">
            <form action="/action_page.php">
                <label for="vol">Nabız Uyarısı:</label>
                <div class="slider">
                    <input type="range" min="0" max="250" onchange="rangevalue.value=value" />
                    <output id="rangevalue">125</output>
                    <input type="range" min="0" max="250" onchange="rangevalue.value=value" />
                    <output id="rangevalue">125</output>
                </div>
                <input class="submit-type pulse-color" type="submit">
            </form>
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

    <div id='myDiv'>
        <!-- Plotly chart will be drawn inside this DIV -->
    </div>

    <script src="./main.js"></script>
</body>

</html>