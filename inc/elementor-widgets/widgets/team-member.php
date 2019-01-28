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
 * Politis elementor Team Member section widget.
 *
 * @since 1.0
 */
class Politis_Team_Member extends Widget_Base {

	public function get_name() {
		return 'politis-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'politis-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'politis-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'politis-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'politis-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'politis-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'politis-companion' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'politis-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'politis-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'politis-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'politis-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'fburl',
                        'label' => __( 'Facebook Url', 'politis-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'twiturl',
                        'label' => __( 'Twitter Url', 'politis-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'pinturl',
                        'label' => __( 'Pinterest Url', 'politis-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'driburl',
                        'label' => __( 'Dribbble Url', 'politis-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content



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


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'politis-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'politis-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => __( 'Background', 'politis-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .team-area .thumb div',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'politis-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'politis-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-team h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'politis-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'politis-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-team p',
            ]
        );

        //
        $this->add_control(
            'team_iconopt',
            [
                'label' => __( 'Icon Style', 'politis-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_iconopt', [
                'label' => __( 'Icon Color', 'politis-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-area .thumb div i' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_iconhovopt', [
				'label' => __( 'Icon Hover Color', 'politis-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-area .thumb div i:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'typography_iconopt',
            [
                'label' => __( 'Icon Font Size', 'politis-companion' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-area .thumb div i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="team-area section-gap" id="team">
        <div class="container">
            <?php
            // Section Heading
            politis_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row justify-content-center d-flex align-items-center">
                <?php 
                if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                    foreach( $settings['teamslider'] as $team ):
                             

                ?>
                <div class="col-lg-3 col-md-6 single-team">
                    <div class="thumb">
                        <?php 
                        //
                        if( ! empty( $team['img']['url'] ) ) {

                            echo politis_img_tag(
                                array(
                                    'url'   => esc_url( $team['img']['url'] ),
                                    'class' => 'img-fluid'
                                )
                            );

                        }
                        //
                        if( !empty( $team['pinturl']['url'] ) || $team['fburl']['url'] || $team['twiturl']['url'] || $team['driburl']['url']  ):
                        ?>
                        <div class="align-items-center justify-content-center d-flex">
                            <?php 
                            // Facebook Social Icon
                            if( !empty( $team['fburl']['url'] ) ){
                                echo '<a href="'.esc_url( $team['fburl']['url'] ).'"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                            }
                            // Twitter Social Icon
                            if( !empty( $team['twiturl']['url'] ) ){
                                echo '<a href="'.esc_url( $team['twiturl']['url'] ).'"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                            }
                            // Pinterest Social Icon
                            if( !empty( $team['pinturl']['url'] ) ){

                                echo '<a href="'.esc_url( $team['pinturl']['url'] ).'"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
                            }
                            // Dribbble Social Icon
                            if( !empty( $team['driburl']['url'] ) ){
                                echo '<a href="'.esc_url( $team['driburl']['url'] ).'"><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
                            }
                            ?>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="meta-text mt-30 text-center">
                        <?php 
                        // Member Name
                        if( !empty( $team['label'] ) ){
                            echo politis_heading_tag(
                                array(
                                    'tag'  => 'h4',
                                    'text' => esc_html( $team['label'] )
                                )
                            );
                        }
                        // Designation
                        if( !empty( $team['desig'] ) ){
                            echo politis_paragraph_tag(
                                array(
                                    'text' => esc_html( $team['desig'] )
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
    </section>

    <?php

    }
	
}
