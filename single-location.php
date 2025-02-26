<?php
$ntitle   = get_the_title();
$post_excerpt = get_the_excerpt();
$miles = get_field('miles');
$address_detail = get_field('address_detail');
$logo_main = get_field('logo_main');
$left_side_image = get_field('left_side_image');
$description = get_field('description');
$get_in_touch_button = get_field('get_in_touch_button');
$coordinate = get_field('coordinate');
?>

<div class="dpt-130"></div>
<section class="position-relative ">
    <div class="container px-p-0">
        <div class="row">
            <div class="col-lg-6 d-lg-block d-none order-lg-1 order-2 position-relative p-initial start-0 top-0">
                <a href="<?php echo get_home_url(); ?>/find-clinic/" class="position-absolute top-0 start-0 ms-4 mt-4 filter-inver d-lg-block d-none transition">
                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/back-clinic.svg" alt="">
                </a>
                <?php if (!empty($left_side_image['url'])) : ?>
                    <div class="open-clinic-img overflow-hidden radiusX">
                        <img src="<?php echo $left_side_image['url']; ?>" class="w-100 h-100 object-cover" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 order-lg-2 order-1 ms-auto me-lg-4 px-p-p clinic-open-img">
                <?php if (!empty($logo_main['url'])) : ?>
                    <div class="">
                        <img src="<?php echo $logo_main['url']; ?>" class="" alt="">
                    </div>
                <?php endif; ?>
                <div class="dmt-35 content-single-location">
                    <h5 class="acid-bold textlightblack fontXL lh-1 dmb-25 tmb-30 resfontXXS resleadingMS">
                        <?php echo $ntitle; ?>
                    </h5>
                    <?php if (!empty($description)) : ?>
                        <p class="acid-normal textlightblack leadingXX resfontL resleadingM fontXX"><?php echo $description; ?>
                        </p>
                    <?php endif; ?>
                    <p class="acid-normal textlightblack leadingXX resfontL resleadingM fontXX dmt-40 tmt-30">
                        <span class="acid-bold">Directions:</span> <?php echo $address_detail['address'] ?>,<?php echo $address_detail['town'] ?>, <?php echo $address_detail['zip_code'] ?>
                    </p>
                    <?php if (!empty($get_in_touch_button['url'])) :
                    $bget_in_touch_button_target = ($button_link['target'] == '_blank') ? "_blank" : "";      
                    ?>
                        <a href="<?php echo $get_in_touch_button['url']; ?>" target="<?php echo $bget_in_touch_button_target; ?>" class="text-white acid-bold d-flex align-items-center justify-content-center fontXX text-decoration-none bgsecondary radiusX dmt-40 tmt-30 btnY "><?php echo $get_in_touch_button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="dmt-230 tmt-100 mmt-55"></div>