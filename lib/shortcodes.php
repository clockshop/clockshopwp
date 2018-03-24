<?php

function video_func( $atts ) {
    $a = shortcode_atts( array(
        'id' => '',
		'source' => '',
		'poster' => '',
    ), $atts );

	if ($a['source'] == 'vimeo') {
		$output = '<div class="video-container video-container-' . $a['id'] . '"><div class="poster" style="background-image: url(' . $a['poster'] . ');"></div><iframe class="iframe-' . $a['id'] . '" src="https://player.vimeo.com/video/' . $a['id'] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
		$output .= '<script>';
		$output .= 'var iframe' . $a['id'] . ' = document.querySelector(".iframe-' . $a['id'] . '");';
		$output .= 'var player' . $a['id'] . ' = new Vimeo.Player(iframe' . $a['id'] . ');';
		$output .= '(function($) {
				$(document).ready(function() {
					if ($(".video-container-' . $a['id'] . '").length) {
						player' . $a['id'] . '.on("loaded", function() {
							$(".video-container-' . $a['id'] . '").css("opacity", "1");
						});
						$(".video-container-' . $a['id'] . '").on("click", function() {
							$(".video-container-' . $a['id'] . '").addClass("play");
							$(".video-container-' . $a['id'] . ' .poster").fadeOut(500);
							player' . $a['id'] . '.play();
						});
					}
				});
			})(jQuery);';
		$output .= '</script>';
		return $output;
	} elseif ($a['source'] == 'youtube') {
		$output = '<div id="video-container-' . $a['id'] . '" class="video-container video-container-' . $a['id'] . '"><div class="poster" style="background-image: url(' . $a['poster'] . ');"></div><div class="youtube-video" data-id="' . $a['id'] . '" id="' . $a['id'] . '"></div></div>';
		$output .= '<script>';
		$output .= '(function($) {
				$(document).ready(function() {
					if ($(".video-container-' . $a['id'] . '").length) {
						$(".video-container-' . $a['id'] . '").on("click", function() {
							$(".video-container-' . $a['id'] . '").addClass("play");
							$(".video-container-' . $a['id'] . ' .poster").fadeOut(500);
							player["' . $a['id'] . '"].playVideo();
						});
					}
				});
			})(jQuery);';
		$output .= '</script>';
		return $output;	
	}
}
add_shortcode( 'video_embed', 'video_func' );

function button_func($atts) {
    $a = shortcode_atts( array(
		'text' => '',
		'href' => '',
		'target' => '',
	), $atts );

	$output = '<div class="button-sc-container"><a class="button button-sc" href="' . $a['href'] . '" target="' . $a['target'] . '">' . $a['text'] . '</a></div>';
    
    return $output;
}
add_shortcode( 'button', 'button_func' );

?>