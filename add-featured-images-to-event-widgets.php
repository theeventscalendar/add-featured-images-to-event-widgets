<?php
/**
 * Plugin Name: The Events Calendar — Add Featured Images to Event Widgets
 * Description: Displays an event's featured image (if it has one) in the list and mini calendar widgets. 
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */
 
 defined( 'WPINC' ) or die;

/**
 * Echo the event's featured image below the title and details.
 *
 * @since 1.0.0
 *
 * @return void
 */
function tribe_add_event_featured_image_to_event_widget() {
	echo '<br>';
	echo tribe_event_featured_image( null, 'medium' );
}

add_action( 'tribe_events_list_widget_after_the_meta', 'tribe_add_event_featured_image_to_event_widget' );
