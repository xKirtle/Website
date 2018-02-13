<?php
if(!isset($_POST['messageId'], $_POST['label']) && (strstr($_POST['messageId'], 'campaign-message-') || is_numeric($_POST['messageId'])))
	exit;

require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

$mCA = !is_numeric($_POST['messageId']);
$mId = str_replace('campaign-message-', '', $_POST['messageId']);
if(!is_numeric($mId))
	exit;

if(isset($_SESSION['MiniMail']['UnReads'][$mId])):
	if($mCA)
		$MySQLi->query('UPDATE xdrcms_minimail SET IsReaded = 1 WHERE Id = ' . $mId . ' AND SenderId = 0 AND OwnerId = ' . USER::$Data['ID']);
	else
		$MySQLi->query('UPDATE xdrcms_minimail SET IsReaded = 1 WHERE Id = ' . $mId . ' AND OwnerId = ' . USER::$Data['ID']);
	unset($_SESSION['MiniMail']['UnReads'][$mId]);
endif;

if($mCA)
	exit;
	
$mQ = $MySQLi->query('SELECT * FROM xdrcms_minimail WHERE SenderId != 0 AND OwnerId = ' . USER::$Data['ID'] . ' AND Id = ' . $mId);
if($mQ && $mQ->num_rows === 0)
	exit;
$mR = $mQ->fetch_assoc();
?>
	<ul class="message-headers">
        <?php if($mR['SenderId'] != USER::$Data['ID']): ?><li class="header-report"><a href="#" class="report" title="Reportar como ofensivo"></a></li><?php endif; ?>
		<li><b>Asunto:</b> <?php echo $mR['Title']; ?></li>
		<li><b>De:</b> <?php echo USER::GetData($mR['SenderId'])['username']; ?></li>
<?php
$toQ = $MySQLi->query('SELECT username FROM users WHERE id IN (' . $mR['ToIds'] . ')');
$Names = '';
if($toQ && $toQ->num_rows > 0)	while($uRow = $toQ->fetch_assoc())
	$Names .= $uRow['username'] . ', ';
	
$Names = substr($Names, 0, -2);
?>
		<li><b>Para:</b> <?php echo $Names; ?></li>
	</ul>
    <div class="body-text"><?php echo METHOD::DecodeBBText($mR['Message']); ?></div>
    <div class="reply-controls">
        <div>
            <div class="new-buttons clearfix">
<?php if($mR['InBin'] == 1): ?>
                    <a href="#" class="new-button undelete"><b>No borrar</b><i></i></a>
<?php else: ?> 
                	<a href="#" class="related-messages" id="rel-<?php echo $mR['RelatedId']; ?>" title="Ver toda la conversación"></a>
<?php endif; ?>
<?php if($_POST['label'] === 'inbox'): ?>
				<a href="#" class="new-button reply"><b>Responder</b><i></i></a>
<?php endif; ?>
            	<a href="#" class="new-button red-button delete"><b>Borrar</b><i></i></a>
            </div>
        </div>
        <div style="display: none">
	        <textarea rows="5" cols="10" class="message-text"></textarea><br />
	        <div class="new-buttons clearfix">
    	        <a href="#" class="new-button cancel-reply"><b>Cancelar</b><i></i></a>
    	        <a href="#" class="new-button preview"><b>Previa</b><i></i></a>
                <a href="#" class="new-button send-reply"><b>Enviar</b><i></i></a>
	        </div>
        </div>
    </div>