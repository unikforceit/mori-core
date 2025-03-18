<?php
function mori_render_image_slider_block( $block ) {
    $id = 'mori-image-slider-' . $block['id'];
    $images = get_field('image_slider');

    if( $images ): ?>
        <div id="<?php echo esc_attr($id); ?>" class="mori-image-slider default">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach( $images as $image ): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['alt']); ?>">
                            <div class="slider-content">
                                <h2><?php echo esc_html($image['slider_text']); ?></h2>
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
