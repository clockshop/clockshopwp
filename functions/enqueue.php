<?php

function enqueue_scripts_method() {

	$version = "b";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	// Define JS

	$flexsliderjs = get_template_directory_uri() . '/js/jquery.flexslider.js';
	wp_register_script('flexsliderjs',$flexsliderjs, false, $version);

	$mainjs = get_template_directory_uri() . '/js/main.js';
	wp_register_script('mainjs',$mainjs, false, $version);

	$googlemapsapi = 'http://maps.googleapis.com/maps/api/js?sensor=false';
	wp_register_script('googlemapsapi',$googlemapsapi, false);

	$infoboxjs = get_template_directory_uri() . '/js/infobox.js';
	wp_register_script('infoboxjs',$infoboxjs, false);
	
	$mapjs = get_template_directory_uri() . '/js/map.js';
	wp_register_script('mapjs',$mapjs, false, $version);

	// Define CSS

	$ralewaycss = 'http://fonts.googleapis.com/css?family=Raleway:400,300,200,100';
	wp_register_style('ralewaycss',$ralewaycss, false, $version);

	$ptsanscss = 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow';
	wp_register_style('ptsanscss',$ptsanscss, false, $version);

	$flexslidercss = get_stylesheet_directory_uri() . '/css/flexslider.css';
	wp_register_style('flexslidercss',$flexslidercss, false, $version);

	$normalizecss = get_stylesheet_directory_uri() . '/css/normalize.css';
	wp_register_style('normalizecss',$normalizecss, false, $version);

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);

	// Enqueue

	wp_enqueue_script( 'flexsliderjs',array('jquery'));
	wp_enqueue_script( 'mainjs',array('jquery','flexsliderjs'));

	wp_enqueue_style( 'flexslidercss');


	if( is_page('contact') ):
		wp_enqueue_script( 'googlemapsapi');
		wp_enqueue_script( 'infoboxjs',array('googlemapsapi'));
		wp_enqueue_script( 'mapjs',array('jquery','googlemapsapi','infoboxjs'));
	endif;

	wp_enqueue_style( 'ralewaycss');
	wp_enqueue_style( 'ptsanscss');
	wp_enqueue_style( 'normalizecss');
	wp_enqueue_style( 'themecss');

}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');

?>