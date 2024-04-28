<?php

include 'lib/mysql.php';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'redsearabia';

$db = new db($dbhost, $dbuser, $dbpass, $dbname);

$news = $db->query('SELECT * FROM news WHERE status = ?', 1)->fetchAll();
$arr = [];
foreach ($news as $value) {
    $region_id = $value['region_id'];
    $text = $value['text'];
    $date = $value['date'];
    $arr[$region_id][] = compact('text', 'date');
}

$list = '<div>';
foreach ($arr as $region_id => $values) {
    $regions = $db->query('SELECT * FROM regions WHERE id = ?', $region_id)->fetchAll();
    $list .= '<div><h2>' . $regions[0]['region_name'] . '</h2></div>';
    $list .= '<ul>';
    foreach ($values as $value) {
        $list .= '<li><b>' . $value['date'] . '</b><br>' . $value['text'] . '</li>';
    }
    $list .= '</ul>';
}
$list .= '</div>';

$header = file_get_contents('template/header.html');
$header = str_replace('{title}', 'Redsearabia | News', $header);
$header = str_replace('{date}', date('d F Y'), $header);
$footer = file_get_contents('template/footer.html');

$content = file_get_contents('template/news.html');
$content = str_replace("{news_list}", $list, $content);

echo $header;
echo $content;
echo $footer;