        <?php foreach ($events as $events_item): ?>
        <?php $latest_date = date("l jS \of F Y", strtotime($events_item['date'])); ?>

        <header>
            <div class="latest-event">
                <h4>Upcoming Event</h4>
                <p><?php echo $events_item['event'] ?> - <?php echo $latest_date ?></p>
            </div>
        </header>

        <?php break ?>
        <?php endforeach ?>

        <section class="wrap">
            <div class="slideshow">
                <img src="<?php echo base_url(); ?>img/slide1.jpg" width="995" height="210" alt="Slideshow" />
                <img src="<?php echo base_url(); ?>img/slide2.jpg" width="995" height="210" alt="Slideshow" />
            </div>

            <article class="dates">
                <h3>Latest from the Student Bulletin...</h3>
                <hr>
                <ul id="ticker01">
                    <?php foreach ($news as $news_item): ?><li><strong><?php echo $news_item['title'] ?></strong> - <?php echo $news_item['content'] ?></li>
                    <?php endforeach ?>

                </ul>
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
                    <a class="twitter-timeline" data-dnt="true" data-chrome="noheader nofooter noborders transparent" data-tweet-limit="1" href="https://twitter.com/FairfaxSchool" data-widget-id="367929468054040577"></a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </p>
            </article>

            <article class="news">
                <div class="news-image"></div>
                <div class="news-items">
	                <ul>
                        <?php foreach ($events as $events_item): ?><li><?php echo $events_item['event'] ?> / <?php echo $events_item['date'] ?></li>
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
                <p>facebook.com/FairfaxSchool</p>
            </div>
            <div class="date">
                <p><?php echo date("l jS \of F Y"); /*?> / <?php echo date('g:i:s a'); */?></p>
            </div>
        </footer>