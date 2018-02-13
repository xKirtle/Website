<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = $active = array();
$page['name'] = "Storage";
$active['dashboard'] = "";
$active['security'] = "active";
$active['server'] = "";
$active['storage'] = "";

if(!isset($_SESSION['admin_auth'])) {
	header("Location: login.php");
	exit;
}
if(isset($_GET['logout'])) {
	session_destroy();
	header("Location: login.php");
	exit;
}

require("inc/top.php");
?>
<div class="row">
<?php
$dir = scandir("storage");
foreach($dir as $file) {
$ext = explode(".",$file);
$ext = strtolower($ext[1]);
if($file != "." && $file != ".." && $file != ".DS_Store") {
if($ext == "png" || $ext == "jpeg" || $ext == "jpg" || $ext == "gif") {
	$type = "image";
} elseif($ext == "doc" || $ext == "docx" || $ext == "word") {
	$type = "document";
} elseif($type == "php" || $type == "html" || $type == "phtml") {
	$type = "developer";
} else {
	$type = "file";
}
?>
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"><div class="panel-title"><?=$file?></div></div>
<div class="panel-body"> 
<?php
if($type == "image") { echo '<a href="storage/'.$file.'"> <img class="img-responsive" style="display:block;text-align:center;margin:0 auto;float:none;" src="storage/'.$file.'"> </a>'; } 
elseif($type == "developer") {
echo '<a href="storage/'.$file.'"> <i class="fa fa-code" style="font-size:35px;"></i> </a>';
}
?>	
</div>
</div>
</div>
<?php
} }
?>
</div>
</div>
<!-- Content -->
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