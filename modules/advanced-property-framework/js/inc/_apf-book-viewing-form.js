/*
*   APF Book a viewing
*
*   @package Advanced Property Framework
*   @version 1.0
*/


jQuery(document).ready(function($){
    var apf_get_query_var = new URLSearchParams(location.search);

    $('.apf__book__viewing__button').click(function(e) {
        e.preventDefault();
        $('.apf__book__viewing__form.view').addClass('open');
        $('body').addClass('no__scroll');
        //$('header.header, .banners, .apf').addClass('blur');
    });

    $('.apf__book__viewing.close').click(function(e) {
        e.preventDefault();
        $('.apf__book__viewing__form').removeClass('open');
        $('body').removeClass('no__scroll');
        //$('header.header, .banners, .apf').removeClass('blur');
    });

    var get_book = apf_get_query_var.get('book');
    if(get_book == 'true') {
        $('.apf__book__viewing__button').trigger( "click" );
    }
});
