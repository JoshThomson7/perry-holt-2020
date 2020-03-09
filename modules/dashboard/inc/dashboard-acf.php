<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Dashboard ACF
 *
 * Advanced Custom Fields functions.
 *
 * @author  Multiple Authors
 * @package modules/dashboard
 * @version 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* ----------------------------------------------------------------------*/
/*  Register Option Pages
/*
/*  @see http://www.advancedcustomfields.com/docs/tutorials/register-multiple-options-pages/
/* ----------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
    /*acf_add_options_page(array(
        'page_title'  => 'Theme General Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));*/

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Header Settings',
        'menu_title'  => 'Header',
        'parent_slug' => 'themes.php'
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'themes.php',
    ));
}

/* ----------------------------------------------------------------------*/
/*  Register New Fields
/*
/*  @see http://www.advancedcustomfields.com/add-ons/
/* ----------------------------------------------------------------------*/
/*if(function_exists('register_field'))
{
  // REGISTER CATEGORIES FIELD
  register_field('Categories_field', dirname(__File__) . '/modules/categories.php');
}*/
