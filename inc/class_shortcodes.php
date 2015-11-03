<?php

class MS_COL_SHORTCODES {


	#-----------------------------------------------------------------#
	# Init Shortcodes Functions
	#-----------------------------------------------------------------# 

	public function __construct() {

		add_shortcode( 'column', array( $this, 'column_shortcode' ) );
		add_shortcode( 'column-group', array( $this, 'column_group_shortcode' ) );

	}

	#-----------------------------------------------------------------#
	# COLUMNS
	#-----------------------------------------------------------------# 

	public $current_group = 0;
	public $span = array();

	public function column_shortcode( $attr, $content ) {
		$attr = shortcode_atts( array(
			'span' => 6,
		), $attr );

		$attr['span'] = absint( $attr['span'] );
		$this->span[ $this->current_group ] += $attr['span'];

		$content = wpautop( $content );

		// Allow other shortcodes inside the column content.
		if ( false !== strpos( $content, '[' ) )
			$content = do_shortcode( shortcode_unautop( $content ) );

		return sprintf( '<div class="column" data-span="%d">%s</div>', $attr['span'], $content );
	}

	public function column_group_shortcode( $attr, $content ) {
		$this->current_group++;
		$this->span[ $this->current_group ] = 0;

		// Content and count columns.
		$content = do_shortcode( $content );
		$count = $this->span[ $this->current_group ];

		return sprintf( '<div class="row clearfix" data-columns="%d">%s</div>', $count, $content );
	}


}