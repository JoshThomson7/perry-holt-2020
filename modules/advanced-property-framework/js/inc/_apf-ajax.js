var apf_page_url = '';

// Main results
function apf_ajax(clicked_element) {

    var $ = jQuery;

    // defaults
    apf_new_request = true;
    apf_page = 1;

    if (clicked_element.hasClass("apf__search__button")) { // When clicking search button

        //apf_type = $('.apf__search__type').val(); // just buy or rent
        apf_type = $('.apf__search__buyrent input[type=radio]:checked').val(); // buy/rent
        apf_area_search = $('.apf__area__search').val();
        apf_minprice = $('.apf__minprice option:selected').val();
        apf_maxprice = $('.apf__maxprice option:selected').val();
        apf_minbeds = $('.apf__minbeds option:selected').val();
        apf_maxbeds = $('.apf__maxbeds option:selected').val();

    } else if (clicked_element.hasClass("apf__filter__grid")) { // When clicking grid view

        apf_new_request = false;

        apf_view = 'grid';
        $('.apf__properties').removeClass('list');
        $('.apf__filter__list').removeClass('active');
        $('.apf__filter__grid').addClass('active');

        // Update URL
        history.replaceState({ id: 'apf_url' }, '', '?type=' + apf_type + '&area_search=' + apf_area_search + '&minprice=' + apf_minprice + '&maxprice=' + apf_maxprice + '&minbeds=' + apf_minbeds + '&maxbeds=' + apf_maxbeds + '&view=' + apf_view + '&order=' + apf_order + '&apf_branch=' + apf_branch + '&apf_status=' + apf_status + '&apf_page=' + apf_page + '&apf_search=go');

        return; //exit

    } else if (clicked_element.hasClass("apf__filter__list")) { // When clicking list view

        apf_new_request = false;

        apf_view = 'list';
        $('.apf__properties').addClass('list');
        $('.apf__filter__list').addClass('active');
        $('.apf__filter__grid').removeClass('active');

        // Update URL
        history.replaceState({ id: 'apf_url' }, '', '?type=' + apf_type + '&area_search=' + apf_area_search + '&minprice=' + apf_minprice + '&maxprice=' + apf_maxprice + '&minbeds=' + apf_minbeds + '&maxbeds=' + apf_maxbeds + '&view=' + apf_view + '&order=' + apf_order + '&apf_branch=' + apf_branch + '&apf_status=' + apf_status + '&apf_page=' + apf_page + '&apf_search=go');

        return; //exit

    } else if (clicked_element.hasClass("apf__filter__order")) { // When changing order

        apf_order = clicked_element.val();

    } else if (clicked_element.hasClass("apf__filter__branch")) { // When changing branch

        apf_branch = clicked_element.val();

    } else if (clicked_element.hasClass("apf__status")) { // When swtiching status

        if ($('.apf__filter__status').is(':checked')) {
            apf_status = '';
            $('.apf__filter__status').removeAttr('checked');
        } else {
            apf_status = 'exclude';
            $('.apf__filter__status').attr('checked', 'checked');
        }

    } else if (clicked_element.hasClass("apf__paginate")) { // When paginating

        apf_page = clicked_element.data('apf-paged');

    }

    // pagination
    if (apf_page === 1) {
        apf_page_url = '/property-search/';
    } else {
        apf_page_url = '/property-search/page/' + apf_page + '/';
    }

    $('.apf__load__more__btn').addClass('loading');
    $('.apf__properties__loading__overlay').addClass('loading');

    $.ajax({
        url: apf_ajax_object.ajax_url,
        dataType: 'html',
        type: 'POST',
        cache: true,
        data: ({
            'action': 'apf_ajax',
            'apf_security': apf_ajax_object.ajax_nonce,
            'apf_ajax_check': 'true',
            'apf_type_data': apf_type,
            'apf_area_search_data': apf_area_search,
            'apf_minprice_data': apf_minprice,
            'apf_maxprice_data': apf_maxprice,
            'apf_minbeds_data': apf_minbeds,
            'apf_maxbeds_data': apf_maxbeds,
            'apf_view_data': apf_view,
            'apf_order_data': apf_order,
            'apf_branch': apf_branch,
            'apf_status_data': apf_status,
            'apf_page_data': apf_page
        }),

        success: function (data) {

            // Update URL
            history.replaceState({ id: 'apf_url' }, null, apf_page_url + '?type=' + apf_type + '&area_search=' + apf_area_search + '&minprice=' + apf_minprice + '&maxprice=' + apf_maxprice + '&minbeds=' + apf_minbeds + '&maxbeds=' + apf_maxbeds + '&view=' + apf_view + '&order=' + apf_order + '&apf_branch=' + apf_branch + '&apf_status=' + apf_status + '&apf_page=' + apf_page + '&apf_search=go');

            //load data
            if (apf_new_request === true) {
                $('.apf__properties').html('<div class="apf__properties__loading__overlay"><svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" stroke="#1c1c31"><g fill="none" fill-rule="evenodd" stroke-width="2"><circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="0s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite" /><animate attributeName="stroke-opacity" begin="0s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite" /> </circle><circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="-0.9s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite" /><animate attributeName="stroke-opacity" begin="-0.9s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite" /> </circle></g></svg><p>Updating</p></div>' + data);
            } else {
                $('.apf__properties').append(data);
            }

            if (apf_type === 'for-sale') {
                $('label.apf__status').text('Hide Sold, Sold STC & Under Offer');
            } else {
                $('label.apf__status').text('Hide Let, Let Agreed & Under Offer');
            }

            var bLazy = new Blazy({
                selector: '.blazy'
            });

            //reload map
            apf_init_map();

            //remove loading animation
            $('.apf__load__more__btn').removeClass('loading');
            $('.apf__properties__loading__overlay').removeClass('loading');

            //scroll to results
            if (clicked_element.hasClass("apf__paginate")) {
                var destination = $('.apf__properties').offset().top;
                $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination - 200 }, 700);
            } else {
                $('.apf__properties article').addClass('in-view');
            }
        }

    });

}

jQuery(document).ready(function ($) {

    // Clicks
    jQuery(document).on('click', '.apf__ajax__trigger', function (e) {
        e.preventDefault();

        clicked_element = $(this);

        apf_ajax(clicked_element);
    });

    // Change
    $('.apf__filter__order').change(function () {
        clicked_element = $(this);

        apf_ajax(clicked_element);
    });

    // Change
    $('.apf__filter__branch').change(function () {
        clicked_element = $(this);

        apf_ajax(clicked_element);
    });

    // Loading defaults
    if (apf_view === 'list') {
        $('.apf__properties').addClass('list');
        $('.apf__filter__list').addClass('active');
        $('.apf__filter__grid').removeClass('active');
    }

});
