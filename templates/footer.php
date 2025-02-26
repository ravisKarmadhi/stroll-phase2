<?php
$footer_logo = get_field('footer_logo', 'option');
$demo_booking = get_field('demo_booking', 'option');
$product = get_field('product', 'option');
$resources = get_field('resources', 'option');
$others = get_field('others', 'option');
$solutions = get_field('solutions', 'option');
$email = get_field('email', 'option');
$social_media = get_field('social_media', 'option');
$copyright_text = get_field('copyright_text', 'option');

$foundAlternateBlock = false;
?>

<footer>

    <?php wp_reset_postdata(); ?>

    <?php $currentPage = get_the_id(); ?>



    <?php if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) :
        the_row();  ?>

        <?php if (get_row_layout() == 'alternate_footer') : 
            $foundAlternateBlock = true; ?>

            <div class="container lets-start-container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12 bgoffwhite lets-start-sec radiusX position-relative">
                        <div class="row">

                            <?php if ( have_rows( 'demo_booking' ) ) : ?>
                                <?php while ( have_rows( 'demo_booking' ) ) :
                                    the_row(); ?>

                                    <div class="col-lg-8 pe-lg-5 left-side-content">
                                        <div class="col-lg-10 pe-lg-4 position-relative z-index-one">
                
            
                                            <?php if ( $prefix = get_sub_field( 'prefix' ) ) : ?>
                                                <label class="bglightwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack"><?php echo esc_html( $prefix ); ?></label>
                                            <?php endif; ?>

                                            <?php if ( $heading = get_sub_field( 'heading' ) ) : ?>
                                                <h3 class="acid-bold textlightblack mt-2 pt-1 fontMX resfontXXS me-lg-0 me-5 pe-lg-0 pe-5">
                                                    <?php echo esc_html( $heading ); ?>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if ( $content = get_sub_field( 'content' ) ) : ?>
                                                <h6 class="acid-normal textlightblack mt-lg-4 mt-2 pt-1 fontM leadingS"><?php echo esc_html( $content ); ?></h6>
                                            <?php endif; ?>

                                            <?php
                                            $link = get_sub_field( 'button' );
                                            if ( $link ) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>

                                                <a class="text-white acid-bold d-flex align-items-center mx-lg-0 mx-auto mt-3 justify-content-center fontXX text-decoration-none bgsecondary radiusX btnZ" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php $image = get_sub_field( 'image' );
                                    if ( $image ) : ?>
                                        <div class="col-lg-7 position-absolute p-initial end-0 bottom-0 ps-lg-4 image-bag-res">
                                            <img src="<?php echo esc_url( $image['url'] ); ?>" class="w-100 ps-lg-1" alt="">
                                        </div>
                                    <?php endif; ?>

                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    <?php endwhile; ?>

    <?php endif; ?>

    <?php if(!$foundAlternateBlock) : ?>

        <div class="container lets-start-container" data-aos="fade-up">
                <div class="row">
                    <div class="col-12 bgoffwhite lets-start-sec radiusX position-relative">
                        <div class="row">
                            <div class="col-lg-8 pe-lg-5 left-side-content">
                                <div class="col-lg-10 pe-lg-4 position-relative z-index-one">
                                    <?php if (!empty($demo_booking['prefix'])) : ?>
                                        <label class="bglightwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack"><?php echo $demo_booking['prefix']; ?></label>
                                    <?php endif; ?>
                                    <?php if (!empty($demo_booking['heading'])) : ?>
                                        <h3 class="acid-bold textlightblack mt-2 pt-1 fontMX resfontXXS me-lg-0 me-5 pe-lg-0 pe-5">
                                            <?php echo $demo_booking['heading']; ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($demo_booking['content'])) : ?>
                                        <h6 class="acid-normal textlightblack mt-lg-4 mt-2 pt-1 fontM leadingS"><?php echo $demo_booking['content']; ?></h6>
                                    <?php endif; ?>
                                    <div class="position-relative mail-chip-input dmt-30 tmt-20">
                                        <a href="mailto:hello@strolll.co?subject=Book%20A%20Demo" target="" class="text-white acid-bold d-flex align-items-center mx-lg-0 mx-auto justify-content-center fontXX text-decoration-none bgsecondary radiusX btnZ ">Book a demo</a>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($demo_booking['image']['url'])) : ?>
                                <div class="col-lg-7 position-absolute p-initial end-0 bottom-0 ps-lg-4 image-bag-res">
                                    <img src="<?php echo $demo_booking['image']['url']; ?>" class="w-100 ps-lg-1" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

      <?php endif; ?>      

    <div class="spacing dmt-90 mmt-0"></div>
    <div class="bgprimary dpt-90 dpb-55 mpt-80 mpb-115">
        <div class="container containerX">
            <div class="row dmb-140 tmb-30">
                <div class="col-lg-5 tmb-50">
                    <div class="footer-logo">
                        <a href="<?php echo get_home_url(); ?>" class="text-decoration-none w-100">
                            <img src="<?php echo $footer_logo['url']; ?>" alt="" class="w-100">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-4 col-12 h-fit">
                            <?php if (!empty($product['heading'])) : ?>
                            <div class="dmb-50 tmb-25 footer-menutab">
                                    <span class="acid-bold fontM leadingX textlightwhite opacityX text-capitalize dmb-30 d-inline-block"><?php echo $product['heading']; ?></span>
                                
                                <?php if (!empty($product['items'])) : ?>
                                    <ul class="list-none ps-0 mb-0 footer-menu">
                                        <?php foreach ($product['items'] as $product_custom) : ?>
                                            <li class="dpb-10">
                                                <a href="<?php echo $product_custom['link']['url']; ?>" class="text-decoration-none acid-bold fontM leadingX textlightwhite text-capitalize d-inline-block">
                                                    <?php echo $product_custom['link']['title']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($solutions['heading'])) : ?>
                            <div class="dmb-50 tmb-25 footer-menutab">
                                    <span class="acid-bold fontM leadingX textlightwhite opacityX text-capitalize dmb-30 d-inline-block"><?php echo $solutions['heading']; ?></span>
                                <?php if (!empty($solutions['items'])) : ?>
                                    <ul class="list-none ps-0 mb-0 footer-menu">
                                        <?php foreach ($solutions['items'] as $solutions_custom) : ?>
                                            <li class="dpb-10">
                                                <a href="<?php echo $solutions_custom['link']['url']; ?>" class="text-decoration-none acid-bold fontM leadingX textlightwhite text-capitalize d-inline-block">
                                                    <?php echo $solutions_custom['link']['title']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-12 h-fit">
                        <?php if (!empty($resources['heading'])) : ?>
                            <div class="dmb-50 tmb-25 footer-menutab">
                                    <span class="acid-bold fontM leadingX textlightwhite opacityX text-capitalize dmb-30 d-inline-block"><?php echo $resources['heading']; ?></span>
                                <?php if (!empty($resources['items'])) : ?>
                                    <ul class="list-none ps-0 mb-0 footer-menu">
                                        <?php foreach ($resources['items'] as $resources_custom) : ?>
                                            <li class="dpb-10">
                                                <a href="<?php echo $resources_custom['link']['url']; ?>" class="text-decoration-none acid-bold fontM leadingX textlightwhite text-capitalize d-inline-block">
                                                    <?php echo $resources_custom['link']['title']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-12 h-fit">
                            <?php if (!empty($others['heading'])) : ?>
                            <div class="dmb-50 tmb-25 footer-menutab">
                                    <span class="acid-bold fontM leadingX textlightwhite opacityX text-capitalize dmb-30 d-inline-block"><?php echo $others['heading']; ?></span>
                                <?php if (!empty($others['items'])) : ?>
                                    <ul class="list-none ps-0 mb-0 footer-menu">
                                        <?php foreach ($others['items'] as $others_custom) : ?>
                                            <li class="dpb-10">
                                                <a href="<?php echo $others_custom['link']['url']; ?>" class="text-decoration-none acid-bold fontM leadingX textlightwhite text-capitalize d-inline-block">
                                                    <?php echo $others_custom['link']['title']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($email)) : ?>
                    <div class="col-lg-5 col-12 tmb-45">
                        <a href="mailto:<?php echo $email; ?>" class="text-decoration-none acid-normal fontXM leadingM text-white"><?php echo $email; ?></a>
                    </div>
                <?php endif; ?>
                <div class="col-lg-7 col-12 d-flex flex-lg-row flex-column align-items-center justify-content-lg-between justify-content-start">
                    <?php if (!empty($social_media)) : ?>
                        <div class="social-icons d-flex align-items-center justify-content-start tmb-25">
                            <?php foreach ($social_media as $social_media_custom) : ?>
                                <div class="facebook-icon icons d-flex pe-lg-3 pe-4 me-2">
                                    <a href="<?php echo $social_media_custom['link']['url']; ?>" target="_blank">
                                        <img src="<?php echo $social_media_custom['icon']['url']; ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="copyright-tab d-flex flex-lg-row flex-column align-items-center justify-content-end w-100">
                        <h4 class="acid-bold fontX leadingX textlightwhite text-capitalize me-lg-4 res-w-100 tmb-40">
                            <?php echo $copyright_text; ?>
                        <a class="acid-bold fontX leadingX textlightwhite"  href="https://thecurious.agency/">Website By The Curious</a></h4>
                        <a href="javascript:void(0)" class="d-none text-decoration-none d-block acid-bold fontX leadingX textlightwhite d-flex align-items-center res-w-100">
                            <div class="currency-menu me-1 rounded-circle overflow-hidden">
                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/currency-icon.png" alt="" class="w-100 h-100">
                            </div>
                            View Us Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/main.js"></script> -->