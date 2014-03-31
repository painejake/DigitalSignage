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
        ?>

        <section class="wrap">

            <hr>

            <h2>General Settings</h2>

            <p>Total posts to display:<br />
            <input type="input" name="title" value="<?php echo $num_news_posts ?>" /></p>

            <p>Total events to display:<br />
            <input type="input" name="title" value="<?php echo $num_events_posts; ?>" /></p>

            <p>Refresh time:<br />
            <input type="input" name="title" value="<?php echo $refresh_time; ?>" /></p>

            <p>Time zone:<br />
            <input type="input" name="title" value="<?php echo $time_zone; ?>" /></p>

            <p>BBC News Feed:<br />
            <input type="input" name="title" value="<?php echo $feed_channel; ?>" /></p>

            <hr>

            <h2>Social Network Settings</h2>

            <p>Facebook pagename:<br />
            <input type="input" name="title" value="<?php echo $facebook_pagename ?>" /></p>

            <p>Twitter username:<br />
            <input type="input" name="title" value="<?php echo $twitter_username ?>" /></p>

            <p>Twitter widget data id:<br />
            <input type="input" name="title" value="<?php echo $twitter_data_id ?>" /></p>

            <hr>

        </section>