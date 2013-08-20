<?php echo validation_errors(); ?>

<?php echo form_open('home/create_news') ?>
	<p><input type="input" name="title" value="<?php echo set_value('title'); ?>" placeholder="News Title" /></p>

	<p><textarea name="content" value="<?php echo set_value('content'); ?>" placeholder="News Content"></textarea></p>

	<p><input type="input" name="author" value="<?php echo set_value('author'); ?>" placeholder="Post Author" /></p>

	<input class="button" type="submit" name="submit" value="Create news entry" />
</form>

<?php echo form_open('home/create_events') ?>
	<p><input type="input" name="event" value="<?php echo set_value('title'); ?>" placeholder="Event Title" /></p>

	<p><input type="input" name="date" value="<?php echo set_value('title'); ?>" placeholder="Event Date" /></p>

	<p><input type="input" name="time" value="<?php echo set_value('author'); ?>" placeholder="Event Time" /></p>

	<input class="button" type="submit" name="submit" value="Create event entry" />
</form>

<a href="logout">Logout</a>
