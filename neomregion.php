<?php

$header = file_get_contents('template/header.html');
$content = file_get_contents('template/neomregion.html');
$footer = file_get_contents('template/footer.html');

echo $header;
echo $content;
echo $footer;