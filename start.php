<?php
elgg_register_event_handler('init', 'system', 'smartfeed_init');

function smartfeed_init()
{
    /* register page handlers */
    elgg_register_page_handler('dashboard', function () {
        require_once dirname(__FILE__) . '/pages/dashboard.php';
        return true;
    });

    /* register java script */
    $url = elgg_get_simplecache_url('js', 'vendors/angular');
    elgg_register_simplecache_view('js/vendors/angular');
    elgg_register_js('angular', $url);
    // load angualr at the header for all the site (can be extracted to the core \ other plugin)
    elgg_load_js('angular');

    $url = elgg_get_simplecache_url('js', 'vendors/underscore');
    elgg_register_simplecache_view('js/vendors/underscore');
    elgg_register_js('underscore', $url);
    elgg_load_js('underscore');

    $url = elgg_get_simplecache_url('js', 'vendors/ng_infinite_scroll');
    elgg_register_simplecache_view('js/vendors/ng_infinite_scroll');
    elgg_register_js('ng_infinite_scroll', $url);
    elgg_load_js('ng_infinite_scroll');

    $url = elgg_get_simplecache_url('js', 'ng_feed/app');
    elgg_register_simplecache_view('js/ng_feed/app');
    elgg_register_js('ng_feed_app', $url);


    $url = elgg_get_simplecache_url('js', 'ng_feed/feed_ctrl');
    elgg_register_simplecache_view('js/ng_feed/feed_ctrl');
    elgg_register_js('feed_ctrl', $url);

    $url = elgg_get_simplecache_url('js', 'ng_feed/activities_loader_service');
    elgg_register_simplecache_view('js/ng_feed/activities_loader_service');
    elgg_register_js('activities_loader_service', $url);

    $url = elgg_get_simplecache_url('js', 'ng_feed/pubsub_broker_service');
    elgg_register_simplecache_view('js/ng_feed/pubsub_broker_service');
    elgg_register_js('pubsub_broker_service', $url);

    $url = elgg_get_simplecache_url('js', 'ng_feed/activity_log');
    elgg_register_simplecache_view('js/ng_feed/activity_log');
    elgg_register_js('activity_log', $url);

    $url = elgg_get_simplecache_url('js', 'ng_feed/auto_refresh');
    elgg_register_simplecache_view('js/ng_feed/auto_refresh');
    elgg_register_js('auto_refresh', $url);

    $url = elgg_get_simplecache_url('css', 'feed');
    elgg_register_simplecache_view('css/feed');
    elgg_register_css('feed', $url);

    /* register REST API for the feed */
    elgg_ws_expose_function(
        "get_feed",
        "get_feed",
        array(
            'user_guid' => array('type' => 'string'),
            'last_item_guid' => array('type' => 'string', 'required' => false),
        ),
        'This function returns a feed items for the given user where the last item guid as recived',
        'GET',
        false,
        false
    );

    elgg_ws_expose_function(
        "fetch_new_items",
        "fetch_new_items",
        array(
            'user_guid' => array('type' => 'string'),
            'last_item_guid' => array('type' => 'string', 'required' => false),
        ),
        'This function returns only new items if exists',
        'GET',
        false,
        false
    );
}

function get_feed($user_guid, $last_item_guid)
{
    // This is just a mock :)
    // There is no sense to the data only the structre
    $result = array();
    for ($i = $last_item_guid; $i < $last_item_guid + 5; $i++) {
        $result[] = new Activity($i,
            'create',
            'Tomer created comment on a post',
            new ActivityItem($user_guid,
                'ElggUser',
                'Tomer Kruvi',
                'very cool guy! :)'
            ),
            new ActivityItem('2222',
                'ElggUser',
                'Someo nee lse',
                'im someone else!'
            ),
            new ActivityItem('3333',
                'ElggPost',
                'the post title',
                'this is super interesting post...'
            )
        );
    }
    return json_encode($result);
}

function fetch_new_items($user_guid, $last_item_guid)
{
    // This is just a mock :)
    // There is no sense to the data only the structre
    $result = array();
    for ($i = $last_item_guid; $i < $last_item_guid + 2; $i++) {
        $result[] = new Activity($i,
            'create',
            'Tomer created comment on a post in a page',
            new ActivityItem($user_guid,
                'ElggUser',
                'Tomer Kruvi',
                'very cool guy! :)'
            ),
            new ActivityItem('4444',
                'ElggPage',
                'SecertPageName',
                'sheker sheker'
            ),
            new ActivityItem('5555',
                'ElggPost',
                'funny story!! thx!',
                'this is super interesting post...'
            )
        );
    }
    return json_encode($result);
}