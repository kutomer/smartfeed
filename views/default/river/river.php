<section>
    <hgroup>
        <h1><?php echo elgg_echo('newsfeed:title'); ?></h1>
        <h2><?php echo elgg_echo('newsfeed:subtitle');?></h2>
    </hgroup>

    <section>
        <section ng-controller="FeedCtrl">

            <ul infinite-scroll='loadMore()' infinite-scroll-distance='2'>
                <li ng-repeat="river in riverItems">
                    <river-item item="river"></river-item>
                </li>
            </ul>

        </section>
        <?php
            elgg_load_js('ng_feed_app');
            elgg_load_js('river_loader_service');
            elgg_load_js('feed_ctrl');
            elgg_load_js('river_item');
        ?>
    </section>
</section>