<?php 
$reuseables = array(
    "XIMAGE" => array('jpg', 'jpeg', 'png', 'gif'),
    "XVIDEO" => array('mp4', 'mkv', 'avi', '3gp'),
    "XAUDIO" => array('mp3', 'm4a', 'wav', 'opus'),
    "XFILE" => array('txt', 'pdf', 'docx'),
    "UMAIL" => 'support@wievatrade.com',
    "PMAIL" => 'Wievatrade06'
);

foreach($reuseables as $key => $value){
    define($key, $value);
}
?>
