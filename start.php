<?php
elgg_register_event_handler('init', 'system', 'smartfeed_init');

function smartfeed_init() {
    /* register page handlers */
    elgg_register_page_handler('dashboard', function() {
        require_once dirname(__FILE__) . '/pages/dashboard.php';
        return true;
    });

    /* register java script */
    $url = elgg_get_simplecache_url('js', 'angular');
    elgg_register_simplecache_view('js/angular');
    elgg_register_js('angular', $url);
    // load angualr at the header for all the site (can be extracted to the core \ other plugin)
    elgg_load_js('angular');

    $url = elgg_get_simplecache_url('js', 'ng_infinite_scroll');
    elgg_register_simplecache_view('js/ng_infinite_scroll');
    elgg_register_js('ng_infinite_scroll', $url);
    elgg_load_js('ng_infinite_scroll');

    $url = elgg_get_simplecache_url('js', 'app');
    elgg_register_simplecache_view('js/app');
    elgg_register_js('ng_feed_app', $url);


    $url = elgg_get_simplecache_url('js', 'feed_ctrl');
    elgg_register_simplecache_view('js/feed_ctrl');
    elgg_register_js('feed_ctrl', $url);

    $url = elgg_get_simplecache_url('js', 'river_loader_service');
    elgg_register_simplecache_view('js/river_loader_service');
    elgg_register_js('river_loader_service', $url);

    $url = elgg_get_simplecache_url('js', 'river_item');
    elgg_register_simplecache_view('js/river_item');
    elgg_register_js('river_item', $url);



    /* register REST API for the feed */
    elgg_ws_expose_function(
        "get_feed",
        "get_feed",
        array(
            'user_guid' => array ('type' => 'string'),
            'last_item_guid' => array ('type' => 'string', 'required' => false),
        ),
        'This function returns a feed items for the given user where the last item guid as recived',
        'GET',
        false,
        false
    );
}

function get_feed($user_guid, $last_item_guid) {

    $db_prefix = elgg_get_config('dbprefix');
    $activity = elgg_list_river(array(
        'joins' => array("JOIN {$db_prefix}entities object ON object.guid = rv.object_guid"),
        'wheres' => array("
		rv.subject_guid = $user_guid
		OR rv.subject_guid IN (SELECT guid_two FROM {$db_prefix}entity_relationships WHERE guid_one=$user_guid AND relationship='follower')
		OR rv.subject_guid IN (SELECT guid_one FROM {$db_prefix}entity_relationships WHERE guid_two=$user_guid AND relationship='friend')
	"),
    ));

    return json_encode($activity);
}