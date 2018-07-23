<?php
/**
 * wmetier functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wmetier
 */

if ( ! function_exists( 'wmetier_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wmetier_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wmetier, use a find and replace
		 * to change 'wmetier' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wmetier', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wmetier' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wmetier_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wmetier_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wmetier_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wmetier_content_width', 640 );
}
add_action( 'after_setup_theme', 'wmetier_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wmetier_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wmetier' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wmetier' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wmetier_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wmetier_scripts() {
	wp_enqueue_style( 'wmetier-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wmetier-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wmetier-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wmetier_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}







// create custom plugin settings menu
add_action('admin_menu', 'order_settings_create_menu');

function order_settings_create_menu() {

    //create new top-level menu
    add_menu_page('Цены', 'Цены', 'administrator', 'order_settings', 'my_cool_plugin_settings_page', 'dashicons-admin-generic', 6);

    //call register settings function
    add_action( 'admin_init', 'register_order_settings' );
}


function register_order_settings() {
    //register our settings


    register_setting( 'my-cool-plugin-settings-group', 'option_order_level' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_14d' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_5d' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_48h' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_24h' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_16h' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_8h' );
    register_setting( 'my-cool-plugin-settings-group', 'option_order_5h' );
}



function my_cool_plugin_settings_page() {
    ?>



    <div class="wrap">
        <h1>Расценки:</h1>

        <form method="post" action="options.php">

            <table class="table-order-price" style="width: 600px; text-align: center;">
                <thead style="background: #fc0">
                <tr>
                    <td>Urgency Level</td>
                    <td>High School</td>
                    <td>Undergraduate (YRS 1-2)</td>
                    <td>Undergraduate (YRS 3-4)</td>
                    <td>Masters / IB</td>
                    <td>Doctoral</td>
                </tr>
                </thead>
                <tbody style="background: #ccc; text-align: center;">
                <?php
                $days = json_decode(get_option('all_time_order'));

                foreach($days as $day) {
                    $column = json_decode(get_option($day));
                    ?>
                    <tr>
                        <?php for($count = 0; $count < 6; $count++) { ?>
                            <td><input <?php if($count==0) echo 'readonly'; ?> type="text" value="<?php echo $column[$count]; ?>"></td>
                        <?php } ?>
                    </tr>

                    <input value="<?php echo esc_attr(get_option($day)); ?>" name="<?php echo $day; ?>" type="hidden">
                <?php } ?>
                </tbody>
            </table>

            <script>
                jQuery(document).ready(function(){
                    jQuery('table input').change(function(){
                        var arr = new Array();
                        jQuery(this).parent().parent().children().each(function(){
                            arr.push( jQuery(this).children().val() );
                        });
                        jQuery(this).parent().parent().next('input').val(JSON.stringify(arr));
                        console.log(JSON.stringify(arr));
                    });
                });
            </script>
            <style>
                .table-order-price input{
                    text-align: center;
                }
            </style>




            <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>


            <?php submit_button(); ?>

        </form>
    </div>
<?php }






//connection all file
require_once locate_template( '/func/enqueues.php' );
require_once locate_template( '/func/options-theme.php' );
require_once locate_template( '/func/newOrders.php' );
require_once locate_template( '/func/ListTableShow.php' );



add_action( 'widgets_init', 'register_my_widgets_login' );
function register_my_widgets_login(){
    register_sidebar( array(
        'name'          => "For login",
        'id'            => "for_login",
    ) );
}

add_action( 'widgets_init', 'register_my_widgets_register' );
function register_my_widgets_register(){
    register_sidebar( array(
        'name'          => "For registration",
        'id'            => "for_registr",
    ) );
}



if(!current_user_can( 'manage_options' )){
    add_filter('show_admin_bar', '__return_false');
}






function true_image_uploader_field( $name, $value = '', $w = 115, $h = 90) {
    $default = get_stylesheet_directory_uri() . '/img/no-image.png';
    $title = "";
    if($value != 0) {
        $title = get_post($value);
        $title = $title->post_title;
    }

    if( $value ) {
        $image_attributes = wp_get_attachment_image_src( $value, array($w, $h) );
        $src = $image_attributes[0];
    } else {
        $src = $default;
    }
    echo '
	<div>
		<div>
		    <label id="for-title-name" for="title">'.$title.'</label>
			<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
			<button type="submit" class="upload_image_button button">Загрузить</button>
			<button type="submit" class="remove_image_button button">&times;</button>
		</div>
	</div>
	';
}

function true_include_myuploadscript() {
    // у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
    // wp_enqueue_script('jquery');
    // дальше у нас идут скрипты и стили загрузчика изображений WordPress
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    // само собой - меняем admin.js на название своего файла
    wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/admin.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'true_include_myuploadscript' );

function set_html_content_type() {
    return 'text/html';
}


//add_action( 'init', function(){
//    if(isset($_POST['amount-new-order'])) {
//        $order = new Orders();
//        $order->NewOrder();
//        wp_redirect(get_permalink(92));
//        exit;
//    }
//    if(isset($_POST['amount-send-email-file'])) {
//        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
//        wp_mail($_POST['email-user'],'Задание', '<a href="'.$_POST['puth-file'].'">Результат</a>',array($_POST['puth-file']));
//        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
//
//
//    }
//
//});




add_action('init', 'register_post_types_promo_cod');
function register_post_types_promo_cod(){
	register_post_type('promo_cod', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Промокоды', // основное название для типа записи
			'singular_name'      => 'Промокод', // название для одной записи этого типа
			'add_new'            => 'Добавить промокод', // для добавления новой записи
			'add_new_item'       => 'Добавление промокода', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование промокода', // для редактирования типа записи
			'new_item'           => 'Новий промокод', // текст новой записи
			'view_item'          => 'Смотреть промокод', // для просмотра записи этого типа.
			'search_items'       => 'Искать промокод', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Промокоды', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action( 'wp_ajax_my_action', 'my_action_callback' );
function my_action_callback() {
	$whatever =  $_POST['promo'] ;

	$promoObject = get_page_by_title($whatever, OBJECT, 'promo_cod');
    $promoCod = get_field('procent', $promoObject->ID);
    echo $promoCod;

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
}

function auto_login_new_user( $user_id ) {
	wp_set_current_user($user_id);
	wp_set_auth_cookie($user_id);
	$order = new Orders();
	$order->NewOrder();
	// You can change home_url() to the specific URL,such as
	//wp_redirect( 'http://www.wpcoke.com' );
	wp_redirect( get_permalink(85) );
	exit;
}
add_action( 'user_register', 'auto_login_new_user' );


add_action( 'wp_login', function( $user_email){
    if(isset($_POST['amount-new-order'])) {
	    $user  = get_user_by( 'email', $user_email );
	    if(empty($user)) {
	        $user = get_user_by('login', $user_email);
        }
	    $order = new Orders();
	    $order->NewOrder( $user->ID );
	    wp_redirect( get_permalink( 85 ) );
	    exit;
    }
} );