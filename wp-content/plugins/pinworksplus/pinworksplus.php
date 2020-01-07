<?php
/*
* Plugin Name: PinWorks+ Wordpress Pinterest Gallery
* Description: Display Pinterest boards and user's feed directly to Wordpress via the Pinterest API with or without a gallery for large images. Use the plugin's Shortcode Generator to create shortcodes according to your special customization needs.
* Version: 1.01
* Author: Artorius Design
* Author URI: http://codecanyon.net/user/artorius/
*/






global $baguetteBox;
function artorius_pinterestapi_function($atts) {

   extract(shortcode_atts(array(
   'type' => 'user',
   'user' => '0',
   'board' => 'none',
	  'header' => 'yes',
	  'width' => 'responsive',
	  'height' => 'auto',
	  'pinwidth' => 237,
	  'limit' => 50,
	  'pinbutton' => 'yes',
	  'sourcelink' => 'yes',
	  'descrlength' => -1,
	  'gallery' => 'no',
	  'captions' => 'no',
	  'transition' => 'slideIn',
   ), $atts));
if ( $gallery == 'yes' ) {
		wp_enqueue_style( 'baguetteBox', plugins_url( '/assets/baguetteBox.css', __FILE__ ));
		wp_enqueue_script('baguetteBox', plugins_url( '/assets/baguetteBox.js', __FILE__ ));
	};

   $return_string = '<div data-pin data-pin-type='.$type.' data-pin-user='.$user.' data-pin-board='.$board.' data-pin-header='.$header.' data-pin-width='.$width.' data-pin-height='.$height.' data-pin-pinwidth='.$pinwidth.' data-pin-limit='.$limit.'   data-pin-pinbutton='.$pinbutton.' data-pin-sourcelink='.$sourcelink.' data-pin-descrlength='.$descrlength.' data-pin-gallery='.$gallery.' data-pin-gallery-captions='.$captions.' data-pin-gallery-animation='.$transition.'></div>';
   return $return_string;
}





function register_shortcodes(){
   add_shortcode('pinworks+', 'artorius_pinterestapi_function');
}

function scripts(){
	wp_enqueue_script('jquery');	
wp_enqueue_style( 'pinterest-api-css', plugins_url( '/assets/pinworksplus.css', __FILE__ ));
wp_enqueue_script('pinterest-api-widget',plugins_url( '/assets/pinworksplus.js', __FILE__ ));
}










//add Pinterest api button from JS
function add_pinapiplugin( $plugin_array ) {
	$plugin_array['arPinterestApi'] = plugins_url( '/assets/pinterestmce.js', __FILE__ );
   return $plugin_array;
}
//register Pin api button
function register_pinapibutton( $buttons ) {
   array_push( $buttons, "|", "arPinterestApi" );
   return $buttons;
}









function pinapibutton() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_pinapiplugin' );
      add_filter( 'mce_buttons', 'register_pinapibutton' );
   }

}







add_action( 'init', 'register_shortcodes');
add_action( 'wp_enqueue_scripts', 'scripts' ); 
add_action('init', 'pinapibutton');

?>