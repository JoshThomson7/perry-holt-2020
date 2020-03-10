<?php
/*
Free Text Split
*/

$free_text_split = get_sub_field('free_text_split');
$width_left = '';
$width_right = '';

if($free_text_split['free_text_left_width']) {
    $width_left_percentage = $free_text_split['free_text_left_width'];
    $width_left = 'style="width: '.$width_left_percentage.'%;"';
}

if($free_text_split['free_text_right_width']) {
    $width_right_percentage = $free_text_split['free_text_right_width'];
    $width_right = 'style="width: '.$width_right_percentage.'%;"';
}

?>

<div class="fc_free_text_split_wrapper">

    <div <?php echo $width_left; ?>>
        <p>left</p>
    </div>

    <div <?php echo $width_right; ?>>
        <p>right</p>
    </div>

</div>

