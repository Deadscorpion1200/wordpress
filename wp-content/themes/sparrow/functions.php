<?php

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');

function style_theme()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('default', get_template_directory_uri().'/assets/css/default.css');
  wp_enqueue_style('layout', get_template_directory_uri().'/assets/css/layout.css');
  wp_enqueue_style('media-queries', get_template_directory_uri().'/assets/css/media-queries.css');
}
function scripts_theme()
{
  wp_enqueue_script('init', get_template_directory_uri().'/assets/js/init.js');
  wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.js');
  wp_enqueue_script('doubletaptogo', get_template_directory_uri().'/assets/js/doubletaptogo.js');

  wp_deregister_script('jquery');
  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-migrate', get_template_directory_uri().'/assets/js/jquery-migrate-1.2.1.min.js','jquery');
  wp_enqueue_script('flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js','jquery', null, true);
}