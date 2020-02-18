jQuery(document).ready(function () {
	// alert();
	jQuery('.skillbar').each(function () {
		jQuery(this).find('.skillbar-bar').animate({
			width: jQuery(this).attr('data-percent')
		}, 6000);
	});
	var logo = $('#logocode');
	logo.click(function () {
		$('.hidden').removeClass("hidden");
		$('.hidden-img').addClass("visible");
		$('.visible').each(function (logo) {
			$(this).animate({
				"top": "-=250px"
			}, "slow", function () {
				$('.visible').animate({
					"top": "+20px",
					"left": "-55px"
				});
			});
		});
	});
});
var textImgHeader = jQuery('#text-imgheader');
var link = $('#headerlink');
// console.log(textImgHeader);
// link[0].href=location.href;
function PageDown() {
	// console.log("pagedooooown");

	// var textImgHeader = $('#text-imgheader');


	// link[0].href=location.href;



}
