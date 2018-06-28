$(document).ready(function(){ 
	
	/* ===================== *
	 *   Formulare		 *
	 * ===================== */
	$('select').material_select();
	
	$inputDatepicker = $('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15, // Creates a dropdown of 15 years to control year,
		today: 'Heute',
		clear: 'Reset',
		close: 'OK',
		closeOnSelect: false, // Close upon selecting a date,
		format: 'dd-mm-yyyy',
		container: 'body'
	});
	$inputDatepicker.pickadate('picker');
	
	$inputDatepicker = $('.timepicker').pickatime({
	    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
	    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
	    twelvehour: false, // Use AM/PM or 24-hour format
	    donetext: 'OK', // text for done-button
	    cleartext: 'Reset', // text for clear-button
	    canceltext: 'Abbrechen', // Text for cancel-button
	    autoclose: false, // automatic close timepicker
	    ampmclickable: true, // make AM PM clickable
	    aftershow: function(){}, //Function for after opening timepicker
	    container: 'body'
	});	
	$inputDatepicker.pickatime('picker');
	
	//$(".clockpicker").appendTo("body");
	//$(".picker").appendTo("body");
	
	/* ===================== *
	 *   Content Slider		 *
	 * ===================== */
	$( ".slides .ce_text" ).each(function( index ) {
		var classList = $(this).attr('class');
		$(this).replaceWith("<li class='" + classList + "'>" + $(this).html() + "</li>");
	});
	
	/* ===================== *
	 *   Mate Slider		 *
	 * ===================== */
	$(".slider:not(.smaller)").slider({
		height: 460,
	    indicators: true,
	    interval: 12000
	}); 
	
	$(".slider.smaller").slider({
		height: 250,
	    indicators: true,
	    interval: 12000
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

	$(".button-collapse").sideNav({});
    
    $(".desktop-menu a.dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: true,
      belowOrigin: true,
      alignment: "left",
      constrainWidth: false
    });
    
    $(".mobile-menu a.dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: false,
      belowOrigin: true,
      alignment: "left"
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
	
	$(document).on('click', 'footer .toplink', function(event){
	    event.preventDefault();
	
		$("html, body").animate({ scrollTop: 0 }, 1000);
	});

    /* =================== *
     * Smooth Scroll	   *
     * =================== */
    $('a[href*=\\#]').on('click', function(event){
        var href = $(this).attr('href');
        href = href.substr(0,href.indexOf('#'));
        href = href.replace('./','');

        var path = window.location.pathname;
        path = path.replace('/','');

        if ( $(this).attr('target') != '_blank' && path == href) {
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top - 80}, 1500);
        }
    });
});