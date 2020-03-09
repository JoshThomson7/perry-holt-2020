<div class="apf__results__filter">

    <div class="apf__results__filter__view">

        <a href="#" class="apf__filter__grid apf__ajax__trigger<?php if(isset($_GET["view"]) && $_GET["view"] == 'grid') { echo ' active'; } ?>" title="Grid view"><span class="fal fa-th"></span></a>
        <a href="#" class="apf__filter__list apf__ajax__trigger<?php if(isset($_GET["view"]) && $_GET["view"] == 'list') { echo ' active'; } ?>" title="List view"><span class="fal fa-list"></span></a>
        <a href="#" class="apf__map__hide active" title="Hide Map"><span class="fal fa-map"></span></a>
        <a href="#" class="apf__filter__refine" title="Refine search"><span class="fal fa-search"></span></a>

    </div><!-- apf__results__filter__view -->

    <div class="apf__results__filter__sort">

        <form id="apf_filter">

            <input type="checkbox" id="apf_status" name="apf_status" class="apf__filter__status" value="exclude"<?php if($_SESSION["apf_status"] == 'exclude') { echo " checked";} ?>>
            <label for="status" class="apf__ajax__trigger apf__status">Hide Sold, Sold STC &amp; Under offer</label>

            <?php
                $branches_query = new WP_Query(array(
                    'post_type' => 'branch',
                    'post_status' => 'publish',
                    'posts_per_page' => -1
                ));

                if($branches_query->have_posts()):
            ?>
                <select name="branch" class="apf__filter__branch" id="branch">
                    <option value="">Any branch</option>
                    <?php while($branches_query->have_posts()) : $branches_query->the_post(); ?>
                        <option value="<?php the_field('branch_id'); ?>"><?php the_title(); ?></option>
                    <?php endwhile; ?>
                </select>
            <?php endif; ?>

            <select name="order" class="apf__filter__order" id="order">
                <option value="desc"<?php if($_SESSION["order"] == 'desc'): ?> selected="selected"<?php endif; ?>>Price: Highest first</option>
                <option value="asc"<?php if($_SESSION["order"] == 'asc'): ?> selected="selected"<?php endif; ?>>Price: Lowest first</option>
            </select>

        </form>

    </div><!-- apf__results__filter__sort -->

</div><!-- apf__results__filter -->
