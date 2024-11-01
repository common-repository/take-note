<?php 
/*
Plugin Name: Take Note
Plugin URI: https://burak-aydin.com
Description: It's easy to take note with this plugin especially huge contents. It shows up under the editor for posts and pages. 
Author: Burak Aydin
Author URI: https://burak-aydin.com
Version: 1.0
*/




/**
 * Adding meta box to post and page editor
 *
 * @version 1.0
*/

add_action('add_meta_boxes','takenote_box');

function takenote_box(){
	add_meta_box('takenote_editor', 'Take Note', 'takenote_callback', array('post','page'), 'normal', 'high');
}



/**
 * @version 1.0
 * Callback for add_meta_box()
*/

function takenote_callback($post){
	$takenote_meta = get_post_meta( $post->ID );

	wp_editor( $takenote_meta['takenote_name'][0], 'takenote_name' );
}



/**
 * @version 1.0
 * Saving data
*/

add_action( 'save_post', 'takenote_save');

function takenote_save($post_id){
	update_post_meta( $post_id, 'takenote_name', $_POST['takenote_name'] );
}




/**
 * @version 1.0
 * Adding style.css
*/

add_action( 'admin_print_styles', 'takenote_style' );

function takenote_style(){
	wp_enqueue_style( 'takenote-style', plugins_url( 'css/style.css', __FILE__));
}
