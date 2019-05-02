<?php
foreach ($news as $article) { ?>
	<a href="news/<?php echo $article['slug']; ?>">
		<h2><?php echo $article['title']; ?></h2>
	</a>
	<span><?php echo $article['text']; ?></span>
<?php } ?>

<hr>
<?php foreach($movies as $movie) { ?>
	<span>♥ <?php echo $movie['rating']; ?></span>
	<a href="/films/<?php echo $movie['slug']; ?>" style="color: #0a75ab;"><?php echo $movie['title']; ?></a>
	<span><?php echo $movie['text']; ?></span> |
<?php } ?>
<hr>
