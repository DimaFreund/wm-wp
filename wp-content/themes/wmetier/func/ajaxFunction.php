<?php


add_action( 'wp_ajax_my_action', 'my_action_callback' );
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');

function my_action_callback() {
	$whatever =  $_POST['promo'] ;

	$promoObject = get_page_by_title($whatever, OBJECT, 'promo_cod');
	if(isset($promoObject) && !empty($promoObject)) {
		$promoCod = get_field('procent', $promoObject->ID);
	} else {
		$promoCod = '';
	}

	echo $promoCod;

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
}

add_action('wp_ajax_add_upload_form', function() {
	true_image_uploader_field('upload[]');
	wp_die();
});