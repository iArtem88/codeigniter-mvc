<h1>All news</h1>
<?php foreach ($news as $article) { ?>
    <a href="news/<?php echo $article['slug']; ?>">
        <h2><?php echo $article['title']; ?></h2>
    </a>
    <div>
        <?php echo $article['text']; ?>
    </div>
    <a href="news/edit/<?php echo $article['slug']; ?>">Edit</a>
    <a href="news/delete/<?php echo $article['slug']; ?>">Delete</a>
<?php } ?>
<hr>
<a href="create">Add Article</a>
