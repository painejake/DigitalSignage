
<h3>Create a news entry</h3>

<div>
	<div>
		<?php echo validation_errors(); ?>
	</div>
    <?php echo form_open('news/create') ?>
		<p><input type="input" name="title" value="<?php echo set_value('title'); ?>" placeholder="News Title" /></p>

		<p><textarea name="content" value="<?php echo set_value('content'); ?>" placeholder="News Content"></textarea></p>

		<input class="button" type="submit" name="submit" value="Create news entry" />
	</form>
    <a href="logout">Logout</a>
</div>
