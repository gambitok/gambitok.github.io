<?php

$header = file_get_contents('template/header.html');
$header = str_replace('{title}', 'Redsearabia | Promotions & Advertising', $header);
$header = str_replace('{date}', date('d F Y'), $header);
$content = file_get_contents('template/advertising.html');
$footer = file_get_contents('template/footer.html');

echo $header;
echo $content;
echo $footer;