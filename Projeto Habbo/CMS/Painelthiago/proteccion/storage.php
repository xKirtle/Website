<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = $active = array();
$page['name'] = "Storage";
$active['dashboard'] = "";
$active['security'] = "";
$active['server'] = "";
$active['storage'] = "active";
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

if(isset($_POST['download'])) {
$file = "storage/".$_POST['file'];
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
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
} elseif($ext == "php" || $ext == "html" || $ext == "phtml" || $ext == "txt") {
	$type = "developer";
	$code = file_get_contents("storage/".$file);
} elseif($ext == "mp3") {
	$type = "audio";
} else {
	$type = "file";
}
?>
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"><div class="panel-title"><?=$file?></div></div>
<div class="panel-body" style="height:120px;"> 
<?php
if($type == "image") { echo '<a href="storage/'.$file.'"> <img class="img-responsive" style="display:block;text-align:center;margin:0 auto;float:none;" src="storage/'.$file.'"> </a>'; } 
elseif($type == "developer") {
echo '<pre><code><div style="max-height:65px;overflow-y:auto;">'.htmlentities($code).'</div></code></pre>';
} elseif($type == "audio") {
echo '<i class="fa fa-music" style="display:block;text-align:center;margin:0 auto;float:none;font-size:50px;padding-top:17px;"></i>';
} else {
echo '<i class="fa fa-file" style="display:block;text-align:center;margin:0 auto;float:none;font-size:50px;padding-top:17px;"></i>';
}
?>	
</div>
<div class="panel-footer">
<form action="" method="POST">
<input type="hidden" name="file" value="<?=$file?>">
<button type="submit" name="download" class="btn btn-success" style="display:block;margin:0 auto;float:none;outline:none;"> <i class="fa fa-download"></i> Download </button>
</form>
</div>
</div>
</div>
<?php
} }
?>
</div>
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