<?php
$logo = get_field('logo', 'option');
$black_logo = get_field('black_logo', 'option');
$menu_link = get_field('menu_link', 'option');
$login = get_field('login', 'option');
$book_a_demo = get_field('book_a_demo', 'option');
$header = get_field('header');
$clsvalur_header = "";
if ($header == 'white'):
    $clsvalur_header = "";
else:
    $clsvalur_header = "header-black";
endif;
?>
<button class="open-menu-btn rounded-circle p-0 border-0 position-fixed d-lg-none" id="burger-menu">
    <div class="menu-burger text-white h-100 w-100" id="menu-burger">
        <svg id="Component_47_1" data-name="Component 47 – 1" xmlns="http://www.w3.org/2000/svg" width="75" height="76"
            viewBox="0 0 75 76">
            <g id="Group_3877" data-name="Group 3877" transform="translate(17.182 23.605)">
                <rect id="Rectangle_2169" data-name="Rectangle 2169" width="40" height="2"
                    transform="translate(-0.181 0.395)" fill="#fff" />
                <rect id="Rectangle_2170" data-name="Rectangle 2170" width="40" height="2"
                    transform="translate(-0.181 13.395)" fill="#fff" />
                <rect id="Rectangle_2171" data-name="Rectangle 2171" width="40" height="2"
                    transform="translate(-0.181 27.395)" fill="#fff" />
            </g>
        </svg>
    </div>
    <div class="menu-close-btn text-white d-none" id="menu-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="76" viewBox="0 0 75 76">
            <g id="Group_4212" data-name="Group 4212" transform="translate(-278 -706)">
                <rect id="Rectangle_2168" data-name="Rectangle 2168" width="75" height="76" rx="37.5"
                    transform="translate(278 706)" fill="#010141" />
                <rect id="Rectangle_2170" data-name="Rectangle 2170" width="40" height="2"
                    transform="translate(301.15 757.436) rotate(-45)" fill="#fff" />
                <rect id="Rectangle_2340" data-name="Rectangle 2340" width="40" height="2"
                    transform="translate(329.436 758.85) rotate(-135)" fill="#fff" />
            </g>
        </svg>
    </div>
</button>
<div class="mobile-logo d-lg-none position-absolute w-100 d-flex align-items-center justify-content-center">
    <div class="res-logo">
        <a href="<?php echo get_home_url(); ?>" class="text-decoration-none white-logo d-inline-block w-100">
            <img src="<?php echo $logo['url']; ?>" alt="" class="w-100">
        </a>
        <a href="<?php echo get_home_url(); ?>" class="text-decoration-none black-logo w-100 d-none">
            <img src="<?php echo $black_logo['url']; ?>" alt="" class="w-100">
        </a>
    </div>
</div>
<header class="position-fixed radiusX fixed-position <?php echo $clsvalur_header; ?>" >
    <div class="header h-100">
        <div class="container-fluid h-100">
            <div class="header-menu d-flex align-items-center d-lg-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3 col-12 d-lg-block d-none">
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>" class="text-decoration-none white-logo d-inline-block w-100">
                                <img src="<?php echo $logo['url']; ?>" alt="" class="w-100">
                            </a>
                            <a href="<?php echo get_home_url(); ?>" class="text-decoration-none black-logo w-100 d-none">
                                <img src="<?php echo $black_logo['url']; ?>" alt="" class="w-100">
                            </a>
                        </div>
                    </div>
                    <?php if (!empty($menu_link)): ?>
                        <div class="col-lg-6 col-12 d-lg-flex navigation-bar d-none align-items-center justify-content-lg-center">
                            <nav class="position-relative res-w-100" data-aos="fade-down">
                                <ul class="nav-menu list-none ps-0 mb-0 d-flex flex-lg-row flex-column align-items-lg-center align-items-start">
                                    <?php foreach ($menu_link as $menu_link_custom):
                                        $sub_menu = $menu_link_custom['sub_menu'];
                                        if (!empty($sub_menu['sub_link'])):
                                            ?>
                                            <li class="main-menu me-lg-4 res-w-100 tmb-30">
                                                <a href="javascript:void(0)" class="text-decoration-none acid-normal fontL leadingS text-white text-capitalize resfontSL resleadingXM restextlightblack resacid-bold">
                                                    <span class="d-flex align-items-center">
                                                        <?php echo $menu_link_custom['link']['title']; ?>
                                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/dropdown.svg" alt="" class="ms-2 d-lg-block d-none white-arrow-down arrow-down">
                                                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/res-menu-dropdown.svg" alt="" class="ms-2 transition d-lg-none black-arrow-down arrow-down">
                                                    </span>
                                                </a>
                                                <?php
                                                if (!empty($sub_menu['image']['url'])): ?>
                                                    <ul class="sub-menu list-none mb-0 position-absolute radiusL res-w-100 p-initial bggrayNew">
                                                        <li class="d-flex flex-wrap align-items-center tpt-40 tpb-15">
                                                            <div class="col-lg-6 col-12 pe-lg-2">
                                                                <div class="col-lg-11 col-12 me-auto">
                                                                    <span class="acid-bold fontM leadingX textlightblack text-capitalize opacityX d-lg-block dmb-20 w-100 d-none"><?php echo $menu_link_custom['link']['title']; ?></span>
                                                                    <div class="sub-menu-links">
                                                                        <?php foreach ($sub_menu['sub_link'] as $sub_link): ?>
                                                                            <a href="<?php echo $sub_link['link']['url']; ?>" class="text-decoration-none d-flex align-items-center justify-content-between dmb-30 tmb-20 sub-menu-link">
                                                                                <h3 class="acid-bold fontXS leadingX textlightblack text-capitalize">
                                                                                    <?php echo $sub_link['link']['title']; ?></h3>
                                                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/sub-menu-next.svg" alt="" class="menu-icon">
                                                                            </a>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-12 ps-lg-4 tmt-35">
                                                                <div class="menu-banner bggray overflow-hidden ms-lg-1">
                                                                    <img src="<?php echo $sub_menu['image']['url']; ?>" alt="" class="h-100 w-100 object-cover">
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php else: ?>
                                                    <ul class="sub-menu list-none mb-0 position-absolute radiusL res-w-100 p-initial bggrayNew">
                                                        <li class="d-flex align-items-center h-100 justify-content-between tpt-40">
                                                            <div class="col-12">
                                                                <span class="acid-bold fontM leadingX textlightblack text-capitalize opacityX d-lg-block dmb-20 w-100 d-none"><?php echo $menu_link_custom['link']['title']; ?></span>
                                                                <div class="">
                                                                    <div class=" res-w-100 d-lg-flex flex-wrap align-items-center justify-content-between">
                                                                        <?php foreach ($sub_menu['sub_link'] as $sub_link): ?>
                                                                            <a href="<?php echo $sub_link['link']['url']; ?>" class="header-menu-links text-decoration-none d-flex align-items-center justify-content-between dmb-30 header-menu-link">
                                                                                <h3 class="acid-bold fontXS leadingX textlightblack text-capitalize">
                                                                                    <?php echo $sub_link['link']['title']; ?></h3>
                                                                                <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2023/12/sub-menu-next.svg" alt="" class="menu-icon">
                                                                            </a>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php else: ?>
                                            <li class="me-lg-4 res-w-100 tmb-30">
                                                <a href="<?php echo $menu_link_custom['link']['url']; ?>" class="text-decoration-none acid-normal fontL leadingS text-white text-capitalize resfontSL resleadingXM restextlightblack resacid-bold">
                                                    <span class="d-flex align-items-center">
                                                        <?php echo $menu_link_custom['link']['title']; ?>
                                                    </span>
                                                </a>
                                            </li>
                                    <?php endif;
                                    endforeach;
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-3 col-12 d-lg-block d-none header-btn-main">
                        <div class="header-btn d-flex flex-lg-row flex-column align-items-lg-center justify-content-lg-end">
                            <?php if (!empty($login['url'])): ?>
                                <a href="<?php echo $login['url']; ?>" target="<?php echo $login['target']; ?>" class="text-decoration-none login-btn acid-normal fontL leadingS text-white text-capitalize me-lg-3 res-w-100 resfontSL resleadingXM restextlightblack resacid-bold  mmb-50">
                                    <?php echo $login['title']; ?>
                                </a>
                            <?php endif; ?>

                            <?php if (get_the_title() == 'For Patients'): ?>

                                    <a href="/find-clinic" class="text-decoration-none d-inline-block demo-btn acid-normal fontL leadingS text-white text-capitalize border border-white rounded-pill d-flex align-items-center justify-content-center res-btnY mmb-50">
                                        Find A Clinic
                                    </a>

                            <?php else: ?>

                                <?php if (!empty($book_a_demo['url'])): ?>
                                    <a href="<?php echo $book_a_demo['url']; ?>" class="text-decoration-none d-inline-block demo-btn acid-normal fontL leadingS text-white text-capitalize border border-white rounded-pill d-flex align-items-center justify-content-center res-btnY mmb-50">
                                        <?php echo $book_a_demo['title']; ?>
                                    </a>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>