$(function($) {
	function streaming(pick) {
		$('[data-streaming="'+pick+'"]').html('...');

		$.get(
			'ajax/',
			{
				'type' : 'streaming',
				'pick' : pick,
			},
			function(data) {
				if( pick == 'programa' ) {
					if( data[pick].length > 15 ) {
						data[pick] = data[pick].substring(0, 15) + '...';
					}
				}

				$('[data-streaming="'+pick+'"]').html( data[pick] );
			},
			'json'
		);
	}

	$(document).ready(function() {
		streaming( 'locutor' );
		streaming( 'programa' );
		streaming( 'ouvintes' );

		$('a[href*="#"]').click(function(e){
			e.preventDefault();
		});

		$('.locutor, .programa, .ouvintes').click(function(e) {
			var pick = $(this).data('streaming');

			streaming( pick );
		});

		$('.atualizar').click(function(e) {
			streaming( 'locutor' );
			streaming( 'programa' );
			streaming( 'ouvintes' );
		});

		var cache = Math.floor(Math.random() * 89 + 10);

		jwplayer('playerInstance').setup({
			'flashplayer' : 'http://www.player.radio.br/players/semrtmp/jwplayer/player2.swf',
			'file' : 'socket://107.6.144.42:9804/;stream.nsv?'+cache,
			'volume' : '100',
			'src' : 'http://www.player.radio.br/players/semrtmp/jwplayer/5.3.swf',
			'rtmpbuster' : 'rtmp://flash1.ciclanohost.com.br/buster',
			'autostart' : 'true',
			'provider' : 'http://www.player.radio.br/players/semrtmp/jwplayer/shoutcast.swf',
			'primary' : 'flash',
			'width' : '0',
			'height' : '0'
		});

		$('.play').click(function(e) {
			if( $(this).hasClass('stop') ) {
				$(this).removeClass('stop');
				jwplayer().setVolume(0);
			} else {
				$(this).addClass('stop');
				jwplayer().setVolume(100);
			}

			e.preventDefault();
		});
	});
}(jQuery));