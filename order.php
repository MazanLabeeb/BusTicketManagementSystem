<?php
session_start();
    if(isset($_SESSION["id"])){
       
    }else{
        echo "It looks like you are not logged in!. <a href='./cp'>Login</a> to place your order";
        exit();
    }
?>
<?php
include "config.php";

$user =$_SESSION["id"] ;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_ = mysqli_real_escape_string($conn, $_POST['from_']);
    $to_ = mysqli_real_escape_string($conn, $_POST['to_']);
    $departure = mysqli_real_escape_string($conn, $_POST['departure']);
    $return_ = mysqli_real_escape_string($conn,  $_POST['return_']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);


    $sql = "INSERT INTO `tickets` (`id`, `from_`, `to_`, `departure`, `return_`, `class`, `user`) VALUES (NULL, '{$from_}', '{$to_}', '{$departure}', '{$return_}', '{$class}', '{$user}');";


    if (mysqli_query($conn, $sql)) {
        $add = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Not Allowed";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">

    <style>
        body {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="" class="f"> Ticket and Travel Company</a>
        <a></a>
        <a href="#news">Login</a>
        <a href="#contact">Register</a>
        <a href="./admin/index.php">Admin Panel</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="container-fluid">
    <div class="row" >
        <div class="card mt-5" style="width: 18rem; margin: 0 auto;">
       <h1 style="text-align: center;"> <i class="fa-solid fa-circle-check text-success"></i></h1>
            <div class="card-body" style="margin-top: -20px  !important;" >
                <p class="card-text">Your order has been placed successfully! <br> <a class=" btn btn-sm btn-primary" href="./cp/order.php">Buy another ticket</a></p>
            </div>
        </div>
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    $("#myTopnav").click(function() {
        $("#panel").slideDown();
    });
</script>