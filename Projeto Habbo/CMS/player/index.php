<!-- INICIO DO PLAYER -->
<link rel="stylesheet" type="text/css" href="css/tipped.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/layout4.css">
<div id="area-player">
    <div id="player-min" class="img img-base-min" hidden>
        <div id="controles">
            <div id="play-pause-box-min" class="img img-btn-min">
                <button id="play-pause-min" class="img pause"></button>
            </div>
            <div id="move-box" class="img img-move-box">
                <div id="move-min" class="img img-mover-min"></div>
            </div>
            <div id="expand" class="img img-expand-btn"></div>
        </div>
    </div>
    <div id="player">
        <div id="principal" class="img img-base">
            <div id="controles">
                <div id="audio"></div>
                <div id="play-pause-box" class="img img-play-pause-box">
                    <button id="play-pause" class="img pause"></button>
                </div>
                <div id="volume" class="img img-big-btn">
                    <div class="bar"></div>
                </div>
                <div id="move" class="img img-mover" class="handle"></div>
                <div id="close" class="img img-close-btn"></div>
                <div id="refresh" class="img img-refresh"></div>
                <div id="presenca-btn" class="img img-pato-btn"></div>
                <div id="pedido-btn" class="img img-med-btn"><b>F. Pedido</b></div>
            </div>
            <div id="info">
                <div id="programacao" class="img img-programacao">
                    <span>
            ...
          </span>
                </div>
                <div id="locutor" class="img img-locutor">
                    <span>
            ...
          </span>
                </div>
                <div id="ouvintes" class="img img-ouvintes">
                    <span>
            ...
          </span>
                </div>
            </div>
            <div id="social-btns">
                <a href="https://www.facebook.com/radiohabbliveoficial" id="facebook" class="img img-fb-btn" target="_blank"></a>
                <a href="https://twitter.com/RadioHabblive" id="twitter" class="img img-tt-btn" target="_blank"></a>
            </div>
        </div>
        <div id="formularios" class="img img-form" hidden>
            <div id="pedidos" hidden>
                <form id="pedidos-form" action="#" method="#">
                    <b>Pedido:</b>
                    <br>
                    <input type="text" name="pedido" placeholder="Digite aqui o seu pedido." required/>
                    <input type="hidden" name="username" value="KidPeng">
                    <button class="submit-btn" type="submit">Enviar</button>
                    <button class="back-btn" type="button">Voltar</button>
                </form>
            </div>
            <div id="pesenca" hidden>
                <form id="presenca-form" action="#" method="#">
                    <b>Código de presença:</b>
                    <br>
                    <input type="number" name="codigo" placeholder="Digite o código aqui." required/>
                    <input type="hidden" name="username" value="KidPeng">
                    <button class="submit-btn" type="submit">Marcar</button>
                    <button class="back-btn" style="" type="button">Voltar</button>
                </form>
            </div>
            <div id="alert" hidden>
                <span class="rainbow">
        </span>
            </div>
        </div>
    </div>
</div>

<script src="js/tipped.js"></script>
<script src="js/layout.0.0.2.js"></script>
<script async='async' src='js/hlive-player-new.082.js'></script>
<script type="text/javascript" src="http://habblive.in/public/js/radio-player-novo.0.0.2.js"></script>

<!-- FIM DO PLAYER -->