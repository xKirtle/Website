<?php
require("core/config.php");
require("core/guard.php");
guard($ddos_guard, $bot_guard, $default['email'], $notif);
?>
<h2> Testing </h2>