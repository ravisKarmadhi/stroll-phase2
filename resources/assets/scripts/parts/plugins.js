export class Plugins {
    init() {
        this.LogoSlider();
        this.CategorySlider();
        this.VideoSlider();
        this.WhyChooseSlider();
        this.TestimonialSlider();
        this.LeftRightSlider();
    }


    LogoSlider() {
        jQuery(document).ready(function ($) {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".companyLogoSwiper", {
                    slidesPerView: 5,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1200: {
                            slidesPerView: 5,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 0,
                        },
                        575: {
                            slidesPerView: 3,
                            spaceBetween: 0,
                        },
                        0: {
                            slidesPerView: 2,
                            spaceBetween: -30,
                            centeredSlides: true,
                        }
                    }
                });
            }
        });
    }

    CategorySlider() {
        $(document).ready(function () {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".categorySwiper", {
                    slidesPerView: 3,
                    spaceBetween: 25,
                    breakpoints: {
                        1200: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        0: {
                            slidesPerView: 1.2,
                            spaceBetween: 16,
                        }
                    }
                });
            }
        });
    }

    VideoSlider() {
        $(document).ready(function () {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".videoSwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    breakpoints: {
                        1200: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        0: {
                            slidesPerView: 1.2,
                            spaceBetween: 16,
                        }
                    }

                });
            }
        });
    }

    WhyChooseSlider() {
        $(document).ready(function () {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".whyChooseSwiper", {
                    slidesPerView: 3,
                    spaceBetween: 130,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        1200: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 2
                        },
                        0: {
                            slidesPerView: 1.2,
                            spaceBetween: 60
                        }
                    }
                });
            }
        });
    }

    TestimonialSlider() {
        $(document).ready(function () {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".testtimonialSwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    breakpoints: {
                        1200: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 2
                        },
                        0: {
                            slidesPerView: 1.2,
                            spaceBetween: 8
                        }
                    }
                });
            }
        });
    }

    LeftRightSlider() {
        $(document).ready(function () {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".left-right-slider", {
                    direction: "vertical",
                    pagination: {
                        el: ".left-right-slider-section .swiper-pagination",
                        clickable: true,
                    },
                });
            }
        });
    }
}
