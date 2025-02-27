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
                console.log("first")
				loadFaqs(firstCategory);
			}
            
			$(".filter-btn").on("click", function () {
                var category = $(this).data("category");
                console.log("second")
				loadFaqs(category);
			});
		});
	}
}
