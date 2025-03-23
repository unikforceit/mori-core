<?php
function mori_render_hero_slider_block( $block ) {
    $id = 'mori-slider-' . $block['id'];
    $images = get_field('slider_images');
    if( $images ): ?>
        <div id="<?php echo esc_attr($id); ?>" class="mori-hero-slider default">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php if ( have_rows( 'slider_images' ) ) :
                        while ( have_rows( 'slider_images' ) ) : the_row();
                        $slider_title = get_sub_field('slider_title');
                        $slider_description = get_sub_field('slider_description');
                        $slider_image = get_sub_field('slider_image');
                        $slider_button_text = get_sub_field('slider_button_text');
                        $slider_button_url = get_sub_field('slider_button_url');
                        $slider_button_text_2 = get_sub_field('slider_button_text_2');
                        $slider_button_url_2 = get_sub_field('slider_button_url_2');
                        ?>
                        <div class="swiper-slide"">
                            <div class="hero-slider-wrapper">
                                <div class="hero-slider-image">
                                    <?php echo wp_get_attachment_image($slider_image['id'], 'full');?>
                                </div>
                                <div class="hero-slider-content">
                                    <h2><?php echo wp_kses_post($slider_title); ?></h2>
                                    <p><?php echo wp_kses_post($slider_description); ?></p>
                                </div>
                                <div class="hero-slider-bottom">
                                    <div class="hero-slider-features">
                                        <?php if ( have_rows( 'features' ) ) :
                                            while ( have_rows( 'features' ) ) : the_row();
                                                $title = get_sub_field('title');
                                                $text = get_sub_field('text');
                                                $icon = get_sub_field('icon');
                                                ?>
                                                <div class="feature-list">
                                                    <div class="feature-icon">
                                                        <i class="fa-solid <?php echo wp_kses_post($icon);?>"></i>
                                                    </div>
                                                    <div class="feature-content">
                                                        <h3><?php echo wp_kses_post($title);?></h3>
                                                        <p><?php echo wp_kses_post($text);?></p>
                                                    </div>
                                                </div>
                                        <?php endwhile; endif; ?>
                                    </div>
                                    <div class="hero-slider-button-set">
                                        <?php if($slider_button_text && $slider_button_url) : ?>
                                            <div class="button-slider-1">
                                                <a href="<?php echo esc_url($slider_button_url); ?>" class="slider-button">
                                                    <?php echo wp_kses_post($slider_button_text); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($slider_button_text_2 && $slider_button_url_2) : ?>
                                            <div class="button-slider-2">
                                                <a href="<?php echo esc_url($slider_button_url_2); ?>" class="slider-button">
                                                    <?php echo wp_kses_post($slider_button_text_2); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
                new Swiper('#<?php echo esc_attr($id); ?> .swiper-container', {
                    direction: 'vertical',
                    loop: true,
                    // autoplay: { delay: 3000},
                    pagination: { el: ".swiper-pagination", clickable: true },
                    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
                });
            });
        </script>
    <?php endif;
}
