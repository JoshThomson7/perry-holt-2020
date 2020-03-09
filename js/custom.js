// JS Awesomeness

/*
-------------------------------------------
    ____           __          __
   /  _/___  _____/ /_  ______/ /__  _____
   / // __ \/ ___/ / / / / __  / _ \/ ___/
 _/ // / / / /__/ / /_/ / /_/ /  __(__  )
/___/_/ /_/\___/_/\__,_/\__,_/\___/____/

-------------------------------------------
*/

// Libs
// @codekit-prepend "../lib/tooltipster/js/_tooltipster.bundle.min.js";
// @codekit-prepend "../lib/mmenu/js/_mmenu.js";
// @codekit-prepend "../lib/lightgallery/js/_lightgallery.js";
// @codekit-prepend "../lib/lightslider/js/_lightslider.js";
// @codekit-prepend "../lib/isotope/_imagesloaded.pkgd.min.js";
// @codekit-prepend "../lib/isotope/_isotope.pkgd.min.js";
// @codekit-prepend "inc/_sticky-menu.js";
// @codekit-prepend "../lib/blazy/_blazy.min.js";

// Modules
// @codekit-prepend "../modules/off-canvas-nav/js/_oc-nav.js";
// @codekit-prepend "../modules/advanced-video-banners/js/_avb.js";
// @codekit-prepend "../modules/gravity-forms/js/_gf.js";
// @codekit-prepend "../modules/flexible-content/js/_flexible-content.js";
// @codekit-prepend "../modules/advanced-slide-menu/js/_asm.js";
// @codekit-prepend "../modules/off-canvas-nav/js/_oc-nav.js";

jQuery(document).ready(function($) {

	sticky_menu();

	// mmenu
	$('nav#nav_mobile').mmenu({
	     "extensions": [
	        "effect-menu-fade"
	    ],
	    "offCanvas": {
	        "position"    : 'left'
	    },
	    "navbar": {
	        "title": ""
	    }
	});


    /*
    *   Capabilities
    */
    var accordion_heading = $('.oak__capabilities__content article h4');

    // tabs
    $('.oak__capabilities__tabs li').click(function() {
        // resets
        $('.oak__capabilities__tabs li').removeClass('active');
        accordion_heading.removeClass('active');

        // handle selection
        $(this).addClass('active');
        $('.oak__capabilities__content article').addClass('ghost');

        var active_tab = $(this).find('a').attr('data-tab-id');
        $('#' + active_tab).removeClass('ghost').find(accordion_heading).addClass('active');
        return false;
    });

    $('.oak__capabilities__tabs ul li:first').trigger('click');

    // accordion
    $('.oak__capabilities__content article h4').click(function() { // Accoridon button action (on click do the following)
        accordion_heading.removeClass('active');
        $(this).addClass('active');

        var fake_tab = $(this).parent().attr('id');
        $('.oak__capabilities__tabs li a[data-tab-id='+fake_tab+']').trigger('click');
    });

	// -------------------------------------------- //
	//                 Scroll Item                  //
	// -------------------------------------------- //
	$('.scroll').click(function(e) {
		e.preventDefault();
	    var elementClicked = $(this).attr("href");
	    var destination = $(elementClicked).offset().top;

	    $("html:not(:animated),body:not(:animated)").animate({
	        scrollTop: destination - 170
	    }, 800);
	});

	// -------------------------------------------- //
	//                     Footer                   //
	// -------------------------------------------- //
	    var winIsSmall;

	    function footerAccordion() {
	        winIsSmall = window.innerWidth < 1024;
	        $('footer article.footer__menu ul').toggle(!winIsSmall);
	    }

	    $('footer article.footer__menu').find('h5').click(function () {
	        if(winIsSmall){
	            $(this).toggleClass('active');
	            $(this).children().toggleClass('ion-ios-plus-empty ion-ios-minus-empty');
	            $(this).parent().find('ul').stop().slideToggle(100);
	        }
	    });

	    $(window).on('load resize', footerAccordion);

    // -------------------------------------------- //
	//                  Tooltipster                 //
	// -------------------------------------------- //
        $('.tooltip:not(.tooltipstered)').tooltipster({
            functionInit: function(instance, helper) {
                var $origin = $(helper.origin);
                var dataOptions = $origin.attr('data-tooltipster');

                if(dataOptions) {

                    dataOptions = JSON.parse(dataOptions);

                    // set defaults
                    dataOptions.theme = 'tooltipster-punk';
                    dataOptions.contentAsHTML = true;
                    dataOptions.contentCloning = true;
                    //dataOptions.trigger = 'custom';
                    //dataOptions.triggerOpen = {'click': false, 'tap': true, 'mouseenter': true, 'scroll': false};
                    //dataOptions.triggerClose = {'click': true, 'scroll': false, 'tap': true, 'mouseleave': false};
                    //console.log(dataOptions);

                    $.each(dataOptions, function(name, option){
                        instance.option(name, option);
                    });

                }
            }
        });

});
