$(document).ready(() => {
    AOS.init({
        duration: 800,
        easing: 'slide',
        once: false
    });

    $('a.img-preview').fancybox();
    $(window).resize(function (){
        onResize();
    });
    onResize();

    // fixingMainMenu($(window).scrollTop());
    windowScroll();

    let url = new URL(location.href),
        scrollParam = url.searchParams.get('scroll');
    if (scrollParam) gotoScroll(scrollParam);

    // Scroll menu
    // let uriParams = getQueryParams(window.location.search);
    // if (uriParams.scroll) gotoScroll(uriParams.scroll);

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        // console.log(window.menuScrollFlag);
        e.preventDefault();
        let self = $(this);
        if (!window.menuScrollFlag) {
            gotoScroll(self.attr('data-scroll'));
        }
    });

    // Get news
    $('.news-block').click(function () {
        addLoader();
        let newsId = parseInt($(this).attr('id').replace('new',''));
        $.post('/get_news/' + newsId, {
            '_token':$('input[name=_token]').val()
        }).done(function(data){
            let newsModal = $('#tech-modal');
            let date = new Date(data.time * 1000);
            newsModal.find('.modal-title').html(date.getDate() + '/' +  (date.getMonth()+1) + '/' + date.getFullYear());
            let newsContent = $('<div></div>').append(
                $('<h3></h3>').html(data.head)
            ).append(
                $('<img/>').attr('src','/images/news/'+data.image).css({
                    'width':'100%',
                    'margin-bottom': 10,
                    'border': '2px solid #43ab92'
                })
            ).append(data.text);
            newsModal.find('.modal-body').html(newsContent);
            removeLoader();
            newsModal.modal('show');
        });
    });

    // Production carousel
    $('.owl-carousel.production').owlCarousel({
        margin: 10,
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout:3000,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            },
        },
        // navText:[navButtonBlack1,navButtonBlack2]
    });
});

function onResize() {
    $('.carousel-item').css('height',($(window).height() / (location.pathname !== '/' ? 1.2: 1) ) - $('.navbar').height() - 16);
}

function gotoScroll(scroll) {
    let sectionDest = $('section[data-scroll-destination="' + scroll + '"]'),
        destination = sectionDest.length ? sectionDest : $('div[data-scroll-destination="' + scroll + '"]');
    $('html,body').animate({
        scrollTop: destination.offset().top - 100
    }, 500, 'easeInOutQuint');
}

function windowScroll() {
    let onTopButton = $('#on-top-button');

    $(window).scroll(function() {
        let windowScroll = $(window).scrollTop(),
            win = $(this);

        // fixingMainMenu(windowScroll);

        // window.menuScrollFlag = true;
        $('section').each(function () {
            let scrollData = $(this).attr('data-scroll-destination');
            if (!win.scrollTop()) {
                resetColorHrefsMenu();
                window.menuScrollFlag = false;
            } else if ($(this).offset().top <= win.scrollTop() + 200 && scrollData) {
                window.menuScrollFlag = false;
                resetColorHrefsMenu();
                $('a[data-scroll=' + scrollData + ']').addClass('active');
            }
        });

        if (windowScroll > $(window).height()) {
            onTopButton.fadeIn();
        } else onTopButton.fadeOut();
    });
}

function resetColorHrefsMenu() {
    $('li a.nav-link').removeClass('active').blur();
}

// function fixingMainMenu(windowScroll, firstCall) {
//     let mainMenu = $('#main-nav');
//     if (windowScroll > 55 && !parseInt(mainMenu.css('top'))) {
//         mainMenu.addClass('top-fix').animate({'top':0}, 'slow');
//     } else mainMenu.removeClass('top-fix');
// }
