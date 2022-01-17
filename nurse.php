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
    <title><?php echo @$_SESSION['role']== 0 ? "Doctor":"Nurse";?></title>
</head>

<body>
    <?php 
    echo $_SESSION['username']. " Hoşgeldiniz!";
    ?>
</body>

</html>