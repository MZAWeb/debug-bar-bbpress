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
			echo '<h2><span>';
			echo  __( 'General:', 'bbp-debug-bar' );
			echo '</span></h2>';

			echo '<br/>';

			echo '<p style="clear: both;">';


			if ( ! empty( $forum ) )
				echo sprintf( __( "Forum ID: %d", "bbp-debug-bar" ), $forum ) . '</br>';

			if ( ! empty( $topic ) )
				echo sprintf( __( "Topic ID: %d", "bbp-debug-bar" ), $topic ) . '</br>';

			if ( ! empty( $reply ) )
				echo sprintf( __( "Reply ID: %d", "bbp-debug-bar" ), $reply ) . '</br>';

			echo '</p>';

			echo '<br/>';
		}

		echo '<h2><span>';
		echo  __( 'Loaded templates:', 'bbp-debug-bar' );
		echo '</span></h2>';

		echo '<br/>';

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