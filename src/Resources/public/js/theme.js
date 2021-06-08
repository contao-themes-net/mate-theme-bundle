function is_touch_device() {
    return !!('ontouchstart' in window        // works on most browsers
        || navigator.maxTouchPoints);       // works on IE10/11 and Surface
};

jQuery(document).ready(function ($) {

    /* ===================== *
     *   Formulare		     *
     * ===================== */
    $('select').formSelect();

    var lang = $("html").attr("lang");
    var translations = {
        nextMonth: 'Next month',
        previousMonth: 'Previous month',
        labelMonthSelect: 'Select a month',
        labelYearSelect: 'Select a year',
        months: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
        monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
        weekdays: [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
        weekdaysShort: [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ],
        weekdaysAbbrev: [ 'S', 'M', 'T', 'W', 'T', 'F', 'S' ],
        today: 'Today',
        clear: 'Clear',
        done: 'OK',
        cancel: 'Cancel',
        format: 'yyyy-mm-dd'
    };
    switch (lang) {
        case 'de':
            var translations = {
                nextMonth: 'Nächster Monat',
                previousMonth: 'Vorheriger Monat',
                labelMonthSelect: 'Monat wählen',
                labelYearSelect: 'Jahr wählen',
                months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
                monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
                weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
                weekdaysShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
                weekdaysAbbrev: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],
                today: 'Heute',
                clear: 'Löschen',
                done: 'OK',
                cancel: 'Abbrechen',
                format: 'dd.mm.yyyy'
            };
            break;
        case 'fr':
            var translations = {
                nextMonth: 'Mois suivant',
                previousMonth: 'Mois précédent',
                labelMonthSelect: 'Sélectionnez un mois',
                labelYearSelect: 'Sélectionnez une année',
                months : [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre' ],
                monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
                weekdays: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ],
                weekdaysShort: [ 'Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa' ],
                weekdaysAbbrev: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
                today: "Aujourd'hui",
                clear: 'Réinitialiser',
                done: 'OK',
                cancel: 'Annuler',
                format: 'dd/mm/yyyy'
            };
            break;
        case 'pl':
            var translations = {
                nextMonth: 'W przyszłym miesiącu',
                previousMonth: 'Poprzedni miesiąc',
                labelMonthSelect: 'Wybierz miesiąc',
                labelYearSelect: 'Wybierz rok',
                months: [ 'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień' ],
                monthsShort: [ 'Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paz', 'Lis', 'Gru' ],
                weekdays: [ 'Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota' ],
                weekdaysShort: [ 'Nie', 'Pon', 'Wto', 'Sro', 'Czw', 'Pia', 'Sob' ],
                weekdaysAbbrev: [ 'N', 'P', 'W', 'S', 'C', 'P', 'S' ],
                today: 'Dziś',
                clear: 'Jasne',
                done: 'OK',
                cancel: 'Anuluj',
                format: 'dd.mm.yyyy'
            };
            break;
    };

    $('input.datepicker').datepicker({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: '150', // Creates a dropdown of 15 years to control year,
        maxDate: new Date(new Date().getFullYear() + 30, new Date().getMonth(), new Date().getDate()),
        autoClose: true, // Close upon selecting a date,
        format: translations.format,
        container: 'div.datepicker',
        firstDay: 1,
        i18n: {
            nextMonth: translations.nextMonth,
            previousMonth: translations.previousMonth,
            labelMonthSelect: translations.labelMonthSelect,
            labelYearSelect: translations.labelYearSelect,
            months: translations.months,
            monthsShort: translations.monthsShort,
            weekdays: translations.weekdays,
            weekdaysShort: translations.weekdaysShort,
            weekdaysAbbrev: translations.weekdaysAbbrev,
            today: translations.today,
            clear: translations.clear,
            done: translations.done,
            cancel: translations.cancel
        }
    });

    $('input.timepicker').timepicker({
        defaultTime: 'now',
        fromNow: 0,
        twelveHour: false,
        autoClose: false,
        container: 'div.timepicker',
        i18n: {
            cancel: translations.cancel,
            clear: translations.clear,
            done: translations.done

        }
    });

    /* ===================== *
     *   Content Slider		 *
     * ===================== */
    $(".slides .ce_text, .slides .ce_image, .slides .ce_mateTextBackgroundElement, .slides .ce_youtube, .slides .ce_player").each(function (index) {
        var classList = $(this).attr('class');
        var id = '';

        if (typeof $(this).attr('id') !== 'undefined') {
            var id = " id='" + $(this).attr('id') + "'";
        }

        $(this).replaceWith("<li class='" + classList + "'" + id + ">" + $(this).html() + "</li>");
    });

    /* Content Slider - text below image */

    if ($(".slider-text-below-image li").length > 0) {
        $(".slider-text-below-image li").each(function () {
            var headline = $(this).find("> h2, > h3, > h4, > h5, > h6").html();
            var index = $(this).index() + 1;
            setTimeout(function () {
                $(".slider-text-below-image .indicators li:nth-of-type(" + index + ")").html(headline);
            }, 100);
        });

        setSliderHeight();

        $(window).resize(function () {
            setSliderHeight();
        });
    }

    function setSliderHeight() {
        var height = 0;
        var imageHeight, textHeight, elemHeight;
        $(".slider-text-below-image li").each(function () {
            imageHeight = $(this).find("img").height();
            textHeight = $(this).find("p").outerHeight();
            elemHeight = imageHeight + textHeight;
            if (elemHeight > height) {
                height = elemHeight;
            }
        });
        setTimeout(function () {
            $(".slider-text-below-image, .slider-text-below-image .slides").css("min-height", height + "px");
        }, 100);
    }

    /* ===================== *
    *   Suche				 *
    * ====================== */
    $(".search a").click(function () {
        if ($('.search-box').hasClass("active")) {
            $('.search-box').removeClass('active');
            $('div').remove('.overlay');
        } else {
            $('.search-box').addClass('active');
            $('body').append('<div class="overlay active"></div>');
        }
    });

    $(document).click(function (event) {
        if ($(event.target).closest('.overlay').length) {
            $('.search-box').removeClass('active');
            $('div').remove('.overlay');
        }
    });

    $(window).scroll(function () {
        if ($('.mod_mateNavbar').hasClass('headroom--unpinned')) {
            $('.search-box').removeClass('active');
            $('div').remove('.overlay');
        }
    });

    /* ===================== *
    *   Navigation			 *
    * ====================== */
    var scrollTarget = $("#header .mod_mateNavbar").offset().top;
    if ($("#header .mod_mateNavbar").hasClass("stuckNavbar")) {
        var navbarHeight = $('#header .mod_mateNavbar').height();
        $(window).scroll(function () {
            var scrollPos = $(window).scrollTop();
            if (scrollPos > scrollTarget) {
                $('#header').css('padding-top', navbarHeight + 'px');
                $('.sectionTop').css('visibility','hidden');
                $('#header .mod_mateNavbar, #header .search-box').addClass('stuck');
            } else {
                $('#header').css('padding-top', '0');
                $('.sectionTop').css('visibility','visible');
                $('#header .mod_mateNavbar, #header .search-box').removeClass('stuck');
            }
        });
    }

    if ($("#header .mod_mateNavbar").hasClass("includeHeadroom")) {
        var myElement = document.querySelector("#header .mod_mateNavbar");
        var headroom = new Headroom(myElement, {
            "offset": 600
        });
        headroom.init();
    }

    $(".sidenav").sidenav();

    if(is_touch_device() == false) {
        $("nav:not(.subnav) .desktop-menu a.dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: true,
            coverTrigger: false,
            alignment: "left",
            constrainWidth: false,
            closeOnClick: false
        });

        $("nav:not(.subnav) .desktop-menu ul.dropdown-content a.dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: false,
            coverTrigger: false,
            alignment: "left",
            constrainWidth: false,
            closeOnClick: false
        });

        $('.dropdown-button').click(function () {
            $('.dropdown-content .dropdown-content').hide();
            if (!$(this).hasClass('stopPropagation')) window.location.href = $(this).attr('href');
        });
    } else {
        $("nav:not(.subnav) .desktop-menu a.dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: false,
            coverTrigger: false,
            alignment: "left",
            constrainWidth: false,
            closeOnClick: false
        });

        $("nav:not(.subnav) .desktop-menu ul.dropdown-content a.dropdown-button").dropdown({
            inDuration: 300,
            outDuration: 225,
            hover: false,
            coverTrigger: false,
            alignment: "left",
            constrainWidth: false,
            closeOnClick: false
        });

        $("nav:not(.subnav)").on("touchstart","a.dropdown-button", function(e) {
            if( $(this).hasClass("open") ) {
                window.location.href = $(this).attr('href');
            }

            if( $(this).parents().parents().hasClass("desktop-menu") ) {
                $("a.dropdown-button").removeClass("open");
            }

            $(this).toggleClass("open");
        });
    }

    $("nav:not(.subnav) .mobile-menu a.dropdown-button").dropdown({
        inDuration: 300,
        outDuration: 225,
        hover: false,
        coverTrigger: false,
        alignment: "left"
    });

    $("nav.subnav a.dropdown-button").dropdown({
        inDuration: 0,
        outDuration: 0,
        alignment: "right",
        closeOnClick: false,
        hover: false
    });

    $("nav.subnav a.dropdown-button").click(function() {
        window.location.href = $(this).attr('href');
    });

    /* ===================== *
    *   Toplink  			 *
    * ====================== */
    $(window).scroll(function () {
        scrollPos = $(document).scrollTop();

        $("footer .toplink").addClass("active");
        if (scrollPos <= 500) {
            $("footer .toplink").removeClass("active");
        }
    });

    $(document).on('click', 'footer .toplink:not(.custom)', function (event) {
        event.preventDefault();

        $("html, body").animate({scrollTop: 0}, 1000);
    });

    /* =================== *
     * Smooth Scroll	   *
     * =================== */
    $('a[href*=\\#]:not(.modal-trigger):not(.toplink)').on('click', function (event) {
        var href = $(this).attr('href');
        if (href.indexOf("tabControl_") < 0) {
            href = href.substr(0, href.indexOf('#'));
            href = href.replace('./', '');
            var path = window.location.pathname;
            path = path.replace('/', '');

            if ($(this).attr('target') != '_blank' && path == href) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top - 80}, 1500);
            }
        } else {
            setTimeout(function () {
                var tabControlId = href.substr(href.indexOf('#'));
                $('html,body').animate({
                    scrollTop: $(tabControlId).offset().top - 150
                }, 1500);
            }, 200);
        }
    });

    // for HTML5 "required" attribute
    $('select[required]').css({
        display: 'inline',
        position: 'absolute',
        float: 'left',
        padding: 0,
        margin: 0,
        border: '1px solid rgba(255,255,255,0)',
        height: 0,
        width: 0,
        top: '40px',
        left: '50%'
    });

    /* =================== *
     * Modal         	   *
     * =================== */
    $('.modal').modal();

    $('.close-modal i').click(function () {
        $('.modal').modal("close");
    });

    /* =================== *
     * Parallax        	   *
     * =================== */
    $('.parallax').parallax();
});
