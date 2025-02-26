<?php
$people_and_company_links = get_field('people_and_company_links');
$flexible_content = get_field('flexible_content');
$time = get_field('time');
$video_file = get_field('video_file');
$current = get_the_terms($id, 'case-term');
?>

<section>

    <div class="dpt-175 tpt-140"></div>
    <div class="container">
        <div class="row position-relative">
            <a href="/case-studies" class="text-white fontM lh-1 acid-normal case-study-back">&larr; Back to all</a>
            <div class="col-lg-7 px-lg-1 pe-4 mx-auto">
                <label class="bglightwhite radiusEX px-3 py-2 lh-1 fontX acid-normal mb-4 textlightblack">
                    <?php echo $current[0]->name; ?>
                </label>
                <h2 class="acid-bold text-white fontML leadingSX pe-lg-5 me-lg-5 resfontXXS resleadingMS">
                    <?php the_title(); ?>
                </h2>
                <h4 class="acid-bold fontSS text-white leadingXM dmt-25 tmt-20 resfontL resleadingM">
                    <?php the_content(); ?>
                </h4>
                <div class="row d-lg-flex d-grid dmt-40 tmt-30">
                    <?php foreach ($people_and_company_links as $people_and_company_links_custom):
                        $id = $people_and_company_links_custom->ID;
                        $ntitle = $people_and_company_links_custom->post_title;
                        $select_category = get_field('select_category', $id);
                        ?>
                        <div class="author-details col-lg-5 d-flex tmb-20 align-items-center">
                            <div class="author-img rounded-circle overflow-hidden">
                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt="">
                            </div>
                            <div>
                                <h5 class="text-white fontM acid-bold lh-1 opacity-50">
                                    <?php echo $select_category; ?>
                                </h5>
                                <h6 class="text-white fontM acid-bold lh-1 mt-2">
                                    <?php echo $ntitle; ?>
                                </h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="dmt-135 tmt-40"></div>
            <div class="col-lg-9 px-lg-4 mx-auto">
                <div class="video-archive overflow-hidden radiusX  card-hover-new">
                    <div class="videoHide position-relative overflow-hidden radiusX h-100">
                        <div class="h-100 cursor-pointer videoPlay">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                class="w-100 h-100 object-cover hover-img" alt="">
                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/case-layer.svg"
                                class="position-absolute bottom-0 start-0 w-100" alt="">
                            <div
                                class="position-absolute bottom-0 start-0 w-100 d-flex tmb-10 align-items-center p-4 card-inner-content">
                                <button class="bg-transparent p-0 border-0 transition">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/play.svg" alt="">
                                </button>
                                <h5 class="ms-3 acid-bold fontL textlightwhite lh-1">
                                    <?php echo $time; ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="videoPlayer d-none h-100">
                        <?php echo $video_file; ?>
                    </div>
                </div>
            </div>
            <?php if (have_rows('flexible_content')):
                while (have_rows('flexible_content')):
                    the_row();
                    if (get_row_layout() == 'content'): ?>
                        <div class="col-lg-7 px-lg-1 mx-auto">
                            <h6
                                class="acid-normal text-white fontXX leadingXX resfontL resleadingM opencase-studies-list opencase-studies-main">
                                <?php echo get_sub_field('description'); ?>
                            </h6>
                        </div>

                    <?php elseif (get_row_layout() == 'heading'): ?>
                        <div class="col-lg-7 px-lg-1 mx-auto">
                            <h5 class="text-white acid-bold fontSS lh-1 dmb-35">
                                <?php echo get_sub_field('heading'); ?>
                            </h5>
                        </div>
                    <?php elseif (get_row_layout() == 'image_slider'):
                        $image_slider_items = get_sub_field('items');
                        if (!empty($image_slider_items)):
                            ?>
                            <div class="col-lg-9 px-lg-4 mx-auto">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($image_slider_items as $key => $image_slider_items_custom):
                                            $clss_name = ($key == '0') ? "active" : ""; ?>
                                            <div
                                                class="carousel-item <?php echo $clss_name; ?> video-archive-slider radiusX overflow-hidden">
                                                <img src="<?php echo $image_slider_items_custom['image']['url']; ?>"
                                                    class="w-100 h-100 object-cover radiusX" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div
                                        class="position-absolute p-initial end-0 bottom-0 next-prev-icon mt-lg-0 mt-4 res-w-100 overflow-x-hidden">
                                        <button class="bg-transparent p-0 border-0 rotate-full" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" viewBox="0 0 67 67">
                                                <g id="Group_3952" data-name="Group 3952" transform="translate(-62 -882)">
                                                    <path id="Path_20540" data-name="Path 20540"
                                                        d="M33.5,0A33.5,33.5,0,1,1,0,33.5,33.5,33.5,0,0,1,33.5,0Z"
                                                        transform="translate(62 882)" class="transition"
                                                        fill="rgba(221,224,239,0.22)" />
                                                    <g id="Group_3866" data-name="Group 3866"
                                                        transform="translate(108.131 924.611) rotate(180)">
                                                        <path id="Path_20539" data-name="Path 20539"
                                                            d="M.225,9.638l7.227,8.13a.909.909,0,0,0,1.277.063.94.94,0,0,0,.064-1.277L2.907,9.935H25.295a.9.9,0,1,0,0-1.807H2.907l5.886-6.62A.951.951,0,0,0,8.73.23.915.915,0,0,0,7.453.294L.225,8.424A.93.93,0,0,0,.225,9.638Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="bg-transparent p-0 border-0 d-lg-block  mt-lg-2 ms-lg-0 ms-3" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" viewBox="0 0 67 67">
                                                <g id="Group_3952" data-name="Group 3952" transform="translate(-62 -882)">
                                                    <path id="Path_20540" data-name="Path 20540"
                                                        d="M33.5,0A33.5,33.5,0,1,1,0,33.5,33.5,33.5,0,0,1,33.5,0Z"
                                                        transform="translate(62 882)" class="transition"
                                                        fill="rgba(221,224,239,0.22)" />
                                                    <g id="Group_3866" data-name="Group 3866"
                                                        transform="translate(108.131 924.611) rotate(180)">
                                                        <path id="Path_20539" data-name="Path 20539"
                                                            d="M.225,9.638l7.227,8.13a.909.909,0,0,0,1.277.063.94.94,0,0,0,.064-1.277L2.907,9.935H25.295a.9.9,0,1,0,0-1.807H2.907l5.886-6.62A.951.951,0,0,0,8.73.23.915.915,0,0,0,7.453.294L.225,8.424A.93.93,0,0,0,.225,9.638Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php elseif (get_row_layout() == 'middle_comment'):
                        $middle_comment_content = get_sub_field('content');
                        ?>
                        <div class="col-lg-7 px-lg-1 mx-auto">

                            <div class="border-white border border-start-0 border-end-0 dmb-60 tmt-25 tmb-45">
                                <div class="dpt-50 tpt-40 tpb-40 dpb-50 px-lg-3 d-flex ">
                                    <div class="lh-1">
                                        <h2 class="text-white acid-bold fontLS lh-1">“</h2>
                                    </div>
                                    <div class="ps-lg-5 ps-3">
                                        <p class="acid-bold text-white leadingXM fontSS resfontXS resleadingMM">
                                            <?php echo $middle_comment_content; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php elseif (get_row_layout() == 'button'):
                        $button_link = get_sub_field('link');
                        $button_link_target = ($button_link['target'] == '_blank') ? "_blank" : "";  
                        ?>
                        <div class="col-lg-7 px-lg-1 mx-auto">

                            <a href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link_target; ?>"
                                class="text-white acid-bold d-flex mx-lg-0 mx-auto align-items-center fontXX justify-content-center dmt-50 tmt-30 text-decoration-none bgsecondary radiusX  btnY "
                                Download>
                                <?php echo $button_link['title']; ?>
                            </a>

                        </div>
                    <?php elseif (get_row_layout() == 'spacing'):
                        $desktop = get_sub_field('desktop');
                        $tablet = get_sub_field('tablet');
                        $mobile = get_sub_field('mobile');

                        $desktop_mb = $desktop['margin_bottom'];
                        $desktop_mb_main = (!empty($desktop['margin_bottom'])) ? " dmb-" : "";
                        $tablet_mb = $tablet['margin_bottom'];
                        $tablet_mb_main = (!empty($tablet['margin_bottom'])) ? " tmb-" : "";
                        $mobile_mb = $mobile['margin_bottom'];
                        $mobile_mb_main = (!empty($mobile['margin_bottom'])) ? " mmb-" : "";
                        ?>
                        <div class="spacing <?php echo $desktop_mb_main;
                        echo $desktop_mb;
                        echo $tablet_mb_main;
                        echo $tablet_mb;
                        echo $mobile_mb_main;
                        echo $mobile_mb; ?>"></div>

                        <?php
                    endif;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<div class="dmt-225 tmt-60"></div>
<?php
$casestudies = new WP_Query([
    'post_type' => 'casestudies',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'order' => 'ASC'
]);
?>
<section>
    <div class="container">
        <?php while ($casestudies->have_posts()):
            $casestudies->the_post();
            $id = get_the_ID();
            $ntitle = get_the_title();
            $content = get_the_excerpt();
            $video_file = get_field('video_file', $id);
            $time_main = get_field('time', $id);
            $current = get_the_terms($id, 'case-term');
            ?>
            <div class="row">
                <div class="col-lg-9 pe-lg-1">
                    <div class="pe-lg-5 me-lg-4">
                        <div class="case-study-img radiusX overflow-hidden card-hover-new position-relative card-hover-new">
                            <div class="videoHide position-relative overflow-hidden radiusX h-100">
                                <a href="javascript:void(0)" class="text-decoration-none d-block h-100 videoPlay">
                                    <img src="<?php echo get_the_post_thumbnail_url($id); ?>"
                                        class="w-100 h-100 object-cover hover-img" alt="">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/case-layer.svg"
                                        class="position-absolute bottom-0 start-0 w-100" alt="">
                                    <div
                                        class="position-absolute bottom-0 start-0 w-100 d-flex align-items-center p-4 card-inner-content">
                                        <button class="bg-transparent p-0 border-0 transition">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/play.svg"
                                                alt="">
                                        </button>
                                        <h5 class="ms-3 acid-bold fontL textlightwhite lh-1">
                                            <?php echo $time_main; ?>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                            <div class="videoPlayer d-none h-100">
                                <?php echo $video_file; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pe-lg-4 d-lg-flex tmt-40 flex-column justify-content-center">
                    <label class="bgsecondary radiusEX px-3 py-2 lh-1 fontM acid-normal width-fit-content  text-white">
                        <?php echo $current[0]->name; ?>
                    </label>
                    <h3
                        class="dmt-20 resfontSX resleadingMM pe-lg-0 pe-4 tmt-15 text-white acid-bold textlightwhite fontMS leadingSX">
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
<div class="dmt-180 tmt-60"></div>