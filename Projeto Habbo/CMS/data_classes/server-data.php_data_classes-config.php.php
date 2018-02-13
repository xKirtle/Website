<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
#####################################################################
#||||| rtiag0CMS - Sistema de administra��o de conteudo Habbo  |||||#
#||||| Baseada em HabboCMS - HTML, PHP, CSS                    |||||#
# ----------------------------------------------------------------- #
#||||| � Copyright 2012 Hobba 2012 - Open Source Software      |||||#
#||||| � Copyright 2012 Habbo - Estrutura antiga 2011/2012     |||||#
#||||| � Copyright 2012 Sulake Corporation - Habbo Arquivos    |||||#
# ----------------------------------------------------------------- #
#||||| HobbaCMS � uma estrutura se site baseado em Habbo Hotel |||||#
#||||| Os arquivos s�o protegido por um �nico arquivo          |||||#
#####################################################################

################## PREFER�NCIAS ##################
$Hotelname = "HabbzHotel"; //*Nome do Hotel, exemplo = Habbo*//
$hotel_url = "http://localhost"; //*URL do Hotel, sem o "www"*//
$hkthiago = "/Painelthiago"; //*URL do HK, sem o "www"*//

################## CONFIGURA��ES #################
$MySQLhostname = "localhost"; //*Seu ip ou da VPS*//
$MySQLusername = "root"; //*Usu�rio do PhpMyAdmin*//
$MySQLpassword = ""; //*Senha do PhpMyAdmin*//
$MySQLdb = "teste"; //*Nome do seu banco de dados*//

################## REDES SOCIAIS #################
$Facebook_id = ""; //* Nome de usu�rio Facebook *//
$Twitter_id = ""; //*Nome de usu�rio Twitter*//
$Email_admin = ""; //*Email do administrador*//

################## C_IMAGES CONFIG ############
$avatar = "http://www.habbo.com/habbo-imaging/avatarimage?figure="; //*Configura��es de Avatar*//
$cimages_url = ""; //*Configura��es de Emblemas*//

################## CONFIGURA��ES DA CLIENTE ##################
$server_ip = "localhost"; //*IP do VPS/PC*//
$server_port = "90"; //*Port para conex�o Emulador*//
$external_var = "http://localhost/swfs/external_variables.txt"; //*URL da External Variables*//
$external_text = "http://localhost/swfs/external_flash_texts.txt"; //*URL da External Texts*//
$productdata = "http://localhost/swfs/productdata.txt"; //*URL da Productdata*//
$furnidata = "http://localhost/swfs/furnidata.txt"; //*URL da Furnidata*//
$swf_gordon = "http://localhost/swfs/"; //*URL da gordon da SWF, geralmente igual a swf_path*//
$swf_path = "http://localhost/swfs/"; //*URL da pasta onde est� localizada a SWF*//
$swf_flash = "http://localhost/swfs/Habbig.swf"; //*URL do arquivo .swf*//

?>