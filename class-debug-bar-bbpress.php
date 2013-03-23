<?php

class bbpPress_Debug_Bar extends Debug_Bar_Panel {

	/* Stores the names of the template parts loaded */
	protected $_templates = array();


	/* Debug Bar API */

	public function init() {
		$this->title( __( 'bbPress', 'bbp-debug-bar' ) );

		add_filter( 'bbp_get_template_part', array( $this, 'log_template_part' ), 1000, 3 );
	}

	public function prerender() {
		$this->set_visible( true );
	}

	public function render() {
		echo '<h2><span>';
		echo  __( 'Templates:', 'bbp-debug-bar' );
		echo '</span></h2>';

		echo '<br/>';

		echo '<ol style="clear: both; list-style: decimal;">';
		foreach ( $this->_templates as $template ) {
			echo sprintf( '<li style="margin-left: 20px;"><p>%s</p></li>', esc_html( $template ) );
		}
		echo '</ol>';
	}

	/* Helper methods */

	public function log_template_part( $templates, $slug, $name ) {
		$this->_templates[] = $templates[0];
		return $templates;
	}


}