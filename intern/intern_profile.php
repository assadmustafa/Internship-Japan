<?php

/** @var PDO $db */

require_once "../connection.php";


session_start();

if(!isset($_SESSION['intern_login']))
{
    header("location:../login.php");
}

$sql='SELECT * FROM users WHERE user_id=:user_id';
$statement = $db->prepare($sql);
$statement->execute([':user_id' => $_SESSION["user_id"]]);
$last_id = $_SESSION["user_id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Intern | Profile Page</title>
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
                    <a href="../index.php">Home</a>
                    <a href="../index.php">Search</a>
                    <a href="intern_profile.php">My Intern</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
            <a class="navbar-brand" href="../index.php">INTERNSHIP JAPAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="intern_profile.php"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["intern_login"];?></a></li>
                <li><a href="../index.php"><span class="glyphicon glyphicon-search"></span> Internships </a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <h1>Welcome, <?php echo $_SESSION['intern_login']; ?></h1>
</div>

</body>
</html>