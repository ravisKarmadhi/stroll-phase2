<?php
$main_content = get_field('main_content');
?>
<section class="medical-trial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 fixed-menu overflow-visible">
                <div class="menu-links position-sticky">
                    <h5 class="fontX leadingX acid-bold tpt-125 tpb-25 dpb-35 textlightblack"><span class="opacity-50">Help
                            centre ></span>
                        <?php the_title(); ?>
                    </h5>
                    <nav class="menu h-100 d-none d-lg-flex bg-white radiusX flex-column justify-content-between dpt-25 tpb-60">
                        <ul class="menu--sidebar medical-menu list-none d-inline-block">
                            <?php foreach ($main_content as $key => $main_content_custom) :
                                $clssname = ($key == '0') ? "active" : "";
                            ?>
                                <li class="list-none tpt-15 tpb-15 dpt-10 dpb-10 <?php echo $clssname; ?>">
                                    <a href="#center<?php echo $key; ?>" class="text-decoration-none fontL leadingX acid-normal textlightblack d-block" id="accordionTrigger" data-section-index="<?php echo $key; ?>">
                                        <?php echo $main_content_custom['heading']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="dpb-20 share-btn d-none d-lg-flex">
                            <h5 class="fontX leadingXS acid-bold textlightblack me-3">Share this post</h5>
                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/share-icon-new.svg" alt="">

                            <?php echo do_shortcode('[ssba-buttons]'); ?>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="accordion medical-trial-accordion d-lg-none d-block tmb-30" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button shadow-none radiusES acid-normal fontL leadingX collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Intro
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body" id="accordionBody">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ps-xl-5 medical-trial-content ms-auto ms-xl-0">
                <?php foreach ($main_content as $key => $main_content_custom) :
                    $clss = ($key == "0") ? " ms-lg-3 pe-xl-5 dpb-40" : "";
                ?>
                    <div id="center<?php echo $key; ?>" class="section--anchor medical-content <?php echo $clss; ?>" data-section-index="<?php echo $key; ?>">
                        <?php foreach ($main_content_custom['flexible_content'] as $flexible_content) :
                            if ($flexible_content['acf_fc_layout'] == 'prefix') :
                        ?>
                                <label class="bgoffwhite radiusEX px-3 py-2 lh-1 fontX acid-normal textlightblack tmb-15 dmb-10">
                                    <?php echo $flexible_content['prefix']; ?>
                                </label>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'heading') : ?>
                                <h1 class="col-7 col-md-12 fontML leadingSM resfontXXS resleadingXM textlightblack acid-bold tmb-35 dmb-40">
                                    <?php echo $flexible_content['heading']; ?>
                                </h1>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'description') : ?>
                                <div class="dpb-40 tpb-0">
                                    <h5 class="fontXX leadingXX resfontL resleadingM textlightblack acid-normal dmb-30">
                                        <?php echo $flexible_content['description']; ?>
                                    </h5>
                                </div>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'small_heading') : ?>
                                <h4 class="fontSS leadingXM acid-bold textlightblack tmb-40 dmb-35">
                                    <?php echo $flexible_content['small_heading']; ?>
                                </h4>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'sub_heading') : ?>
                                <h1 class="fontMX leadingSX resfontSM resleadingXM acid-bold textlightblack tmb-30 dmb-25 tmt-65 resfontSM">
                                    <?php echo $flexible_content['sub_heading']; ?>
                                </h1>
                                <?php elseif ($flexible_content['acf_fc_layout'] == 'order_list') :
                                $list = $flexible_content['items'];
                                if (!empty($list)) :
                                ?>
                                    <ul class="ps-0 mb-0 ms-3 me-3 textlightblack">
                                        <?php foreach ($list as $list_custom) : ?>
                                            <li class="dmb-20 fontXX leadingXX resfontL resleadingM acid-normal">
                                                <?php echo $list_custom['list']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="border-offwhite border-top-0 border-start-0 border-end-0 d-lg-block d-none dmt-65 dmb-60">
                                    </div>

                                <?php endif; ?>

                            <?php elseif ($flexible_content['acf_fc_layout'] == 'button') : ?>
                                <a href="<?php echo $flexible_content['pdf']['url']; ?>" download class="bgprimary text-white acid-bold text-decoration-none btnY d-flex align-items-center justify-content-center fontXX radiusX">Download
                                    PDF</a>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'image') : ?>
                                <div class="help-how-img dmb-85 d-none d-lg-block">
                                    <img src="<?php echo $flexible_content['image']['url']; ?>" alt="" class="w-100 h-100 object-cover radiusX">
                                </div>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'download') : ?>
                                <a href="<?php echo $flexible_content['file']['url']; ?>" download class="text-decoration-none">
                                    <div class="download-data bg-white radiusES d-flex justify-content-between dmb-15">
                                        <h4 class="fontXX leadingM acid-bold textlightblack text-decoration-none">
                                            <?php echo $flexible_content['heading']; ?>
                                        </h4>
                                        <div class="download-icon ">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/download.svg" alt="" class="w-100 h-100 object-cover">
                                        </div>
                                    </div>
                                </a>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'statistics') : ?>
                                <div class="static-img h-100 bgprimary radiusX">
                                    <div class="position-relative h-100">
                                        <div class="static-data h-100 d-flex flex-column justify-content-between">
                                            <div class="z-3">
                                                <label class="bg-white resbgsecondary restextwhite radiusEX px-4 py-2 lh-1 fontX acid-normal textlightblack">
                                                    <?php echo $flexible_content['prefix']; ?>
                                                </label>
                                            </div>
                                            <div class="z-3">
                                                <h1 class="fontLM leadingMX resfontLS acid-bold text-white tmb-5 dmb-20">
                                                    <?php echo $flexible_content['heading']; ?>
                                                </h1>
                                                <h5 class="fontSS leadingXM acid-normal text-white">
                                                    <?php echo $flexible_content['content']; ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-0 end-0 z-2 d-lg-block d-none">
                                            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/static-pattern.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'middle_line') : ?>
                            <?php elseif ($flexible_content['acf_fc_layout'] == 'spacing') :
                                $desktop = $flexible_content['desktop'];
                                $tablet = $flexible_content['tablet'];
                                $mobile = $flexible_content['mobile'];

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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<div class="spacing tmb-90 dmb-160"></div>
<?php
$helpcenter = new WP_Query([
    'post_type' => 'helpcenter',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'order' => 'ASC'
]);
?>
<section class="bgprimary dpt-85 mpt-50 radius-top resradiusX-top related-post-section position-relative">
    <div class="related-pattern d-lg-block d-none">
        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/related-pattern.svg" alt="" class="position-absolute">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4  pe-lg-4">
                <h5 class="fontMM acid-bold text-white resfontXXS tmb-55">Related Posts</h5>
            </div>
            <div class="col-lg-8 ps-lg-4 z-3 tpb-40">
                <?php while ($helpcenter->have_posts()) :
                    $helpcenter->the_post();
                    $id = get_the_ID();
                    $ntitle = get_the_title();
                    $content = get_the_excerpt();
                ?>
                    <div class="related-item d-lg-flex justify-content-between align-items-center border-b-offwhite dpb-35 dpt-35 mpb-25  mpt-25 ms-lg-2">
                        <div>
                            <h3 class="acid-bold text-white fontSS dmb-10 resfontSSX">
                                <?php echo $ntitle; ?>
                            </h3>
                            <h5 class="acid-normal text-white fontXX resfontL resleadingXX">
                                <?php echo $content; ?>
                            </h5>
                        </div>
                        <div>
                            <a href="<?php echo get_permalink($id); ?>" class="text-decoration-none filter-inver transition tmt-20 d-block">
                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/transparent-arrow.svg" class="w-100 h-100" alt="">
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="spacing tpb-10 dpb-230"></div>
</section>