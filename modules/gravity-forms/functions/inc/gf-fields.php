<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
	Date field
	Form: Arrange a viewing (ID: 1)
*/
add_filter( 'gform_pre_render_1', 'gf_radio_date' );
add_filter( 'gform_pre_validation_1', 'gf_radio_date' );
add_filter( 'gform_pre_submission_filter_1', 'gf_radio_date' );
add_filter( 'gform_admin_pre_render_1', 'gf_radio_date' );

// add_filter( 'gform_pre_render_2', 'gf_radio_date' );
// add_filter( 'gform_pre_validation_2', 'gf_radio_date' );
// add_filter( 'gform_pre_submission_filter_2', 'gf_radio_date' );
// add_filter( 'gform_admin_pre_render_2', 'gf_radio_date' );

function gf_radio_date( $form ) {

    foreach ( $form['fields'] as &$field ) {

        // Bail early if not the field we want
        if ( $field->type != 'radio' || strpos( $field->cssClass, 'gf__radio__date' ) === false ) {
            continue;
        }

        // Get dates from today to two months in the future
        $today = date('Y-m-d D', strtotime('+1 day'));
        $future = date('Y-m-d D', strtotime('+2 months'));

        $start    = (new DateTime($today));
        $end      = (new DateTime($future));
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);

        $choices = array();

        foreach ($period as $date) {
        	$the_date = $date->format("Y-m-d D");

        	if (strpos($the_date, 'Sun') !== false) { continue; }

        	$weekday = $date->format("D");
        	$weekday_short = mb_substr($weekday, 0, 1, 'utf-8');
        	$day = $date->format("j");
        	$month = $date->format("M");
        	$year = $date->format("Y");

        	$choices[] = array(
        		'text' => '
	        		<span class="gf__date">
	        			<span class="gf__date__weekday">'.$weekday.'</span>
	        			<span class="gf__date__day">'.$day.'</span>
	        			<span class="gf__date__month">'.$month.'</span>
	        		</span>
	        	',

        		'value' => $date->format("D, j M Y")
        	);

        }

        $field->choices = $choices;

    }

    return $form;

}


/*
	Time field
	Form: Arrange a viewing (ID: 1)
*/
add_filter( 'gform_pre_render_1', 'gf_radio_time' );
add_filter( 'gform_pre_validation_1', 'gf_radio_time' );
add_filter( 'gform_pre_submission_filter_1', 'gf_radio_time' );
add_filter( 'gform_admin_pre_render_1', 'gf_radio_time' );

// add_filter( 'gform_pre_render_2', 'gf_radio_time' );
// add_filter( 'gform_pre_validation_2', 'gf_radio_time' );
// add_filter( 'gform_pre_submission_filter_2', 'gf_radio_time' );
// add_filter( 'gform_admin_pre_render_2', 'gf_radio_time' );

function gf_radio_time( $form ) {

    foreach ( $form['fields'] as &$field ) {

        // Bail early if not the field we want
        if ( $field->type != 'radio' || strpos( $field->cssClass, 'gf__radio__time' ) === false ) {
            continue;
        }

        // Max and min times
        $today = '11:00';
        $future = '19:30';

        $start    = (new DateTime($today));
        $end      = (new DateTime($future));
        $interval = DateInterval::createFromDateString('30 minutes');
        $period   = new DatePeriod($start, $interval, $end);

        $choices = array();

        foreach ($period as $date) {
        	$the_date = $date->format("Y-m-d D");

        	if (strpos($the_date, 'Sun') !== false) { continue; }

        	$hour = $date->format("H");
        	$minute = $date->format("i");

            $current_time = strtotime($date->format("H:i"));

            $class = '';
            $text = '';
            $text_html = '';

            if($current_time >= strtotime($today) && $current_time <= strtotime('12:00')) {

                $class = ' gf__out__of__hours';
                $text = ' (Subject to availability)';
                $text_html = '<span class="gf__time__message">Subject to availability</span>';

            }

            if($current_time >= strtotime('18:30') && $current_time <= strtotime($future)) {

                $class = ' gf__out__of__hours';
                $text = ' (Out of hours)';
                $text_html = '<span class="gf__time__message">Out of hours</span>';
            }

        	$choices[] = array(
        		'text' => '
	        		<span class="gf__time'.$class.'" data-time="'.$hour.':'.$minute.'">
                        <span class="gf__time__digits">'.$hour.':'.$minute.'</span>
                        '.$text_html.'
                    </span>
	        	',

        		'value' => $hour.':'.$minute.$text
        	);

        }

        $field->choices = $choices;

    }

    return $form;

}

/*
	Property field
	Form: Arrange a viewing (ID: 1)
*/
add_filter('gform_field_value_ref', 'gf_property_id');
function gf_property_id($value){

    if(isset($_GET['ref']) && !empty($_GET['ref'])) {

        $agent_ref = $_GET['ref'];

        $property_viewing = new WP_Query(array(
            'post_type' => 'property',
            'meta_query' => array(
                array(
                    'key' => 'property_agent_ref',
                    'value' => $agent_ref,
                    'compare' => 'LIKE'
                )
            )
        ));

        while ($property_viewing->have_posts()) : $property_viewing->the_post();
            $property_id = get_the_ID();
        endwhile; wp_reset_query();

    	$get_price = number_format(get_field('property_price', $property_id));

    	$property_title = get_the_title($property_id).' - &pound;'.$get_price;
	}

	$value = $property_title;

	return $value;
}