<section ng-controller="FeedCtrl" class="news-feed-wrapper">

    <div ng-show="!activityLogs.length">
        <h2><?= elgg_echo('newsfeed:nonews'); ?></h2>
    </div>

    <div ng-show="errorMsg">
        <h2>{{errorMsg}}</h2>
    </div>

    <ul infinite-scroll='loadMore()' infinite-scroll-distance='2' auto-refresh="refresh()" refresh-interval="500" class="elgg-list">
        <li ng-repeat="activityLog in activityLogs">
            <activity-log item="activityLog"></activity-log>
        </li>
    </ul>

    <?php
        /* load all the feed required JS */
        elgg_load_js('ng_feed_app');
        elgg_load_js('activities_loader_service');
        elgg_load_js('feed_ctrl');
        elgg_load_js('activity_log');
        elgg_load_js('auto_refresh');
    ?>
</section>

