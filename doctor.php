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
    <title><?php echo @$_SESSION['role'] == 0 ? "Doctor":"Nurse";?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="doctor.css">
</head>

<body>
    <div class="main-graph home__data">
        <canvas class="graph" id="myChart"></canvas>
        <canvas class="graph" id="myChart2"></canvas>
        <canvas class="graph" id="myChart3"></canvas>
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
</body>

</html>