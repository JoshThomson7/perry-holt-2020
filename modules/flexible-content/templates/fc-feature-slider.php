<?php
/*
    Feature Slider
*/

?>

<div>
    <div class="slick">
        <div>Image 1</div>
        <div>Image 2</div>
        <div>Image 3</div>
    </div>
</div>

<script>
    $(".slick").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        arrows: true
    });
</script>