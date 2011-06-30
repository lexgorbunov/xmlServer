<?php

$dom = new DOMDocument('1.0', 'utf-8');

$gameServer = $dom->createElement('server');
$gameServer->setAttribute('admin', 'lexgorbunov@gmail.com');
$dom->appendChild($gameServer);

$game=$dom->createElement('game');
$game->setAttribute('name', 'stars');
$game->setAttribute('v', '1.0');
$gameServer->appendChild($game);

$images=$dom->createElement('images');
$game->appendChild($images);

$basePath='http://lglab.ru/xmlserver/static/img/';
$imgList=array(
    'star'=>$basePath.'s.png',
    'wallpaper'=>$basePath.'w.jpeg',
);

foreach ($imgList as $imgID=>$imgPath)
{
    $imgNode=$dom->createElement('img');
    $imgNode->setAttribute('id', $imgID);
    $imgNode->setAttribute('url', $imgPath);
    $images->appendChild($imgNode);
}


echo $dom->saveXML();