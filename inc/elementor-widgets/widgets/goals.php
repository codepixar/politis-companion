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
class Politis_Goals extends Widget_Base {

	public function get_name() {
		return 'politis-goals';
	}

	public function get_title() {
		return __( 'Goals', 'politis-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'politis-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Goals Section Heading ------------------------------
        $this->start_controls_section(
            'goals_heading',
            [
                'label' => __( 'Goals Section Heading', 'politis-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'politis-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'politis-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content

        // ----------------------------------------  Goals content ------------------------------
        $this->start_controls_section(
            'goals_content',
            [
                'label' => __( 'Goals Us', 'politis-companion' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'politis-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We’ve made a life that will change you', 'politis-companion' )
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Contact', 'politis-companion' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => esc_html__( 'inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'politis-companion' )
            ]
        );

        $this->end_controls_section(); // End about content
        
        // ----------------------------------------  Accordion Content ------------------------------
        $this->start_controls_section(
            'accordion_content',
            [
                'label' => __( 'Accordion Content', 'politis-companion' ),
            ]
        );

        $this->add_control(
            'accordion', [
                'label' => __( 'Create Accordion', 'politis-companion' ),
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
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'politis-companion' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End exibition content

        // ----------------------------------------  Video Content ------------------------------
        $this->start_controls_section(
            'customersreview_videocontent',
            [
                'label' => __( 'Video Content', 'politis-companion' ),
            ]
        );
        $this->add_control(
            'youtubeurl',
            [
                'label' => esc_html__( 'Youtube Video Url', 'politis-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'featured_img',
            [
                'label'         => esc_html__( 'Featured Image', 'politis-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );
        $this->end_controls_section(); // End exibition content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'politis-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Content ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'politis-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_acttitle', [
                'label'     => __( 'Accordion Active Title Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feedback-area .feedback-left .mn-accordion .accordion-item.state-open .accordion-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_titleacor', [
                'label'     => __( 'Accordion Title Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .feedback-area .feedback-left .mn-accordion .accordion-item .accordion-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .feedback-area .feedback-left .mn-accordion .accordion-item .accordion-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_activetitlebg', [
                'label'     => __( 'Accordion Active Title Background Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3898f8',
                'selectors' => [
                    '{{WRAPPER}} .feedback-area .feedback-left .mn-accordion .accordion-item.state-open .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_titlebg', [
                'label'     => __( 'Accordion Title Background Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9f9ff',
                'selectors' => [
                    '{{WRAPPER}} .feedback-area .feedback-left .mn-accordion .accordion-item .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


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
            'sect_video_ooverlay_bgcolor',
            [
                'label'     => __( 'About Video Overlay Color', 'politis-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'videooverlaybg',
                'label' => __( 'Section Overlay', 'politis-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .about-video-right .overlay-bg',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Section Overlay Color', 'politis-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'politis-companion' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'politis-companion' ),
                'label_off' => __( 'Hide', 'politis-companion' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'politis-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .feedback-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
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
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .feedback-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
 
    $videoUrl = $imgUrl = '';
    // Video url
    
    if( ! empty( $settings['youtubeurl'] ) ) {
        $videoUrl = $settings['youtubeurl'];
    }
    // Feature image

    if( ! empty( $settings['featured_img']['url'] ) ) {
        $imgUrl = $settings['featured_img']['url'];
    }

    ?>


    <section class="feedback-area section-gap" id="feedback">
        <div class="container">
            <?php 
            // Section Heading
            politis_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>
            <div class="row feedback-contents justify-content-between align-items-center">
                <?php 
                if( ! empty( $settings['accordion'] ) ):
                ?>
                <div class="col-lg-6 feedback-left">
                    <div class="mn-accordion" id="accordion">
                        <?php 
                        foreach( $settings['accordion'] as $val ):
                        ?>
                        <div class="accordion-item">
                            <div class="accordion-heading">
                                <h3><?php echo esc_html( $val['label'] ); ?></h3>
                                <div class="icon">
                                    <i class="lnr lnr-chevron-right"></i>
                                </div>
                            </div>
                            <div class="accordion-content">
                                <?php
                                echo '<p>'. esc_html( $val['desc'] ) .'</p>';
                                ?>
                            </div>
                        </div>
                        <?php 
                        endforeach;
                        ?>
                    </div>
                </div>  
                <?php 
                endif;

                //
                if( $videoUrl ) :
                ?>
                <div class="col-lg-5 feedback-right relative d-flex justify-content-center align-items-center" style="background-image: url( <?php echo esc_url( $imgUrl ); ?> )">
                    <div class="overlay overlay-bg"></div>
                    <a class="play-btn" href="<?php echo esc_url( $videoUrl ); ?>"><img class="img-fluid" src="<?php echo POLITIS_COMPANION_DIR_URL ?>inc/elementor-widgets/assets/img/play-btn.png" alt=""></a>
                </div>
                <?php 
                endif;
                ?>
            </div>
        </div>  
    </section>

    <?php

    }
	
}
