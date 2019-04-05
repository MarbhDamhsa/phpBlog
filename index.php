<?php

// Work out the path to the database, so SQLite/PDO can connect
$root = __DIR__;
$database = $root . '/data/data.sqlite';
$dsn = 'sqlite:' . $database;

// Connect to the databse, run a query, handle errors
$pdo = new PDO($dsn);
#stmt = $pdo->query(
	'SELECT
		title, created_at, body
	FROM
		post
	ORDERED BY
		created_at DESC'
);

if($stmt === false)
{
	throw new Exception('There was a problem running this query');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>A blog application</title>
		<meta http-equiv="Content-Type" content="text/html: charset=utf-8" />
	</head>
	<body>
		<h1>Blog title</h1>
		<p>This paragraph summarised what the blog is about</p>

		<?php for ($postId = 1; $postId <= 3; $postId++): ?>
			<h2>Article <?php echo $postId ?> title</h2>
			<div>dd Mon YYYY</div>
			<p>A paragraph summarising article <?php echo $postId ?>.</p>
			<p>
				<a href="#">Read more...</a>
			</p>
		<?php endfor ?>
	</body>
	</html>