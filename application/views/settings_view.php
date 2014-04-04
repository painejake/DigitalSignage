<?php

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_news_posts' LIMIT 1");

foreach ($s_q->result() as $row) {
   $num_news_posts = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_events_posts' LIMIT 1");

foreach ($s_q->result() as $row) {
   $num_events_posts = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'time_zone' LIMIT 1");

foreach ($s_q->result() as $row) {
    $time_zone = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'refresh_time' LIMIT 1");

foreach ($s_q->result() as $row) {
   $refresh_time = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'facebook_pagename' LIMIT 1");

foreach ($s_q->result() as $row) {
   $facebook_pagename = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'twitter_username' LIMIT 1");

foreach ($s_q->result() as $row) {
   $twitter_username = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'twitter_data_id' LIMIT 1");

foreach ($s_q->result() as $row) {
   $twitter_data_id = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'feed_channel' LIMIT 1");

foreach ($s_q->result() as $row) {
   $feed_channel = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'show_help_link' LIMIT 1");

foreach ($s_q->result() as $row) {
   $show_help_link = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'latest_news_title' LIMIT 1");

foreach ($s_q->result() as $row) {
   $latest_news_title = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'latest_events_title' LIMIT 1");

foreach ($s_q->result() as $row) {
   $latest_events_title = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'show_upcoming_event' LIMIT 1");

foreach ($s_q->result() as $row) {
   $show_upcoming_event = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'slide1_url' LIMIT 1");

foreach ($s_q->result() as $row) {
   $slide1_url = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'slide2_url' LIMIT 1");

foreach ($s_q->result() as $row) {
   $slide2_url = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'slide3_url' LIMIT 1");

foreach ($s_q->result() as $row) {
   $slide3_url = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'cycle_time' LIMIT 1");

foreach ($s_q->result() as $row) {
   $cycle_time = $row->value;
}

function timezone_list() {
    $zones_array = array();

    foreach(timezone_identifiers_list() as $key => $zone) {
        date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
    }
    return $zones_array;
}

?>

                <h2 class="sub-header">General Settings</h2>
                
                <?php echo form_open('settings/update') ?>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <p>Total posts to display:<br />
                <input class="form-control limit-width" type="text" name="num_news_posts" value="<?php echo $num_news_posts ?>" /></p>

                <p>Total events to display:<br />
                <input class="form-control limit-width" type="text" name="num_events_posts" value="<?php echo $num_events_posts; ?>" /></p>

                <p>Refresh time (milliseconds):<br />
                <input class="form-control limit-width" type="text" name="refresh_time" value="<?php echo $refresh_time; ?>" /></p>

                <p>Time zone:<br />
                <select name="time_zone" class="form-control limit-width">
                    <?php foreach(timezone_list() as $t) { ?>
                    <option value="<?php print $t['zone'] ?>" <?php if ($time_zone == $t['zone']) : echo "selected"; endif; ?>><?php print $t['zone'] ?></option>
                    <?php } ?>
                </select></p>

                <p>BBC News Feed:<br />
                <select name="feed_channel" class="form-control limit-width">
                    <option value="bbc_two_england" <?php if ($feed_channel == 'bbc_two_england') : echo "selected"; endif; ?>>BBC 2</option>
                    <option value="bbc_three" <?php if ($feed_channel == 'bbc_three') : echo "selected"; endif; ?>>BBC 3</option>
                    <option value="bbc_four" <?php if ($feed_channel == 'bbc_four') : echo "selected"; endif; ?>>BBC 4</option>
                    <option value="bbc_news24" <?php if ($feed_channel == 'bbc_news24') : echo "selected"; endif; ?>>BBC News 24</option>
                    <option value="cbbc" <?php if ($feed_channel == 'cbbc') : echo "selected"; endif; ?>>CBBC</option>
                    <option value="cbeebies" <?php if ($feed_channel == 'cbeebies') : echo "selected"; endif; ?>>CBeebies</option>
                    <option value="bbc_parliament" <?php if ($feed_channel == 'bbc_parliament') : echo "selected"; endif; ?>>BBC Parliment</option>
                    <option value="bbc_alb" <?php if ($feed_channel == 'bbc_alb') : echo "selected"; endif; ?>>BBC Alba</option>
                </select></p>

                <p>Show the help link:<br />
                <select name="show_help_link" class="form-control limit-width">
                    <option value="0" <?php if ($show_help_link == '0') : echo "selected"; endif; ?>>Don't Show</option>
                    <option value="1" <?php if ($show_help_link == '1') : echo "selected"; endif; ?>>Show</option>
                </select></p>

                <hr>

                <h2>Frontend Settings</h2>

                <p>Latest news title<br />
                <input class="form-control limit-width" type="text" name="latest_news_title" value="<?php echo $latest_news_title; ?>" /></p>

                <p>Latest events title<br />
                <input class="form-control limit-width" type="text" name="latest_events_title" value="<?php echo $latest_events_title; ?>" /></p>

                <p>Show the upcoming event:<br />
                <select name="show_upcoming_event" class="form-control limit-width">
                    <option value="0" <?php if ($show_upcoming_event == '0') : echo "selected"; endif; ?>>Don't Show</option>
                    <option value="1" <?php if ($show_upcoming_event == '1') : echo "selected"; endif; ?>>Show</option>
                </select></p>

                <hr>

                <h2>jQuery Slideshow Settings</h2>

                <p>Slide 1 URL:<br />
                <input class="form-control limit-width" type="text" name="slide1_url" value="<?php echo $slide1_url; ?>" /></p>

                <p>Slide 2 URL:<br />
                <input class="form-control limit-width" type="text" name="slide2_url" value="<?php echo $slide2_url; ?>" /></p>

                <p>Slide 3 URL:<br />
                <input class="form-control limit-width" type="text" name="slide3_url" value="<?php echo $slide3_url; ?>" /></p>

                <p>Cycle time (milliseconds):<br />
                <input class="form-control limit-width" type="text" name="cycle_time" value="<?php echo $cycle_time; ?>" /></p>

                <hr>

                <h2>Social Network Settings</h2>

                <p>Facebook pagename:<br />
                <input class="form-control limit-width" type="text" name="facebook_pagename" value="<?php echo $facebook_pagename ?>" /></p>

                <p>Twitter username:<br />
                <input class="form-control limit-width" type="text" name="twitter_username" value="<?php echo $twitter_username ?>" /></p>

                <p>Twitter widget data id:<br />
                <input class="form-control limit-width" type="text" name="twitter_data_id" value="<?php echo $twitter_data_id ?>" /></p>

                <hr>

                <p><input class="button" type="submit" name="submit" value="Save Settings" /></p>

                <hr>

            <?php echo form_close(); ?>
