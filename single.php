<?php
$people_and_company_links = get_field('people_and_company_links');
$flexible_content = get_field('flexible_content');
$time = get_field('time');
$video_file = get_field('video_file');
$time = get_field('time', $id);
$current = get_the_terms($id, 'category');
?>
<div class="dpt-185 tpt-145"></div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 px-lg-1 mx-auto">
                <p class="acid-bold textsecondary lh-1 fontM dmb-20"><?php echo $current[0]->name ?></p>
                <h2 class="acid-bold textlightblack fontML leadingSX pe-lg-5 me-lg-5 resfontXXS resleadingMS"><?php the_title(); ?>
                </h2>

                <h5 class="textlightblack fontM dmt-30 tmt-25 lh-1 acid-normal">
                    <span class="acid-bold"><?php echo $time; ?> -</span>
                    <?php echo get_the_date('j M, Y'); ?>
                </h5>
                <div class="row dmt-40">
                    <?php foreach ($people_and_company_links as $people_and_company_links_custom) :
                        $id = $people_and_company_links_custom->ID;
                        $ntitle = $people_and_company_links_custom->post_title;
                        $select_category = get_field('select_category', $id);
                    ?>
                        <div class="author-details col-lg-5 tmb-20 d-flex align-items-center">
                            <div class="author-img rounded-circle overflow-hidden">
                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt="">
                            </div>
                            <div>
                                <h5 class="textlightblack fontM acid-bold lh-1 opacity-50"><?php echo $select_category; ?> </h5>
                                <h6 class="textlightblack fontM acid-bold lh-1 mt-2"><?php echo $ntitle; ?></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="dmt-70 tmt-40"></div>
            <div class="col-lg-9 px-lg-4 mx-auto">
                <div class="blog-archive-img overflow-hidden radiusX position-relative  card-hover-new">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-100 h-100 object-cover hover-img" alt="">
                </div>
            </div>
            <div class="dmt-35"></div>

            <div class="col-lg-7 px-lg-1 mx-auto">
                <?php if (have_rows('flexible_content')) :
                    while (have_rows('flexible_content')) : the_row();
                        if (get_row_layout() == 'heading') : ?>
                            <h4 class="acid-bold fontSS textlightblack leadingXM dmt-25 resfontXS resleadingMM tmb-70"><?php echo get_sub_field('heading'); ?></h4>
                        <?php elseif (get_row_layout() == 'content') : ?>
                            <h6 class="acid-normal textlightblack fontXX leadingXX resfontL resleadingM dmt-30">
                                <?php echo get_sub_field('description'); ?>
                            </h6>
                        <?php elseif (get_row_layout() == 'spacing') :
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
                        <?php elseif (get_row_layout() == 'middle_comment') :
                            $middle_comment_content = get_sub_field('content');
                        ?>
                            <div class="border-primary border border-start-0 border-end-0 dmb-60">
                                <div class="dpt-50 tpt-40 tpb-40 dpb-50 px-lg-3 d-flex ">
                                    <div class="lh-1">
                                        <h2 class="textprimary acid-bold fontLS lh-1">“</h2>
                                    </div>
                                    <div class="ps-lg-5 ps-3">
                                        <p class="acid-bold textprimary leadingXM fontSS resfontXS resleadingMM">
                                            <?php echo $middle_comment_content; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php elseif (get_row_layout() == 'button') :
                            $button_link = get_sub_field('link');
                            $button_link_target = ($button_link['target'] == '_blank') ? "_blank" : "";  
                        ?>
                            <a href="<?php echo $button_link['url']; ?>" target="<?php echo  $button_link_target; ?>" class="text-white acid-bold d-flex mx-lg-0 mx-auto align-items-center fontXX justify-content-center dmt-50 text-decoration-none bgprimary radiusX  btnY" Download><?php echo $button_link['title']; ?></a>
                <?php
                        endif;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
</section>
<?php
$casestudies = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'order' => 'ASC'
]);
?>

<div class="dmt-180 tmt-100"></div>
<section class="blog-section ">
    <div class="container">
        <?php while ($casestudies->have_posts()) : $casestudies->the_post();
            $id       = get_the_ID();
            $ntitle   = get_the_title();
            $content  = get_the_excerpt();
            $video_file = get_field('video_file', $id);
            $time_main = get_field('time', $id);
            $current = get_the_terms($id, 'category');
        ?>
            <div class="row">
                <div class="col-12">
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
                                        <span class="acid-bold"><?php echo $time_main; ?> -</span>
                                        <?php echo get_the_date('j M, Y'); ?>
                                    </h5>
                                </div>

                                <div class="author-detail-blog d-flex align-items-center justify-content-between tmt-25">

                                    <?php

                                    $i = 0; 

                                    $people_and_company_links = get_field( 'people_and_company_links', $id );
                                    if ( $people_and_company_links ) :
                                        $post = $people_and_company_links;

                                        foreach( $people_and_company_links as $post ): 

                                            setup_postdata( $post ); 
                                            ?>

                                            <?php if ($i == 0) : ?>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle aurthor-details-img">
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-100 h-100 object-cover" alt="">
                                                </div>
                                                <div class="ps-3 ms-1">
                                                    <h5 class="textlightblack fontM lh-1 acid-bold opacity-50"><?php the_field('select_category'); ?></h5>
                                                    <h5 class="textlightblack fontM lh-1 acid-bold mt-2"><?php the_title(); ?></h5>
                                                </div>
                                            </div>
                                            <label class="bglightwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack">Featured</label>

                                            <?php endif; ?>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        
                                    <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>
<div class="dmt-110 tmt-15"></div>