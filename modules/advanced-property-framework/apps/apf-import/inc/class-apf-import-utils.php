<?php
/**
 * Utilities
 * 
 * @package APF
 * @version 2.0
 */

class APFI_Utils {

    /**
     * Converts PHP array to XML
     * 
     * @param array $format
     * @param object $xml_data
     * @param string $parent
     */
    public static function array_to_xml($data, $xml_data, $parent = ''){
        foreach($data as $key => $value) {
            if($parent === ''){
                $key = 'property';
            } elseif(is_numeric($key)) {
                $key = $parent."_data";
            }

            if(is_array($value) || is_object($value)) {
                $subnode = $xml_data->addChild($key);
                self::array_to_xml($value, $subnode, $key);

            } elseif($value !== '' && !empty($value)) {
                $xml_data->addChild($key, htmlspecialchars($value));
            }
        }
    }

    public static function executionTime() {

        // Do stuff
        usleep(mt_rand(100, 10000));

        // At the end of your script
        $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

        return round($time, 2);

    }

}