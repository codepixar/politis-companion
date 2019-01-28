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
class Politis_Gallery extends Widget_Base {

	public function get_name() {
		return 'politis-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'politis-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'politis-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Features Section Heading', 'politis-companion' ),
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

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Gallery', 'politis-companion' ),
			]
		);
		$this->add_control(
            'gallery_slider', [
                'label' => __( 'Create Gallery', 'politis-companion' ),
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
                        'name'  => 'col',
                        'label' => __( 'Column', 'politis-companion' ),
                        'type'  => Controls_Manager::SELECT,
                        'options' => [
                            '12' => 'Column 12',
                            '11' => 'Column 11',
                            '10' => 'Column 10',
                            '9' => 'Column 9',
                            '8' => 'Column 8',
                            '7' => 'Column 7',
                            '6' => 'Column 6',
                            '5' => 'Column 5',
                            '4' => 'Column 4',
                            '3' => 'Column 3',
                            '2' => 'Column 2',
                            '1' => 'Column 1',
                        ]
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'politis-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
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
                'selector' => '{{WRAPPER}} .gallery-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    
    <section class="gallery-area section-gap" id="gallery">
        <div class="container">
            <?php 
            // Section Heading
            politis_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">

                <?php 
                if( is_array( $settings['gallery_slider'] ) && count( $settings['gallery_slider'] ) > 0 ):

                    foreach( $settings['gallery_slider'] as $gallery ):

                    // Member Picture
                    $bgUrl = '';
                    if( ! empty( $gallery['img']['url'] ) ) {
                        $bgUrl = $gallery['img']['url'];
                    }

                    // Column
                    $col = '6';
                    if( ! empty( $gallery['col'] ) ) {
                        $col = $gallery['col'];
                    }

                ?>
                <div class="col-lg-<?php echo esc_attr( $gallery['col'] ); ?> col-md-<?php echo esc_attr( $gallery['col'] ); ?>">
                    <a href="<?php echo esc_url( $bgUrl ); ?>" class="img-gal">
                            <?php
                            echo politis_img_tag(
                                array(
                                    'url'   => esc_url( $bgUrl ),
                                    'class' => 'img-fluid single-gallery'
                                )
                            );
                            ?>
                    </a>    
                </div>
                <?php 
                    endforeach; 
                endif;
                ?>
            </div>
        </div>  
    </section>

    <?php

    }

	
}
