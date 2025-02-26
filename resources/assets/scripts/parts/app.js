import Swiper from 'swiper';

export class App {
  init() {
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
  }
  slickSLider() { }
}
