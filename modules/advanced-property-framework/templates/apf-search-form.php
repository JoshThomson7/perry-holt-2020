<div class="apf__search">
    <form action="<?php echo esc_url(home_url()); ?>/property-search/" method="get">

        <?php /*if(current_user_can('administrator')): */ ?>
            <div class="apf__search__buyrent">
                <input type="radio" name="type" value="sales" class="apf__checkbox__sales" />
                <input type="radio" name="type" value="lettings" class="apf__checkbox__lettings" />

                <a href="#" title="Buy" class="apf__sales">Buy</a>
                <a href="#" title="Rent" class="apf__lettings">Rent</a>
            </div><!-- search-buyrent -->
        <?php /*else: ?>
            <input type="hidden" name="type" value="for-sale" class="apf__search__type" />
        <?php //endif; */ ?>

        <input type="text" name="area_search" placeholder="Area, postcode, town or street" class="apf__area__search" value="<?php echo $_SESSION["area_search"]; ?>" />

        <div class="apf__search__selects">
            <div class="apf__select__wrap">
                <select name="minprice" id="minprice" class="apf__select apf__minprice"></select>
                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->

            <div class="apf__select__wrap">
                <select name="maxprice" id="maxprice" class="apf__select apf__maxprice"></select>
                <span class="fal fa-chevron-down"></span>
            </div><!-- apf__select__wrap -->

            <?php if(is_front_page()): ?>
                <input type="hidden" name="minbeds" value="0" />
                <input type="hidden" name="maxbeds" value="100" />
            <?php else: ?>
                <div class="apf__select__wrap">
                    <select name="minbeds" class="apf__select apf__minbeds">
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
                    <select name="maxbeds" class="apf__select apf__maxbeds">
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

        <input type="hidden" name="view" class="apf__view" value="<?php if(isset($_SESSION["view"]) && $_SESSION["view"] == 'map'): ?>map<?php else: ?>grid<?php endif; ?>" />
        <input type="hidden" name="order" class="apf__order" value="<?php echo $_SESSION["order"]; ?>" />
        <input type="hidden" name="apf_page" class="apf_page" value="<?php if(isset($_SESSION["apf_page"]) && $_SESSION["apf_page"] != '') { echo $_SESSION["apf_page"]; } else { echo "1"; } ?>" />
        <input type="hidden" name="apf_show" class="apf_show" value="<?php if(isset($_SESSION["apf_show"]) && $_SESSION["apf_show"] != '') { echo $_SESSION["apf_show"]; } else { echo "8"; } ?>" />
        <input type="hidden" name="apf_status" value="<?php if(isset($_SESSION["apf_status"]) && $_SESSION["apf_status"] != '') { echo "exclude"; } ?>" />
        <input type="hidden" name="apf_search" value="go" />

        <button type="submit" class="apf__search__button<?php if(apf_is_property_search()): ?> apf__ajax__trigger<?php endif; ?>">
            <span class="fal fa-search"></span>
        </button>
    </form>
</div><!-- apf__search -->
