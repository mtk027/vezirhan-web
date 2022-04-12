let header_height
$(window).on("load scroll", function () {
    header_height = $('#header').outerHeight()
    if ($(window).scrollTop() > 0) {
        $('#header').addClass('fixed')
    } else {
        if (!$("#header").hasClass("inner_page")) {
            $('#header').removeClass('fixed')
        }
    }

    $('.header_padding').css('padding-top', header_height)

    $('.lazy').each(function () {
        if ($(this).isOnScreen()) {
            $(this).attr('src', $(this).data('src'))
        }
    });
    $('#header .nav-item').each(function () {
        let el = $(this)
        href = el.find("a").first().attr("href")
        el.removeClass("active")
        if (href === window.location.pathname) {
            el.addClass("active")
        }
    })

    if ($(window).height() <= $(window).scrollTop() * 2) {
        $('.go_top').css('transform', 'translateY(0)')
    } else {
        $('.go_top').css('transform', 'translateY(300%)')
    }
});
if ($('.phone').length > 0) {
    $('.phone').mask('(000) 000 0000');
}
$(".go_top").click(function () {
    $(" body, html ").animate({
        scrollTop: 0
    });
});

var main_slider = new Swiper('#slider .swiper-container', {
    loop: true,
    speed: 1500,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '#slider .swiper-pagination',
        clickable: true,
    },
    /*  on: {
         setTransition: function () {
             animation($('#slider .swiper-slide .slide-title'), $('#slider .swiper-slide-active .slide-title'))
             animation($('#slider .swiper-slide .slide-sub_title'), $('#slider .swiper-slide-active .slide-sub_title'))
             animation($('#slider .swiper-slide .slide-text'), $('#slider .swiper-slide-active .slide-text'))
             animation($('#slider .swiper-slide .btn'), $('#slider .swiper-slide-active .btn'))
         }
     } */
});

new Swiper('#body .happy-customers .swiper-container', {
    loop: true,
    speed: 1500,
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '#body .happy-customers .swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1600: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
    },
});

new Swiper('#body .properties .swiper-container', {
    loop: false,
    speed: 1500,
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1400: {
            allowTouchMove: false,
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
});
new Swiper('#body .branch-detail-page .gallery .swiper-container', {
    loop: false,
    speed: 1500,
    grid: {
        rows: 2,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 12,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 12,
        },
        1600: {
            slidesPerView: 4,
            spaceBetween: 12,
        },
    },
});
new Swiper('.six-col-cards .swiper-container', {
    loop: false,
    speed: 1500,
    autoplay: {
        delay: 12000,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 2,
        },
        1600: {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
        },
    },
});

$('textarea[name="question"]').keyup(function (event) {
    let length = $(this).val().length;
    if (length <= 150) {
        $('.question .counter').html(`${length} / 150`)
    }
});

$('#header .menu-button').click(function () {
    $('#sidebar').addClass('open')
    $('.sidebar_overlay').removeClass('d-none')
})

$('#sidebar .close-sidebar').click(function () {
    $('#sidebar').removeClass('open')
    $('.sidebar_overlay').addClass('d-none')
})

$('#header .search-button').click(function () {
    $('#search-wrapper').addClass('open')
})
$('#search-wrapper .close-area').click(function () {
    $('#search-wrapper').removeClass('open')
})

$.fn.isOnScreen = function (e) {
    var win = $(window);

    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};
$.fancybox.defaults.animationEffect = "fade";
let click_count = false;

$('.date').datepicker({
    format: "dd.mm.yyyy",
    language: "tr"
});