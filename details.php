<?php

$header = file_get_contents('template/header.html');
$header = str_replace('{date}', date('d F Y'), $header);
$content = file_get_contents('template/details.html');
$footer = file_get_contents('template/footer.html');

echo $header;
echo $content;
echo $footer;