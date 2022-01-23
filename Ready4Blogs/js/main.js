const responsive = {
    320:{
        items: 1
    },
    540:{
        items: 2
    },
    560:{
        items: 3
    },
}
$(document).ready(function(){
    $nav = $('.nav');
    $togglecollapse = $('.toggle-collapse');
    $togglecollapse.click(function(){
        $nav.toggleClass('collapse');
    })

    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        dots: true,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });
    $('.move-up span').click(function(){
        $('html, body').animate({
            scrollTop:0
        }, 2000);
    })
    AOS.init();
})