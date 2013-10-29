<?php

// @TODO - refactor this page
// create dashboard content view and more

gatekeeper();

$user = elgg_get_logged_in_user_entity();

elgg_set_page_owner_guid($user->guid);

$title = elgg_echo('newsfeed');

// Get the facebook theme composer
$composer = elgg_view('page/elements/composer', array('entity' => $user));

// Get the angualr river view
$ng_river = elgg_view('river/river');

elgg_set_page_owner_guid(1);
$content = elgg_view_layout('two_sidebar', array(
	'title' => $title,
	'content' => $composer . $ng_river,
));

echo elgg_view_page($title, $content);