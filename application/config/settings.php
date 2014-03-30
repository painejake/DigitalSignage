<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Number of posts
|--------------------------------------------------------------------------
|
| This is the maximum number of posts to be displayed on the signage page.
| 
| To set this to unlimited (at your own risk) set to a high number however
| this will break the default template.
|
*/

$config['num_news_posts'] = '10';

/*
|--------------------------------------------------------------------------
| Number of events
|--------------------------------------------------------------------------
|
| This is the maximum number of events to be displayed on the signage page.
| 
| To set this to unlimited (at your own risk) set to a high number however
| this will break the default template.
|
*/

$config['num_events_posts'] = '5';

/*
|--------------------------------------------------------------------------
| Refresh Time
|--------------------------------------------------------------------------
|
| The time in milliseconds that we refresh the sigage page automatically.
|
| 600000 	= 10 minutes
| 900000 	= 15 minutes
| 1800000	= 30 minutes
| 
| Set this to a high number to disable. Please be aware if this is disabled
| then the dynamic aspect of the page (tweets and new items displaying)
| will not work! If the number is set too low buffer issues will occur with
| the BBC news feed.
|
*/

$config['refresh_time'] = '90000';

/*
|--------------------------------------------------------------------------
| Twitter Widget	
|--------------------------------------------------------------------------
| 
| This is to customize the twitter widget for your needs. You will need to
| create a widget here first:
|
| https://twitter.com/settings/widgets
|
| Generate any widget and copy the twitter url link and the data-widget-id
| 
| URL: http://twitter.com/painejake
| Data: 450375692270571520
|
*/

$config['twitter_url'] = 'http://twitter.com/painejake';
$config['twitter_data_id'] = '450375692270571520';

/*
|--------------------------------------------------------------------------
| BBC Channel Feed
|--------------------------------------------------------------------------
|
| Here you can select which BBC channel we stream. Options are below.
| Detault recommended settings in bbc_news24.
| 
|	bbc_two_england
|  	bbc_three
|  	bbc_four
|   cbbc
|   cbeebies
|   bbc_news24
|   bbc_parliament
|   bbc_alba
|
*/

$config['feed_channel'] = 'bbc_news24';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
