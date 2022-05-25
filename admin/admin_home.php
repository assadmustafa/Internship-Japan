<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
    header("location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Internship Japan | Homepage</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-1.12.4-jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span style="float: right;color: white;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </button>
            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a href="crud/crud_intern/index.php">Intern</a>
                    <a href="crud/crud_entity/index.php">Entity</a>
                    <a href="crud/crud_education/index.php">Education</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
            <a class="navbar-brand" href="../index.php">INTERNSHIP JAPAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="admin_home.php"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["admin_login"];?></a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<h1 style="text-align: center">Administration</h1>
<div class="gallery">

    <div class="kaart">
        <a href="crud/crud_intern/index.php">
        <img src="../assets/intern.png" width="300">
        <div class="case">
            <h4><b>Intern</b></h4>
        </div>
    </div>
    </a>
    <div class="kaart">
        <a href="crud/crud_entity/index.php">
            <img src="../assets/entity.png" width="300">
            <div class="case">
                <h4><b>Entity</b></h4>
            </div>
    </div>
    </a>
    <div class="kaart">
        <a href="crud/crud_education/index.php">
            <img src="../assets/education.png" width="300">
            <div class="case">
                <h4><b>Education</b></h4>
            </div>
    </div>
    </a>
</div>
</body>
</html>
