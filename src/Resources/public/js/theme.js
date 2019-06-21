jQuery.noConflict(); jQuery(document).ready(function($){

	/* ===================== *
	 *   Formulare		     *
	 * ===================== */
	$('select').formSelect();

	$('input.datepicker').datepicker({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: '150', // Creates a dropdown of 15 years to control year,
		maxDate: new Date( new Date().getFullYear() + 30, new Date().getMonth(), new Date().getDate() ),
		autoClose: true, // Close upon selecting a date,
		format: 'dd.mm.yyyy',
		container: 'div.datepicker',
		firstDay: 1,
		i18n: {
			nextMonth: 'Nexter Monat',
			previousMonth: 'Vorheriger Monat',
			labelMonthSelect: 'Monat wählen',
			labelYearSelect: 'Jahr wählen',
			months: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
			monthsShort: [ 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez' ],
			weekdays: [ 'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag' ],
			weekdaysShort: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
			weekdaysAbbrev: ['S','M','D','M','D','F','S'],
			today: 'Heute',
			clear: 'Löschen',
			done: 'OK',
			cancel: 'Abbrechen'
		}
	});

	$('input.timepicker').timepicker({
		defaultTime: 'now', // Set default time: 'now', '1:30AM', '16:30'
		fromNow: 0,       // set default time to * milliseconds from now (using with default = 'now')
		twelveHour: false, // Use AM/PM or 24-hour format
		autoClose: false, // automatic close timepicker
		container: 'div.timepicker',
		i80n: {
			done: 'OK', // text for done-button
			clear: 'Löschen', // text for clear-button
			cancel: 'Abbrechen', // Text for cancel-button
		}
	});

	/* ===================== *
	 *   Content Slider		 *
	 * ===================== */
	$( ".slides .ce_text, .slides .ce_image" ).each(function( index ) {
		var classList = $(this).attr('class');
		$(this).replaceWith("<li class='" + classList + "'>" + $(this).html() + "</li>");
	});

	/* ===================== *
	 *   Mate Slider		 *
	 * ===================== */
	$(".slider.mod_newslist:not(.smaller):not(.custom)").slider({
		height: 460,
	    indicators: true,
	    interval: 12000,
		duration: 150
	});

	$(".slider.mod_newslist.smaller:not(.custom)").slider({
		height: 250,
	    indicators: true,
	    interval: 12000,
		duration: 150
	});


	$( ".slider.mod_newslist .next" ).click(function() {
	  $(".slider").slider("next");
	});

	$( ".slider.mod_newslist .prev" ).click(function() {
	  $(".slider").slider("prev");
	});

	$( ".slider.mod_newslist .sliderImage" ).each(function( index ) {
	  var headline = $(this).find("h2").text();
	  var subheadline = $(this).find(".subheadline").text();
	  var i = index;

	  $( ".slider.mod_newslist .indicator-item" ).each(function( index ) {
		if(i == index) {
			$(this).append("<span class='inner'><span class='subheadline'>" + subheadline + "</span><span class='headline'>" + headline + "</span></span>");
		}
	  });
	});

	/* ===================== *
	*   Suche				 *
	* ====================== */
	$( ".search a" ).click(function() {
		if($('.search-box').hasClass("active")) {
			$('.search-box').removeClass('active');
			$('div').remove('.overlay');
		} else {
			$('.search-box').addClass('active');
			$('body').append('<div class="overlay active"></div>');
		}
	});

	$(document).click(function(event) {
	    if($(event.target).closest('.overlay').length) {
	        $('.search-box').removeClass('active');
	        $('div').remove('.overlay');
	    }
	});

	$(window).scroll(function () {
		if($('.mod_mateNavbar').hasClass('headroom--unpinned')) {
			$('.search-box').removeClass('active');
			$('div').remove('.overlay');
		}
	});

	/* ===================== *
	*   Navigation			 *
	* ====================== */
	var scrollTarget = $("#header .mod_mateNavbar").offset().top;
    if($("#header .mod_mateNavbar").hasClass("stuckNavbar")) {
        $(window).scroll(function () {
            var scrollPos = $(window).scrollTop();
            if(scrollPos > scrollTarget) {
                $('#header .mod_mateNavbar, #header .search-box').addClass('stuck');
            } else {
                $('#header .mod_mateNavbar, #header .search-box').removeClass('stuck');
            }
        });
    }

    if($("#header .mod_mateNavbar").hasClass("includeHeadroom")) {
        var myElement = document.querySelector("#header .mod_mateNavbar");
        var headroom  = new Headroom(myElement, {
            "offset": 600
        });
        headroom.init();
    }

	$(".sidenav").sidenav();

    $("nav:not(.subnav) .desktop-menu a.dropdown-button").dropdown({
		inDuration: 300,
		outDuration: 225,
		hover: true,
		coverTrigger: false,
		alignment: "left",
		constrainWidth: false,
		closeOnClick: false
    });

    $("nav:not(.subnav) .mobile-menu a.dropdown-button").dropdown({
		inDuration: 300,
		outDuration: 225,
		hover: false,
		coverTrigger: false,
		alignment: "left"
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

	$('.dropdown-button').click(function() {
		$('.dropdown-content .dropdown-content').hide();
		window.location.href = $(this).attr('href');
	});

	/* ===================== *
	*   Toplink  			 *
	* ====================== */
	$(window).scroll(function () {
		scrollPos = $(document).scrollTop();

		$("footer .toplink").addClass("active");
    	if(scrollPos <= 500) {
    		$("footer .toplink").removeClass("active");
    	}
	});

	$(document).on('click', 'footer .toplink:not(.custom)', function(event){
	    event.preventDefault();

		$("html, body").animate({ scrollTop: 0 }, 1000);
	});

    /* =================== *
     * Smooth Scroll	   *
     * =================== */
    $('a[href*=\\#]:not(.modal-trigger):not(.toplink)').on('click', function(event){
        var href = $(this).attr('href');
        if(href.indexOf("tabControl_") < 0) {
            href = href.substr(0,href.indexOf('#'));
            href = href.replace('./','');
            var path = window.location.pathname;
            path = path.replace('/','');

            if ( $(this).attr('target') != '_blank' && path == href) {
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top - 80}, 1500);
            }
        } else {
            setTimeout(function() {
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

	$('.close-modal i').click(function() {
		$('.modal').modal("close");
	});

	/* =================== *
     * Parallax        	   *
     * =================== */
	$('.parallax').parallax();
});
