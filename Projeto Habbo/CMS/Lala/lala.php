<?php 
if($useradmin['LalaAlert'] == 0){?>
<?php 
if($useradmin['Lala'] == 1){?>
<?php
$to5 = mysql_query("SELECT * FROM cms_alert ORDER BY id DESC LIMIT 1");
$i = 0; while($newsobject = mysql_fetch_assoc($to5)){ $i++;

$ii=$i-1;
if($i==1){
 ?>
<?php 
if($newsobject['updated'] == 1){?>
<?php mysql_query("UPDATE users SET LalaAlert = '1' WHERE username = '" . $_SESSION['username'] . "'"); ?>
<style type="text/css">
html{
overflow-y:hidden;
overflow-x:hidden;
}
</style>
<div class="orange" style="position: relative;background-color: rgba(0, 0, 0, 0.7);width: 100%;
    height: 5000px;float:left; margin-left:0%;margin-top:-207%;">
<div class="content">
<div class="umbrella"></div>
<div class="room">
<div class="room_1 active" id="room_1"></div>
<div class="room_2" id="room_2"></div>
<div class="room_3" id="room_3"></div>
<div class="furni" id="furni"></div>
<div class="friends" id="friends"></div>
<div class="frank" id="frank_fala"></div>
<div class="arrow_top" id="seta" style="margin-left:20%;margin-top:36%;"></div>
<div id="habbo"></div>
<img style="margin-left:-13%;margin-top:22%; max-width:400px;
    max-height:400px;
    width: auto;
    height: auto;" src="http://www.renders-graphiques.fr/image/upload/normal/2636_render_Lala_enfant_render.png" alt="logo"/>
<div class="box_msg" id="box_1">
<h3>OlÃ¡, sou a Lala uma mente artificial criada por Thiago Araujo. Tenho uma Alerta para fala! <img src="" style="float: right; margin-left: 10px;"></h3>
<img style="max-width:60px;
    max-height:30px;
    width: auto;
    height: auto;" src="Externos/img/logo.gif"/>
<p>Habbz Ã© um hotel virtual onde os jogadores podem socializar usando avatares.</p>
</div>
<div class="box_msg small" id="box_2">
<h3>Eu encontrei uma mensagem no servidores!</h3><br>
<div style="float: right; margin-left: 20px; margin-top: 10px;">
<img src="/Lala/Lalaimg/status.gif"/>
</div>
<p>Olhe bem a mensagem! pode ser importante.</p>
</div>
<div class="box_msg" id="box_3">
<h3>Carregando mensagem!</h3><br>
<div style="float: right; margin-left: 30px; margin-top: 10px;">
<img src="/Lala/Lalaimg/perfil.png"/>
</div>
<p>Estou procurando a mensagem! espere um pouco.</p>
</div>
<div class="box_msg" id="box_4">
<h3><?php echo $newsobject['title']; ?></h3>
<br>
<br>
<p><?php echo $newsobject['longstory']; ?> </p>
<a  href="/me"><button class="f_login" style="width: 90%;background-color:rgba(122,180,51,.87);" onclick="registrar()"><div style="color:#fff">Obg Lala pela mensagem!</div></button></a>
</div>
</div>
</div>
</div>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php 
if($useradmin['Lala'] == 0){?>
<?php mysql_query("UPDATE users SET Lala = '1' WHERE username = '" . $_SESSION['username'] . "'"); ?>
<style type="text/css">
html{
overflow-y:hidden;
overflow-x:hidden;
}
</style>
<div class="orange" style="position: relative;background-color: rgba(0, 0, 0, 0.7);width: 100%;
    height: 5000px;float:left; margin-left:0%;margin-top:-207%;">
<div class="content">
<div class="umbrella"></div>
<div class="room">
<div class="arrow_top" id="seta" style="margin-left:20%;margin-top:36%;"></div>
<div id="habbo"></div>
<img style="margin-left:-13%;margin-top:22%; max-width:400px;
    max-height:400px;
    width: auto;
    height: auto;" src="http://www.renders-graphiques.fr/image/upload/normal/2636_render_Lala_enfant_render.png" alt="logo"/>
<div class="box_msg" id="box_1">
<h3>OlÃ¡, sou a Lala uma mente artificial criada por Thiago Araujo. Irei mostra algumas funÃ§Ãµes da CMS. <img src="" style="float: right; margin-left: 10px;"></h3>
<img style="max-width:60px;
    max-height:30px;
    width: auto;
    height: auto;" src="Externos/img/logo.gif"/>
<p>Habbz Ã© um hotel virtual onde os jogadores podem socializar usando avatares.</p>
</div>
<div class="box_msg small" id="box_2">
<h3> Status do seu dia no Habbz</h3><br>
<div style="float: right; margin-left: 20px; margin-top: 10px;">
<img src="/Lala/Lalaimg/status.gif"/>
</div>
<p>Na CMS do Habbz, os jogadores pode coloca o seu status para seus amigos!</p>
</div>
<div class="box_msg" id="box_3">
<h3>Jogadores tem direito de ter um lindo Perfil na CMS</h3>
<div style="float: right; margin-left: 30px; margin-top: 10px;">
<img src="/Lala/Lalaimg/perfil.png"/>
</div>
<p>No perfil os jogadores pode troca de capa, ganha curtidas Ã© seguidores Ã© muitas outras coisas.</p>
</div>
<div class="box_msg" id="box_4">
<h3>Obrigado por esta no Habbz Hotel!</h3>
<p>Habbz Ã© o melhor hotel virtual do Brasil e Portugal!</p>
<a  href="/me"><button class="f_login" style="width: 90%;background-color:rgba(122,180,51,.87);" onclick="registrar()"><div style="color:#fff">Obg Lala pelo tutorial!</div></button></a>
</div>
</div>
</div>
</div>
<?php } ?>