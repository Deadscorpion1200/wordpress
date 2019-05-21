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
  add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) );
  add_theme_support( 'post-formats', array('video','aside') );
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
  wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js', ['jquery'], null, true);
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

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('portfolio', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу в портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		),
		'description'         => 'Это наши работы в портфолио',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-id-alt', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'author', 'thumbnail', 'excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('skills'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('skills', array('portfolio'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навык',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навыки',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Изменить навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое имя навыка',
			'menu_name'         => 'Навыки',
		),
		'description'           => 'Навыки, которые использовались в работе над проектом', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => true, // равен аргументу public
		'hierarchical'          => false,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
add_action( 'init', 'skills_for_portfolio' );
function skills_for_portfolio(){
	register_taxonomy_for_object_type( 'skills', 'portfolio');
}

function send_main()
{
	$contactName = $_POST['contactName']
	$contactEmail = $_POST['contactEmail']
	$contactSubject = $_POST['contactSubject']
	$contactMessage = $_POST['contactMessage']

	// подразумевается что $to, $subject, $message уже определены...

	// удалим фильтры, которые могут изменять заголовок $headers
	// remove_all_filters( 'wp_mail_from' );
	// remove_all_filters( 'wp_mail_from_name' );
	$to = 'kurp96@ya.ru';
	$headers = array(
		'From: Me Myself <me@example.net>',
		'content-type: text/html',
		'Cc: John Q Codex <jqc@wordpress.org>',
		'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
	);

	wp_mail( $to, $subject, $message, $headers );
}