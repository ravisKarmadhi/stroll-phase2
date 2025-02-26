<?php
/*
 * Template Name: Splash
 */
$logo = get_field('logo');
$content = get_field('content');
$button = get_field('button');
?>

<div class="bgprimary vh-100 vw-100 position-fixed top-0 start-0 splash-screen">
    <div class="position-absolute   wave-genrate">
        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/wave.svg" class="d-lg-block d-none" alt="">
        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/wave-mobile.svg" class="d-lg-none" alt="">
    </div>
    <div class="top-left-center position-absolute w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <?php if (!empty($logo['url'])) : ?>
                        <img src="<?php echo $logo['url']; ?>" class="stroll-logo" alt="">
                    <?php endif; ?>
                    <?php if (!empty($content)) : ?>
                        <h5 class="text-white resfontXS acid-normal fontSL dmt-40 tmt-30 dmb-40 tmb-30 leadingXL resleadingL">
                            <?php echo $content; ?>
                        </h5>
                    <?php endif; ?>
                    <?php if (!empty($button)) : ?>
                        <div class="d-md-flex align-items-center justify-content-center">
                            <?php foreach ($button as $button_custom) : ?>
                                <a href="<?php echo $button_custom['link']['url']; ?>" class="bglightblack visit-site-btn text-white res-w-100 acid-bold text-decoration-none tmt-15 res-w-100 btnX d-flex align-items-center justify-content-center radiusX mx-lg-3">
                                    <img src="<?php echo $button_custom['icon']['url']; ?>" alt="" class="me-2 countryflag-img">
                                    <span>
                                        <?php echo $button_custom['link']['title']; ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>