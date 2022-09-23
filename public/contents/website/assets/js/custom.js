//off-canvas-menu
$(".menu-trigger").on("click", function() {
	$(".off-canvas-menu, .off-canvas-overlay").addClass("active");
	return false;
});
$(".menu-close, .off-canvas-overlay").on("click", function() {
	$(".off-canvas-menu, .off-canvas-overlay").removeClass("active");
});

// owlCarousel
$('.client-testimonial').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
		dots:false,
		autoplay:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        992:{
            items:2
        }
    }
})

// package-carousel
$('.package-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
		dots:false,
		autoplay:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        992:{
            items:3
        }
    }
})

// owlCarousel
$('.feedback-testimonials').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
		dots:false,
		autoplay:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:1
        },
        992:{
            items:1
        }
    }
})