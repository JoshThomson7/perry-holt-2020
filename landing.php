<?php /* Template Name: Landing Page */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '-', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <?php wp_head(); global $woocommerce, $current_user;?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="landing-page">
    
<?php global $post;

require_once('modules/advanced-video-banners/templates/avb-inner.php');

flexible_content();

get_footer();
?>