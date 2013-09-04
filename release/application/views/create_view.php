<div class="post-error">
    <?php echo validation_errors(); ?>
</div>
        <section class="wrap">
            <hr>
            <div class="span1">
                <h1>Create a news post</h1>
                <?php echo form_open('home/create_news') ?>
					<input type="input" name="title" value="<?php echo set_value('title'); ?>" placeholder="News Title" />
					<textarea name="content" value="<?php echo set_value('content'); ?>" placeholder="News Content"></textarea>
					<input type="input" name="author" value="<?php echo set_value('author'); ?>" placeholder="Post Author" />
					<input class="button" type="submit" name="submit" value="Create news entry" />
				</form>
            </div>

            <div class="span2">
                <h1>Create a new event</h1>
				<?php echo form_open('home/create_events') ?>
					<input type="input" name="event" value="<?php echo set_value('title'); ?>" placeholder="Event Title" />
					<input type="input" id="datepicker" name="date" value="<?php echo set_value('title'); ?>" placeholder="Event Date" />
					<input type="input" name="time" value="<?php echo set_value('author'); ?>" placeholder="Event Time" />
					<input class="button" type="submit" name="submit" value="Create event entry" />
				</form>
            </div>
            <hr>
                <h1>Delete a news post</h1>
                <?php foreach ($news as $news_item): ?><li><?php echo $news_item['title'] ?> - <a href="home/delete_news/<?php echo $news_item['id'] ?>" onclick="return confirm('Are you sure you wish to delete this post?');">Delete</a></li><br />
                <?php endforeach ?>

            <hr>
                <h1>Delete an event entry</h1>
                <?php foreach ($events as $events_item): ?><li><?php echo $events_item['event'] ?> / <?php echo $events_item['date'] ?> - <a href="home/delete_dates/<?php echo $news_item['id'] ?>" onclick="return confirm('Are you sure you wish to delete this post?');">Delete</a></li><br />
                <?php endforeach ?>

            <hr>
        </section>