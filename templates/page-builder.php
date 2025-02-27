<?php
/*
 * Template Name: Page Builder
 */
$flexible_content = get_field('flexible_content');
?>
<?php if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) :
        the_row();
        if (get_row_layout() == 'hero_section') :
            $hero_section_heading = get_sub_field('heading');
            $hero_section_button = get_sub_field('button');
            $hero_section_image = get_sub_field('image');
?>
            <!-- hero section -->
            <section class="position-relative hero-sections-main">
                <div class=" bgprimary radius-bottom-right res-border-0 overflow-hidden">
                    <div class="dpt-165 tpt-170"></div>
                    <div class="position-relative bgprimary">
                        <div class="position-absolute   wave-genrate">
                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/wave.svg" class="d-lg-block d-none" alt="">
                        </div>
                        <div class="container" data-aos="fade-right" data-aos-duration="1500">
                            <div class="row">
                                <div class="col-lg-7 dpb-300 tpb-45">
                                    <div class="dpb-160 position-relative">
                                        <?php if (!empty($hero_section_heading)) : ?>
                                            <h3 class="text-white fontLS acid-bold leadingMX resfontLM resleadingMS pe-lg-0 pe-5">
                                                <?php echo $hero_section_heading; ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if (!empty($hero_section_button['url'])) :
                                            $target = ($hero_section_button['target'] == '_blank') ? "_blank" : "";
                                        ?>
                                            <a href="<?php echo $hero_section_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-flex align-items-center justify-content-center fontXX text-decoration-none bgsecondary radiusX dmt-30 tmt-25 btnY "><?php echo $hero_section_button['title']; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($hero_section_image['url'])) : ?>
                    <div class="position-absolute single-image-main bottom-0 start-0 w-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 position-relative">
                                    <div class="hero-main-img radiusS overflow-hidden resradiusES top-left-center w-100 position-absolute">
                                        <img src="<?php echo $hero_section_image['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
            <?php elseif (get_row_layout() == 'logo') :
            $logo_heading = get_sub_field('heading');
            $logo_items = get_sub_field('items');
            $logo_white_color = get_sub_field('white_color');
            if (!empty($logo_items)) :
                $clssname = ($logo_white_color == 'yes') ? "" : "white-invert"
            ?>
                <!-- logo slider -->
                <section class="<?php echo $clssname; ?> logo-section" data-aos="fade-up" data-aos-duration="1500">
                    <?php if (!empty($logo_heading)) : ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="acid-bold resfontXL resleadingMM text-center textlightblack lh-1 fontSS"><?php echo $logo_heading; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="dpb-65"></div>
                    <?php endif; ?>
                    <div class="container px-p-0">
                        <div class="row">
                            <div class="col-lg-9 col-12 mx-auto">

                                <div class="swiper companyLogoSwiper">
                                    <div class="swiper-wrapper h-100">
                                        <?php foreach ($logo_items as $logo_items_custom) : ?>
                                            <div class="swiper-slide h-100">
                                                <img src="<?php echo $logo_items_custom['image']['url']; ?>" class="h-100" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            <?php endif; ?>
            <?php elseif (get_row_layout() == 'solution_list') :
            $solution_list_items = get_sub_field('items');
            if (!empty($solution_list_items)) :
            ?>
                <!-- category slider -->
                <section class="overflow-hidden" data-aos="fade-up">
                    <div class="container pe-p-0">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="swiper categorySwiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($solution_list_items as $solution_list_items_custom) :
                                            $id = $solution_list_items_custom->ID;
                                            $ntitle = $solution_list_items_custom->post_title;
                                            $content = $solution_list_items_custom->post_excerpt;
                                            $post_media = get_field('post_media', $id);
                                            $media_type = $post_media['media_type'];
                                            $video = $post_media['video'];
                                            $viemo = $post_media['viemo'];
                                            $youtube = $post_media['youtube'];
                                        ?>
                                            <div class="swiper-slide">
                                                <a href="<?php echo get_permalink($id); ?>" class="d-block text-decoration-none card-hover-new">
                                                    <div class="position-relative category-card overflow-hidden radiusX resradiusES">
                                                        <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover hover-img category-img " alt="">
                                                        <div class="hover-media h-100 w-100 ">
                                                            <?php if ($media_type == 'video'): ?>
                                                                <?php if (!empty($video)): ?>
                                                                    <video playsinline="playsinline" autoplay="autoplay" muted="muted"
                                                                        class="w-100 h-100 object-cover">
                                                                        <source src="<?= $video ?>" type="video/mp4">
                                                                        </source>
                                                                    </video>
                                                                <?php endif; ?>
                                                            <?php elseif ($media_type == 'viemo') : ?>
                                                                <?php if (!empty($viemo)): ?>
                                                                    <iframe class="w-100 h-100 object-cover embed-video"
                                                                        src="<?= $viemo; ?>?autoplay=1&mute=1&controls=0&fs=0&" allow="autoplay"
                                                                        allowfullscreen>
                                                                    </iframe>
                                                                <?php endif; ?>
                                                            <?php elseif ($media_type == 'youtube') : ?>
                                                                <?php if (!empty($youtube)): ?>
                                                                    <iframe class="w-100 h-100 object-cover embed-video"
                                                                        src="<?= $youtube; ?>?autoplay=1&mute=1&loop=1&background=1&controls=0&rel=0&playisline=<?= basename($youtube) ?>"
                                                                        allow="autoplay; fullscreen">
                                                                    </iframe>

                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover" alt="">
                                                            <?php endif; ?>
                                                        </div>

                                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/cate-layer.svg" alt="" class="position-absolute bottom-0 start-0 w-100">
                                                        <div class="position-absolute bottom-0 start-0 w-100 d-flex justify-content-between align-items-end card-inner-content">
                                                            <div>
                                                                <h4 class="acid-bold textlightwhite lh-1 fontXM resfontLL">
                                                                    <?php echo $ntitle; ?></h4>
                                                                <h5 class="acid-normal textlightwhite lh-1  fontL dmt-5 resfontXXX">
                                                                    <?php echo $content; ?>
                                                                </h5>
                                                            </div>
                                                            <button class="bg-transparent p-0 border-0 transition">
                                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/arrow.svg" alt="">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'how_its_works') :
            $how_its_works_prefix = get_sub_field('prefix');
            $how_its_works_heading = get_sub_field('heading');
            $how_its_works_content = get_sub_field('content');
            $how_its_works_button = get_sub_field('button');
            $how_its_works_image = get_sub_field('image');
        ?>
            <section class="how-work-section" data-aos="fade-up">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-lg-6 hero-content pe-lg-5 d-lg-flex flex-lg-column  justify-content-lg-center">
                            <div class="pe-lg-5 me-lg-1">
                                <?php if (!empty($how_its_works_prefix)) : ?>
                                    <label class="bgoffwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack width-fit-content "><?php echo $how_its_works_prefix; ?></label>
                                <?php endif; ?>
                                <?php if (!empty($how_its_works_heading)) : ?>
                                    <h4 class="textlightblack acid-bold fontLX leadingSL pt-lg-2 mt-lg-1 pt-3 resleadingMS resfontXXS">
                                        <?php echo $how_its_works_heading; ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($how_its_works_content)) : ?>
                                    <h5 class="dmt-20 textlightblack acid-normal fontXX leadingXX pe-lg-5 resfontL resleadingM me-lg-2">
                                        <?php echo $how_its_works_content; ?> </h5>
                                <?php endif; ?>
                                <?php if (!empty($how_its_works_button['url'])) :
                                    $target = ($how_its_works_button['target'] == '_blank') ? "_blank" : "";
                                ?>
                                    <a href="<?php echo $how_its_works_button['url']; ?>" target="<?php echo $target; ?>" class="text-decoration-none filter-inver transition dmt-20 d-block">
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/light-arrow.svg" class="" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($how_its_works_image['url'])) : ?>
                            <div class="col-lg-7 position-absolute top-center end-0 image-content p-initial tmt-50">
                                <?php if (! get_sub_field('hide_background_shape')) : ?>
                                    <div class="shape-bg-image bg-white position-absolute left-center h-100"></div>
                                <?php endif; ?>
                                <img src="<?php echo $how_its_works_image['url']; ?>" class="top-left-center position-absolute w-100 <?php if (get_sub_field('hide_background_shape')) : ?>radiusES<?php endif; ?>" alt="" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php elseif (get_row_layout() == 'who_weve_helped') :

            $who_weve_helped_heading = get_sub_field('heading');
            $who_weve_helped_button = get_sub_field('button');
            $who_weve_helped_items = get_sub_field('items');
            if (!empty($who_weve_helped_items)) :
            ?>
                <section class="dmt-50 tmt-5 overflow-hidden" data-aos="fade-up">
                    <div class="container pe-p-0">
                        <div class="row">
                            <div class="col-lg-12 d-lg-flex align-items-center lh-1">
                                <?php if (!empty($who_weve_helped_heading)) : ?>
                                    <h3 class="acid-bold textlightblack fontMM me-lg-3 resfontXXS"><?php echo $who_weve_helped_heading; ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($who_weve_helped_button['url'])) :
                                    $target = ($who_weve_helped_button['target'] == '_blank') ? "_blank" : "";
                                ?>
                                    <a href="<?php echo $who_weve_helped_button['url']; ?>" target="<?php echo $target; ?>" class="text-decoration-none filter-inver transition tmt-10 d-block">
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/light-arrow.svg" class="" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 dmt-50">
                                <div class="swiper videoSwiper">
                                    <div class="swiper-wrapper">
                                        <?php

                                        $args = array(
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                            'posts_per_page' => -1,
                                            'post_type' => 'casestudies'
                                        );

                                        $the_query = new WP_Query($args);

                                        if ($the_query->have_posts()) :
                                            while ($the_query->have_posts()) : $the_query->the_post();
                                        ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo get_permalink($id); ?>" class="d-block video-card-main text-decoration-none card-hover-new">
                                                        <div class="position-relative video-card overflow-hidden radiusX resradiusES">
                                                            <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover hover-img " alt="">
                                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/cate-layer.svg" alt="" class="position-absolute bottom-0 start-0 w-100">
                                                            <div class="position-absolute bottom-0 start-0 w-100 d-flex align-items-center p-3 card-inner-content">


                                                                <button data-fancybox data-src="<?php the_field('individual_video_link'); ?>" class="bg-transparent p-0 border-0 transition">
                                                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/play.svg" alt="">
                                                                </button>
                                                                <h5 class="ms-3 acid-bold fontL textlightwhite lh-1"><?php echo get_field('time'); ?></h5>
                                                            </div>
                                                        </div>
                                                        <h4 class="acid-bold textlightblack dmt-25 me-5 pe-5 leadingXX resfontXS fontXM">
                                                            <?php the_title(); ?>
                                                        </h4>
                                                    </a>
                                                </div>
                                        <?php endwhile;
                                        endif;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php foreach ($who_weve_helped_items as $who_weve_helped_items_custom) :
                    $id = $who_weve_helped_items_custom->ID;
                    $video = get_field('video_file', $id);
                ?>
                    <!-- play Video Modal -->
                    <div class="modal exampleModalVideo fade" id="exampleModalVideo<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false" aria-labelledby="staticBackdropLabel" data-bs-backdrop="static" ata-bs-keyboard="false">
                        <div class="modal-dialog video-modal modal-dialog-centered bg-transparent">
                            <div class="modal-content border-0 bg-transparent">
                                <div class="modal-body p-0 bg-transparent">
                                    <button class="bg-transparent close-btn position-absolute border-0 end-0 mt-n5" data-bs-dismiss="modal" aria-label="Close" id="close-btn-video">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.916" height="13.916" viewBox="0 0 13.916 13.916">
                                            <g id="Group_138" data-name="Group 138" transform="translate(0 0)">
                                                <rect id="Rectangle_132" data-name="Rectangle 132" width="17.806" height="1.874" transform="translate(0 12.59) rotate(-45)" fill="#fff" />
                                                <rect id="Rectangle_133" data-name="Rectangle 133" width="17.805" height="1.874" transform="translate(12.59 13.916) rotate(-135)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </button>
                                    <?php echo $video; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php elseif (get_row_layout() == 'left__right_side_image_content') :
            $left__right_side_image_content_left__right_image = get_sub_field('left__right_image');
            $left__right_side_image_content_prefix = get_sub_field('prefix');
            $left__right_side_image_content_heading = get_sub_field('heading');
            $left__right_side_image_content_content = get_sub_field('content');
            $left__right_side_image_content_button = get_sub_field('button');
            $left__right_side_image_content_image = get_sub_field('image');
            if ($left__right_side_image_content_left__right_image == 'right') :
            ?>
                <!-- hero section -->
                <section class="hero-section-solutions bgprimary 1">
                    <div class="dpt-175 tpt-135"></div>
                    <div class="container" data-aos="fade-right" data-aos-duration="1500">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <?php if (!empty($left__right_side_image_content_prefix)) : ?>
                                    <label class="acid-normal fontX text-white lh-1 px-3 py-2 light-label-bg radiusEX lh-1"><?php echo $left__right_side_image_content_prefix; ?></label>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_heading)) : ?>
                                    <h3 class="dmt-20 tmt-15 text-white acid-bold  fontMM leadingSS resfontXXS resleadingMS"><?php echo $left__right_side_image_content_heading; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_content)) : ?>
                                    <h5 class="text-white resfontL tmt-20 resleadingM acid-normal fontXX leadingXX dmt-30 pe-lg-5">
                                        <?php echo $left__right_side_image_content_content; ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_button['url'])) :
                                    $target = ($left__right_side_image_content_button['target'] == '_blank') ? "_blank" : "";
                                ?>
                                    <a href="<?php echo $left__right_side_image_content_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnY "><?php echo $left__right_side_image_content_button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($left__right_side_image_content_image['url'])) : ?>
                                <div class="col-lg-6 ms-auto tmt-35">
                                    <div class="solutions-hero-img overflow-hidden radiusX ms-lg-5">
                                        <img src="<?php echo $left__right_side_image_content_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </section>
            <?php else : ?>
                <!-- hero section -->
                <section class="hero-section-solutions bgprimary ">
                    <div class="dpt-160 tpt-75"></div>
                    <div class="container" data-aos="fade-up" data-aos-duration="1500">
                        <div class="row align-items-center">
                            <?php if (!empty($left__right_side_image_content_image['url'])) : ?>
                                <div class="col-lg-6 me-auto tmt-35 order-lg-1 order-2">
                                    <div class="solutions-hero-img overflow-hidden radiusX me-lg-5">
                                        <img src="<?php echo $left__right_side_image_content_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-6 order-lg-2 order-1 px-xxl-5">
                                <?php if (!empty($left__right_side_image_content_prefix)) : ?>
                                    <label class="acid-normal fontX text-white lh-1 px-3 py-2 light-label-bg radiusEX lh-1"><?php echo $left__right_side_image_content_prefix; ?></label>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_heading)) : ?>
                                    <h3 class="dmt-20 tmt-15 text-white acid-bold  fontMM leadingSS resfontXXS resleadingMS"><?php echo $left__right_side_image_content_heading; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_content)) : ?>
                                    <h5 class="text-white resfontL tmt-20 resleadingM acid-normal fontXX leadingXX dmt-30 pe-lg-5 me-lg-3">
                                        <?php echo $left__right_side_image_content_content; ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($left__right_side_image_content_button['url'])) :
                                    $target = ($left__right_side_image_content_button['target'] == '_blank') ? "_blank" : "";
                                ?>
                                    <a href="<?php echo $left__right_side_image_content_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnY "><?php echo $left__right_side_image_content_button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php elseif (get_row_layout() == 'without_background_left__right_side_image_content') :
            $without_background_left__right_side_image_content_left__right_image = get_sub_field('left__right_image');
            $without_background_left__right_side_image_content_prefix = get_sub_field('prefix');
            $without_background_left__right_side_image_content_heading = get_sub_field('heading');
            $without_background_left__right_side_image_content_content = get_sub_field('content');
            $without_background_left__right_side_image_content_button = get_sub_field('button');
            $without_background_left__right_side_image_content_image = get_sub_field('image');
            if ($without_background_left__right_side_image_content_left__right_image == 'left') :
            ?>
                <!-- banner section -->
                <section class="banner-section-two">
                    <div class="container" data-aos="fade-up">
                        <div class="row align-items-center">
                            <?php if (!empty($without_background_left__right_side_image_content_image['url'])) : ?>
                                <div class="col-lg-6">
                                    <div class="banner-img-digital overflow-hidden radiusX">
                                        <img src="<?php echo $without_background_left__right_side_image_content_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-5 ms-auto tmt-40">
                                <?php if (!empty($without_background_left__right_side_image_content_heading)) : ?>
                                    <h4 class="textlightblack acid-bold fontMM leadingSS resfontXXS resleadingMS pe-lg-0 pe-4 me-lg-0 me-1">
                                        <?php echo $without_background_left__right_side_image_content_heading; ?></h4>
                                <?php endif; ?>
                                <div class="pe-lg-5 pe-4 me-lg-0 me-3">
                                    <?php if (!empty($without_background_left__right_side_image_content_content)) : ?>
                                        <h6 class="textlightblack resleadingM resfontL dmt-30 acid-normal fontXX leadingXX">
                                            <?php echo $without_background_left__right_side_image_content_content; ?>
                                        </h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else : ?>
            <?php endif; ?>
            <?php elseif (get_row_layout() == 'three_icon_section') :
            $three_icon_section_items = get_sub_field('items');
            if (!empty($three_icon_section_items)) :
            ?>
                <!-- why choose us section -->
                <section class="bgprimary">
                    <div class="bgprimary radius-bottom-right dpt-180 tpt-55 dpb-150 tpb-60">
                        <div class="container pe-p-0" data-aos="fade-up">
                            <div class="row">
                                <div class="col-12">
                                    <div class="swiper whyChooseSwiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($three_icon_section_items as $three_icon_section_items_custom) : ?>
                                                <div class="swiper-slide why-choose-card">
                                                    <div class="icon-bg radiusEX overflow-hidden d-flex align-items-center justify-content-center">
                                                        <img src="<?php echo $three_icon_section_items_custom['icon']['url']; ?>" alt="">
                                                    </div>
                                                    <h4 class="text-white acid-bold lh-1 fontXL dmt-20"><?php echo $three_icon_section_items_custom['heading']; ?></h4>
                                                    <p class="text-white acid-normal leadingM fontL dmt-20"><?php echo $three_icon_section_items_custom['content']; ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'review') :
            $review_heading = get_sub_field('heading');
            $review_button = get_sub_field('button');
            $review_items = get_sub_field('items');
        ?>
            <!-- case studies section -->
            <section class="<?php if (! get_sub_field('disable_background_colour')) : ?>bglightblack<?php else: ?><?php endif; ?> radius-bottom-right testimonial position-relative overflow-hidden">
                <div class="container px-p-0" data-aos="fade-up">
                    <div class="col-lg-7 mx-auto dpt-105 tpt-65 col-11 px-p-p">
                        <?php if (!empty($review_heading)) : ?>
                            <h3 class="text-white acid-bold fontMM leadingSS text-center resfontXL resleadingMM"><?php echo $review_heading; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($review_button['url'])) :
                            $target = ($review_button['target'] == '_blank') ? "_blank" : "";
                        ?>
                            <a href="<?php echo $review_button['url']; ?>" target="<?php echo $target; ?>" class="text-white mx-auto acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 tmt-40 btnS"><?php echo $review_button['title']; ?></a>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($review_items)) : ?>
                        <div class="col-11 mx-auto px-5 ps-p-p">
                            <div class="testimonials dpt-125 tpt-40 dpb-145 tpb-100">
                                <?php foreach ($review_items as $review_items_custom) :
                                    $id = $review_items_custom->ID;
                                    $rating = get_field('rating', $id);
                                    $role_and_name = get_field('role_and_name', $id);
                                ?>
                                    <div class="testimonal-cards w-100 dmb-15">
                                        <div class="testimonal-card bg-white radiusXS">
                                            <div class="rating-icon d-flex align-items-center dmb-20">
                                                <?php
                                                for ($i = 0; $i < $rating; $i++) : ?>
                                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/star.svg" alt="" class="h-100 me-2">
                                                <?php endfor; ?>
                                            </div>
                                            <h3 class="acid-bold textlightblack fontXX leadingS"><?php echo $review_items_custom->post_title; ?></h3>
                                            <h6 class="acid-normal textlightblack fontM leadingX dmt-15"><?php echo $review_items_custom->post_content; ?></h6>
                                            <h5 class="textlightblack acid-bold lh-1 fontM dmt-30"><?php echo $role_and_name; ?>
                                            </h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bg-testimonial-layer position-absolute w-100 bottom-0 start-0"></div>
            </section>
        <?php elseif (get_row_layout() == 'middle_content') :
            $middle_content_heading = get_sub_field('heading');
            $middle_content_content = get_sub_field('content');
            $middle_content_button = get_sub_field('button');
        ?>
            <section>
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <?php if (!empty($middle_content_heading)) : ?>
                                <h4 class="textlightblack acid-bold resfontXXS resleadingMS px-lg-0 px-3 text-center fontMM leadingSS">
                                    <?php echo $middle_content_heading; ?></h4>
                            <?php endif; ?>
                            <div class="px-3 text-center">
                                <?php if (!empty($middle_content_content)) : ?>
                                    <h6 class="textlightblack dmt-30 acid-normal fontXX resleadingM resfontL leadingXX">
                                        <?php echo $middle_content_content; ?>
                                    </h6>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($middle_content_button['url'])) :
                                $target = ($middle_content_button['target'] == '_blank') ? "_blank" : "";
                            ?>
                                <a href="<?php echo $middle_content_button['url']; ?>" target="<?php echo $target; ?>" class="text-white mx-auto acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnS"><?php echo $middle_content_button['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php elseif (get_row_layout() == 'faq') :
            $faq_heading = get_sub_field('heading');
            $faq_items = get_sub_field('items');
            if (!empty($faq_items)) :
            ?>
                <section>
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <?php if (!empty($faq_heading)) : ?>
                                <div class="col-lg-2">
                                    <h3 class="textlightblack acid-bold lh-1 resfontXXS fontMM"><?php echo $faq_heading; ?></h3>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-10 ps-lg-2 tmt-25">
                                <div class="accordion custom-accordion" id="accordionExample">
                                    <?php foreach ($faq_items as $key => $faq_items_custom) :
                                        $clssname = ($key == '0') ? "show" : "";
                                        $clssname_value = ($key == '0') ? "true" : "false";
                                    ?>
                                        <div class="bg-white border-0 mb-3 radiusES overflow-hidden">
                                            <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                                                <button class="accordion-button resfontXXM shadow-none radiusES bg-white acid-bold textlightblack fontXL" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="<?php echo $clssname_value; ?>" aria-controls="collapse<?php echo $key; ?>">
                                                    <?php echo $faq_items_custom->post_title; ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse <?php echo $clssname; ?>" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body col-10">
                                                    <h6 class="acid-normal textlightblack fontL leadingL mb-3">
                                                        <?php echo wpautop($faq_items_custom->post_content); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php elseif (get_row_layout() == 'two_box_section') :
            $two_box_section_items = get_sub_field('items');
            if (!empty($two_box_section_items)) :
            ?>
                <section class="">
                    <div class="container">
                        <div class="row rowY">
                            <?php foreach ($two_box_section_items as $two_box_section_items_custom) : ?>
                                <div class="col-lg-6 tmb-20" data-aos="fade-in">
                                    <?php $target = ($two_box_section_items_custom['target'] == '_blank') ? "_blank" : ""; ?>
                                    <a href="<?php echo $two_box_section_items_custom['button']['url']; ?>" target="<?php echo $target; ?>" class="text-decoration-none d-block card-hover-new">
                                        <div class="next-solution-img overflow-hidden radiusX position-relative bg-white">
                                            <img src="<?php echo $two_box_section_items_custom['image']['url']; ?>" class="hover-img  w-100 h-100 object-cover" alt="">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/card-layer.svg" alt="" class="position-absolute bottom-0 start-0 w-100">
                                            <div class="position-absolute bottom-0 start-0 w-100 next-solution-content">
                                                <h4 class="text-white acid-bold lh-1 fontSS"><?php echo $two_box_section_items_custom['heading']; ?></h4>
                                                <button class="bg-transparent p-0 border-0 mt-3">
                                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/secondary-arrow.svg" alt="">
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'how_it_works_hero_section') :
            $how_it_works_hero_section_heading = get_sub_field('heading');
            $how_it_works_hero_section_content = get_sub_field('content');
            $how_it_works_hero_section_items = get_sub_field('items');
            $how_it_works_hero_section_image = get_sub_field('image');
            $how_it_works_hero_section_button = get_sub_field('button');
            $how_it_works_hero_section_video_image = get_sub_field('video_image');
            $how_it_works_hero_section_video_url = get_sub_field('video_url');
        ?>
            <section class="position-relative hero-sections-product">
                <div class="how-work-section position-relative bgprimary radius-bottom-right overflow-hidden">
                    <div class="dpt-235 tpt-135"></div>
                    <div class="container" data-aos="fade-right" data-aos-duration="1500">
                        <div class="row ">
                            <div class="col-lg-6 d-lg-flex flex-lg-column  justify-content-lg-center">
                                <?php if (!empty($how_it_works_hero_section_heading)) : ?>
                                    <h3 class="text-white acid-bold fontLS lh-1 resfontXXS"><?php echo $how_it_works_hero_section_heading; ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($how_it_works_hero_section_content)) : ?>
                                    <h6 class="text-white acid-normal fontSX dmt-25 mmt-20 resfontL leadingXS resleadingM">
                                        <?php echo $how_it_works_hero_section_content; ?></h6>
                                <?php endif; ?>
                                <?php
                                if (!empty($how_it_works_hero_section_items)) : ?>
                                    <div class="accordion how-work-accordion dmt-35" id="accordionExampleTwo">
                                        <?php foreach ($how_it_works_hero_section_items as $key => $how_it_works_hero_section_items_custom) :
                                            $clssname_value = ($key == '0') ? "true" : "false";
                                        ?>
                                            <div class="bg-accordion border-0 mb-3 radiusES overflow-hidden">
                                                <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                                                    <button class="bg-transparent accordion-button shadow-none radiusES acid-bold text-white fontXL" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="<?php echo $clssname_value; ?>" aria-controls="collapse<?php echo $key; ?>">
                                                        <?php echo $how_it_works_hero_section_items_custom['heading']; ?>
                                                    </button>
                                                </h2>
                                                <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse <?php if (get_sub_field('accordion_open') && ($key == '0')) : ?>show<?php endif; ?>" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExampleTwo">
                                                    <div class="accordion-body col-lg-10">
                                                        <h6 class="acid-normal text-white fontL leadingL mb-3">
                                                            <?php echo $how_it_works_hero_section_items_custom['content']; ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($how_it_works_hero_section_button['url'])) :
                                    $target = ($how_it_works_hero_section_button['target'] == '_blank') ? "_blank" : "";
                                ?>
                                    <a href="<?php echo $how_it_works_hero_section_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-flex align-items-center mx-lg-0 mx-auto justify-content-center fontXX text-decoration-none bgsecondary radiusX btnZ "><?php echo $how_it_works_hero_section_button['title']; ?></a>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($how_it_works_hero_section_image['url'])) : ?>
                                <div class="col-lg-5 me-5  position-absolute end-0 image-content p-initial dmt-65 tmt-50">

                                    <?php if (! get_sub_field('hide_background_shape')) : ?>
                                        <div class="shape-bg-image bg-white position-absolute left-center h-100"></div>
                                    <?php endif; ?>

                                    <img src="<?php echo $how_it_works_hero_section_image['url']; ?>" class="top-left-center position-absolute w-100 <?php if (get_sub_field('hide_background_shape')) : ?>radiusES<?php endif; ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (!$how_it_works_hero_section_video_image['url'] == ""): ?>
                        <div class="dpb-300 tpb-35 tmb-35 dmb-225"></div>
                    <?php else: ?>
                        <div class="dpb-100 tpb-35 tmb-35 dmb-100"></div>
                    <?php endif; ?>
                </div>
                <div class="tmt-90"></div>

                <?php if (!$how_it_works_hero_section_video_image['url'] == ""): ?>
                    <div class="single-image-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 position-relative">
                                    <a href="javascript:void(0);" class="hero-main-img radiusS overflow-hidden top-left-center p-initial w-100 d-block overflow-hidden position-absolute">
                                        <div class="videoHide position-relative overflow-hidden radiusX h-100" data-aos="fade-in" data-aos-offset="-500">
                                            <img src="<?php echo $how_it_works_hero_section_video_image['url']; ?>" alt="" class="w-100 h-100 object-cover">
                                            <button class="p-0 border-0 bg-transparent position-absolute top-left-center videoPlay">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 99 99">
                                                    <g id="Group_3869" data-name="Group 3869" transform="translate(-318.371 -1421.371)">
                                                        <circle id="Ellipse_411" data-name="Ellipse 411" cx="49.5" cy="49.5" r="49.5" transform="translate(318.371 1421.371)" fill="#fff" />
                                                        <g id="Polygon_42" data-name="Polygon 42" transform="translate(386.841 1452.293) rotate(90)" fill="none">
                                                            <path d="M16.667,3.06a2,2,0,0,1,3.478,0L35.114,29.407a2,2,0,0,1-1.739,2.988H3.437A2,2,0,0,1,1.7,29.407Z" stroke="none" />
                                                            <path d="M 18.4060173034668 2.048500061035156 C 17.72822570800781 2.048500061035156 17.0504322052002 2.385828018188477 16.66710662841797 3.060483932495117 L 1.697738647460938 29.40657424926758 C 0.940185546875 30.73985290527344 1.903179168701172 32.39458465576172 3.436656951904297 32.39458465576172 L 33.37538909912109 32.39458465576172 C 34.90885925292969 32.39458465576172 35.87184906005859 30.73985290527344 35.11429595947266 29.40657424926758 L 20.14492797851562 3.060483932495117 C 19.7616024017334 2.385828018188477 19.08380889892578 2.048500061035156 18.4060173034668 2.048500061035156 M 18.4060173034668 0.04850387573242188 C 19.86363792419434 0.04850387573242188 21.16375732421875 0.8051223754882812 21.88383865356445 2.072463989257812 L 36.85320663452148 28.41855239868164 C 37.56473541259766 29.67083358764648 37.55702590942383 31.16167259216309 36.83256912231445 32.40652465820312 C 36.10810852050781 33.65138244628906 34.81570816040039 34.39458465576172 33.37538909912109 34.39458465576172 L 3.436656951904297 34.39458465576172 C 1.996337890625 34.39458465576172 0.7039260864257812 33.65138244628906 -0.02053451538085938 32.40652465820312 C -0.7449913024902344 31.16167259216309 -0.7527008056640625 29.67083358764648 -0.04117202758789062 28.41855239868164 L 14.92819786071777 2.072463989257812 C 15.64824676513672 0.8051338195800781 16.94837760925293 0.04850387573242188 18.4060173034668 0.04850387573242188 Z" stroke="none" fill="#010141" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="videoPlayer d-none h-100">
                                            <?php echo $how_it_works_hero_section_video_url; ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php elseif (get_row_layout() == 'case_studies') :
            $case_studies_heading = get_sub_field('heading');
        ?>
            <!-- caes studies list section -->
            <section class="overflow-hidden position-relative">
                <div class="study-wave position-absolute top-0 end-0">
                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/study-wave.png" alt="" class="d-lg-block d-none">
                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/static-pattern-1.svg" alt="" class="d-lg-none d-block">
                </div>
                <div class="dpt-175 tpt-125"></div>
                <div class="container" data-aos="fade-up" data-aos-duration="1500">
                    <div class="row pb-lg-4">
                        <div class="col-12">
                            <?php if (!empty($case_studies_heading)) : ?>
                                <div class="col-lg-4 col-8 position-relative">
                                    <h3 class="text-white acid-bold fontLS leadingMX resleadingMS resfontXXS"><?php echo $case_studies_heading; ?></h3>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $casestudies = new WP_Query([
                        'post_type' => 'casestudies',
                        'posts_per_page' => -1,
                    ]);
                    ?>
                    <?php while ($casestudies->have_posts()) :
                        $casestudies->the_post();
                        $id = get_the_ID();
                        $ntitle = get_the_title();
                        $content = get_the_excerpt();
                        $video_file = get_field('video_file', $id);
                        $time = get_field('time', $id);
                        $current = get_the_terms($id, 'case-term');
                    ?>
                        <div class="row dmt-80 tmt-60">
                            <div class="col-lg-9 pe-lg-1">
                                <div class="pe-lg-5 me-lg-4">
                                    <div class="case-study-img radiusX overflow-hidden card-hover-new position-relative card-hover-new">
                                        <div class="videoHide position-relative h-100">
                                            <a href="javascript:void(0)" class="text-decoration-none h-100 d-block videoPlay">
                                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover hover-img" alt="">
                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/case-layer.svg" class="position-absolute bottom-0 start-0 w-100" alt="">
                                                <div class="position-absolute bottom-0 start-0 w-100 d-flex align-items-center p-4 card-inner-content">
                                                    <button class="bg-transparent p-0 border-0 transition">
                                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/play.svg" alt="">
                                                    </button>
                                                    <h5 class="ms-3 acid-bold fontL textlightwhite lh-1"><?php echo $time; ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="videoPlayer d-none h-100">
                                            <?php echo $video_file; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pe-lg-4 d-lg-flex tmt-40 flex-column justify-content-center content-case-studies">
                                <label class="bgsecondary radiusEX px-3 py-2 lh-1 fontM acid-normal width-fit-content  text-white"><?php echo $current[0]->name; ?></label>
                                <h3 class="dmt-20 resfontSX resleadingMM pe-lg-0 pe-4 tmt-15 text-white acid-bold textlightwhite fontMS leadingSX">
                                    <?php echo $ntitle; ?>
                                </h3>
                                <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none dmt-30 tmt-15 d-block">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/transparent-arrow.svg" alt="">
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'medical_section') :
            $medical_section_list = get_sub_field('list');
            $medical_section_flexible_content = get_sub_field('flexible_content');

        ?>
            <section class="medical-trial-section">
                <div class="container">
                    <div class="row">
                        <h5 class="fontX leadingX acid-bold tpt-125 dmb-35 textlightblack d-lg-none d-block"><span class="opacity-50">Product ></span>
                            <?php the_title(); ?></h5>
                        <h1 class="resfontXXS leadingXM Lacid-bold tmb-35 d-lg-none d-block">
                            <?php the_title(); ?></h1>
                        <div class="col-lg-3 fixed-menu overflow-visible">
                            <div class="menu-links position-sticky">
                                <h5 class="fontX leadingX acid-bold dmb-35 textlightblack d-none d-lg-block"><span class="opacity-50">Product ></span>
                                    <?php the_title(); ?></h5>
                                <nav class="menu h-100 d-none d-lg-flex bg-white radiusX flex-column justify-content-between dpt-25 tpb-60">
                                    <ul class="menu--sidebar medical-menu list-none d-inline-block">
                                        <?php foreach ($medical_section_list as $key => $list_custom) :
                                            $clssname = ($key == "0") ? "active" : ""; ?>
                                            <li class="list-none tpt-15 tpb-15 dpt-10 dpb-10 <?php echo $clssname; ?>" data-section-index="<?php echo $list_custom['id']; ?>">
                                                <a href="#<?php echo $list_custom['id']; ?>" class="text-decoration-none fontL leadingX acid-normal textlightblack" id="accordionTrigger">
                                                    <?php echo $list_custom['list_view']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="dpb-20 share-btn d-none d-lg-flex">
                                        <h5 class="fontX leadingXS acid-bold textlightblack me-3">Share this post</h5>
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/share-icon-new.svg" alt="">
                                        <?php echo do_shortcode('[ssba url=”http://simplesharebuttons.xn--com-9o0a title=”Simple Share Buttons”]'); ?>

                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="accordion medical-trial-accordion d-lg-none d-block mmb-15 tmb-15" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button shadow-none radiusES acid-normal fontL leadingX collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Strolll X Medical Trials
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body" id="accordionBody">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 px-xl-4 medical-trial-content ms-auto ms-xl-0">
                            <div id="" class="medical-content custom-medical-content-main">
                                <h1 class="fontML leadingSM acid-bold dmb-40 ms-lg-3 d-none d-lg-block"><?php the_title(); ?>
                                </h1>
                                <?php
                                foreach ($medical_section_flexible_content as $key => $medical_section_flexible_content_custom) :
                                    $master_key = $key;
                                    if ($medical_section_flexible_content_custom['acf_fc_layout'] == 'stage_view') :
                                ?>
                                        <div id="<?php echo $medical_section_flexible_content_custom['list_id']; ?>" class="medical-content section--anchor" data-section-index="<?php echo $medical_section_flexible_content_custom['list_id']; ?>">
                                            <div class="bg-white radiusX d-flex tpt-30 tpb-20 dpt-55 dpb-35 dmb-80 tmb-85 px-4 px-lg-3 px-xl-4">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>

                                                            <?php $last_key = end(array_keys($medical_section_flexible_content_custom['stage_list']));  ?>
                                                            <?php foreach ($medical_section_flexible_content_custom['stage_list'] as $key => $stage_list) :
                                                                $master = $key + 1;
                                                            ?>
                                                                <td scope="col">
                                                                    <div class="d-flex flex-column align-items-center">

                                                                        <?php if ($key != $last_key) : ?>
                                                                            <div class="stage-count bgoffwhite dmb-10">
                                                                                <span class="fontXM leadingS acid-bold h-100 d-flex justify-content-center align-items-center">0<?php echo $master; ?></span>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="stage-count dmb-10">
                                                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/complete-icon.svg" alt="">
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <h5 class="fontX leadingX acid-bold textlightblack"><?php echo $stage_list['name']; ?></h5>
                                                                    </div>
                                                                </td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($medical_section_list as $key => $list_custom) :
                                                            $clssname = ($key == "0") ? "active" : ""; ?>
                                                            <tr>
                                                                <th scope="row" class="fontM leadingS resfontXXL acid-bold">
                                                                    <a class="fontM leadingS resfontXXL acid-bold text-decoration-none textlightblack" href="#<?php echo $list_custom['id']; ?>"><?php echo $list_custom['list_view']; ?></a>
                                                                </th>
                                                                <td class="fontM leadingX acid-bold d-block d-lg-none">Stage 3</td>
                                                                <td colspan="5">
                                                                    <div class="progress">
                                                                        <div class="progress-bar bgsecondary" role="progressbar" style="width:  <?php echo $list_custom['value']; ?>%" aria-valuenow=" <?php echo $list_custom['value']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php elseif ($medical_section_flexible_content_custom['acf_fc_layout'] == 'heading') : ?>
                                        <div id="<?php echo $medical_section_flexible_content_custom['list_id']; ?>" class="medical-content">
                                            <h1 class="fontMX leadingSX resfontXXS resleadingXM acid-bold dmb-25"><?php echo $medical_section_flexible_content_custom['heading']; ?>
                                            </h1>
                                        </div>
                                    <?php elseif ($medical_section_flexible_content_custom['acf_fc_layout'] == 'content') : ?>
                                        <div id="<?php echo $medical_section_flexible_content_custom['list_id']; ?>" class="medical-content ">
                                            <div class="tpb-55 dpb-35">
                                                <h5 class="fontXX resfontL resleadingM leadingXX acid-normal dmb-30">
                                                    <?php echo $medical_section_flexible_content_custom['content']; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    <?php elseif ($medical_section_flexible_content_custom['acf_fc_layout'] == 'tab') : ?>
                                        <div id="<?php echo $medical_section_flexible_content_custom['list_id']; ?>" class="medical-content custom-medical-content">
                                            <div class="accordion custom-accordion medical-accordion tpb-10" id="accordionExample<?php echo $master_key; ?>">
                                                <?php foreach ($medical_section_flexible_content_custom['items'] as $key => $items) :
                                                    $clssname = ($key == 0) ? "show" : "";
                                                    $clssname_value = ($key == 0) ? "true" : "";
                                                ?>
                                                    <div class="bg-white border-0 tmb-25 dmb-15 radiusES overflow-hidden">
                                                        <h2 class="accordion-header" id="heading<?php echo $master_key; ?><?php echo $key; ?>">
                                                            <button class="accordion-button resfontXXM shadow-none radiusES bg-white acid-bold textlightblack fontXL" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $master_key; ?><?php echo $key; ?>" aria-expanded="<?php echo $clssname_value; ?>" aria-controls="collapse<?php echo $master_key; ?><?php echo $key; ?>">
                                                                <?php echo $items['heading']; ?>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse<?php echo $master_key; ?><?php echo $key; ?>" class="accordion-collapse collapse <?php echo $clssname; ?>" aria-labelledby="heading<?php echo $master_key; ?><?php echo $key; ?>" data-bs-parent="#accordionExample<?php echo $master_key; ?>">
                                                            <div class="accordion-body col-10 col-xl-11 ">
                                                                <h6 class="acid-normal textlightblack fontL leadingL resleadingM mb-3">
                                                                    <?php echo $items['description']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>

                                            <?php if ($medical_section_flexible_content_custom['download']) : ?>
                                                <a href="<?php echo $medical_section_flexible_content_custom['download']['url']; ?>" target="_blank" class="bgprimary text-white acid-bold text-decoration-none btnY d-flex align-items-center justify-content-center fontXX radiusX tmb-95 dmb-65">
                                                    <?php echo $medical_section_flexible_content_custom['download']['title']; ?>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($medical_section_flexible_content_custom['links']) : ?>
                                                <div class="col-12 col-xl-10 pe-xl-5 tmb-60">
                                                    <div class="row row-cols-md-2">
                                                        <?php foreach ($medical_section_flexible_content_custom['links'] as $links_master) :
                                                            $id = $links_master->ID;
                                                            $ntitle = $links_master->post_title;
                                                            $select_category = get_field('select_category', $id);
                                                        ?>
                                                            <div class="author-detail-blog dmb-25">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="rounded-circle aurthor-details-img overflow-hidden">
                                                                        <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover" alt="">
                                                                    </div>
                                                                    <div class="ps-3 ms-1">
                                                                        <h5 class="textlightblack fontM lh-1 acid-bold opacity-50"><?php echo $select_category; ?>
                                                                        </h5>
                                                                        <h5 class="textlightblack fontM lh-1 acid-bold mt-2"><?php echo $ntitle; ?>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class=" border-lightblack border-top-0 border-start-0 border-end-0 dmt-90 dmb-105 d-lg-block d-none custom-border"></div>
                                            <?php endif; ?>
                                        </div>
                                <?php endif;
                                endforeach;
                                ?>

                            </div>
                        </div>
                        <div class="share-btn d-lg-none d-flex">
                            <h5 class="fontX leadingXS acid-bold textlightblack me-3">Share this post</h5>
                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/share-icon-new.svg" alt="">

                        </div>
                    </div>
                </div>
            </section>

            <div class="spacing tmb-95"></div>

        <?php elseif (get_row_layout() == 'blog') :
            $blog_featured_post = get_sub_field('featured_post');
        ?>
            <?php
            $args = array(
                'taxonomy' => 'category',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 0
            );

            $cats = get_categories($args);
            ?>

            <?php
            $master = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 9,
                'orderby' => 'date',
                'order' => 'ASC',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1
            ]);
            ?>
            <section class="blog-section overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-12 filter-button-row dmb-55 d-flex align-items-center overflow-y-auto tmb-40">
                            <button data-filter="all" class="border-offwhite filter-button text-capitalize text-nowrap transition active lh-1 py-3 px-lg-4 px-3 bg-transparent acid-bold textlightblack fontX radiusXS me-2">
                                All
                            </button>
                            <?php foreach ($cats as $cat) : ?>
                                <button data-filter="<?php echo $cat->slug; ?>" class="border-offwhite filter-button text-capitalize text-nowrap transition lh-1 py-3 px-lg-4 px-3 bg-transparent acid-bold textlightblack fontX radiusXS me-2">
                                    <?php echo $cat->name; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row rowX">
                        <?php if (!empty($blog_featured_post)) :
                            $id = $blog_featured_post->ID;
                            $ntitle = $blog_featured_post->post_title;
                            $content = $blog_featured_post->post_excerpts;
                            $time = get_field('time', $id);
                            $current = get_the_terms($id, 'category');
                            $people_and_company_links = get_field('people_and_company_links', $id);
                        ?>
                            <div class="col-12 dmb-110 tmb-15">
                                <a href="<?php echo get_permalink($id); ?>" class="row w-100 bg-white radiusX overflow-hidden text-decoration-none card-hover-new">
                                    <div class="col-xl-7 col-lg-6 pe-lg-4">
                                        <div class="blog-first-img overflow-hidden">
                                            <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover hover-img" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 px-lg-5 px-3 mx-lg-0 mx-1 inner-blog dpt-85 tpt-25 dpb-70 tpb-30">
                                        <div class="d-flex h-100 justify-content-between flex-column">
                                            <div>
                                                <h5 class="acid-bold textsecondary lh-1 fontM"><?php echo $current[0]->name; ?></h5>
                                                <h3 class="acid-bold textlightblack  fontSL leadingXL dmt-10 pe-lg-5 resfontSX resleadingMM text-truncate text-truncate2">
                                                    <?php echo $ntitle; ?></h3>

                                                <h5 class="textlightblack fontM dmt-35 lh-1 acid-normal tmt-25">
                                                    <span class="acid-bold"><?php echo $time; ?> -</span>
                                                    <?php echo get_the_date('j M, Y'); ?>
                                                </h5>
                                            </div>
                                            <div class="author-detail-blog d-flex align-items-center justify-content-between tmt-25">
                                                <?php foreach ($people_and_company_links as $links_master) :
                                                    $id = $links_master->ID;
                                                    $ntitle = $links_master->post_title;
                                                    $select_category = get_field('select_category', $id);
                                                ?>
                                                    <div class="d-none">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded-circle aurthor-details-img overflow-hidden">
                                                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover" alt="">
                                                            </div>
                                                            <div class="ps-3 ms-1">
                                                                <h5 class="textlightblack fontM lh-1 acid-bold opacity-50"><?php echo $select_category; ?></h5>
                                                                <h5 class="textlightblack fontM lh-1 acid-bold mt-2"><?php echo $ntitle; ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <label class="bglightwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack">Featured</label>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="row rowX single-item-blog">
                            <?php while ($master->have_posts()) :
                                $master->the_post();
                                $id = get_the_ID();
                                $ntitle = get_the_title();
                                $content = get_the_excerpt();
                                $time = get_field('time', $id);
                                $current = get_the_terms($id, 'category');
                                $people_and_company_links = get_field('people_and_company_links', $id);
                            ?>

                                <div class="col-xl-4 col-lg-6 dmb-80 tmb-20 filter <?php echo $current[0]->slug ?>">
                                    <a href="<?php echo get_permalink($id); ?>" class="w-100 d-block bg-white radiusX overflow-hidden text-decoration-none single-blog-card card-hover-new">
                                        <div class="single-blog-img overflow-hidden">
                                            <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="hover-img w-100 h-100 object-cover " alt="">
                                        </div>
                                        <div class="dpt-30 dpb-25 px-lg-4 px-3 mx-lg-0 mx-1 ms-lg-2">
                                            <p class="acid-bold textsecondary lh-1 fontX"><?php echo $current[0]->name ?></p>
                                            <div class="pe-4">
                                                <h4 class="acid-bold textlightblack leadingL dpt-15 me-lg-5 pe-lg-5 fontXM text-truncate text-truncate2"><?php echo $ntitle; ?></h4>
                                            </div>
                                            <div class="dpt-20 d-flex align-items-center justify-content-between">
                                                <h5 class="textlightblack fontX  lh-1 acid-normal">
                                                    <span class="acid-bold"><?php echo $time; ?> -</span>
                                                    <?php echo get_the_date('j M, Y'); ?>
                                                </h5>
                                                <?php $id_master = $people_and_company_links[0]->ID; ?>
                                                <div class="rounded-circle aurthor-details-img overflow-hidden">
                                                    <img src="<?php echo get_the_post_thumbnail_url($id_master); ?>" class="w-100 h-100 object-cover" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="col-12 tmt-35 master-load">
                            <a href="javascript:void(0)" id="load-more" class="bgprimary mx-auto text-white acid-bold text-decoration-none btnX d-flex align-items-center justify-content-center fontXX radiusX">
                                Load More +
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                let currentPage = 1;
                jQuery(document).on('click', '#load-more', function() {
                    currentPage++; // Do currentPage + 1, because we want to load the next page
                    jQuery('.loader').addClass('loaderopen');
                    jQuery.ajax({
                        type: 'POST',
                        url: '<?= admin_url("admin-ajax.php"); ?>',
                        dataType: 'html',
                        data: {
                            action: 'blog_load_more',
                            paged: currentPage,
                        },
                        success: function(res) {
                            jQuery('.loader').removeClass('loaderopen');
                            if (res == '') {
                                jQuery('.master-load').hide();
                            } else {
                                jQuery('.single-item-blog').append(res);

                                if (jQuery(res).filter("div.filter").length < 6) {
                                    jQuery('.master-load').hide();
                                } else {
                                    jQuery('.master-load').show();
                                }


                            }

                        }
                    });
                });
            </script>
        <?php elseif (get_row_layout() == 'how_can_we_help') :
            $how_can_we_help_heading = get_sub_field('heading');
            $how_can_we_help_items = get_sub_field('items');
        ?>
            <!-- Hero Section -->
            <section class="hero-sections-main help-hero radius-bottom-right bg-primary dpt-185 tpb-105 dpb-150 position-relative overflow-hidden">
                <div class="container" data-aos="fade-right" data-aos-duration="1500">
                    <div class="row">
                        <div class="col-lg-9 col-xl-7 pe-lg-4 z-3">
                            <h1 class="fontMM leadingSS resfontXXS resleadingXM acid-bold text-white dmb-25"><?php echo $how_can_we_help_heading; ?>
                            </h1>
                            <form action="/" method="get" autocomplete="off" onsubmit="document.location.href = '<?php echo get_home_url(); ?>/?s='+this.s.value+''; return false; ">
                                <div class="input-box d-flex align-items-center justify-content-end">
                                    <input type="text" name="s" placeholder="Enter a search term…" class="input-help w-100 h-100 bg-white border-lightPrimary text-lightblack radiusS fontXX resfontL leadingS acid-normal border-0">
                                    <div class="position-absolute pe-2 pe-lg-1">
                                        <button type="submit" class="search-icon border-0 bg-transparent">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/help-search-icon.svg" alt="">
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="help-img position-absolute end-0 bottom-0">
                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/help-pattern.svg" alt="">
                </div>
            </section>
            <?php if (!empty($how_can_we_help_items)) : ?>
                <div class="spacing dmt-60 mmt-0"></div>
                <section class="help-menu-section">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <?php foreach ($how_can_we_help_items as $how_can_we_help_items_custom) :
                                $id = $how_can_we_help_items_custom->ID;
                                $ntitle = $how_can_we_help_items_custom->post_title;
                                $content = $how_can_we_help_items_custom->post_excerpt;
                                $icon = get_field('icon', $id);
                            ?>
                                <div class="col-lg-6 col-12 help-card border-b-offwhite dpt-65 dpb-65 mpt-45 mpb-45">
                                    <div class="d-lg-flex">
                                        <div class="help-img-bg bgoffwhite d-flex align-items-center justify-content-center radiusEX me-lg-5 mmb-20">
                                            <div class="help-img overflow-hidden">
                                                <img src="<?php echo $icon['url']; ?>" alt="" class="h-100">
                                            </div>
                                        </div>
                                        <div class="help-info">
                                            <h3 class="fontSS acid-bold textlightblack resfontXL"><?php echo $ntitle; ?></h3>
                                            <h6 class="dmt-15 acid-normal textlightblack fontXX resfontM"><?php echo $content; ?></h6>
                                            <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none filter-inver transition tmt-10 d-block dmt-20 mmt-15">
                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/light-arrow.svg" class="w-100 h-100" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'pricing') :
            $pricing_heading = get_sub_field('heading');
            $pricing_pricing_currency = get_sub_field('pricing_currency');
            $pricing_items = get_sub_field('items');
        ?>
            <!-- hero section -->
            <section class="hero-section">
                <div class="container" data-aos="fade-right" data-aos-duration="1500">
                    <div class="d-lg-flex justify-content-between  align-items-end dmb-60 mmb-40 dpt-180 tpt-130">
                        <div class="d-flex align-items-lg-end align-items-start justify-content-lg-start justify-content-between mmb-30">
                            <?php if (!empty($pricing_heading)) : ?>
                                <h3 class="acid-bold fontMM textlightblack resfontXXS"><?php echo $pricing_heading; ?></h3>
                            <?php endif; ?>
                            <!-- DropDown -->
                            <?php if (!empty($pricing_pricing_currency)) : ?>
                                <div class="select-price">
                                    <select id="" class="master-select  border-0 acid-bold fontX radiusXS">
                                        <?php foreach ($pricing_pricing_currency as $pricing_pricing_currency_custom) : ?>
                                            <option value="<?php echo $pricing_pricing_currency_custom['name']; ?>"><?php echo $pricing_pricing_currency_custom['currency_code']; ?> - <?php echo $pricing_pricing_currency_custom['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($pricing_items)) : ?>
                            <h5 class="d-lg-none d-block mmb-15 acid-bold resfontXXM">Subscription Type</h5>
                            <ul class="price-category d-flex nav nav-tabs" id="myTab" role="tablist">
                                <?php foreach ($pricing_items as $key => $pricing_items_custom) :
                                    $master = ($key == '0') ? "active" : ""
                                ?>
                                    <li class="nav-item">
                                        <a href="#" class="tag-name nav-link bglightwhite fontX ms-lg-1  acid-bold d-flex
                    align-items-center textlightblack <?php echo $master; ?> resfontX" id="month-tab<?php echo $key; ?>" data-bs-toggle="tab" data-bs-target="#month<?php echo $key; ?>">
                                            <?php echo $pricing_items_custom['heading']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($pricing_items)) : ?>
                        <div class="row bg-white radiusX category-data tab-content" id="myTabContent">
                            <?php foreach ($pricing_items as $key => $pricing_items_custom) :
                                $master = ($key == '0') ? "show active" : ""
                            ?>
                                <div class="tab-pane fade <?php echo $master; ?>" id="month<?php echo $key; ?>" role="tabpanel" aria-labelledby="month-tab<?php echo $key; ?>">
                                    <div class="d-lg-flex d-grid filter month">
                                        <div class="col-lg-6 col-12 order-lg-1 order-2">
                                            <div class="category-img mmt-35">
                                                <img src="<?php echo $pricing_items_custom['image']['url']; ?>" alt="" class="w-100 h-100">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 ps-lg-5 d-inline-flex align-items-center py-5  order-1  order-lg-2">
                                            <div class="ps-p-p mpt-45">
                                                <div class="pe-lg-0 pe-5">
                                                    <h4 class="acid-normal textlightblack fontSM leadingXL resfontSSX resleadingXX pe-lg-0 pe-3">
                                                        <?php $i = 0; ?>
                                                        <?php echo $pricing_items_custom['main_heading']; ?>
                                                        <?php foreach ($pricing_items_custom['pricing'] as $key => $pricing_master) :
                                                            $clss = ($key == '0') ? "block" : "none";
                                                        ?>
                                                            <span class="acid-bold custom-value <?php echo $pricing_master['value']; ?> <?php if ($i == 0): ?>active<?php endif; ?>" data-id="<?php echo $pricing_master['value']; ?>"><?php echo $pricing_master['heading']; ?></span>
                                                        <?php $i++;
                                                        endforeach; ?>
                                                    </h4>
                                                    <?php $target = ($pricing_items_custom['target'] == '_blank') ? "_blank" : ""; ?>
                                                    <a href="<?php echo $pricing_items_custom['button']['url']; ?>" target="<?php echo $target; ?>" class="text-white  acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnS"><?php echo $pricing_items_custom['button']['title']; ?></a>
                                                </div>
                                                <div class="info dmt-5 mmt-0 pe-lg-0 pe-3">
                                                    <?php foreach ($pricing_items_custom['list'] as $list) : ?>
                                                        <div class="d-flex dmt-20 mmt-35">
                                                            <div class="icon dmt-5">
                                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/check-icon.svg" alt="">
                                                            </div>
                                                            <div>
                                                                <h5 class="dmb-15 mmb-10 acid-normal fontXS textlightblack"><?php echo $list['heading']; ?>
                                                                </h5>
                                                                <h6 class="dmb-15 mmb-0 acid-normal fontM leadingS textlightblack resleadingML">
                                                                    <?php echo $list['content']; ?></h6>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'full_content') :
            $full_content_heading = get_sub_field('heading');
            $full_content_button = get_sub_field('button');
            $full_content_sub_content = get_sub_field('sub_content');
            $full_content_left_content = get_sub_field('left_content');
            $full_content_right_content = get_sub_field('right_content');
        ?>
            <!-- about hero -->
            <section class="bg-primary dpt-250 tpt-130">
                <div class="container" data-aos="fade-up" data-aos-duration="1500">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php if (!empty($full_content_heading)) : ?>
                                <h3 class="acid-bold text-white fontMM leadingSS resfontXXS resleadingMS"><?php echo $full_content_heading; ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($full_content_button['url'])) :
                                $target = ($full_content_button['target'] == '_blank') ? "_blank" : "";
                            ?>
                                <a href="<?php echo $full_content_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-lg-flex d-none align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-40 btnY "><?php echo $full_content_button['title']; ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 ms-auto">
                            <?php if (!empty($full_content_sub_content)) : ?>
                                <h5 class="acid-bold text-white leadingXS fontSX res-acid-normal resfontL resleadingM tmt-25">
                                    <?php echo $full_content_sub_content; ?></h5>
                            <?php endif; ?>
                            <div class="row dmt-40 tmt-0 mx-lg-n3">
                                <div class="col-lg-6 px-lg-3">
                                    <?php if (!empty($full_content_left_content)) : ?>
                                        <h6 class="acid-normal text-white leadingM fontL tmt-25"><?php echo $full_content_left_content; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 px-lg-3">
                                    <?php if (!empty($full_content_right_content)) : ?>
                                        <h6 class="acid-normal text-white leadingM fontL tmt-25"><?php echo $full_content_right_content; ?></h6>
                                        </h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($full_content_button['url'])) :
                                $target = ($full_content_button['target'] == '_blank') ? "_blank" : "";
                            ?>
                                <a href="<?php echo $full_content_button['url']; ?>" target="<?php echo $target; ?>" class="text-white acid-bold d-lg-none d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-25 btnY "><?php echo $full_content_button['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php elseif (get_row_layout() == 'full_image') :
            $full_image_image = get_sub_field('image');
            if (!empty($full_image_image['url'])) :
            ?>
                <section class="dpt-180 tpt-45 bgprimary">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 about-video-img radiusX radiusES overflow-hidden">
                                <img src="<?php echo $full_image_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php elseif (get_row_layout() == 'vacancies') :
            $vacancies_heading = get_sub_field('heading');
            $vacancies_items = get_sub_field('items');
            if (!empty($vacancies_items)) :
            ?>
                <section class="bgprimary" id="vacancies-sec">
                    <div class="vacancies-section bg-white">
                        <div class="dpt-125 tpt-65"></div>
                        <div class="container" data-aos="fade-in">
                            <div class="row">
                                <?php if (!empty($vacancies_heading)) : ?>
                                    <div class="col-12">
                                        <h3 class="acid-bold textlightblack fontMM mb-lg-1 resfontXXS tmb-25"><?php echo $vacancies_heading; ?></h3>
                                    </div>
                                <?php endif; ?>


                                <?php if (have_rows('items')) : ?>
                                    <?php while (have_rows('items')) :
                                        the_row(); ?>

                                        <div class="col-12 master-vacancy-value">

                                            <a <?php if ($indeed_link = get_sub_field('indeed_link')) : ?>href="<?php echo esc_html($indeed_link); ?>" <?php else: ?>href="javascript:void(0);" <?php endif; ?> data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php the_sub_field('heading'); ?>" class="row align-items-center text-decoration-none single-vacancies border-offwhite border-top-0 border-start-0 border-end-0">
                                                <div class="col-8">
                                                    <h5 class="acid-bold textlightblack fontL lh-1"><?php the_sub_field('heading'); ?></h5>
                                                    <h5 class="acid-bold textsecondary mt-2 fontL resfontM d-lg-none"><?php the_sub_field('time'); ?></h5>
                                                </div>
                                                <div class="col-4 d-flex align-items-center justify-content-lg-between justify-content-end">
                                                    <h5 class="acid-bold textlightblack fontL d-lg-block d-none resfontM"><?php the_sub_field('time'); ?></h5>

                                                    <button class="text-decoration-none next-vacancies border-0 p-0 bg-transparent filter-inver transition">
                                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/light-arrow.svg" class="w-100 h-100" alt="">
                                                    </button>

                                                </div>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Modal -->
                <div class="modal vacancies-modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down">
                        <div class="modal-content border-0 radiusX bglightwhite">

                            <div class="modal-body">
                                <button class="bg-transparent p-0 border-0 position-absolute d-lg-block d-none top-0 end-0 mt-4 me-4" data-bs-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.35" height="20.35" viewBox="0 0 20.35 20.35">
                                        <g id="Group_3976" data-name="Group 3976" transform="translate(-998 -114.65)">
                                            <rect id="Rectangle_2209" data-name="Rectangle 2209" width="26.722" height="2.055" transform="translate(998 133.546) rotate(-45)" fill="#010141" />
                                            <rect id="Rectangle_2210" data-name="Rectangle 2210" width="26.722" height="2.056" transform="translate(1016.896 135) rotate(-135)" fill="#010141" />
                                        </g>
                                    </svg>
                                </button>
                                <button class="bg-transparent p-0 border-0 position-absolute d-lg-none d-block mpb-30 bottom-0 end-0 mt-4 me-4 close-modal-btn" data-bs-dismiss="modal" aria-label="Close">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/close-btn.svg" alt="">
                                </button>
                                <h3 class="textlightblack lh-1 text-center dmb-20 px-lg-0 px-5 mmb-50">
                                    <span class="fontXX acid-normal d-block">Enquiry for</span>
                                    <span class="acid-bold fontSS mt-2 pt-1 d-block resleadingXM master-vacancy"></span>
                                </h3>
                                <?php echo do_shortcode('[contact-form-7 id="0e4dcf1" title="Vanacies"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>



        <?php elseif (get_row_layout() == 'vacancies_shortcode') :

        ?>
            <div class="vacan_shortcode">
                <?php if ($shortcode = get_sub_field('shortcode')) : ?>
                    <?php echo $shortcode; ?>
                <?php endif; ?>
            </div>

        <?php elseif (get_row_layout() == 'video_library') :
            $video_library_heading = get_sub_field('heading');
            $video_library_content = get_sub_field('content');
            $video_library_items = get_sub_field('items');
        ?>
            <section>
                <div class="dpt-180"></div>
                <div class="container" data-aos="fade-up" data-aos-duration="1500">
                    <div class="row">
                        <?php if (!empty($video_library_heading)) : ?>
                            <div class="col-lg-6">
                                <h1 class="textlightblack lh-1 acid-bold fontLS resfontXXS">
                                    <?php echo $video_library_heading; ?>
                                </h1>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($video_library_content)) : ?>
                            <div class="col-lg-6 ms-auto ps-lg-5 mt-lg-0 mt-4">
                                <h4 class="acid-bold textlightblack leadingXS ms-lg-5 resfontL resleadingM res-acid-normal fontSX">
                                    <?php echo $video_library_content; ?>
                                </h4>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <div class="dmt-110 tmt-65"></div>
            <?php if (!empty($video_library_items)) : ?>
                <section class="video-library-sec">
                    <div class="container">
                        <div class="row rowX">
                            <?php foreach ($video_library_items as $key => $video_library_items_custom) : ?>
                                <div class="col-lg-4 dmb-80 tmb-45">
                                    <a data-fancybox data-src="<?php echo $video_library_items_custom['vido']; ?>" href="javascript:void(0)" class="d-block video-card-main text-decoration-none card-hover-new openModlaVideo">
                                        <div class="position-relative video-card overflow-hidden radiusX resradiusES">
                                            <img src="<?php echo $video_library_items_custom['image']['url']; ?>" class="w-100 h-100 object-cover hover-img " alt="">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/cate-layer.svg" alt="" class="position-absolute bottom-0 start-0 w-100">
                                            <div class="position-absolute bottom-0 start-0 w-100 d-flex align-items-center p-lg-3 p-4 card-inner-content">

                                                <button class="bg-transparent p-0 border-0 transition">
                                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/play.svg" alt="">
                                                </button>
                                                <h5 class="ms-3 acid-bold fontL textlightwhite lh-1"><?php echo $video_library_items_custom['time']; ?></h5>
                                            </div>
                                        </div>
                                        <h4 class="acid-bold textlightblack dmt-25 me-5 pe-5 leadingXX fontXM resfontSX resleadingMM">
                                            <?php echo $video_library_items_custom['heading']; ?>
                                        </h4>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

            <?php endif; ?>
        <?php elseif (get_row_layout() == 'spacing') :
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');

            if (get_sub_field('background_colour') == 'null') : $background_color = 'grey';
            elseif (get_sub_field('background_colour') == 'bg-white') : $background_color = 'bg-white';
            elseif (get_sub_field('background_colour') == 'bgprimary') : $background_color = 'bgprimary';
            elseif (get_sub_field('background_colour') == 'bglightblack') : $background_color = 'bglightblack';
            else: $background_color = 'null';
            endif;


            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = (!empty($desktop['margin_bottom'])) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = (!empty($tablet['margin_bottom'])) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = (!empty($mobile['margin_bottom'])) ? " mpb-" : "";
        ?>
            <div class="spacing <?php echo $background_color; ?> 
                <?php echo $desktop_mb_main;
                echo $desktop_mb;
                echo $tablet_mb_main;
                echo $tablet_mb;
                echo $mobile_mb_main;
                echo $mobile_mb; ?>">
            </div>
        <?php elseif (get_row_layout() == 'hero_video_section') :
            $hero_video_title = get_sub_field('hero_video_title');
            $hero_video_button = get_sub_field('hero_video_button');
            $media_type = get_sub_field('media_type');
            $hero_image = get_sub_field('hero_image');
            $hero_video = get_sub_field('hero_video');
            $hero_youtube = get_sub_field('hero_youtube');
            $hero_viemo = get_sub_field('hero_viemo');
        ?>
            <section class="hero-video">
                <div class="container">
                    <?php if (!empty($hero_video_title)): ?>
                        <?= $hero_video_title ?>
                    <?php endif; ?>
                    <?php if (!empty($hero_video_button)): ?>
                        <a href="<?= $hero_video_button['url'] ?>"><?= $hero_video_button['title'] ?></a>
                    <?php endif; ?>
                    <?php if ($media_type == 'image'): ?>
                        <?php if (!empty($hero_image)): ?>
                            <img src="<?= $hero_image; ?>" alt="">
                        <?php endif; ?>
                    <?php elseif ($media_type == 'video'): ?>
                        <?php if (!empty($hero_video)): ?>
                            <video playsinline="playsinline" autoplay="autoplay" muted="muted" class="w-100 h-100 object-cover">
                                <source src="<?= $hero_video ?>" type="video/mp4">
                                </source>
                            </video>
                        <?php endif; ?>

                    <?php elseif ($media_type == 'youtube'): ?>
                        <?php if (!empty($hero_youtube)): ?>
                            <iframe class="w-100 h-100 object-cover embed-video"
                                src="<?= $hero_youtube; ?>?autoplay=1&mute=1&loop=1&background=1&controls=0&rel=0&playisline=<?= basename($hero_youtube) ?>"
                                allow="autoplay; fullscreen">
                            </iframe>
                        <?php endif; ?>
                    <?php elseif ($media_type == 'viemo'): ?>
                        <?php if (!empty($hero_viemo)): ?>
                            <iframe class="w-100 h-100 object-cover embed-video"
                                src="<?= $hero_viemo; ?>?autoplay=1&mute=1&controls=0&fs=0&" allow="autoplay"
                                allowfullscreen>
                            </iframe>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'slider_with_left_right') :
            $slider_group = get_sub_field('slider_group');
        ?>

            <section class="left-right-slider-section tpt-80 tpb-100 bglightwhite position-relative overflow-hidden">
                <div class="container h-100">
                    <div class="h-100 d-flex align-items-center">
                        <div class="swiper left-right-slider">
                            <div class="swiper-wrapper h-100">
                                <?php foreach ($slider_group as $sliders): ?>
                                    <div class="swiper-slide h-100 d-flex align-items-center">
                                        <div class="h-100">
                                            <div class="col-12 h-100 d-flex flex-lg-row align-items-center flex-column tmb-50 <?= $sliders['image_position'] == 'right' ? ' flex-column' : 'flex-column-reverse' ?> ">
                                                <?php if ($sliders['image_position'] == 'left'): ?>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="col-lg-10 ">
                                                            <?php if (!empty($sliders['prefix'])): ?>
                                                                <div class="acid-normal fontX leadingX textlightblack bgoffwhite radiusEX d-inline-block px-3 py-1 dmb-15 tmb-10"> <?= $sliders['prefix'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['title'])): ?>
                                                                <div class="acid-bold fontLX leadingSL textlightblack dmb-20 resfontXXS resleadingXM"> <?= $sliders['title'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['description'])): ?>
                                                                <div class="acid-normal fontXX leadingXX textlightblack dmb-15 pe-lg-5 text-truncate3 resfontLL resleadingL"> <?= $sliders['description'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['button'])): ?>
                                                                <a href="<?= $sliders['button']['url'] ?>" target="<?= $sliders['button']['target'] ?>" class="text-white acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnY"> <?= $sliders['button']['title'] ?> </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-lg-6 col-12 h-100">
                                                    <?php if (!empty($sliders['image'])): ?>
                                                        <div class="radiusX left-right-img h-100 overflow-hidden tmb-35">
                                                            <img src="<?= $sliders['image'] ?>" alt="sliders image" class="w-100 h-100 object-cover">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if ($sliders['image_position'] == 'right'): ?>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="col-lg-10 ms-auto">
                                                            <?php if (!empty($sliders['prefix'])): ?>
                                                                <div class="acid-normal fontX leadingX textlightblack bgoffwhite radiusEX d-inline-block px-3 py-1 dmb-15 tmb-10"> <?= $sliders['prefix'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['title'])): ?>
                                                                <div class="acid-bold fontLX leadingSL textlightblack dmb-20 resfontXXS resleadingXM"> <?= $sliders['title'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['description'])): ?>
                                                                <div class="acid-normal fontXX leadingXX textlightblack dmb-15 pe-lg-5 text-truncate3 resfontLL resleadingL"> <?= $sliders['description'] ?> </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($sliders['button'])): ?>
                                                                <a href="<?= $sliders['button']['url'] ?>" target="<?= $sliders['button']['target'] ?>" class="text-white acid-bold d-flex align-items-center fontXX justify-content-center text-decoration-none bgsecondary radiusX dmt-30 btnY"> <?= $sliders['button']['title'] ?> </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>



            <section class="the-benefits-section bgprimary dpt-100 dpb-165 tpt-50 tpb-50">
                <div class="container">
                    <div class="acid-bold font36 leadingXS textlightwhite">The benefits</div>
                    <div class="row row16">
                        <div class="col-lg-4 dmt-50 tmt-35">
                            <div class="benefits-cards h-100">
                                <div class="benefits-img overflow-hidden dmb-30 tmb-15 cursor-pointer">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/11/Screenshot-2024-11-05-at-15.01.45.png" class="w-100 h-100 object-cover benefits-main-img transition" alt="">
                                    <div class="benefits-media transition">
                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/11/Screenshot-2024-11-05-at-15.01.45.png" class="w-100 h-100 object-cover" alt="">
                                        <!-- <video playsinline="playsinline" autoplay="autoplay" muted="muted"
                                            class="w-100 h-100 object-cover position-absolute top-0 start-0">
                                            <source src="assets/video/emblem.mp4" type="video/mp4">
                                            </source>
                                        </video> -->

                                        <!-- <iframe class="w-100 h-100 object-cover embed-video position-absolute"
                                            src="https://www.youtube.com/embed/jmoPo11ktN4?autoplay=1&mute=1&loop=1&background=1&controls=0&rel=0&playisline=jmoPo11ktN4"
                                            allow="autoplay; fullscreen">
                                        </iframe> -->
                                        <!-- <iframe class="w-100 h-100 object-cover embed-video position-absolute"
                                            src="https://player.vimeo.com/video/1018833878?autoplay=1&mute=1&controls=0&fs=0&" allow="autoplay"
                                            allowfullscreen>
                                        </iframe> -->
                                    </div>
                                </div>
                                <div class="px-lg-3 px-1">
                                    <div class="acid-bold fontXL leadingXX textlightwhite dmb-10 pe-lg-5">Monitor from your laptop or computer.</div>
                                    <div class="acid-normal fontM leadingS textlightwhite dmb-20 tmb-0">
                                        Strolll’s clinician web portal provides you with a simple, fast and easy way to manage patients, create and prescribe individually personalised rehabilitation programs and monitor your patients adherence, performance and progression through your clinical dashboard and automated clinician notes.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        endif;
    endwhile;
endif;
?>