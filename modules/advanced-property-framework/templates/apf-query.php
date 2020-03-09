<?php
// Prepare query
global $wp_query;
$pages = $wp_query->max_num_pages;

$args = array(
    'post_type'         => 'property',
    'post_status'       => 'publish',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy'  => 'property_type',
            'field'     => 'slug',
            'terms'     => $_SESSION['type'],
            'operator'  => 'IN'
        )
    ),
    'meta_query' => array(
        array(
            'key'       => 'property_address_searchable',
            'value'     => $_SESSION['area_search'],
            'compare'   => 'LIKE'
        ),
        array(
            'key'       => 'property_price',
            'value'     => array($_SESSION['minprice'], $_SESSION['maxprice']),
            'compare'   => 'BETWEEN',
            'type'      => 'numeric'
        ),
        array(
            'key'       => 'property_bedrooms',
            'value'     => array($_SESSION['minbeds'], $_SESSION['maxbeds']),
            'compare'   => 'BETWEEN',
            'type'      => 'numeric'
        ),
        array(
            'key'       => 'property_status',
            'value'     => apf_property_search_exclude_status(),
            'compare'   => 'NOT IN',
        )
    ),
    'posts_per_page'    => 16,
    'orderby'           => 'meta_value_num',
    'meta_key'          => 'property_price',
    'order'             => $_SESSION['order'],
    'paged'             => $_SESSION['apf_page']
);

if($_SESSION['apf_branch']) {
    $args['meta_query'][] = array(
        'key'       => 'property_branch_id',
        'value'     => $_SESSION['apf_branch'],
        'compare'   => '=',
        'type'      => 'numeric'
    );
}

$property_query = new WP_Query($args);
?>
