<?php
const ROW_PER_PAGE = 10; // Displays 10 results per page
require_once ("dummy.php");

/** @var PDO $db */

	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	$sql = 'SELECT * FROM entity WHERE position LIKE :keyword OR city LIKE :keyword ';

	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $db->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}

	$query = $sql.$limit;
	$pdo_statement = $db->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Internship Japan | Homepage</title>
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
          <a href="register.php">Register</a>
          <a href="login.php">Login</a>
          <a href="index.php">Search</a>
        </div>
      </div>
      <a class="navbar-brand" href="index.php">INTERNSHIP JAPAN</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>



<form class="form-inline" name='frmSearch' action='' method='post'>
    <div class="text-center">
        <img src="assets/logo.png" width="300"><br><br>
        <div class="form-group"><input class="form-control mr-sm-2" type='text' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='25' placeholder="Search for internships"></div>
        <button type="submit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-search"></span> Search</button>
    </div><br><br>

    <table class='table table-bordered'>
        <thead>
        <tr style="background-color: lightskyblue">
            <th class='table-header' width='20%'>Entity</th>
            <th class='table-header' width='20%'>Position</th>
            <th class='table-header' width='20%'>City</th>
            <th class='table-header' width='20%'>Contact person</th>
            <th class='table-header' width='20%'>Email</th>
        </tr>
        </thead>
        <tbody id='table-body'>
        <?php
        if(!empty($result)) {
            foreach($result as $row) {
                ?>
                <tr class='table-row'>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['position_text']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['contactpersoon']; ?></td>
                    <td><?php echo $row['email_contactpersoon']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <?php echo $per_page_html; ?>
</form>

</body>
</html>
