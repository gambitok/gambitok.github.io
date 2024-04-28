<?php

include 'lib/mysql.php';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'redsearabia';

$db = new db($dbhost, $dbuser, $dbpass, $dbname);

$stories = $db->query('SELECT * FROM stories')->fetchAll();
$list = '<ul>';
foreach ($stories as $story) {
	$list .= '<li><b>' . $story['date'] . '</b><br>' . $story['text'] . '</li>';
}
$list .= '</ul>';

$header = file_get_contents('template/header.html');
$header = str_replace('{title}', 'Redsearabia | Stories', $header);
$header = str_replace('{date}', date('d F Y'), $header);
$footer = file_get_contents('template/footer.html');

$content = file_get_contents('template/stories.html');
$content = str_replace("{stories_list}", $list, $content);

echo $header;
echo $content;
echo $footer;