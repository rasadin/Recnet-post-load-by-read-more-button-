<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Webalive_Recent_Post_Grid extends Widget_Base {

	public function get_name() {
		return 'webalive-recent-post';
	}

	public function get_title() {
		return esc_html__( 'Recent Post Grid', 'webalive-addons-elementor' );
	}

	public function get_script_depends() {
        return [
            'webalive-public'
        ];
	}
	
	public function get_icon() {
		return 'fa fa-clipboard';
	}

    public function get_categories() {
		return [ 'webalive-for-elementor' ];
	}

	protected function _register_controls() {
	
        /**
         * Content Settings
         */

		$this->start_controls_section(
			'content_section',
			[
				'label' 	=> __( 'Content Settings', 'amplioenergy-core' ),
				'tab' 		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// $this->add_control(
		// 	'per_page',
		// 	[
		// 		'label' 		=> __( 'Initial Post Number ', 'amplioenergy-core' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXT,
		// 		'default' 		=> 2,
		// 	]
		// );

		// $this->add_control(
		// 	'load_post_num',
		// 	[
		// 		'label' 		=> __( 'Loading Post Number ', 'amplioenergy-core' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXT,
		// 		'default' 		=> 2,
		// 	]
		// );

		$this->end_controls_section();
        
		/**
		 * Style Tab
		 */
		$this->style_tab();
    }

	private function style_tab() {}
	protected function render() {
		$webalive = $this->get_settings_for_display();
		$target = $webalive['website_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $webalive['website_link']['nofollow'] ? ' rel="nofollow"' : '';
		$this->add_render_attribute(
			'webalive_recent_post__grid_options',
			[
				'id' => 'webalive-recent-post-'.$this->get_id(),
			]
		);
    ?>
        <!-- Add Markup Starts -->

     <?php do_shortcode('[blog-recent-post-load-sortcode]'); ?>
     
        <!-- Add Markup Ends -->
	<?php
	}
	protected function content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Webalive_Recent_Post_Grid() );
