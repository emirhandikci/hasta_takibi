<?php 
        ob_start();
        session_start();
    if($_SESSION['role'] != 0 ){
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
    <link rel="stylesheet" href="doctor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='https://fonts.googleapis.com/css?family=Quantico' rel='stylesheet' type='text/css'>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container">
        <div class="row ">
            <form class="d-flex" id="doctorForm">
                <div class="col-md-6 col-lg-4 border border-dark">
                    <div class="graph" id="graph"></div>
                    <div class="fever-controls">
                        <h4 class="mb-5">Ateş Alarmı °C</h4>
                        <input class="dual-slider" data-role="doubleslider" data-min="20" data-max="45"
                            data-value-min="32" data-value-max="38" data-hint-always="true" data-hint-position-min="top"
                            data-hint-position-max="top" data-show-min-max="false" data-cls-backside="bg-red"
                            data-cls-marker="bg-blue border-50 custom-marker"
                            data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-dark"
                            data-cls-min-max="text-bold" onchange="$('#patientTemp').val(this.value)">
                        <input name="patientTemp" type="text" id="patientTemp">

                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="graph" id="graph2"></div>
                    <div class="room-temperature">
                        <h4 class="mb-5">Küvez Sıcaklık Alarmı °C</h4>
                        <input id="room-data" class="dual-slider" data-role="doubleslider" data-min="-10" data-max="60"
                            data-value-min="15" data-value-max="48" data-hint-always="true" data-hint-position-min="top"
                            data-hint-position-max="top" data-show-min-max="false" data-cls-backside="bg-red"
                            data-cls-marker="bg-blue border-50 custom-marker"
                            data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-dark"
                            data-cls-min-max="text-bold" onchange="$('#roomTemp').val(this.value)">
                        <input name="roomTemp" type="text" id="roomTemp">
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="graph" id="graph3"></div>
                    <div class="pulse-controls">
                        <h4 class="mb-5">Nabız Alarmı</h4>
                        <input class="dual-slider" data-role="doubleslider" data-min="0" data-max="200"
                            data-value-min="40" data-value-max="120" data-hint-always="true"
                            data-hint-position-min="top" data-hint-position-max="top" data-show-min-max="false"
                            data-cls-backside="bg-red" data-cls-marker="bg-blue border-50 custom-marker"
                            data-cls-hint="bg-cyan custom-marker shadow-2" data-cls-complete="bg-dark"
                            data-cls-min-max="text-bold" onchange="$('#pulse').val(this.value)">
                        <input name="pulse" type="text" id="pulse">

                    </div>
            </form>
        </div>
        <div class="row">
            <button class="getLimit button-submit mt-5" type="button" name="btn-room">
                Sınırla
            </button>
        </div>
    </div>
    <div class="container">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>T.C. Kimlik Numarası </th>
                        <th>Nabız</th>
                        <th>Ateş</th>
                        <th>Oda Sıcaklıı</th>
                    </tr>
                </thead>
            </table>
            <script type="text/javascript">
            $(document).ready(function() {
            $('#example').DataTable();
            } );
            </script>
        </div>

    <script>
    var form = $('#doctorForm');
    $('.getLimit').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/addLimit.php",
            data: form.serialize(),
            success: function(data) {
                veri = JSON.parse(data);
                if (veri["status"] == "success") {
                    Swal.fire(
                        veri["title"],
                        veri["message"],
                        veri["status"]
                    )
                    setTimeout(() => {                         
                    window.location.href = "doctor.php";                     
                    }, 250)
                } else {
                    Swal.fire(
                        veri["title"],
                        veri["message"],
                        veri["status"]
                    )
                }
            }
        });
    })
    </script>

    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="./main.js"></script>
    <script src="./graphs.js"></script>
</body>

</html>