
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
		<p>News posted: <?php echo $news_item['date'] ?></p>
	</footer>
</article>

<?php endforeach ?>
