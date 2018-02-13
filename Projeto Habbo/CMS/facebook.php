<?php
$LOAD = ['Facebook', 'Azure.Items'];
require '../KERNEL-XDRCMS/Init.php';
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookJavaScriptLoginHelper;

if(!$_Facebook['Enabled'])
	exit;

$Url = '';

try {
	FacebookSession::setDefaultApplication($_Facebook['App']['ID'], $_Facebook['App']['PrivateID']);
	$helper = new FacebookJavaScriptLoginHelper();
	$session = $helper->getSession();

	if($session === null):
		$_SESSION['Index']['Login']['Error']['Name'] = 'Ha ocurrido un error iniciado sesión. Inténtelo de nuevo más tarde.';
		goto a;
	endif;

	$user_profile = (new FacebookRequest(
		  $session, 'GET', '/me'
		))->execute()->getGraphObject()->asArray();
} catch (Exception $e) {
}

if(!isset($user_profile['id'], $user_profile['email']) || !is_numeric($user_profile['id']) || !USER::IsEmail($user_profile['email'])):
	$Url = '/';
	goto a;
endif;

$UserName = (isset($user_profile['username'])) ? $user_profile['username'] : '';
$BirthDay = (isset($user_profile['birthday'])) ? $user_profile['birthday'] : '';

$_UserId = 0;
if(USER::Exist($user_profile['id'], '', 'facebookid', 'users.id', $_UserId)):
	USER::LOGIN($_UserId['id'], $user_profile['email'], '', 'facebookid', false, ', xdrcms_users_data.AccountName = \'' . $user_profile['name'] . '\', xdrcms_users_data.AccountUserName = \'' . $UserName . '\' ');

	/*
	if(isset($_GET["__app_key"]) && LOGGED != "null"):
		if($Users->GetSecurity("__app_key") == $_GET["__app_key"]):
			$MySQLi->multi_query("UPDATE xdrcms_users_data SET vinculId = '" . $_UserId . "' WHERE mail = '" . $myrow["mail"] . "' AND rpx_type = '" . $myrow["rpx_type"] . "';UPDATE xdrcms_users_data SET vinculId = '" . $myrow["id"] . "' WHERE mail = '" . $user_profile["email"] . "' AND rpx_type = 'facebookid'");
			$_SESSION["Identity"]["NewVinculArray"] = [$_UserId, $user_profile["email"]];
			header("Location: " . PATH . "/identity/merge_identities");
			exit;
		endif;
	*/
	$Url = '/me';
	goto a;
else:
	$RegisterSettings = CACHE::GetAIOConfig('Register');
	if(isset($user_profile['gender']) && $user_profile['gender'] === 'male'):
		$Gender = 'M';
		$Look = 'hr-155-42.hd-185-2.ch-215-62.lg-275-64.ea-1406.ca-1813';
	else:
		$Gender = 'F';
		$Look = 'hd-628-7.ch-660-68.lg-700-68.he-1605-68.fa-1204';
	endif;
	
	if(!$RegisterSettings['register_enabled']):
		$Url = '?username=&rememberme=false&focus=login-password';
		$_SESSION['Index']['Login']['Error']['Name'] = 'El registro está desactivado, inténtalo más tarde.';
		goto a;
	endif;

	$IpC = $MySQLi->query('SELECT COUNT(*) FROM users WHERE ip_last = \'' . MY_IP . '\'')->fetch_assoc()['COUNT(*)'];
	if($RegisterSettings['limitips'] != 0 && $IpC >= $RegisterSettings['limitips']):
		$Url = '?username=&rememberme=false&focus=login-password';
		$_SESSION['Index']['Login']['Error']['Name'] = 'Has sobrepasado el límite de usuarios.';
		goto a;
	endif;

	$q = $MySQLi->query('INSERT INTO users (username, rank, credits, account_created, block_newfriends, ip_last, look, gender, motto, online) VALUES
		(\'' . USER::GenerateName($user_profile['email']) . '\', 1, ' . $SiteSettings['initial.credits.int'] . ', ' . time() . ', \'0\', \'' . MY_IP . '\', \'' . $Look . '\', \'' . $Gender . '\', \'\', \'0\')');
		
	if(!$q || $MySQLi->affected_rows !== 1):
		$Url = '/';
		$_SESSION['Index']['Login']['Error']['Name'] = 'Ha ocurrido un error interno, inténtalo más tarde.';
		goto a;
	endif;

	$userid = $MySQLi->insert_id;
	$MySQLi->query('REPLACE INTO xdrcms_users_data (id, mail, password, birth, rpx_id, rpx_type, web_online, AddonData, RememberMeToken, AccountID, AccountIdentifier, AccountPhoto, securityTokens, AccountName, AccountUserName) VALUES (' . $userid . ', \'' . $user_profile['email'] . '\', \'\', \'' . $BirthDay . '\', ' . METHOD::RANDOM(12, true, false) . ', \'facebookid\', \'--\', \'\', \'\', \'' . $user_profile['id'] . '\', \'' . $user_profile['link'] . '\', \'\', \'\', \'' .  $user_profile['name'] . '\', \'' . $UserName . '\')');

	if(isset($_SESSION['Register']['RefId']) && is_numeric($_SESSION['Register']['RefId']) && $IpC == 0)
		USER::NewRefer($userid, $_SESSION['Register']['RefId']);

	ITEM::PLACE($userid, 0, '180', '366', '11', '', 's_paper_clip_1', '', 'sticker');
	ITEM::PLACE($userid, 0, '130', '22', '10', '', 's_needle_3', '', 'sticker');
	ITEM::PLACE($userid, 0, '280', '343', '3', '', 's_sticker_spaceduck', '', 'sticker');
	ITEM::PLACE($userid, 0, '593', '11', '9', '', 's_sticker_arrow_down', '', 'sticker');

	ITEM::PLACE($userid, 0, '107', '402', '8', '', 'n_skin_notepadskin', 'note.myfriends', 'stickie');
	ITEM::PLACE($userid, 0, '57', '229', '6', '', 'n_skin_speechbubbleskin', 'note.welcome', 'stickie');
	ITEM::PLACE($userid, 0, '148', '41', '7', '', 'n_skin_noteitskin', 'note.remember.security', 'stickie');

	ITEM::PLACE($userid, 0, '457', '26', '4', 'ProfileWidget', 'w_skin_defaultskin', '', 'widget');
	ITEM::PLACE($userid, 0, '450', '319', '1', 'RoomsWidget', 'w_skin_notepadskin', '', 'widget');

	//if($SiteSettings["initial.credits.int"] > 0)
	//	newTransaction($userid, $date_full, $SiteSettings["initial.credits.int"], $System->CorrectStr("¡Bienvenido a " . $hotelName . "!"));

		/*
		if(isset($_GET["__app_key"]) && LOGGED != "null"):
			if($Users->GetSecurity("__app_key") == $_GET["__app_key"]):
				$MySQLi->multi_query("UPDATE xdrcms_users_data SET vinculId = '" . $userid . "' WHERE mail = '" . $myrow["mail"] . "' AND rpx_type = '" . $myrow["rpx_type"] . "';UPDATE xdrcms_users_data SET vinculId = '" . $myrow["id"] . "' WHERE mail = '" . $user_profile["email"] . "' AND rpx_type = 'facebookid'");
				$_SESSION["Identity"]["NewVinculArray"] = [$userid, $user_profile["email"]];
				header("Location: " . PATH . "/identity/merge_identities");
				exit;
			endif;
		else:
		*/

	USER::LOGIN($userid, $user_profile['email'], '', 'facebookid', false);
	$Url = '/me?connect=true&disableFriendLinking=false&next=';
endif;

a:
?>
<html>
<head>
  <title>Redirecting...</title>
  <meta http-equiv="content-type" content="text/html; charset=<?php echo strtolower(ini_get('default_charset')); ?>">
  <style type="text/css">body { background-color: #e3e3db; text-align: center; font: 11px Verdana, Arial, Helvetica, sans-serif; } a { color: #fc6204; }</style>
</head>
<body>

<script type="text/javascript">window.location.replace('<?php echo str_replace('/', '\/', PATH . $Url); ?>');</script><noscript><meta http-equiv="Refresh" content="0;URL=<?php echo PATH . $Url; ?>"></noscript>

<p class="btn">If you are not automatically redirected, please <a href="<?php echo PATH . $Url; ?>" id="manual_redirect_link">click here</a></p>

</body>
</html>