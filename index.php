<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Monitoring</title>
    <link rel="stylesheet" href="./main.css">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <script src="./main.js"></script>



</head>

<body>

    <form method="POST" action.="./index.php" class="login">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <?php
        include ("./conn.php"); //Veritabanı Baglantisi
        session_start();

        if(isset($_POST["username"]) && isset($_POST["password"]))
        {
            $password = $_POST['password']; 
            $username = $_POST['username']; 

            $query = $conn->query("SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){
            $_SESSION["username"]=$query["username"];
            $_SESSION["role"]=$query["role"];
            if($query['role'] == 1){
                header ("location: nurse.php");
            }
            else if($query['role'] == 0){
                header ("location: doctor.php");
            }
            else{
                echo "Böyle bir kullanıcı yoktur!";
            }
            }else{
                echo "Please log in with correct E-username and Password..";
            }
        }
?>

    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- JAVASCRİPT -->
    <script src="./main.js"></script>
</body>

</html>