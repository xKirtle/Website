<?php require_once('Thiago/licencia.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="pt-br">
<meta name="description" content="Habbz agora com fun褯 de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promo趥s, 99999 Crꥩtos e Topázios."/>
<meta name="keywords" content="habbo hotel, hotel, Habbzhotel, Habbz, habblet, jogos online, habbo"/>
<meta name="url" content="http://www.Habbz.biz">
<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="Habbz.biz">
<title>Habbz - Habbz FIM!</title>
<link rel="icon" href="/favicon.ico">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
<style>
        html, body { height: 100%; }

        body {
            background-color: #1fa3d3;
            overflow: hidden;
            -webkit-transition: 0.8s all;
            -moz-transition: 0.8s all;
            transition: 0.8s all;
        }

        body.black {
            background-color: #222;
            -webkit-transition: 0.8s all;
            -moz-transition: 0.8s all;
            transition: 0.8s all;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 316px;
            height: 168px;
        }

        .logo {
            background-image: url(Externos/img/logo.png);
            background-size: 100%;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            width: 316px;
            height: 168px;
        }

        .logo.slow {
            animation-duration: 3s;
            animation-delay: 0;

            -webkit-animation-duration: 3s;
            -webkit-animation-delay: 0;

            -moz-animation-duration: 3s;
            -moz-animation-delay: 0;
        }

        @media screen and (max-width: 316px) {
            .container {
                transform: translate(-48.5%, -48.5%);
                width: 95%;
            }

            .logo {
                width: 95%;
            }
        }

        .logo-2 {
            background-image: url(Externos/img/logo.png);
            background-position: center center;
            background-repeat: no-repeat;
            display: none;
            position: absolute;
            top: calc(100% + 340px);
            left: 50%;
            font-family: 'Ubuntu Condensed', sans-serif;
            padding-top: 396px;
            color: #FFF;
            font-size: 22px;
            text-shadow: 0 2px 1px #000;
            font-weight: 400;
            letter-spacing: -1px;
            margin-top: -170px;
            text-align: center;
            margin-left: -207.5px;
            width: 415px;
            height: 340px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
		
		    .thiago {
            display: none;
            position: absolute;
            top: calc(100% + 340px);
            left: 15%;
            font-family: 'Ubuntu Condensed', sans-serif;
            padding-top: 396px;
            color: #FFF;
            font-size: 22px;
            text-shadow: 0 2px 1px #000;
            font-weight: 400;
            letter-spacing: -1px;
            margin-top: -170px;
            text-align: center;
            margin-left: -207.5px;
            width: 415px;
            height: 340px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div style="opacity: 0;">
<audio controls autoplay>
<source src="Externos/musicas/fim.mp3" type="audio/mpeg">
</audio>
</div>
<div class="container">
<div class="logo animated infinite swing"></div>
</div>
<div class="thiago">
Escolha algum dos hoteis para você joga!<br><a style="color: #ed3c0f;" href="http://habitos.top">
Habitos</a> ou esse <a style="color: #10aeed;" href="http://ibluehotel.biz/">iBluehotel</a>
</div>
<div class="logo-2">
Um legado foi deixado. (FIM)<br>
Habbz - Por falta de tempo da equipe.<br>
Obrigado a todos!
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
        setTimeout(function() {
            $(".logo").removeClass('animated infinite swing');
            $(".logo").addClass('animated hinge slow');

            setTimeout(function() {
                $("body").addClass('black');

                setTimeout(function() {
                    $(".logo-2").show().animate({'top': '40%'}, 6000);
					$(".thiago").show().animate({'top': '-30%'}, 8000);
                }, 800);
            }, 800);
        }, 4000);
</script>
</body>
</html>
