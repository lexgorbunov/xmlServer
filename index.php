<?php
$pathStatic='http://lglab.ru/xmlserver/static';

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
$pathImg=$pathStatic.'/img';
$imgList=array();
$dir= dirname(__FILE__).'/static/img';
if ($dh = opendir($dir))
{
    while (($file = readdir($dh)) !== false)
    {
        if(!is_file($dir.'/'.$file))
            continue;
        $imgList[preg_replace('/(.*)\.[\w\d]+$/', '$1', $file)]=$pathImg.'/'.$file;
    }
    closedir($dh);
}
foreach ($imgList as $imgID=>$imgPath)
{
    $imgNode=$dom->createElement('img');
    $imgNode->setAttribute('id', $imgID);
    $imgNode->setAttribute('url', $imgPath);
    $images->appendChild($imgNode);
}

$sound=$dom->createElement('sound');
$game->appendChild($sound);
$pathSound=$pathStatic.'/sound';
$dir= dirname(__FILE__).'/static/sound';
$soundList=array();
if ($dh = opendir($dir))
{
    while (($file = readdir($dh)) !== false)
    {
        if(!is_file($dir.'/'.$file))
            continue;
        $soundList[preg_replace('/(.*)\.[\w\d]+$/', '$1', $file)]=$pathSound.'/'.$file;
    }
    closedir($dh);
}

foreach ($soundList as $soundID=>$soundPath)
{
    $soundNode=$dom->createElement('track');
    $soundNode->setAttribute('id', $soundID);
    $soundNode->setAttribute('url', $soundPath);
    $sound->appendChild($soundNode);
}


echo $dom->saveXML();