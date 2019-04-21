<form action="/news/edit" method="post">
    <input type="text" name="title" value="<?php echo !empty($title_news) ? $title_news : ''; ?>" placeholder="Article name"><br>
    <textarea name="text" cols="30" rows="10"><?php echo !empty($text_news) ? $text_news : ''; ?></textarea><br>
    <input type="hidden" name="slug" value="<?php echo !empty($slug_news) ? $slug_news : ''; ?>" placeholder="Article slug"><br>
    <input type="submit" value="Submit">
</form>