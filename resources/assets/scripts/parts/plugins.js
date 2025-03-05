export class Plugins {
    init() {
        this.LogoSlider();
        this.CategorySlider();
        this.VideoSlider();
        this.WhyChooseSlider();
        this.TestimonialSlider();
        this.LeftRightSlider();
        this.OurCaseStudies();
        this.OurCaseInnerSlider();
        this.ImgSlider();
    }

    OurCaseStudies() {
        // var caseSlider = new Swiper('.our-case-slider', {
        //     direction: 'vertical',
        //     slidesPerView: 3,
        //     slidesPerGroup: 1,
        //     spaceBetween: 0,
        //     loop: true,
        //     autoplay: {
        //         delay: 10000,
        //         disableOnInteraction: false,
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        //     mousewheel: true,
        // });

        // function syncCaseStudies(index) {
        //     // Remove active classes from all elements
        //     document.querySelectorAll('.our-case-right-cards').forEach(el => el.classList.remove('active'));
        //     document.querySelectorAll('.our-case-studies-cards').forEach(card => card.style.display = 'none');
        //     document.querySelectorAll('.our-case-slider .swiper-slide').forEach(slide => slide.classList.remove('swiper-slide-active'));

        //     let activeRightCard = document.querySelectorAll('.our-case-right-cards')[index];
        //     let activeLeftCard = document.querySelectorAll('.our-case-studies-cards')[index];

        //     if (activeRightCard) activeRightCard.classList.add('active');
        //     if (activeLeftCard) activeLeftCard.style.display = 'block';

        //     // Find the correct swiper slide & mark it active
        //     let activeSlide = document.querySelector('.our-case-slider .swiper-slide:nth-child(' + (index + 1) + ')');
        //     if (activeSlide) activeSlide.classList.add('swiper-slide-active');
        // }

        // // Swiper event listener for slide change
        // caseSlider.on('slideChange', function () {
        //     let currentIndex = caseSlider.realIndex;
        //     syncCaseStudies(currentIndex);
        // });

        // // Click event on right-side cards
        // document.querySelectorAll('.our-case-right-cards').forEach((slide, index) => {
        //     slide.addEventListener('click', function () {
        //         caseSlider.slideToLoop(index);
        //         syncCaseStudies(index);
        //     });
        // });

        // // Initial setup
        // syncCaseStudies(0);

        jQuery(document).ready(function ($) {
            // Инициализация превью слайдера
            let sliderThumbs = new Swiper('.our_slider_thumbs .our_swiper-container', {
                direction: 'vertical',
                slidesPerView: 1,
                spaceBetween: 32,
                navigation: {
                    nextEl: '.slider__next',
                    prevEl: '.slider__prev'
                },
                freeMode: true,
                breakpoints: {
                    0: {
                        direction: 'horizontal',
                    },
                    768: {
                        direction: 'vertical',
                    }
                }
            });

            // Инициализация слайдера изображений
            let sliderImages = new Swiper('.our-slider__images .our_swiper-container', {
                direction: 'vertical',
                slidesPerView: 3,
                spaceBetween: 24,
                mousewheel: true,
                navigation: {
                    nextEl: '.slider__next',
                    prevEl: '.slider__prev'
                },
                grabCursor: true,
                thumbs: {
                    swiper: sliderThumbs
                },
                breakpoints: {
                    0: {
                        direction: 'horizontal',
                    },
                    768: {
                        direction: 'vertical',
                    }
                }
            });
        });

    }

    OurCaseInnerSlider() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            draggable: true,
        });
    }

    ImgSlider() {
        var swiper = new Swiper(".img-slider", {
            slidesPerView: 4, // Default for large screens
            spaceBetween: 30,
            loop: true,
            a11y: false,
            freeMode: true,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            allowTouchMove: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1, // Mobile screens
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 2, // Tablets
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 4, // Default for desktops
                    spaceBetween: 30
                }
            },
            on: {
                init: function () {
                    document.querySelector('.swiper-wrapper').style.transitionTimingFunction = 'linear';
                }
            }
        });
    }

    LogoSlider() {
        jQuery(document).ready(function ($) {
            if (typeof Swiper !== "undefined") {
                var swiper = new Swiper(".companyLogoSwiper", {
                    slidesPerView: 5,
                    spaceBetween: 30,
                    loop: true,
                    speed: 3000, // Continuous speed like img-slider
                    autoplay: {
                        delay: 0, // No delay, continuous scrolling
                        disableOnInteraction: false,
                    },
                    allowTouchMove: false, // Disable manual dragging
                    freeMode: true, // Free-flowing effect
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
                    },
                    on: {
                        init: function () {
                            document.querySelector('.companyLogoSwiper .swiper-wrapper').style.transitionTimingFunction = 'linear';
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
                    mousewheel: {
                        releaseOnEdges: true,
                        sensitivity: 0.5, // Kam sensitivity takki smooth scroll ho
                    },
                    freeMode: {
                        enabled: true, // Free scrolling ko enable karega
                        momentum: true, // Smooth momentum effect ke liye
                        momentumBounce: false, // Extra bounce effect remove karega
                    },
                    pagination: {
                        el: ".left-right-slider-section .swiper-pagination",
                        clickable: true,
                    },
                    breakpoints: {
                        769: {
                            direction: "vertical",
                        },
                        0: {
                            direction: "horizontal",
                        },
                    },
                });
            }
        });

    }
}
