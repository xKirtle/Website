<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = $active = array();
$page['name'] = "Password Generator";
$active['dashboard'] = "";
$active['security'] = "active";
$active['server'] = "";
$active['storage'] = "";
$active['settings'] = "";

if(!isset($_SESSION['admin_auth'])) {
	header("Location: login.php");
	exit;
}
if(isset($_GET['logout'])) {
	session_destroy();
	header("Location: login.php");
	exit;
}

if(isset($_POST['generate']) && !empty($_POST['length']) && strlen(trim($_POST['length'])) > 0) {
	if(empty($_POST['length']) || !is_numeric($_POST['length'])) { $length = 3; } else { $length = $_POST['length']; }
	$chars = "qwertyu@#$%^&*iopasdfghjklzxcvbnm@#$%^&*QWERTYUIOOPASDFGHJKLZXCVBNM";
	$chars = str_shuffle($chars);
	$result = substr($chars, 0, $length);

}

require("inc/top.php");
?>
<!-- Content -->
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Password Generator </h2>
<p style="padding-bottom:1px;"> 
Here you can generate secure and completely random passwords.
<form action="" method="POST">
<div class="col-md-1">
<label> <b>Length</b> </label>
<input type="number" name="length" maxlength="2" min="3" max="99" value="3" class="form-control"> <br>
<input type="submit" name="generate" class="btn btn-success" value="Generate" style="outline:none;">
</div>
</form>
</p>
</header>
</div>
<?php if(isset($result) && !empty($result)) { ?>
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<p style="padding-bottom:1px;"> 
<h2 class="text-success"> Generated Password </h2>
</p>
<form action="" method="POST">
<div class="col-md-4">
<input type="text" value="<?=$result?>" class="form-control">
</div>
</form>
</header>
</div>
<?php } ?>
</div>
</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
&copy; <?=date("Y")?> Holo Protector
</p>
</footer>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
 
<script src="js/scripts.js"></script>
</body>
</html>
<!-- Localized -->