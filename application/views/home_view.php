<?php
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

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_news_posts' LIMIT 1");

foreach ($s_q->result() as $row) {
   $num_news_posts = $row->value;
}

$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_events_posts' LIMIT 1");

foreach ($s_q->result() as $row) {
   $num_events_posts = $row->value;
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

?>

        <?php foreach ($events as $events_item): ?>
        <?php $latest_date = date("l jS \of F Y", strtotime($events_item['date'])); ?>

        <header>
            <?php if ($show_upcoming_event == 1) {
                echo '<div class="latest-event">';
                echo '<h4>Upcoming Event</h4>';
                echo '<p>' . $events_item['event'] . ' - ' . $latest_date . '</p>';
                echo '</div>';
                } else{}; ?>
            <!--<div class="latest-event">
                <h4>Upcoming Event</h4>
                <p><?php echo $events_item['event'] ?> - <?php echo $latest_date ?></p>
            </div>-->
        </header>

        <?php break ?>
        <?php endforeach ?>

        <section class="wrap">
            <div class="slideshow">
                <img src="<?php echo $slide1_url; ?>" width="995" height="210" alt="Slideshow" />
                <img src="<?php echo $slide2_url; ?>" width="995" height="210" alt="Slideshow" />
                <img src="<?php echo $slide3_url; ?>" width="995" height="210" alt="Slideshow" />
            </div>
            <article class="dates">
                <h3><?php echo $latest_news_title; ?></h3>
                <hr>
                <div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
                    <div id="vmarquee" style="position: absolute; width: 98%;">
                        <ul>
                            <?php $i = 0; ?>
                            <?php foreach ($news as $news_item): ?>
                            
                                <li><strong><?php echo $news_item['title'] ?></strong></li>

                                <li><?php echo auto_typography($news_item['content']); ?></li><br />

                            <?php $i++; ?>
                            <?php if ($i == $num_news_posts) break; ?>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
            </article>

            <article class="news-feed">
                <!-- bbc news feed -->
                <div id="emp1" class="player" style="float:left">
                  <p>In order to see this content you need to have both <a href="http://www.bbc.co.uk/webwise/askbruce/articles/browse/java_1.shtml" title="BBC Webwise article about enabling javascript">Javascript</a> enabled and <a href="http://www.bbc.co.uk/webwise/askbruce/articles/download/howdoidownloadflashplayer_1.shtml" title="BBC Webwise article about downloading">Flash</a> installed. Visit <a href="http://www.bbc.co.uk/webwise/">BBC&nbsp;Webwise</a> for full instructions</p>
                </div>
            </article>
        </section>

        <section class="bottom-wrap">
            <article class="tweets">
                <div class="tweets-image"></div>
                <p>
                    <a class="twitter-timeline" data-dnt="true" data-chrome="noheader nofooter noborders transparent" data-tweet-limit="1" href="http://twitter.com/<?php echo $twitter_username; ?>" data-widget-id="<?php echo $twitter_data_id; ?>"></a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </p>
            </article>

            <article class="news">
                <div class="news-image"></div>
                <div class="news-items">
	                <ul>
                        <?php $i = 0; ?>
                        <?php foreach ($events as $events_item): ?>
                            <li><?php echo $events_item['event'] ?> / <?php echo $events_item['date'] ?> <?php if ($events_item['time'] = '') { } else { echo '/ '; echo $events_item['time']; } ?></li>

                        <?php $i++; ?>
                        <?php if ($i >= $num_events_posts) break; ?>
                        <?php endforeach ?>

	                </ul>
                </div>
            </article>
        </section>

        <footer>
            <div class="twitter-logo">
                <p>@FairfaxSchool</p>
            </div>
            <div class="facebook-logo">
                <p>facebook.com/<?php echo $facebook_pagename ?></p>
            </div>
            <div class="date">
                <p><?php echo date("l jS \of F Y"); ?></p>
            </div>
        </footer>
