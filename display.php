<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>

<body>

    <ul class="navbar-nav m-3">


        <?php if(isset($_SESSION["fileContent"])) {
                foreach($_SESSION["fileContent"] as $key=>$value){?>
        <li><span class="font-weight-bold"><?=$key?></span> : <?=$value;?></li>
        <?php } ?>
        <?php  }?>

    </ul>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>