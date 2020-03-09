/*
*   Advanced Property Framework scripts
*
*   Scripts and functions for APF
*
*   @package Advanced Property Framework
*   @version 1.0
*/

// @codekit-prepend "inc/_apf-downloadxml.js";
// @codekit-prepend "inc/_apf-map.js";
// @codekit-prepend "inc/_apf-map-sticky.js";
// @codekit-prepend "inc/_apf-search-form.js";
// @codekit-prepend "inc/_apf-filter-form.js";
// @codekit-prepend "inc/_apf-ajax.js";
// @codekit-prepend "inc/_apf-book-viewing-form.js";
// @codekit-prepend "inc/_apf-single-map.js";

// Apps
// @codekit-prepend "../apps/apf-update/js/_apf-update-ajax.js";
// @codekit-prepend "../apps/apf-branches/js/_apf-branches.js";

jQuery(document).ready(function($) {

    // lazyload
    var bLazy = new Blazy({
        selector: '.blazy'
    });

	$('.property__gallery').lightSlider({
        item: 1,
	    loop: false,
	    easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        enableDrag: false,
	    gallery: true,
        thumbItem: 6,
        slideMargin: 0,
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '.property__gallery .property__gallery__slide',
                download: false,
                hash: false
            });
        }
	});



    $('.property__gallery__all').lightGallery({
        hash: false,
        selector: '.property__gallery__all li',
        fullScreen: false,
        download: false
    });

    // --------------- Mmenu --------------- //
    // $('nav.apf__arrange__viewing').mmenu({
    //      "extensions": [
    //         "effect-menu-fade"
    //     ],
    //     "offCanvas": {
    //         "position"    : 'right',
    //         "zposition"   : 'front'
    //     },
    //     "navbar": {
    //         "title": ""
    //     }
    // });

    // $(window).off('keydown.mm'); // Disable mmenu's keydown
    //
    // // Write our own keydown method which prevents tabbing outside the menu when it is open
    // $(window).on('keydown', function(e) {
    //     if ($('html').hasClass('mm-opened')) {
    //         if (e.keyCode === 27) { // esc
    //             $('#arrange_viewing').trigger('close.mm');
    //         } else if (e.keyCode === 9) { // tab
    //             var $target = $(e.target);
    //             // If the event target doesn't have the menu as its parent or it is the last link in the last li
    //             if (!$target.closest('#arrange_viewing').length || ($target.closest('li').is(':last-child') && $target.is(':last-child'))) {
    //                 $('#arrange_viewing ul:visible li:first-child a').focus(); // focus the first menu item link
    //                 e.preventDefault();
    //                 return false;
    //             }
    //         }
    //     }
    // });

    // Contact Form 7
    // var API = $(".apf__arrange__viewing").data( "mmenu" );
    //
    // $('.mmenu-close').on('click', function(e){
    //     e.preventDefault();
    //     API.close();
    // });
    //
    // // Arrange a viewing
    // if($('#apf_property_id').length > 0 ) {
    //
    //     $('#apf_property_id').val(apf_property_id);
    //     $('#apf_property_name').val(apf_property_title);
    //     $('#apf_property_url').val(apf_property_url);
    //
    // }

});
