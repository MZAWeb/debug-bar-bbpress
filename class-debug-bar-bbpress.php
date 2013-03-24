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
		$this->set_visible( true );
	}

	public function render() {

		$forum = bbp_get_forum_id();
		$topic = bbp_get_topic_id();
		$reply = bbp_get_reply_id();
		$test  = (int) ( $forum . $topic . $reply );

		if ( ! empty( $test ) ) {


			if ( ! empty( $forum ) )
				echo '<h2>' . sprintf( __( "<span>Forum ID:</span>%d", "bbp-debug-bar" ), $forum ) . '</h2>';

			if ( ! empty( $topic ) )
				echo '<h2>' . sprintf( __( "<span>Topic ID:</span>%d", "bbp-debug-bar" ), $topic ) . '</h2>';

			if ( ! empty( $reply ) )
				echo '<h2>' . sprintf( __( "<span>Reply ID:</span>%d", "bbp-debug-bar" ), $reply ) . '</h2>';
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

	/* Helper methods */

	public function log_template_part( $templates, $slug, $name ) {
		$this->templates[] = $templates[0];
		return $templates;
	}


}