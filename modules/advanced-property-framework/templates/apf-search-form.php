<?php 
/**
 * APF Search Form
 *
 * @author  Various
 * @package Advanced Property Framework
 *
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$apf_settings = new APF_Settings();
$markets = $apf_settings->markets();
$departments = $apf_settings->departments();
?>
<div class="apf__search">
    <form action="<?php echo esc_url(home_url()); ?>/property-search/" id="apf_search">

        <?php if(count($markets) > 1): ?>
            <div class="apf__search__switch column apf-search-dept">
                <?php
                    $dept_count = 0;
                    foreach($markets as $market):
                ?>
                    <input type="radio" id="apf_<?php echo $market['value']; ?>" name="apf_market" value="<?php echo $market['value']; ?>" <?php echo $dept_count == 0 ? 'checked' : ''; ?> />
                    <label for="apf_<?php echo $market['value']; ?>"><?php echo $market['label']; ?></label>
                <?php $dept_count++; endforeach; ?>
            </div><!-- search-buyrent -->
        <?php else: ?>
            <input type="hidden" name="apf_market" value="<?php echo $markets[0]['value']; ?>"/>
        <?php endif; ?>
        
        <?php if(count($departments) > 1): ?>
            <div class="apf__search__switch apf-search-type">
                <?php
                    $department_count = 0;
                    foreach($departments as $department):
                ?>
                    <input type="radio" id="apf_<?php echo $department['value']; ?>" name="apf_dept" value="<?php echo $department['value']; ?>" <?php echo $department_count == 0 ? 'checked' : ''; ?> />
                    <label for="apf_<?php echo $department['value']; ?>"><?php echo $department['label']; ?></label>
                <?php $department_count++; endforeach; ?>
            </div><!-- search-buyrent -->
        <?php else: ?>
            <input type="hidden" name="apf_dept" value="<?php echo $departments[0]['value']; ?>"/>
        <?php endif; ?>

        <input type="text" name="apf_location" placeholder="Area, postcode sq ft, town sq ft or street" class="apf__area__search" value="" />

        <div class="apf__search__selects">
            <div class="apf__select__wrap">
                <select name="apf_minprice" id="apf_minprice" class="apf__select apf__minprice"></select>
                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->

            <div class="apf__select__wrap">
                <select name="apf_maxprice" id="apf_maxprice" class="apf__select apf__maxprice"></select>
                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->

            <div class="apf__select__wrap">
                <select name="apf_minsize" class="apf__select apf__minsize">
                    <option value="0">Min size (sq ft)</option>
                    <option value="50">50 sq ft</option>
                    <option value="100">100 sq ft</option>
                    <option value="200">200 sq ft</option>
                    <option value="300">300 sq ft</option>
                    <option value="400">400 sq ft</option>
                    <option value="600">500 sq ft</option>
                    <option value="700">700 sq ft</option>
                    <option value="800">800 sq ft</option>
                    <option value="900">900 sq ft</option>
                    <option value="1000">1,000 sq ft</option>
                    <option value="1500">1,500 sq ft</option>
                    <option value="2000">2,000 sq ft</option>
                    <option value="3000">3,000 sq ft</option>
                    <option value="4000">4,000 sq ft</option>
                    <option value="5000">5,000 sq ft</option>
                    <option value="6000">6,000 sq ft</option>
                    <option value="7000">7,000 sq ft</option>
                    <option value="8000">8,000 sq ft</option>
                    <option value="9000">9,000 sq ft</option>
                    <option value="10000">10,000 sq ft</option>
                    <option value="12000">12,000 sq ft</option>
                    <option value="13000">13,000 sq ft</option>
                    <option value="14000">14,000 sq ft</option>
                    <option value="15000">15,000 sq ft</option>
                    <option value="16000">16,000 sq ft</option>
                    <option value="17000">17,000 sq ft</option>
                    <option value="18000">18,000 sq ft</option>
                    <option value="19000">19,000 sq ft</option>
                    <option value="20000">20,000 sq ft</option>
                </select>

                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->

            <div class="apf__select__wrap">
                <select name="apf_maxsize" class="apf__select apf__maxsize">
                <option value="0">Max size (sq ft)</option>
                    <option value="50">50 sq ft</option>
                    <option value="100">100 sq ft</option>
                    <option value="200">200 sq ft</option>
                    <option value="300">300 sq ft</option>
                    <option value="400">400 sq ft</option>
                    <option value="600">500 sq ft</option>
                    <option value="700">700 sq ft</option>
                    <option value="800">800 sq ft</option>
                    <option value="900">900 sq ft</option>
                    <option value="1000">1,000 sq ft</option>
                    <option value="1500">1,500 sq ft</option>
                    <option value="2000">2,000 sq ft</option>
                    <option value="3000">3,000 sq ft</option>
                    <option value="4000">4,000 sq ft</option>
                    <option value="5000">5,000 sq ft</option>
                    <option value="6000">6,000 sq ft</option>
                    <option value="7000">7,000 sq ft</option>
                    <option value="8000">8,000 sq ft</option>
                    <option value="9000">9,000 sq ft</option>
                    <option value="10000">10,000 sq ft</option>
                    <option value="12000">12,000 sq ft</option>
                    <option value="13000">13,000 sq ft</option>
                    <option value="14000">14,000 sq ft</option>
                    <option value="15000">15,000 sq ft</option>
                    <option value="16000">16,000 sq ft</option>
                    <option value="17000">17,000 sq ft</option>
                    <option value="18000">18,000 sq ft</option>
                    <option value="19000">19,000 sq ft</option>
                    <option value="20000">20,000 sq ft</option>
                </select>

                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->
            
            <?php if(is_front_page() || !$apf_settings->search_beds_dropdown()): ?>
                <input type="hidden" name="apf_minbeds" value="0" />
                <input type="hidden" name="apf_maxbeds" value="100" />
            <?php else: ?>

                <div class="apf__select__wrap">
                    <select name="apf_minbeds" class="apf__select apf__minbeds">
                        <option value="0">Min beds</option>
                        <option value="1">Min 1 bed</option>
                        <option value="2">Min 2 beds</option>
                        <option value="3">Min 3 beds</option>
                        <option value="4">Min 4 beds</option>
                        <option value="5">Min 5 beds</option>
                        <option value="6">Min 6 beds</option>
                        <option value="7">Min 7 beds</option>
                        <option value="8">Min 8 beds</option>
                        <option value="9">Min 9 beds</option>
                        <option value="10">Min 10 beds</option>
                    </select>

                    <span class="fal fa-chevron-down"></span>
                </div><!-- apf__select__wrap -->

                <div class="apf__select__wrap">
                    <select name="apf_maxbeds" class="apf__select apf__maxbeds">
                        <option value="100">Max beds</option>
                        <option value="1">Max 1 bed</option>
                        <option value="2">Max 2 beds</option>
                        <option value="3">Max 3 beds</option>
                        <option value="4">Max 4 beds</option>
                        <option value="5">Max 5 beds</option>
                        <option value="6">Max 6 beds</option>
                        <option value="7">Max 7 beds</option>
                        <option value="8">Max 8 beds</option>
                        <option value="9">Max 9 beds</option>
                        <option value="10">Max 10 beds</option>
                    </select>

                    <span class="fal fa-chevron-down"></span>
                </div><!-- apf__select__wrap -->
                
            <?php endif; ?>
        </div><!-- apf__search__selects -->
        
        <?php if(!is_front_page()): ?>
            <button type="submit" class="apf__search__button apf-fetch<?php if(!apf_is_property_search()) { echo ' apf-json'; } ?>">
                <span class="fal fa-search"></span>
            </button>
        <?php endif; ?>

        <?php if(is_page('property-search')): ?>
            <?php require_once('apf-filter-form.php'); ?>
        <?php else: ?>
            <input type="hidden" name="apf_view" value="grid">
            <input type="hidden" name="apf_status" value="">
            <input type="hidden" name="apf_branch" value="">
            <input type="hidden" name="apf_order" value="price_desc">
        <?php endif; ?>
    </form>
</div><!-- apf__search -->
