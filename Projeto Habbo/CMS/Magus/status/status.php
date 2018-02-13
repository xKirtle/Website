<?
$host = "stm10.pagehost.com.br";
$port = "24328";
$listenlink = 'http://stm10.pagehost.com.br:24328/listen.pls';  //make link to stream
$fp = fsockopen("$host", "$port"); //open connection
if(!$fp) {
$success=2;  //se-t if no connection
}
if($success!=2){ //if connection
fputs($fp,"GET /index.html HTTP/1.0\r\nUser-Agent: XML Getter (Mozilla Compatible)\r\n\r\n"); //get 7.html
while(!feof($fp)) {
$pg .= fgets($fp, 1000);
}
fclose($fp); //close connection
$paage = ereg_replace(".*<font class=default>Stream Title: </font></td><td><font class=default><b>", "", $pg); //extract data
$paage = ereg_replace("</b></td></tr><tr><td width=100 nowrap>.*", "", $paage); //extract data
$pge = ereg_replace(".*<font class=default>Stream Genre: </font></td><td><font class=default><b>", "", $pg); //extract data
$pge = ereg_replace("</b></td></tr><tr><td width=100 nowrap>.*", "", $pge); //extract data
$pe = ereg_replace(".*<font class=default>Stream Genre: </font></td><td><font class=default><b>", "", $pg); //extract data
$pe = ereg_replace("</b></td></tr><tr><td width=100 nowrap>.*", "", $pe); //extract data
$musica = ereg_replace(".*<font class=default>Current Song: </font></td><td><font class=default><b>", "", $pg); //extract data
$musica = ereg_replace("</b></td></tr></table>.*", "", $musica); //extract data
$numbers = explode(",",$paage); //extract data
$servertitle=$numbers[0]; //set variable
$connected=$numbers[1]; //set variable
}
$fp2 = fsockopen("$host", $port); //open connection
if(!$fp2) {
$success2=2;  //se-t if no connection
}
if($success2!=2){ //if connection
fputs($fp2,"GET /7.html HTTP/1.0\r\nUser-Agent: XML Getter (Mozilla Compatible)\r\n\r\n"); //get 7.html
while(!feof($fp2)) {
$pg2 .= fgets($fp2, 1000);
}
fclose($fp2); //close connection
$pag = ereg_replace(".*<body>", "", $pg2); //extract data
$pag = ereg_replace("</body>.*", ",", $pag); //extract data
$numbers = explode(",",$pag); //extract data
$currentlisteners=$numbers[0]; //set variable
}
// ATUALIZADOR
if($_GET['ver'] == "dj"){
echo"$paage";
}
if($_GET['ver'] == "ouvintes"){
echo"
$currentlisteners";
}
if($_GET['ver'] == "musica"){
echo "$musica";
}
if($_GET['ver'] == "programa"){
echo"$pge";
}
if($_GET['ver'] == "imgloc"){
echo'<div style="width:50px; height:50px; background:url(http://www.habbo.com.br/habbo-imaging/avatarimage?user='.$paage.'&action=std&direction=3000002&head_direction=2999995&gesture=sml&size=s) no-repeat center;"></div>';
}
// ATUALIZADOR
?>