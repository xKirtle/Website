<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = array();
$page['name'] = "Server Statistics";
$active['dashboard'] = "";
$active['security'] = "";
$active['server'] = "active";
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

// Correctly format data
$cpu = round(get_cpu_usage());
$total = round(get_total_space()/1000000);
$free = round(get_free_space()/1000000);
$percentage = round(($free/$total)*100);
$percentage = 100-$percentage;
if($cpu < 1) { $cpu = 1; } 

require("inc/top.php");
?>
<!-- Content -->
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Server Statistics </h2>
<p style="padding-bottom:1px;"> 
Here you can find statistics related to your web server's performance
</p>
</header>
</div>
<!-- CPU Usage -->
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box small-graph-box red-bg">
<span class="value"><?=$cpu?>%</span>
<span class="headline">CPU Usage</span>
<div class="progress">
<div style="width: <?=$cpu?>%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?=$cpu?>" role="progressbar" class="progress-bar">
<span class="sr-only"><?=$cpu?>% CPU Usage </span>
</div>
</div>
</div>
</div>
<!-- Memory -->
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box small-graph-box red-bg">
<span class="value"><?=$free?> MB</span>
<span class="headline">Free Space</span>
<div class="progress">
<div style="width: <?=$percentage?>%;" aria-valuemax="<?=$total?>" aria-valuemin="0" aria-valuenow="<?=$free?>" role="progressbar" class="progress-bar">
<span class="sr-only"><?=$free?> MB Free Space </span>
</div></div>
</div>
</div>
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