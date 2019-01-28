<?php
namespace Politiselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Politis elementor section widget.
 *
 * @since 1.0
 */
class Politis_Testimonial extends Widget_Base {

	public function get_name() {
		return 'politis-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'politis-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'politis-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        
		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'politis-companion' ),
			]
		);
		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'politis-companion' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'politis-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'desiganation',
                        'label' => __( 'Desiganation', 'politis-companion' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'politis-companion' ),
                        'type'  => Controls_Manager::WYSIWYG,
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'politis-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'politis-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'politis-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'politis-companion' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
 

    ?>

    <section class="testimonial-area section-gap">
        <?php 
        if( ! empty( $settings['bg_overlay'] ) ) {
            echo '<div class="overlay overlay-bg"></div>';
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="active-testimonial">

                    <?php 
                    
                    if( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                        foreach( $settings['review_slider'] as $review ):

                    ?>
                    <div class="single-testimonial item d-flex flex-row">
                        <?php 
                        if( ! empty( $review['img']['url'] ) ) {
                            echo '<div class="thumb">';
                                echo politis_img_tag(
                                    array(
                                        'url'   => esc_url( $review['img']['url'] ),
                                        'class' => esc_attr( 'img-fluid' )
                                    )
                                );
                            echo '</div>';
                        }
                        ?>
                        <div class="desc">
                            <?php
                            //
                            if( ! empty( $review['desc'] ) ) {
                                echo politis_get_textareahtml_output( $review['desc'] );
                            }
                            //
                            if( ! empty( $review['label'] ) ) {
                                echo politis_heading_tag(
                                    array(
                                        'tag'  => 'h4',
                                        'text' => esc_html( $review['label'] ),
                                    )
                                ); 
                            }
                            //
                            if( ! empty( $review['desiganation'] ) ) {
                                echo politis_paragraph_tag(
                                    array(
                                        'text' => esc_html( $review['desiganation'] )
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>



    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            $('.active-testimonial').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                nav: true,
                navText: ["<span class='lnr lnr-arrow-up'></span>", "<span class='lnr lnr-arrow-down'></span>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
