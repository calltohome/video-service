<?php

ini_set('post_max_size', '5000M');
ini_set('upload_max_filesize','5000M');
ini_set('memory_limit','5000M');
$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES['vidfile']['name']);
$uploadfile2 = $uploaddir .  $_POST['filename'] . strstr(basename($_FILES['vidfile']['name']), '.');
$link = $_POST['filename'];
move_uploaded_file($_FILES['vidfile']['tmp_name'], $uploadfile2);

echo '<pre>';

if (move_uploaded_file($_FILES['vidfile']['tmp_name'], $uploadfile2)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
//    echo "Possible file upload attack!\n";
}

print_r($_FILES);

print "</pre>";

$newvid = $uploadfile2;

$file = $link.'.html';

$current = file_get_contents($file);
$current = "<!DOCTYPE html><html><head><script src='https://content.jwplatform.com/libraries/lXvfagRD.js'></script><meta name='viewport' content='width=device-width, initial-scale=1.0'><meta content='text/html;charset=utf-8' http-equiv='Content-Type'><!--<meta content='utf-8' http-equiv='encoding'>--><link href='shift.css' rel='stylesheet'><link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'><link rel='stylesheet' href='main.css'><link rel='icon' type='image/png' href='img/favicon.ico'><link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'><title>Lopputyö</title></head><body><div class='nav'><div class='menu-container'><ul class='pull-left'><li><a href='index.html'>Home</a></li></ul><ul class='pull-right'><li><a href='watch.html'>Watch</a></li><li><a href='upload.html'>Upload</a></li><li><a href='live.html'>Live</a></li></ul></div></div><div class='isokuva'><div class='container'><h1>Lopputyö</h1></div></div><div class='teksti'><div class='container'><h2>$link</h2><br/><div id='omaToistin' style='margin: auto;'></div><script type='text/javascript'>var playerInstance = jwplayer('omaToistin');playerInstance.setup({file:'convert/$link/playlist.m3u8',width:'100%',height:'100%'});</script></div></div></body></html>";

file_put_contents($file, $current);

$list = file_get_contents('watch.html');

$extra = "<div class='grid-item'><a href='$file'><img src='convert/$link/thumbnail/thumb001.jpg' ></img></a></div>";

$pos = strpos($list, '<div class="grid-wrapper" id="grid-wrapper">') + strlen('<div class="grid-wrapper" id="grid-wrapper">');
$list = substr($list, 0, $pos) . $extra . substr($list, $pos);

file_put_contents('watch.html',$list);
echo "File uploaded: ".$uploadfile2;
echo $list;
?>
