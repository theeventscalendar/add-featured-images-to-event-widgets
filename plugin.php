<?php
/**
 * Plugin Name: The Events Calendar Extension: Add Featured Images to Event Widgets
 * Description: Displays an event's featured image (if it has one) in the list and mini calendar widgets. 
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */
 
defined( 'WPINC' ) or die;

class Tribe__Extension__Add_Featured_Images_to_Event_Widgets {

	/**
	 * The semantic version number of this extension; should always match the plugin header.
	 */
	const VERSION = '1.0.0';

	/**
	 * Each plugin required by this extension
	 *
	 * @var array Plugins are listed in 'main class' => 'minimum version #' format
	 */
	public $plugins_required = array(
		'Tribe__Events__Main' => '4.2',
	);

	/**
	 * The constructor; delays initializing the extension until all other plugins are loaded.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
	}

	/**
	 * Extension hooks and initialization; exits if the extension is not authorized by Tribe Common to run.
	 */
	public function init() {

		// Exit early if our framework is saying this extension should not run.
		if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
			return;
		}

		add_action( 'tribe_events_list_widget_after_the_meta', array( $this, 'tribe_add_event_featured_image_to_event_widget' ) );
	}

	/**
	 * Echo the event's featured image below the title and details.
	 *
	 * @return void
	 */
	public function tribe_add_event_featured_image_to_event_widget() {
		echo '<br>';
		echo tribe_event_featured_image( null, 'medium' );
	}
}

new Tribe__Extension__Add_Featured_Images_to_Event_Widgets();
