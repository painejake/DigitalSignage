
<?php foreach ($news as $news_item): ?>

<article>
	<header>
		<h3><?php echo $news_item['title'] ?></h3>
	</header>

	<div>
		<?php $content = $this->typography->auto_typography($news_item['content']); ?>
	    <?php echo $content ?>
	</div>

	<footer>
		<p>Author: <?php echo $news_item['author'] ?></p>
	</footer>
</article>

<?php endforeach ?>

<hr>

<article>
  <div>

	<?php foreach ($events as $events_item): ?>
    <p><?php echo $events_item['event'] ?> / <?php echo $events_item['date'] ?></p>
    <?php endforeach ?>

  </div>
</article>