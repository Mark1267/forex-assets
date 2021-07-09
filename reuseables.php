<?php 
$reuseables = array(
    "XIMAGE" => array('jpg', 'jpeg', 'png', 'gif'),
    "XVIDEO" => array('mp4', 'mkv', 'avi', '3gp'),
    "XAUDIO" => array('mp3', 'm4a', 'wav', 'opus'),
    "XFILE" => array('txt', 'pdf', 'docx'),
    "UMAIL" => 'support@wievatrade.com',
    "PMAIL" => 'Wievatrade06',
    "XMAIL" => array(
        'TOP' => '<!DOCTYPE html><html lang="en" style="padding: 0; margin: 0;">
        <body style="padding: 0; margin: 0; background: rgb(248, 248, 248); font-family: Arial; font-size: 14px;">
            <div style="background-color:white; max-width: 600px; margin: 0px auto; position: relative;">
                <div style="padding: 10px; background: #373435; min-height: 60px;">
                    <div style="margin: 0px auto; width: 66.66%;">
                        <img src="' . LOGO . '" alt="WievaTrade_logo" class="img-fluid" style="width: 100px; vertical-align: middle;">
                    </div>
                </div>
                <div style="position: relative; padding: 25px;">',
                'BOTTOM' => '</div>
                <br><br>
            <footer style="background-color: white; color: #c7c7c7; text-align: center; font-size: 11px;">
                <div style="background-color: #ffcc29; color: white; padding: 20px 0px;">
                    <p>Great to have you on board</p>
                </div>
                    <center style="padding: 10px;"><p>Dalton House, 60 Windsor Ave,
        London, UK SW19 2RR</p>
                    <span style="margin: 3px 7px;">Mail: support@wievatrade.com</span><br>
                    <span style="margin: 3px 7px;">Phone: (+44) 791-921-4075</span></center>
            </footer>
            </div>
        </body>
        
        </html>'
    )
);

foreach($reuseables as $key => $value){
    define($key, $value);
}
?>
