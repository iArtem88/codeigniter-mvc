<h1>All news</h1>
<?php foreach ($news as $article) { ?>
    <a href="view/<?php echo $article['slug']; ?>">
        <h2><?php echo $article['title']; ?></h2>
    </a>
    <div>
        <?php echo $article['text']; ?>
    </div>
<?php } ?>
<hr>
<a href="create">Add Article</a>
