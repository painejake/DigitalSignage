
<?php foreach ($news as $news_item): ?>

<h3><?php echo $news_item['title'] ?></h3>

<?php $content = $this->typography->auto_typography($news_item['content']); ?>
<?php echo $content ?>

<p>Author: <?php echo $news_item['author'] ?></p>

<?php endforeach ?>

<?php foreach ($events as $events_item): ?>

<p><?php echo $events_item['event'] ?> / <?php echo $events_item['date'] ?></p>

<?php endforeach ?>
