<?php
session_start();
require("core/config.php");
$error = array();
if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username == $default['username'] && $password == $default['password']) {
		$_SESSION['admin_auth'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['start'] = time();
		$_SESSION['id'] = substr(md5(mt_rand()), 0, 10); // Random session identifier
		$_SESSION['last_update'] = time();
		$_SESSION['last_scan'] = time();
		header("Location: dashboard.php");
		exit;
	} else {
		$error['login'] = "Invalid Username/Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HoloProtector - Login</title>
 
<link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>
 
<link href="css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
 
<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">
 
 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300%7CTitillium+Web:200,300,400' rel='stylesheet' type='text/css'>
 
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="login-page">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div id="login-box">
<div class="row">
<div class="col-xs-12">
<header id="login-header">
<div id="login-logo">
Holo Protector
</div>
</header>
<div id="login-box-inner">
<?php if(isset($error['login'])) { ?> <div class="alert alert-danger"> <?=$error['login']?> </div> <?php } ?>
<form action="" method="POST" role="form">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="username"class="form-control" placeholder="Username">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" name="password" class="form-control" placeholder="Password">
</div>
<div class="row">
<div class="col-xs-12">
<button type="submit" name="login" class="btn btn-success col-xs-12">Login</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
 
<script src="js/scripts.js"></script>
 
</body>
</html>
<!-- Localized -->