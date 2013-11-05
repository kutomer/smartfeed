<?php
/* Load all the feed required CSS */
elgg_load_css('feed');
?>

<section ng-app="kruvbook" ng-controller="FeedCtrl" class="news-feed-wrapper">
    <div ng-show="!activityLogs.length">
        <h2><?= elgg_echo('newsfeed:nonews'); ?></h2>
    </div>

    <div ng-show="errorMsg">
        <h2>{{errorMsg}}</h2>
    </div>

    <section id="unseenFeed" ng-show="unseenActivityLogs.length">
        <h3>{{ unseenActivitesTitle() }}</h3>
        <ul auto-refresh="refresh()" refresh-interval="5000" class="elgg-list">
            <li ng-repeat="unseenActivityLog in unseenActivityLogs">
                <activity-log item="unseenActivityLog"></activity-log>
            </li>
        </ul>
    </section>

    <section id="feed" ng-show="activityLogs.length">
        <h3>News Feed</h3>
        <ul infinite-scroll='loadMore()' infinite-scroll-distance='2' class="elgg-list">
            <li ng-repeat="activityLog in activityLogs">
                <activity-log item="activityLog"></activity-log>
            </li>
        </ul>
    </section>

    <?php
    /* load all the feed required JS */
    elgg_load_js('ng_feed_app');
    elgg_load_js('activities_loader_service');
    elgg_load_js('feed_ctrl');
    elgg_load_js('activity_log');
    elgg_load_js('auto_refresh');
    ?>
</section>

