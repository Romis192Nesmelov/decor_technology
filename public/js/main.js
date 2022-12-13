$(document).ready(() => {
    AOS.init({
        duration: 800,
        easing: 'slide',
        once: false
    });

    $(window).resize(function (){
        onResize();
    });
    onResize();

    fixingMainMenu($(window).scrollTop());
    windowScroll();

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
});

function onResize() {
    $('.carousel-item').css('height',$(window).height() - $('.navbar').height() - 16);
}

function gotoScroll(scroll) {
    let sectionDest = $('section[data-scroll-destination="' + scroll + '"]');
    let destination = sectionDest.length ? sectionDest : $('div[data-scroll-destination="' + scroll + '"]');
    $('html,body').animate({
        scrollTop: destination.offset().top - 100
    }, 500, 'easeInOutQuint');
}

function windowScroll() {
    let onTopButton = $('#on-top-button');

    $(window).scroll(function() {
        let windowScroll = $(window).scrollTop(),
            win = $(this);

        fixingMainMenu(windowScroll);

        window.menuScrollFlag = true;
        $('section').each(function () {
            let scrollData = $(this).attr('data-scroll-destination');
            if (!win.scrollTop()) {
                resetColorHrefsMenu();
                window.menuScrollFlag = false;
            } else if ($(this).offset().top <= win.scrollTop()+200 && scrollData) {
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

function fixingMainMenu(windowScroll, firstCall) {
    let mainMenu = $('#main-nav');
    if (windowScroll > 55 && !parseInt(mainMenu.css('top'))) {
        mainMenu.addClass('top-fix').animate({'top':0}, 'slow');
    } else mainMenu.removeClass('top-fix');
}