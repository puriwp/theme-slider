<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Shortcode_Slider extends FW_Shortcode {
	
	public function _init() {
		add_filter( 'fw_slider_add_shortcode_extra_data', array( $this, '_filter_extra_data' ), 9, 2 );
	}
	
	public function _filter_extra_data( $extra_data, $atts ) {
		$extra_data['xclass'] = $atts['xclass'];
		return $extra_data;
	}
	
	protected function _render( $atts, $content = null, $tag = '' ) {
		if ( ! empty( $atts['slider_id'] ) ) {
			$static = ( empty( $atts['static'] ) || $atts['static'] == 'no' ) ? false : true;
			return fw()->extensions->get( 'slider' )->render_slider( $atts['slider_id'],
				array(
					'width'  => empty( $atts['width'] ) ? '' : $atts['width'],
					'height' => empty( $atts['height'] ) ? '' : $atts['height'],
				),
				apply_filters( 'fw_slider_add_shortcode_static', $static, $atts ),
				apply_filters( 'fw_slider_add_shortcode_extra_data', array(), $atts ) );
		}
	}
}