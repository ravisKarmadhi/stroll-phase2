
export class Plugins {
	init() {
		this.LogoSlider();
		this.CategorySlider();
		this.VideoSlider();
		this.WhyChooseSlider();
		this.TestimonialSlider();
		this.LeftRightSlider();
		// this.OurCaseStudies();
		this.OurCaseInnerSlider();
		this.ImgSlider();
	}

	OurCaseStudies() {
		var caseSlider = new Swiper(".our-case-slider", {
			direction: "vertical",
			slidesPerView: 3,
			spaceBetween: 0,
			loop: true,
			slideToClickedSlide: true,
			autoplay: {
				delay: 10000, // 10 sec delay
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			mousewheel: true,
		});

		function syncSlides() {
			let activeSlide = document.querySelector(".our-case-slider .swiper-slide-active");
			if (!activeSlide) return;
			let activeId = activeSlide.getAttribute("data-id");
			document.querySelectorAll(".our-case-studies-cards").forEach((card) => {
				card.style.display = "none";
			});
			let matchedCard = document.querySelector(`.our-case-studies-cards[data-id="${activeId}"]`);
			if (matchedCard) {
				matchedCard.style.display = "block";
			}
		}

		caseSlider.on("slideChangeTransitionEnd", syncSlides);

		syncSlides();
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
					spaceBetween: 10,
				},
				768: {
					slidesPerView: 2, // Tablets
					spaceBetween: 20,
				},
				1024: {
					slidesPerView: 4, // Default for desktops
					spaceBetween: 30,
				},
			},
			on: {
				init: function () {
					document.querySelector(".swiper-wrapper").style.transitionTimingFunction = "linear";
				},
			},
		});
	}

	LogoSlider() {
		jQuery(document).ready(function ($) {
			// if (typeof Swiper !== "undefined") {
			// 	var swiper = new Swiper(".companyLogoSwiper", {
			// 		slidesPerView: 8,
			// 		spaceBetween: 30,
			// 		loop: true,
			// 		autoplay: {
			// 			delay: 3000,
			// 			disableOnInteraction: false,
			// 		},
			// 		breakpoints: {
			// 			1200: {
			// 				slidesPerView: 5,
			// 			},
			// 			992: {
			// 				slidesPerView: 4,
			// 				spaceBetween: 0,
			// 			},
			// 			575: {
			// 				slidesPerView: 3,
			// 				spaceBetween: 0,
			// 			},
			// 			0: {
			// 				slidesPerView: 2,
			// 				spaceBetween: -30,
			// 				centeredSlides: true,
			// 			},
			// 		},
			// 	});
			// }

		
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
						},
					},
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
						},
					},
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
							slidesPerView: 3,
						},
						992: {
							slidesPerView: 2,
						},
						0: {
							slidesPerView: 1.2,
							spaceBetween: 60,
						},
					},
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
							slidesPerView: 3,
						},
						992: {
							slidesPerView: 2,
						},
						0: {
							slidesPerView: 1.2,
							spaceBetween: 8,
						},
					},
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
