$('#owl-carousel-1').owlCarousel({
    loop:true,
    rtl:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$('#owl-carousel-2').owlCarousel({
    loop:true,
    rtl:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

// Correct Image
$('.box-image').click(function(){    
    $('.pay-image').css('border-color','#fff')
    $(this).find('.pay-image').css('border-color','#CA990E')
    $('.correct').css('opacity',0)
    $(this).find('.correct').css('opacity',1)
})