
<?php foreach ($news as $news_item): ?>

<h3><?php echo $news_item['title'] ?></h3>

<div>
    <?php echo $news_item['content'] ?>
</div>

<?php endforeach ?>
