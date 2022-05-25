<?php

/** @var PDO $db */

require_once "connection.php";

session_start();

if(isset($_REQUEST['btn_register'])) //button name "btn_register"
{
	$username	= strip_tags($_REQUEST['txt_username']);	//textbox name "txt_username"
	$email		= strip_tags($_REQUEST['txt_email']);		//textbox name "txt_email"
	$password	= strip_tags($_REQUEST['txt_password']);	//textbox name "txt_password"
    $role	= strip_tags($_REQUEST['txt_role']);	//textbox name "txt_role"
		
	if(empty($username)){
		$errorMsg[]="Please enter username";	//check username textbox not empty 
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";	//check email textbox not empty 
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";	//check proper email format 
	}
	else if(empty($password)){
		$errorMsg[]="Please enter password";	//check passowrd textbox not empty
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password must be at least 6 characters";	//check passowrd must be 6 characters
	}
	else if(empty($role)){
        $errorMsg[] = "Please enter role";	//check role if selected
    }
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT username, email FROM users 
										WHERE username=:uname OR email=:uemail"); // sql select query
			
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email)); //execute query 
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
			

			if(!isset($errorMsg)) //check no "$errorMsg" show then continue
			{
				
				$insert_stmt=$db->prepare("INSERT INTO users	(username,email,password,role) VALUES
																(:uname,:uemail,:upassword,:urole)"); 		//sql insert query
                $insert_stmt->execute(array(	':uname'	=>$username,
                    ':uemail'	=>$email,
                    ':upassword'=>$password,
                    ':urole'=>$role
                ));

                $user_id = $db->lastInsertId();

				if(intval($user_id) > 0){

				    $registerMsg="Register Successfully..... Wait Login page"; //execute query success message
                    switch ($role) // role base user login start
                    {
                        case "intern":
                            $_SESSION["intern_login"] = $email; // session name is "intern_login" and store in "$email" variable
                            $_SESSION["user_id"] = $user_id;
                            $loginMsg = "Intern... Successfully Login..."; // intern login success message
                            header("refresh:3;intern/intern_home.php"); // refresh 3 seconds after redirect to "intern_home.php" page
                            break;

                        case "entity":
                            $_SESSION["entity_login"] = $email;
                            $_SESSION["user_id"] = $user_id;
                            $loginMsg = "Entity... Successfully Login...";
                            header("refresh:3;entity/entity_home.php");
                            break;

                        case "education":
                            $_SESSION["education_login"] = $email;
                            $_SESSION["user_id"] = $user_id;
                            $loginMsg = "Education... Successfully Login...";
                            header("refresh:3;education/education_home.php");
                            break;

                        default:
                            $errorMsg[] = "wrong email or password or role";
                    }
//                    header("refresh:3;login.php");
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Internship Japan | Register</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
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
                    <a href="index.php">Home</a>
                    <a href="login.php">Login</a>
                    <a href="index.php">Search</a>
                </div>
            </div>
            <a class="navbar-brand" href="index.php">INTERNSHIP JAPAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">

	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><img src="assets/logo.png" width="100px"><h2>Register</h2></center><br><br>
			<form method="post" class="form-horizontal">

				
				<div class="form-group">
				<label class="col-sm-3 control-label">Username</label>
				<div class="col-sm-6">
				<input type="text" name="txt_username" class="form-control" placeholder="enter username" />
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
				<input type="text" name="txt_email" class="form-control" placeholder="enter email" />
				</div>
				</div>
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-6">
				<input type="password" name="txt_password" class="form-control" placeholder="enter passowrd" />
				</div>
				</div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="txt_role">
                            <option value="" selected="selected">-- select role --</option>
                            <option value="intern">Intern</option>
                            <option value="entity">Entity</option>
                            <option value="education">Education</option>
                        </select>
                    </div>
                </div>
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_register" class="btn btn-primary " value="Register">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				You have a account register here? <a href="login.php"><p class="text-info">Login Account</p></a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>