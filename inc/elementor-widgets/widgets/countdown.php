<?php
namespace Politiselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Politis elementor countdown section widget.
 *
 * @since 1.0
 */
class Politis_Countdown extends Widget_Base {

	public function get_name() {
		return 'politis-countdown';
	}

	public function get_title() {
		return __( 'Countdown', 'politis-companion' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'politis-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'countdown_content',
            [
                'label' => __( 'Countdown', 'politis-companion' ),
            ]
        );
        $this->add_control(
            'countdowntitle', [
                'label' => __( 'Title Color', 'politis-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'shortdesc', [
                'label' => __( 'Short Description', 'politis-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'date', [
                'label' => __( 'Date', 'politis-companion' ),
                'type'  => Controls_Manager::DATE_TIME,
            ]
        );
        $this->end_controls_section(); // End content

        //------------------------------ Style countdown ------------------------------
        $this->start_controls_section(
            'style_countdown', [
                'label' => __( 'Style Countdown', 'politis-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_countdowntitle', [
                'label' => __( 'Title Color', 'politis-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .countdown-wrap .countdown-left h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .countdown-wrap .countdown-left p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_number', [
                'label'     => __( 'Countdown Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .count .col' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Countdown Background Color', 'politis-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3898f8',
                'selectors' => [
                    '{{WRAPPER}} .countdown-wrap .countdown-right .right-wrap' => 'background-color: {{VALUE}};',
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
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .countdown-area, {{WRAPPER}} .countdown-wrap',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings = $this->get_settings();

    $this->load_widget_script();
    ?>
    <section class="countdown-area pt-100">
        <div class="container">
            <div class="row align-items-center countdown-wrap no-gutters">
                <div class="col-lg-6 countdown-left">
                    <?php 
                    //
                    if( ! empty( $settings['countdowntitle'] ) ) {
                        echo politis_heading_tag(
                            array(
                                'tag' => 'h1',
                                'text' => esc_html( $settings['countdowntitle'] ),
                            )
                        );
                    }
                    //
                    if( ! empty( $settings['shortdesc'] ) ) {
                        echo politis_paragraph_tag(
                            array(
                                'text' => esc_html( $settings['shortdesc'] ),
                            )
                        );
                    }
                    ?>
                </div>
                <?php 
                if( ! empty( $settings['date'] ) ):
                ?>
                <div class="col-lg-6 countdown-right">
                    <div class="count right-wrap">
                        <div id="count" data-date="<?php echo esc_attr( $settings['date'] ); ?>" class="row no-gutters"></div>
                    </div>
                </div>
                <?php 
                endif;
                ?>
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
            
           //------- Timer Countdown  js --------//  

            if ( document.getElementById("count") ) {

                var countDownDate = new Date( $( '[data-date]' ).data('date') ).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get todays date and time
                    var now = new Date().getTime();

                    // Find the distance between now an the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="count"
                    document.getElementById("count").innerHTML =

                        "<div class='col'><span>" + days + "</span><br> Days " + "</div>" + "<div class='col'><span>" + hours + "</span><br> Hours " + "</div>" + "<div class='col'><span>" + minutes + "</span><br> Minutes " + "</div>" + "<div class='col'><span>" + seconds + "</span><br> Seconds </div>";

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("count").innerHTML = "EXPIRED";
                    }
                }, 1000);

            }

        })(jQuery);
        </script>

        <?php 
        }
    }
 
	
}
