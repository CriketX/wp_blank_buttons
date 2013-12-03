<?php

/*
	plugin name: Blank Buttons
	plugin URI: http://www.criketx.com/blank-buttons/
	description: Inserts share buttons with short-codes with no styling to easily format your own buttons with CSS
	version: 1.0
	Author: Richard Nesbitt
	License: GPL2
*/

//set the global variables
$plugin_url = plugins_url();
$options = array();
$options2 = array();

//add link under settings > Blank Buttons
function wpblank_buttons_menu() {	
	add_options_page(
		'Blank Buttons Plugin',
		'Blank Buttons',
		'manage_options',
		'blank-buttons',
		'wpblank_buttons_options_page'
	);
}
add_action( 'admin_menu', 'wpblank_buttons_menu' );

function wpblank_button_styles() {
	wp_enqueue_style( 'wpblank_button_styles_css', plugins_url('css/wpblank_button_styles.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'wpblank_button_styles' );

function wpblank_buttons_options_page() {
		
	//make sure current user has permission to access this page
	if( !current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}
	
	//fetch the global variables
	global $plugin_url;
	global $options;
	global $options2;
	
	if( isset( $_POST['wpblank_buttons_form_submitted'] )) {
		$hidden_field = $_POST['wpblank_buttons_form_submitted'];
		if( $hidden_field == 'Y' )
		{
		
			//see if the checkboxes are checked and set the values in the options array
			if($_POST['facebook'] == '1') {
				$options['facebook'] = 'checked';
			} else {
				$options['facebook'] = '';
			}
			if($_POST['twitter'] == '1') {
				$options['twitter'] = 'checked';
			} else {
				$options['twitter'] = '';
			}
			if($_POST['linkedin'] == '1') {				
				$options['linkedin'] = 'checked';
			} else {
				$options['linkedin'] = '';
			}
			
			//send the options to the database
			update_option( 'wpblank_buttons', $options );
		}
	}
	
	if( isset( $_POST['wpblank_buttons_form2_submitted'] )) {
		$hidden_field = $_POST['wpblank_buttons_form2_submitted'];
		if( $hidden_field == 'Y' )
		{
			//see if the checkboxes are checked and set the values in the options array
			if($_POST['wp_blank_buttons_fb_css'] != '') {
				$options2['fb_css'] = stripslashes(trim($_POST['wp_blank_buttons_fb_css']));
			} else {
				$options2['fb_css'] = '';
			}
			if($_POST['wp_blank_buttons_tw_css'] != '') {
				$options2['tw_css'] = stripslashes(trim($_POST['wp_blank_buttons_tw_css']));
			} else {
				$options2['tw_css'] = '';
			}
			if($_POST['wp_blank_buttons_li_css'] != '') {				
				$options2['li_css'] = stripslashes(trim($_POST['wp_blank_buttons_li_css']));
			} else {
				$options2['li_css'] = '';
			}
			
			//send the options to the database
			update_option( 'wpblank_buttons_css', $options2 );
		}
	}
	
	//call the option array out of the database
	$options = get_option( 'wpblank_buttons' );
	$options2 = get_option( 'wpblank_buttons_css' );
	
	if( $options != '') {
		//use variables in the page
		$facebook_is_checked = $options['facebook'];
		$twitter_is_checked = $options['twitter'];
		$linkedin_is_checked = $options['linkedin'];
		$fb_css = $options2['fb_css'];
		$tw_css = $options2['tw_css'];
		$li_css = $options2['li_css'];
	}
	
	require( 'inc/options-page-wrapper.php' );
}

function get_excerpt_outside_loop($post_id){
	global $wpdb;
	$query = 'SELECT post_content FROM '. $wpdb->posts .' WHERE ID = '. $post_id .' LIMIT 1';
	$result = $wpdb->get_results($query, ARRAY_A);
	$post_excerpt=$result[0]['post_content'];
	return $post_excerpt;
}

function add_buttons($content) {
	//pull in global variables
	$options = get_option( 'wpblank_buttons' );
	$options2 = get_option( 'wpblank_buttons_css' );
	if( $options != '') {
		//use variables in the page
		$facebook_is_checked = $options['facebook'];
		$twitter_is_checked = $options['twitter'];
		$linkedin_is_checked = $options['linkedin'];
		$fb_css = $options2['fb_css'];
		$tw_css = $options2['tw_css'];
		$li_css = $options2['li_css'];
	}
	
	$blank_title = get_the_title();
	$new_title = str_replace(' ', '%20', $blank_title);
	$buttons_front = '';
	$id = get_the_ID();
	$summary = get_excerpt_outside_loop($id);
	if (strlen($summary)>300) {
		$summary = substr($summary,0,300);
		$pos = strrpos($summary, ' ');
		if ($pos !== false && $pos > 200)
			$str = substr($str,0,$pos);
	}
	$summary = strip_tags($summary);
	$summary = urlencode($summary);
	echo $id.' ';
	echo 'Summary: '.$summary;
	if( !is_page( ) ){
		if($facebook_is_checked == 'checked'){
			$buttons_front .= '<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]='.get_permalink().'&p[images][0]=&p[title]='.$blank_title.'&p[summary]='.$summary.'" target="_blank" class="blankbutton fb" style="'.$fb_css.'" target="blank" />Share on Facebook</a>';
		}
		if($twitter_is_checked == 'checked'){
			$buttons_front .= '<a href="http://twitter.com/home?status=Check%20out%20this%20post:%20'.$new_title.'%0A'.get_permalink().'" class="blankbutton tw" style="'.$tw_css.'" target="blank" />Tweet This</a>';
			
		}
		if($linkedin_is_checked == 'checked'){
			$buttons_front .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink().'&title='.$new_title.'&summary='.$summary.'&source=" class="blankbutton li" style="'.$li_css.'" target="blank" />Share on LinkedIn</a>';
		}
	}		
		$content =  $content . $buttons_front;
	return $content;
}
add_action( 'admin_head', 'wpblank_button_styles' );
add_filter( 'the_content', 'add_buttons');
