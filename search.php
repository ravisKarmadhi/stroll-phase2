<?php
$faq = get_field('faq', 'option');
$s = get_search_query();
$args = array(
    's' => $s,
    'post_type' => array('helpcenter'),
);
$the_query = new WP_Query($args);
$total_results = $the_query->found_posts;
?>

<section class="hero-sections-main help-hero help-search bg-primary tpt-130 tpb-30 radius-bottom-right dpt-150 dpb-95 position-relative overflow-hidden">
    <div class="container z-3 position-relative">
        <div class="row hero-search-content">
            <div class="dmb-25  z-3">
                <a href="<?php echo get_home_url(); ?>/help-center" class="fontX text-white leadingX acid-bold">
                    Go back
                </a>
            </div>
            <h1 class="fontMM leadingSS resfontXXS resleadingXM acid-bold text-white dmb-25">How can we help?
            </h1>
            <div class="d-flex justify-content-between align-items-end tmb-15 dmb-85 z-3">
                <div class="col-12 col-lg-8 col-xl-7 pe-lg-4 input-box d-flex align-items-center justify-content-end">
                    <form action="/" method="get" autocomplete="off" onsubmit="document.location.href = '<?php echo get_home_url(); ?>/?s='+this.s.value+''; return false; " class="w-100">
                        <div class="input-box d-flex align-items-center justify-content-end">
                            <input type="text" name="s" placeholder="Enter a search term…" class="input-help w-100 h-100 bg-white border-lightPrimary text-lightblack radiusS fontXX resfontL leadingS acid-normal border-0" value="<?php echo get_query_var('s'); ?>">
                            <div class="position-absolute pe-2 pe-lg-1">
                                <button type="submit" class="search-icon border-0 bg-transparent">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/help-search-icon.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <h6 class="fontX text-white acid-bold z-3 d-lg-flex d-none"><?php echo $total_results; ?> Results for <span class="acid-normal"> '<?php echo get_query_var('s'); ?>'</span></h6>
            </div>
        </div>
        <?php
        if ($the_query->have_posts()) : ?>
            <div class="row rowM help-content-data">

                <?php
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $id = get_the_ID();
                    $content = get_the_excerpt();
                ?>

                    <div class="col-12 col-lg-6">
                        <div class="border-b-lightPrimary tpt-25 tpb-25 dpt-35 dpb-35">
                            <a href="<?php echo get_permalink($id); ?>" class="d-md-flex justify-content-between align-items-end text-decoration-none">
                                <div>
                                    <h2 class="fontXL leadingM resfontSSX resleadingM acid-bold text-white mmb-20 dmb-10">
                                        <?php the_title(); ?></h2>
                                    <h5 class="fontL leadingS resfontM acid-normal text-white mmb-15"><?php echo $content; ?></h5>
                                </div>
                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/search-right-arrow.svg" alt="">
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        <?php else : ?>
            <h1 class="fontMM leadingSS resfontXXS resleadingXM acid-bold text-white dmb-25">Not Found...
            </h1>
        <?php endif; ?>
    </div>
    <div class="help-search-img position-absolute end-0 top-0 z-2">
        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/help-pattern.svg" alt="">
    </div>
</section>
<!-- FAQ section -->
<div class="dmt-160 tmt-70"></div>
<?php if (!empty($faq['items'])) : ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <h3 class="textlightblack acid-bold lh-1 resfontXXS fontMM"><?php echo $faq['heading']; ?></h3>
                </div>
                <div class="col-lg-10 ps-lg-2 tmt-25">
                    <div class="accordion custom-accordion" id="accordionExample">
                        <?php foreach ($faq['items'] as $key => $faq_items) :
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
<div class="dmt-165 tmt-45"></div>
<?php if (is_search()) { ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('header').removeClass('header-black');
            jQuery('body').addClass('bglightwhite');
        });
    </script>
<?php } ?>