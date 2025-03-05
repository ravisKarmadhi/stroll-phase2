import Handlebars from "handlebars";

export class HandlebarsFilter {
	init() {
		this.handlebar();
	}

	handlebar() {
		$(document).ready(function () {
			function loadFaqs(category) {
				$(".filter-btn").removeClass("active");
				$('.filter-btn[data-category="' + category + '"]').addClass("active");

				$.ajax({
					url: ajaxurl.url,
					type: "POST",
					data: {
						action: "load_faqs",
						category: category,
					},
					beforeSend: function () {
						$(".custom-accordion").html("<p>Loading FAQs...</p>");
					},
					success: function (response) {
						if (response.success) {
							var faqs = response.data.posts;
							if (faqs.length > 0) {
								var source = $("#faq-template").html();
								var template = Handlebars.compile(source);
								var html = template({ posts: faqs });
								$(".custom-accordion").html(html);
							} else {
								$(".custom-accordion").html("<p>No FAQs found.</p>");
							}
						}
					},
					error: function () {
						$(".custom-accordion").html("<p>Error loading FAQs.</p>");
					},
				});
			}

			var firstCategory = $(".filter-btn.active").data("category");
			if (firstCategory) {
				console.log("first");
				loadFaqs(firstCategory);
			}

			$(".filter-btn").on("click", function () {
				var category = $(this).data("category");
				console.log("second");
				loadFaqs(category);
			});
		});

		$(document).ready(function ($) {
			let columns = $(".testimonials .col-lg-4");
			let allTestimonials = $(".testimonal-cards");

			allTestimonials.hide();

			columns.each(function () {
				$(this).find(".testimonal-cards").first().show();
			});

			$(".load-more-testimonial").on("click", function () {
				let hiddenFound = false;

				for (let i = 0; i < columns.length; i++) {
					let nextHidden = $(columns[i]).find(".testimonal-cards:hidden").first();
					if (nextHidden.length) {
						nextHidden.fadeIn().addClass("new-visible");
						hiddenFound = true;
					}
				}

				if (!hiddenFound) {
					$(this).hide();
					$('.bg-testimonial-layer').hide();

				}
			});
		});
	}
}
