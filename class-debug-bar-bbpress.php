<?php

class bbpPress_Debug_Bar extends Debug_Bar_Panel {

	/* Stores the names of the template parts loaded */
	protected $templates = array();


	/* Debug Bar API */

	public function init() {
		$this->title( __( 'bbPress', 'bbp-debug-bar' ) );

		add_filter( 'bbp_get_template_part', array( $this, 'log_template_part' ), 1000, 3 );
	}

	public function prerender() {
		$vars = array_filter( $this->get_vars() );

		if ( empty( $vars ) && empty( $this->templates ) )
			$this->set_visible( false );
		else
			$this->set_visible( true );
	}

	public function render() {

		$ids = $this->get_vars();
		foreach ( $ids as $title => $value ) {
			if ( ! empty( $value ) )
				echo '<h2>' . sprintf( "<span>%s:</span>%d", $title, $value ) . '</h2>';
		}


		echo '<br/>';

		echo '<h3 style="float: none;clear: both;font-family: georgia,times,serif;font-size: 22px;margin: 15px 10px 15px 0!important;">';
		echo  __( 'Loaded templates:', 'bbp-debug-bar' );
		echo '</h3>';

		echo '<ol style="clear: both; list-style: decimal;">';
		foreach ( $this->templates as $template ) {
			echo sprintf( '<li style="margin-left: 20px;"><p>%s</p></li>', esc_html( $template ) );
		}
		echo '</ol>';

	}

	private function get_vars() {

		if ( ! function_exists( 'bbpress' ) )
			return array();

		return apply_filters( 'bbp-debug-bar-vars', array(
			__( 'Forum ID', 'bbp-debug-bar' ) => bbp_get_forum_id(),
			__( 'Topic ID', 'bbp-debug-bar' ) => bbp_get_topic_id(),
			__( 'Reply ID', 'bbp-debug-bar' ) => bbp_get_reply_id(),
		) );
	}

	/* Helper methods */

	public function log_template_part( $templates, $slug, $name ) {
		$this->templates[] = bbp_locate_template( $templates[0], false );
		return $templates;
	}


}