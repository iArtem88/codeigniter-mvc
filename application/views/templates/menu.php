<span>Menu: </span>
<a href="/">Home</a>
<a href="/about">About</a>
<hr>
	<?php foreach($films as $film) { ?>
        <span>♥ <?php echo $film['rating']; ?></span>
        <a href="/films/<?php echo $film['slug']; ?>" style="color: red;"><?php echo $film['title']; ?></a>
        <span><?php echo $film['text']; ?></span> |
    <?php } ?>
<hr>
	<?php if(isset($news)) { ?>
        <a href="/news" style="color: #00CC00">NEWS</a>
    <?php } ?>
