<?php

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'myMenu' );
add_action( 'widgets_init', 'register_my_widgets' );
add_filter( 'document_title_separator', 'my_sep');
add_filter('the_content', 'test_content');
add_shortcode('my_short', 'short_function');


function test_content($content)
{
  $content .= "<br>Спасибо за внимание!";
  return $content;
}



function my_sep($sep)
{

  $sep = '|';
  return $sep;
}

function myMenu()
{
  register_nav_menu('top', 'Меню в шапке');
  register_nav_menu('footer', 'Меню в подвале');
  add_theme_support('title-tag');
  add_theme_support( 'post-thumbnails', array( 'post' ) );
  add_image_size('post_thumb', 1300, 500, true);
  add_filter( 'excerpt_more', 'new_excerpt_more' );
  function new_excerpt_more( $more ){
	  global $post;
	  return '<a href="'. get_permalink($post) . '"> Читать дальше...</a>';
  }
  // удаляет H2 из шаблона пагинации
  add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
  function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
      <h2 class="screen-reader-text">%2$s</h2>
      <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
    <nav class="navigation %1$s" role="navigation">
      <div class="nav-links">%3$s</div>
    </nav>    
    ';
  }

  // выводим пагинацию
  the_posts_pagination( array(
    'end_size' => 2,
  ) );
}

function style_theme()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('default', get_template_directory_uri().'/assets/css/default.css');
  wp_enqueue_style('layout', get_template_directory_uri().'/assets/css/layout.css');
  wp_enqueue_style('media-queries', get_template_directory_uri().'/assets/css/media-queries.css');
}
function scripts_theme()
{
  wp_deregister_script('jquery');
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
  wp_enqueue_script('jquery');
  
  wp_enqueue_script('flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', ['jquery'], null, true);
  wp_enqueue_script('doubletaptogo', get_template_directory_uri().'/assets/js/doubletaptogo.js', ['jquery'], null, true);
  wp_enqueue_script('init', get_template_directory_uri().'/assets/js/init.js', ['jquery'], null, true);
  wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.js', null, null, true);
}
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Left sidebar',
		'id'            => "left_sidebar",
    'description'   => 'Описание нашего сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
}
function short_function()
{
  return 'Я шорткод!';
}

add_shortcode( 'posts', 'show_last_posts');

function show_last_posts()
{
  $posts = get_posts( array(
    'numberposts' => 3,
    'order' => 'ASC',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
  ) );
  if($posts)
  {
    $html.='<ul>';
    foreach($posts as $post)
    {
      $html .= sprintf('<li><a href="%s">%s</li>', get_permalink($post), get_the_title($post));
    }
    $html .='</ul>';
  }
  return $html;
}
