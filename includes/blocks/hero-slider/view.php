<?php
function mori_render_hero_slider_block( $block ) {
    $id = 'mori-slider-' . $block['id'];
    $images = get_field('slider_images');
    $bg_color = get_field('slider_bg_color') ?: '#ffffff';
    $text_color = get_field('slider_text_color') ?: '#000000';

    if( $images ): ?>
        <div id="<?php echo esc_attr($id); ?>" class="mori-slider default" style="background-color: <?php echo esc_attr($bg_color); ?>;">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach( $images as $image ): ?>
                        <div class="swiper-slide" style="color: <?php echo esc_attr($text_color); ?>;">
                            <img src="<?php echo esc_url($image['slider_image']['url']); ?>" alt="<?php echo esc_attr($image['slider_image']['alt']); ?>">
                            <div class="slider-content">
                                <h2><?php echo esc_html($image['slider_title']); ?></h2>
                                <p><?php echo esc_html($image['slider_description']); ?></p>
                                <?php if($image['slider_button_text'] && $image['slider_button_url']) : ?>
                                    <a href="<?php echo esc_url($image['slider_button_url']); ?>" class="slider-button">
                                        <?php echo esc_html($image['slider_button_text']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
                new Swiper('#<?php echo esc_attr($id); ?> .swiper-container', {
                    loop: true,
                    autoplay: { delay: 3000},
                    pagination: { el: ".swiper-pagination", clickable: true },
                    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
                });
            });
        </script>
    <?php endif;
}
