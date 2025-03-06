import $ from "jquery";
import "@popperjs/core";
import "bootstrap/dist/js/bootstrap";
import "select2/dist/js/select2.js";
import "../../node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min";
import Aos from "aos";
import "slick-carousel";

import { App } from "./parts/app.js";
import { Plugins } from "./parts/plugins.js";
import { Parts } from "./parts/parts.js";
import { HandlebarsFilter } from "./parts/handlebar.js";

// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;

$(function () {
	window.windowWidth = $(window).width();
	window.windowHeight = $(window).height();

	window.isiPhone = navigator.userAgent.toLowerCase().indexOf("iphone");
	window.isiPad = navigator.userAgent.toLowerCase().indexOf("ipad");
	window.isiPod = navigator.userAgent.toLowerCase().indexOf("ipod");

	//Functions List Below

	window.app = new App();
	window.app.init();

	window.plugins = new Plugins();
	window.plugins.init();

	window.parts = new Parts();
	window.parts.init();
	window.handlebar = new HandlebarsFilter();
	window.handlebar.init();
});

// ===========================================================================

$(document).ready(function () {
	Aos.init({
		once: true,
		duration: 900,
	});

	$(".filter-button").click(function () {
		var value = $(this).attr("data-filter");
		if (value == "all") {
			$(".filter").show("500");
		} else {
			$(".filter")
				.not("." + value)
				.hide("1000");
			$(".filter")
				.filter("." + value)
				.show("1000");
		}
	});
	// color toggle
	$(".filter-button").click(function () {
		$(this).toggleClass("active").siblings().removeClass("active");
	});
});
// ============================ header fixed ============================
$(window).scroll(function () {
	var sticky = $("header"),
		scroll = $(window).scrollTop();
	if (scroll >= 50) {
		sticky.addClass("header-fixed");
		sticky.removeClass("header-fixed-os");
	} else {
		sticky.removeClass("header-fixed");
		sticky.addClass("header-fixed-os");
	}
});
$(document).ready(function () {
	var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
	$(window).scroll(function () {
		var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
		if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
			$("header").removeClass("hidden");
		} else {
			$("header").addClass("hidden");
		}
		prevScrollPos = currentScrollPos;
	});
});

// ============================ header sub-menu ============================
// lg up header js
$(document).ready(function () {
	// $(document).ready(function () {
	// 	$(".nav-menu .main-menu").click(function (e) {
	// 		e.stopPropagation();
	// 		$(".nav-menu .main-menu").removeClass("active");
	// 		$("ul.sub-menu").slideUp();

	// 		$(this).addClass("active");
	// 		$(this)
	// 			.children("ul.sub-menu")
	// 			.slideDown(function () {
	// 				if ($("ul.sub-menu:visible").length > 0) {
	//                     console.log("first-----rrrrrrrr---");
	// 					$("ul.sub-menu").css("height", "auto");
	// 					$(".header-menu").addClass("nav-active");
	// 					$(this).addClass("heaaa-active");
	// 				} else {
	//                     console.log("first-----dddd---");
	// 					$(".header-menu").removeClass("nav-active");
	// 				}
	// 			});
	// 		handleWindowResizeDeskSize();
	// 	});

	// 	$(document).click(function (e) {
	// 		if (!$(e.target).closest(".nav-menu").length) {
	// 			$(".nav-menu .main-menu").removeClass("active");
	// 			$("ul.sub-menu").slideUp(function () {
	// 				$(".header-menu").removeClass("nav-active");
	// 			});
	// 		}
	// 	});

	// 	$(".nav-menu ul.sub-menu").click(function (e) {
	// 		e.stopPropagation();
	// 	});

	// 	function handleWindowResizeDeskSize() {
	// 		var windowWidth = $(window).width();
	// 		if (windowWidth >= 992) {
	// 			if ($("ul.sub-menu:visible").length > 0) {
	// 				$("body").addClass("body-active");
	// 				$("html").addClass("overflow-hidden");
	// 				$(".header-menu").addClass("nav-active");
	// 			} else {
	// 				$("body").removeClass("body-active");
	// 				$("html").removeClass("overflow-hidden");
	// 				$(".header-menu").removeClass("nav-active");
	// 			}
	// 		}
	// 	}

	// 	$(window).resize(handleWindowResizeDeskSize);
	// 	handleWindowResizeDeskSize(); // Run once on page load
	// });

	$(document).ready(function () {
		$(".nav-menu .main-menu").click(function (e) {
            e.stopImmediatePropagation();  

			if ($(this).hasClass("active")) {
                console.log("first-------------");
				$(".nav-menu .main-menu").removeClass("active");
				$("ul.sub-menu").slideUp();
				$(".header-menu").removeClass("nav-active");
				$("body").removeClass("body-active");
				$("html").removeClass("overflow-hidden");
			} else {
                console.log("second-------------");
				$(".nav-menu .main-menu").removeClass("active");
				$("ul.sub-menu").slideUp();

				$(this).addClass("active");
				$(this).find("ul.sub-menu").slideDown().css("height", "auto"); 
				$(".header-menu").addClass("nav-active");
				$("body").addClass("body-active");
				$("html").addClass("overflow-hidden");
			}
  
		});

		$(document).click(function (e) {
			if (!$(e.target).closest(".nav-menu").length) {
				$(".nav-menu .main-menu").removeClass("active");
				$("ul.sub-menu").slideUp(function () {
					$(".header-menu").removeClass("nav-active");
				});
			}
		});

		$(".nav-menu ul.sub-menu").click(function (e) {
			e.stopPropagation();
		});

		// function handleWindowResizeDeskSize() {
		// 	var windowWidth = $(window).width();
		// 	if (windowWidth >= 992) {
		// 		if ($("ul.sub-menu:visible").length > 0) {
		// 			$("body").addClass("body-active");
		// 			$("html").addClass("overflow-hidden");
		// 			$(".header-menu").addClass("nav-active");
		// 		} else {
		// 			$("body").removeClass("body-active");
		// 			$("html").removeClass("overflow-hidden");
		// 			$(".header-menu").removeClass("nav-active");
		// 		}
		// 	}
		// }

		// $(window).resize(handleWindowResizeDeskSize);
		// handleWindowResizeDeskSize(); // Run once on page load
	});

	$(document).ready(function () {
		function handleWindowResizeDeskSize() {
			var windowWidth = $(window).width();
			if (windowWidth >= 992) {
				$(document).on("click", function (e) {
					if (!$(e.target).closest(".nav-menu").length) {
						$(".nav-menu .main-menu").removeClass("active");

						// Use callback function to check visibility after slideUp animation
						$("ul.sub-menu").slideUp(function () {
							if ($("ul.sub-menu:visible").length === 0) {
								$("body").removeClass("body-active");
								$("html").removeClass("overflow-hidden");
								$(".main-menu").removeClass("active");
								$(".header-menu").removeClass("nav-active");
							}
						});
					}
				});
			}
		}
		handleWindowResizeDeskSize();
		$(window).resize(handleWindowResizeDeskSize);
	});
	$(document).on("click", function (e) {
		if (!$(e.target).closest(".nav-menu").length) {
			$(".nav-menu .main-menu").removeClass("active");

			// Use callback function to check visibility after slideUp animation
			$("ul.sub-menu").slideUp(function () {
				if ($("ul.sub-menu:visible").length === 0) {
					$(".main-menu").removeClass("active");
					$(".header-menu").removeClass("nav-active");
				}
			});
		}
	});

	// Prevent sub-menu click from triggering the body click event
	$(".nav-menu ul.sub-menu").click(function (e) {
		e.stopPropagation();
	});
});

$(document).ready(function () {
	function handleWindowResizeDeskSize() {
		var windowWidth = $(window).width();
		if (windowWidth >= 992) {
			if ($("header").hasClass("header-black")) {
				$(".white-logo").addClass("d-none").removeClass("d-inline-block");
				$(".black-logo").removeClass("d-none").addClass("d-inline-block");
				$(".nav-menu li a .white-arrow-down").removeClass("d-lg-block");
				$(".nav-menu li a .black-arrow-down").removeClass("d-lg-none").addClass("d-block");

				$(window).on("scroll", function () {
					var scrollPosition = $(this).scrollTop();

					if (scrollPosition > 0) {
						// Change logo and arrows to white
						$(".white-logo").removeClass("d-none").addClass("d-inline-block");
						$(".black-logo").addClass("d-none").removeClass("d-inline-block");
						$(".nav-menu li a .white-arrow-down").addClass("d-lg-block");
						$(".nav-menu li a .black-arrow-down").removeClass("d-block").addClass("d-lg-none");
					} else {
						// Change logo and arrows back to black
						if ($("header").hasClass("header-black")) {
							$(".white-logo").addClass("d-none").removeClass("d-inline-block");
							$(".black-logo").removeClass("d-none").addClass("d-inline-block");
							$(".nav-menu li a .white-arrow-down").removeClass("d-lg-block");
							$(".nav-menu li a .black-arrow-down").removeClass("d-lg-none").addClass("d-block");
						}
					}
				});
			}
		} else {
			if ($("header").hasClass("header-black")) {
				$(".white-logo").addClass("d-none").removeClass("d-inline-block");
				$(".black-logo").removeClass("d-none").addClass("d-inline-block");
			}
		}
	}
	handleWindowResizeDeskSize();
	$(window).resize(handleWindowResizeDeskSize);
});
// $(document).ready(function () {
//   function handleWindowResizeMegaMenu() {
//     var windowWidth = $(window).width();
//     if (windowWidth >= 0 && windowWidth <= 992) {
$("#menu-burger").click(function () {
	$("header").addClass("bg-res-header");
	// $(".logo--wrap--row").addClass("d-none");
	$(".navigation-bar").removeClass("d-none").addClass("d-flex");
	$(".header-menu").addClass("header-res-row");
	$("header").addClass("fixed-position");
	$("#menu-burger").addClass("d-none");
	$("#menu-close").removeClass("d-none");
	$(".header-btn-main").removeClass("d-none");
	$("html").addClass("overflow-hidden");
	$("body").addClass("body-active overflow-hidden");
});
$("#menu-close").click(function () {
	$("header").removeClass("bg-res-header");
	$(".navigation-bar").addClass("d-none").removeClass("d-flex");
	$(".header-menu").removeClass("header-res-row");
	$("header").removeClass("fixed-position");
	$("#menu-burger").removeClass("d-none");
	$("#menu-close").addClass("d-none");
	$(".header-btn-main").addClass("d-none");
	$("html").removeClass("overflow-hidden");
	$("body").removeClass("body-active overflow-hidden");
});
//     }
//   }
//   handleWindowResizeMegaMenu();
//   $(window).resize(handleWindowResizeMegaMenu);
// });

$(".menu-links ul li").on("click", function () {
	$(".menu-links ul li").removeClass("active");
	$(this).addClass("active");
});

// Function to check window size and move menu contents
$(document).ready(function () {
	function moveMenuItems() {
		const windowWidth = window.innerWidth;
		const medicalMenu = document.querySelector(".medical-menu");
		const accordionBody = document.getElementById("accordionBody");
		if (windowWidth <= 1024) {
			if (medicalMenu && accordionBody) {
				accordionBody.innerHTML = medicalMenu.innerHTML;
				medicalMenu.style.display = "none";
			}
		} else {
			if (medicalMenu && accordionBody) {
				medicalMenu.style.display = "block";
				accordionBody.innerHTML = "";
			}
		}
	}

	function handleMenuItemClick(event) {
		const accordionItems = document.querySelectorAll(".accordion-body li");
		accordionItems.forEach((item) => {
			item.classList.remove("active");
		});
		event.currentTarget.classList.add("active");
	}

	moveMenuItems();
	window.addEventListener("resize", moveMenuItems);

	const accordionItems = document.querySelectorAll(".accordion-body li");
	accordionItems.forEach((item) => {
		item.addEventListener("click", handleMenuItemClick);
	});
});

$(document).ready(function () {
	var links = $(".menu a");
	links.first().parent().addClass("active");
	$(window).scroll(function () {
		var fromTop = $(this).scrollTop();
		links.each(function () {
			var section = $($(this).attr("href"));
			if (section.position().top <= fromTop && section.position().top + section.outerHeight() > fromTop) {
				links.each(function () {
					$(this).parent().removeClass("active");
				});
				$(this).parent().addClass("active");
			}
		});
	});
});

$(".videoPlay").click(function () {
	var clickedVideoParent = $(this).closest(".row"); // Adjust the selector based on your HTML structure
	clickedVideoParent.find(".videoPlayer").removeClass("d-none");
	clickedVideoParent.find(".videoHide").addClass("d-none");
});

jQuery(".master-vacancy-value a").click(function () {
	var master_value = jQuery(this).attr("data-id");
	jQuery(".master-vacancy").text(master_value);
	jQuery(".master-value").attr("value", master_value);
});

$("#single").select2({
	placeholder: "pricing",
	allowClear: true,
});

jQuery("body").on("click", ".search-form-master", function () {
	var input_val = jQuery(this).closest("form").find("input").val();
	get_nearest_locations(input_val);
});

$(document).ready(function () {
	jQuery(".exampleModalVideo").on("hide.bs.modal", function () {
		var videoElement = $(this).find("video")[0];
		if (videoElement) {
			videoElement.pause();
			videoElement.currentTime = 0; // Set video to start from the beginning
		}
	});
});

$(".master-select").change(function () {
	var data = jQuery(this).val();
	jQuery("span.acid-bold.custom-value").hide();
	jQuery("span.acid-bold.custom-value." + data).show();
});

$(document).ready(function () {
	$(".openModlaVideo").on("click", function () {
		var video = $(this).closest(".modal").find("video")[0];
		if (video.paused) {
			video.play();
		} else {
			video.pause();
		}
		video.muted = !video.muted;
	});
});
$(document).ready(function () {
	$(".companyLogoSwiper").slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		infinite: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 5,
				},
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 0,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					centerMode: true,
				},
			},
		],
	});
});

$(document).ready(function () {
	// Main Slider
	$(".slider-nav").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		infinite: true,
		asNavFor: ".slider-thumb",
	});

	// Thumbnail Slider
	$(".slider-thumb").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: ".slider-nav",
		dots: false,
		centerMode: false,
		vertical: true,
		verticalSwiping: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 10000,
		focusOnSelect: true,
		infinite: true,
	});
	$(".slider-thumb").on("wheel", function (e) {
		e.preventDefault();
		if (e.originalEvent.deltaY < 0) {
			$(this).slick("slickPrev");
		} else {
			$(this).slick("slickNext");
		}
	});
    $('.gallery').slick({
        slidesToShow:4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        arrows:false,
        speed: 5000, 
        pauseOnHover: false,
        cssEase: 'linear',
        responsive: [ 
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 3,
				},
			}, 
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				},
			}, 
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 1,
				},
			},
		],
      });
});
