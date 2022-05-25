<!-- This code below is responsible for identifying the user's authenticated -->
<!-- according to the role selection and verifying in the database -->

<?php

/** @var PDO $db */

include 'connection.php';

session_start();


if(isset($_SESSION["admin_login"]))	//check condition admin login not direct back to login.php page
{
    header("location: admin/admin_home.php");
}

if(isset($_SESSION["intern_login"]))	//check condition user login not direct back to login.php page
{
	header("location: intern/intern_profile.php");
}

if(isset($_SESSION["entity_login"]))	//check condition user login not direct back to login.php page
{
    header("location: entity/entity_profile.php");
}

if(isset($_SESSION["education_login"]))	//check condition user login not direct back to login.php page
{
    header("location: education/education_profile.php");
}

if(isset($_REQUEST['btn_login']))	//button name is "login"
{
    $username = strip_tags($_REQUEST["txt_username_email"]);    //textbox name "txt_email"
    $email = strip_tags($_REQUEST["txt_username_email"]);    //textbox name "txt_email"
    $password = strip_tags($_REQUEST["txt_password"]);            //textbox name "txt_password"
    $role = strip_tags($_REQUEST["txt_role"]);  //textbox name "txt_role"

    if (empty($email)) {
        $errorMsg[] = "please enter username or email";    //check "username/email" textbox not empty
    } else if (empty($username)) {
        $errorMsg[] = "please enter username or email";    //check "passowrd" textbox not empty
    }else if (empty($password)) {
        $errorMsg[] = "please enter password";    //check "passowrd" textbox not empty
    } else if (empty($role)) {
        $errorMsg[] = "please select your role";    //check "username/email" textbox not empty
    } else if ($username || $email and $password and $role) {// if true data then try login

        try {
            $select_stmt = $db->prepare("SELECT * FROM users 
                WHERE 
                username=:uname OR email=:uemail AND password=:upassword AND role=:urole"); //sql select query
            $select_stmt->bindParam(":uname", $username);
            $select_stmt->bindParam(":uemail", $email);
            $select_stmt->bindParam(":upassword", $password); // bind all parameter
            $select_stmt->bindParam(":urole", $role);
             $select_stmt->execute();    //execute query


            while ($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) // fetch record from database
            {
                $user_id = $row['user_id'];
                $dbuname = $row["username"];
                $dbemail = $row["email"];
                $dbpassword = $row["password"];
                $dbrole = $row["role"];// store new variable

            }
            if ($username != null or $email != null and $password != null and $role != null)    //check condition database record greater zero after continue

            {
                if ($select_stmt->rowCount() > 0) // check row greater than "0" after continue
                {
                    if (intval($user_id) > 0 and $username == $dbuname OR $email == $dbemail and $password == $dbpassword and $role == $dbrole) // check type textboxes and record new variables are true
                    {
                        switch ($dbrole) // role base user login start
                        {
                            case "intern":
                                $_SESSION["intern_login"] = $email; // session name is "intern_login" and store in "$email" variable
                                $_SESSION["user_id"] = $user_id;
                                $loginMsg = "Intern... Successfully Login..."; // intern login success message
                                header("refresh:3;intern/intern_profile.php?id=".$user_id); // refresh 3 seconds after redirect to "intern_home.php" page

                                break;

                            case "entity":
                                $_SESSION["entity_login"] = $email;
                                $_SESSION["user_id"] = $user_id;
                                $loginMsg = "Entity... Successfully Login...";
                                header("refresh:3;entity/entity_profile.php?id=".$user_id);
                                break;

                            case "education":
                                $_SESSION["education_login"] = $email;
                                $_SESSION["user_id"] = $user_id;
                                $loginMsg = "Education... Successfully Login...";
                                header("refresh:3;education/education_profile.php?id=".$user_id);
                                break;

                            case "admin":
                                $_SESSION["admin_login"] = $email;
                                $_SESSION["user_id"] = $user_id;
                                $loginMsg = "Admin... Successfully Login...";
                                header("refresh:3;admin/admin_home.php");
                                break;

                            default:
                                $errorMsg[] = "wrong email or password or role";
                        }
                    } else {
                        $errorMsg[] = "wrong email or password or role";
                    }
                } else {
                    $errorMsg[] = "wrong email or password or role";
                }
            } else {
                $errorMsg[] = "wrong email or password or role";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    } else {
        $errorMsg[] = "wrong email or password or role";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Internship Japan | Login</title>
		
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
                    <a href="register.php">Register</a>
                    <a href="index.php">Search</a>
                </div>
            </div>
          <a class="navbar-brand" href="index.php">INTERNSHIP JAPAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
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
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><img src="assets/logo.png" width="100px"><h2>Login</h2></center><br><br>
			<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Username / Email</label>
				<div class="col-sm-6">
				<input type="text" name="txt_username_email" class="form-control" placeholder="enter email" />
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
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" name="btn_login" class="btn btn-primary" value="Login">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				You don't have a account register here? <a href="register.php"><p class="text-info">Register Account</p></a>		
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>