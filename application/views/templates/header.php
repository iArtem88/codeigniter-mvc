<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $title; ?></title>
</head>
<header>Logo</header>
    <?php $this->load->view('templates/menu' ); ?>
<hr>
<ul style="display: inline-block">
    <li><a href="/news">All Articles</a></li>
    <li><a href="/news/create">Create Article</a></li>
</ul>
<body>
<hr>